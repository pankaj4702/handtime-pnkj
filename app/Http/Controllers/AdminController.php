<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\RegUser;
use App\Models\WishList;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Testimonial;
use App\Models\Email;
use Carbon\Carbon;
use DB;
use DataTables;
use Hash;
use Session;
use Date;

class AdminController extends Controller
{





    public function index(){

        if (session()->has('adminname')) {
        return redirect('/admin-dashboard');
        }
        else{
            return view('admin.adminlogin');
        }
    }

    public function users(Request $request){
       $users = RegUser::all();
       return view('admin.user',compact('users'));



    }

    public function login(Request $request){

       $request->validate([
        'email' => 'required|email',
        'password'=>'required',
      ]);
      $users = DB::table('users')->where('email',$request->email)->first();
      if($users != null){

      if (Hash::check($request->password,$users->password)) {

        Session::put(['adminname' =>$users->name, 'adminmail' => $users->email]);
        return redirect('/admin-dashboard');
     }
     else{
        return redirect()->back()->with('error',"Password is wrong");
     }
    }
    else{
        return redirect()->back()->with('error',"Please Enter the Correct Email.");
    }
    }

    public function dashboard(){
        if (session()->has('adminname')) {
        return view('admin.admin');
        }
        else{
            return redirect()->route('admin');
        }
    }

    public function logout(){
        session()->forget('adminname');
        return redirect()->route('admin');
    }

    public function addproduct(){
        if (session()->has('adminname')) {
            return view('admin.addproduct');
            }
            else{
                return redirect()->route('admin');
            }

    }

    public function allproduct(){
        if (session()->has('adminname')) {
            $products= Product::where('delete_status','=',1)->get();
            // dd($products);

            return view('admin.allproducts',compact('products'));
            }
            else{
                return redirect()->route('admin');
            }


    }

    public function editproduct($id){
        $product = Product::find($id);
        return view('admin.editproduct',compact('product'));
    }

    public function updateProduct(Request $request){
       $id = $request->id;
       $main_product = Product::find($id);

        $request->validate([
            'product_name' => 'required|max:20',
            'product_price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
          ]);
          if(isset($request->image)){

              $imagePath = $request->file('image')->store('uploads', 'public');
          $main_product->product_name = $request->product_name;
          $main_product->price = $request->product_price;
          $main_product->image_name = $imagePath;

          $my_product =  $main_product->save();
          return redirect()->back()->with('success','Successfully Submitted');
          }
          else{


            $main_product->product_name = $request->product_name;
            $main_product->price = $request->product_price;
            $main_product->image_name = $main_product->image_name;

            $my_product =  $main_product->save();

            return redirect()->back()->with('success','Successfully Updated');
          }

    }

    public function deleteProduct($id){

        $product_id = Product::where('id',$id)->first();
        if ($product_id->status == 1) {
            $product_id->status = 0;
        }
        elseif($product_id->status == 0){
            $product_id->status = 1;
        }
        $product_id->save();
         return redirect()->back();
    }


    // store the product
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'product_name' => 'required|max:20',
            'product_price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
          ]);

          $imagePath = $request->file('image')->store('uploads', 'public');

          $product = new Product();
      $product->product_name = $request->product_name;
      $product->price = $request->product_price;
      $product->image_name = $imagePath;
      $product->status = 1;
      $product->delete_status = 1;

      $my_product =  $product->save();
      return redirect()->back()->with('success','Successfully Submitted');


    }

    public function users_deactivate($id){
        $user = RegUser::find($id);
        if($user->status == 1){
            $user->status = 0;
            $user->save();

        }
        elseif($user->status == 0){
            $user->status = 1;
            $user->save();

        }

        return redirect()->back();

    }

    public function users_delete($id){

        $user_id = RegUser::find($id);

        if ($user_id) {
            // Delete the record
            $user_id->delete();
            $wish_user_id = WishList::where('user_id',$id)->delete();
            $user_orders = Order::where('user_id',$id)->delete();
            session()->forget('username');
            return redirect()->back();
        }
    }

    public function orders($id){

       $products = Order::where('user_id',$id)->get();

       $user_products = Order::join('products', 'product_id', '=', 'products.id')
       ->join('payments','orders.transation_id','payments.payment_id')
            ->where('user_id',$id)
            ->get(['products.*','orders.*','payments.payer_id','payments.payer_email']);

       return view('admin.orders',compact('user_products'));
    }

    public function wishlist($id){
       $products = Product::join('wishlist','products.id','=','wishlist.product_id')
       ->where('wishlist.user_id',$id)
       ->get('products.*');
       return view('admin.wishlist',compact('products'));

    }

    public function del_product($id){
        $product_id = Product::where('id',$id)->first();
        if ($product_id->delete_status == 1) {
            $product_id->delete_status = 0;
        }
        elseif($product_id->delete_status == 0){
            $product_id->delete_status = 1;
        }
        $product_id->save();
         return redirect()->back();
    }

    public function coupons(){
        $coupons = Coupon::all();
        return view('admin.coupons',compact('coupons'));
    }

    public function addcoupon(){
        return view('admin.addcoupon');
    }

    public function storecoupon(Request $request){

        $request->validate([
            'coupon' => 'required',
            'start_date'=>'required|date|after:today',
            'valid_date' => 'required|date|after:today|after:start_date',
            'discount'=> 'required|numeric|between:10,95',
            'above_price'=>'required|numeric',
          ]);
        //   $current_date = Date::now()->format('d-m-Y');
          $sdateString = $request->start_date;
          $sdate = Carbon::parse($sdateString);
          $s_date = $sdate->format('Y-m-d');
          $start_date = date($s_date);

          $dateString= $request->valid_date;
        $date = Carbon::parse($dateString);
        $v_date = $date->format('Y-m-d');
        $valid_date = date($v_date);


$conflictingCoupons = Coupon::where(function ($query) use ($start_date, $valid_date) {
    $query->whereBetween('current_date', [$start_date, $valid_date])
          ->orWhereBetween('valid_date', [$start_date, $valid_date])
          ->orWhere(function ($query) use ($start_date, $valid_date) {
              $query->where('current_date', '<=', $start_date)
                    ->where('valid_date', '>=', $valid_date);
          });
})->exists();
            if ($conflictingCoupons) {
               return redirect()->back()->with('error','Coupon date range conflicts with an existing coupon');
            }
        $coupon_code = new Coupon();
        $coupon_code->coupon = $request->coupon;
        $coupon_code->current_date = $start_date;
        $coupon_code->valid_date = $valid_date;
        $coupon_code->discoount = $request->discount;
        $coupon_code->above_price = $request->above_price;
        $coupon_code->status = 2;
        $coupon_code->save();
        return redirect()->back()->with('success','Created Successfully');
    }

    public function reivews($id){

       $reviews = Rating::join('products','products.id','ratings.product_id')
       ->where('user_id',$id)
    //    ->get(['reviews.review','ratings.rating','products.product_name','reviews.user_id','reviews.product_id']);
    ->get();

        return view('admin.reviews',compact('reviews'));
    }

    public function delete_reivew(Request $request){
      $abc2 = Rating::where('user_id',$request->user_id)->where('product_id',$request->product_id)->delete();
      return response()->json(['status'=>1,'message'=>"delete successfully"]);

    }

    public function subscribers(){
        $users = Email::join('register_user','emails.user_id','register_user.id')
        ->get(['register_user.name','emails.email_id','emails.status','emails.user_id']);
      return view('admin.subscribers',compact('users'));
    }

    public function subscribe_delete($id){
        $subscribe_id = Email::where('user_id',$id)->first();
        if ($subscribe_id->status == 1) {
            $subscribe_id->status = 0;
        }
        elseif($subscribe_id->status == 0){
            $subscribe_id->status = 1;
        }
        $subscribe_id->save();
         return redirect()->back();
    }

    public function tesmtionials(){
        $users= Testimonial::join('register_user','testimonials.user_id','register_user.id')
        ->get(['testimonials.user_id','register_user.name','register_user.email','testimonials.review']);
        return view('admin.testimonial',compact('users'));
    }
}
