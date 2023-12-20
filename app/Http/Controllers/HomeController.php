<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegUser;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\WishList;
use App\Models\Testimonial;
use Carbon\Carbon;
use Hash;
use Session;

class HomeController extends Controller
{
  public function __construct()
  {
      $today = now()->format('Y-m-d');
      $existingCoupon = Coupon::where('current_date', '<=', $today)
      ->where('valid_date', '>=', $today)
      ->first();
      // dd($existingCoupon);
      if($existingCoupon){
          $lastCoupons = Coupon::where('current_date', '>', $today)
          ->where('valid_date', '>', $today)
          ->get();
          foreach($lastCoupons as $lastCoupon){
              $lastCoupon->status = 2;
              $lastCoupon->save();
          }
          $existingCoupon->status= 1;
      $existingCoupon->save();
      }
      else{
          $abcexistingCoupon = Coupon::where('valid_date', '<', $today)
              ->where('current_date', '<', $today)
          ->get();
          foreach ($abcexistingCoupon as $coupon) {
              $coupon->status = 2;
              $coupon->save();
          }
      }

  }


  public function index(Request $request){
    $user = Testimonial::where('user_id',$request->user_id)->first();
   if(!isset($user)){
      $testimonial = new Testimonial();
      $testimonial->user_id = $request->user_id;
      $testimonial->review = $request->value;
      $testimonial->status = 1;
      $testimonial->save();
      return response()->json(['status'=>1, 'message'=>"data save successfully"]);
    }
    else{
      return response()->json(['status'=>0, 'message'=>"data already saved"]);
   }
  }

   public function homepage(){
    $id = Session::get('id');
    $user = RegUser::find($id);
    $check_review = Testimonial::where('user_id',$id)->first();
    $all_testi_review = Testimonial::join('register_user','testimonials.user_id','register_user.id')
    ->get(['testimonials.user_id','register_user.name','register_user.email','testimonials.review']);

      if($id != null){
        $products = Product::orderBy('id','desc')->take(6)
        ->get();
      }
      else{
        $products = Product::orderBy('id','desc')->take(6)->get();
      }
          $coupon = Coupon::where('status','=',1)->first();
          $wish_products = WishList::where('user_id',$id)->get();
          if(isset($products)){
            return view('home.homepage',compact('products','coupon','wish_products','id','user','check_review','all_testi_review'));
          }
          else{
            return view('home.homepage',compact('products','coupon','wish_products','id','user','check_review','all_testi_review'));
          }
        }
        public function registration(){
            return view('home.register');
        }



   public function registrationuser(Request $request){

    $request->validate([
        'name' => 'required|max:20',
        'email' => 'required|email|unique:register_user',
        'phone'=>'required|unique:register_user|min:10',
        'password'=>'required|min:8',
        'confirm_password'=>'required|same:password',
      ]);


      $user = new RegUser();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->status = 1;

      $user->password = Hash::make($request->password);
      $myuser =  $user->save();
      if($myuser){
         $user = RegUser::where('email', $user->email)->first();
         $username = $user->name;
         $email = $user->email;
         $id = $user->id;
         Session::put(['username' =>$username, 'email' => $email,'id'=>$id]);
        return redirect('/');
      }
   }

   public function login(){
     return view('home.login');

   }

   public function loginuser(Request $request){
      $request->validate([
               'login_email' => 'required',
               'login_password'=>'required',
             ]);
             $email = $request->login_email;
             $password = $request->login_password;

             $user = RegUser::where('email', $email)->first();
             if($user == null){

               return redirect()->back()->with('error', 'please check the email.');
             }
             else{

              if($user->status == 0){

                return redirect()->back()->with('error', 'Something went Wrong');
              }
              else{

             $hashed_pass = $user->password;
             $username = $user->name;
             $email = $user->email;
             $id = $user->id;
             if (Hash::check($password, $hashed_pass)) {
               // Session::put('username', $username);
               Session::put(['username' =>$username, 'email' => $email,'id'=>$id]);
               return redirect("/");
            }
             else{
               return redirect()->back()->with('error', 'Password is not correct.');
             }
            }
         }
   }


   public function logout(){
      // session()->forget('username');
      session()->flush();
      // dd(Session::get('username'));
      return redirect('/');
   }



}
