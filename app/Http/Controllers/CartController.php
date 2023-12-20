<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\RegUser;
use App\Models\Cart;
use App\Models\Product;


class CartController extends Controller
{
    public function addCart(Request $req){
      
        $proId = $req->productId;
        $id = Session::get('id');

        if(!isset($id)){
            return response()->json(['status' => 2,'error'=>'Please login first!']);
        }
        else{
        $check_product = Cart::where('user_id',$id)->where('product_id',$proId)->first();
        if($check_product == null){
        $cart = new Cart();
        $cart->user_id = $id;
        $cart->product_id = $proId;
        $cart->status = 1;
        $cart->save();
        return response()->json(['status' => 1,'id'=>$proId]);
    }
    else{
        return response()->json(['status' => 0,'error'=>'Data Already Added']);
        }
    }
    }

    public function cartproduct(){
        $id = Session::get('id');
        $products = Product::join('carts','products.id','carts.product_id')
        ->where('user_id',$id)
        ->get(['carts.*','products.*','carts.id as cart_id']);
     $total = 0;
    foreach($products as $product){
       $total += $product->price;
    }
  
       return view('product.cartproduct',compact('products','total'));
    }

    public function removeCart(Request $req){
        $id = $req->productId;
        $userid = Session::get('id');
        $cart_product = Cart::where('user_id',$userid)->where('product_id', $id)->delete();
            return response()->json(['status' => 1, 'id' => $id]);
    }
}
