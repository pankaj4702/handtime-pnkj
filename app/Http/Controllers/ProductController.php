<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use App\Models\Product;
use App\Models\RegUser;
use App\Models\Coupon;
use App\Models\Cart;
use App\Models\Review;
use App\Models\Rating;
use Session;

class ProductController extends Controller
{
    public function index(){
        $id = Session::get('id');

        $products = Product::where('delete_status','=',1)->get();
        $wish_products = WishList::where('user_id',$id)->get();
        $cart_products = Cart::where('user_id',$id)->get();

        // dd($cart_products);
        return view('product.productpage',compact('cart_products','wish_products','products'));
    }

    public function addwishlist(Request $req){

        $id = $req->productId;

        $logged_user = Session::get('email');
        $user= RegUser::where('email',$logged_user)->first();


        if($user == null){
            return response()->json(['status' => 0,'message'=>'please login first']);
        }
        else{
            $check_product = WishList::where('user_id',$user->id)->where('product_id',$id)->first();
            if($check_product != null){
                return redirect()->back();
             }

            $cart_user = new WishList();
            $cart_user->user_id = $user->id;
            $cart_user->product_id	 = $id ;
            $cart_user->status	 = 1;
            $cart_user->save();
            return response()->json(['status' => 1,'id'=>$id]);
        }

    }

    public function removewishlist(Request $req){
        $id = $req->productId;
        $logged_user = Session::get('email');
        $user= RegUser::where('email',$logged_user)->first();

        $product_id = WishList::where('user_id',$user->id)->where('product_id',$id)->first();
        if ($product_id) {
            // Delete the record
            $product_id->delete();
            return response()->json(['status' => 1,'id'=>$id]);
        }

    }

    public function productDetail($id){
        $userId = Session::get('id');
        $product = Product::where('id','=',$id)
        ->where('delete_status','=',1)->first();
        $current_coupon = Coupon::where('status', 1)->first();
        $rate = Rating::where('user_id',$userId)->where('product_id',$id)->first();
        if(isset($rate)){
            $rating = $rate->rating;
        }
        else{
            $rating = 0;
        }
        if($product){
            $all_reviews = Rating::join('register_user','ratings.user_id','register_user.id')
            ->where('product_id',$id)
            ->where('ratings.review','!=',null)
            ->take(4)
            ->get();

             return view('product.productdetail',compact('all_reviews','rating','product','current_coupon'));
         }
         else{
            return redirect()->back();
         }
    }

    public function checkCoupon(Request $request){

    $discount = $request->discount;
    $above_price = $request->above_price;
     $your_coupon = $request->value;
        $exists = Coupon::where('coupon', $your_coupon)
        ->where('status',1)
        ->exists();
        $product_price = $request->price;

        if($exists == true){
            if($product_price >= $above_price){
                $discount_price = $product_price*$discount/100;
                $main_price = $product_price - $discount_price;
                    // dd($main_price);
                return response()->json(['price' => $main_price]);

            }
            // else{
            //     return response()->json(['actualPrice' => $product_price]);
            // }

        }
        else{

              return response()->json(['actualPrice' => $product_price]);
        }



    }

    public function couponDeactivate($id){
           $running_coupon = Coupon::where('id',$id)->delete();
           return redirect()->back();


    }
}
