<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegUser;
use App\Models\Product;
use App\Models\Order;
use Session;

class OrderController extends Controller
{
    public function index(){
        $user = Session::get('email');
        $user_detail= RegUser::where('email',$user)->first();
        if(isset($user_detail)){
            $user_products = Order::join('products', 'product_id', '=', 'products.id')
            ->where('user_id',$user_detail->id)
            ->get(['products.*','orders.user_id']);
          
            return view('orders.order',compact('user_products'));
        }
        return redirect('/');
        
    }
}
