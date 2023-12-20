<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegUser;
use App\Models\WishList;
use Session;
use Hash;

class ProfileController extends Controller
{
    public function index(){
        $email = Session::get('email');
        $user = RegUser::where('email', $email)->first();

        return view('profile',compact('user'));
    }

    public function update(Request $request){
    //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:10',
          ]);


          $user = RegUser::find($request->id);

        // dd($user->password);
        if(isset($request->old_password) && isset($request->new_password) ){

            if (Hash::check($request->old_password, $user->password)) {
                    //    dd('done');
                if ($user) {
                    $user->name = $request->name;
                    $user->phone = $request->phone;
                    $user->city = $request->city;
                    $user->password = Hash::make($request->new_password);
                    $myuser =  $user->save();
                        }
                        return redirect()->back();
                     }
        }


          if ($user) {
      $user->name = $request->name;
      $check_phone = RegUser::where('phone',$request->phone)->first();
      if($check_phone == null){
        $user->phone = $request->phone;
      }
      $user->city = $request->city;
      $myuser =  $user->save();
          }
          return redirect()->back();
    }


    public function userwishlist(){
        $logged_user = Session::get('email');
        // dd($logged_user);
        $user= RegUser::where('email',$logged_user)->first();
        $id = $user->id;
        $cart_products= WishList::where('user_id',$id)->get();

        $product_details = WishList::join('products', 'wishlist.product_id', '=', 'products.id')->where('wishlist.user_id', '=', $id)
        ->where('delete_status','=',1)
        ->get();
    //    dd($product_details);
    $logged_user = Session::get('username');
    if(isset($logged_user)){
        return view('wishproduct',compact('id','product_details'));
    }
    else{
        return redirect('/');
    }
    }

    public function addImage(Request $request){
        // $request->validate([
        //     'image' => 'image|mimes:jpeg,png,jpg',
        //   ]);
        $image = $request->file('image');
    $tempName = uniqid('profile_', true) . '.' . $image->getClientOriginalExtension();
    $path = $image->storeAs('uploads', $tempName, 'public');
          $id = Session::get('id');
          $user = RegUser::where('id',$id)->first();
          $user->image = $path;
          $user->save();
      return response()->json(['status'=>1,'imagePath'=>$path]);

    }
}
