<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Rating;
use App\Models\RegUser;
use Session;


class ReviewController extends Controller
{
    public function add_rating(Request $request){
        $id = Session::get('id');
        if(!isset($id)){
            return response()->json(['status'=>0,'message'=>"login first!"]);
        }
        else{
            $exist_review = Rating::where('user_id',$id)->where('product_id',$request->productId)->first();
            if($exist_review != null){
                if($exist_review->rating == null){
                    $exist_review->rating = $request->Rating;
                    $exist_review->save();
                    return response()->json(['status'=>1,'message'=>"added successfully"]);
                }
            }
            else{
                $product_id = $request->productId;
                $rate = $request->Rating;
                    $rating = new Rating();
                    $rating->user_id = $id;
                    $rating->product_id = $product_id;
                    $rating->rating = $rate;
                    $rating->status = 1;
                    $rating->save();
            return response()->json(['status'=>1,'message'=>"added successfully"]);
            }
        }
    }

    public function add_review(Request $request){
               $request->validate([
            'value' => 'max:100',
          ]);
        $id = Session::get('id');
        $user = RegUser::find($id);
       
        if(!isset($id)){
            return response()->json(['status'=>0,'message'=>"login first!"]);
        }
        else{
            $exist_review = Rating::where('user_id',$id)->where('product_id',$request->productId)->first();
            if($exist_review != null){
              if($exist_review->review == null){
                  $exist_review->review = $request->value;
                  $exist_review->save();
                  return response()->json(['status'=>1,'review'=>$request->value,'userName'=>$user->name,'message'=>"added successfully"]);
              }
            }
            else{
                $review = new Rating();
                    $review->user_id = $id;
                    $review->product_id = $request->productId;
                    $review->review = $request->value;
                    $review->status = 1;
                    $review->save();
                return response()->json(['status'=>1,'review'=>$request->value,'userName'=>$user->name,'message'=>"added successfully"]);
            }
        }
    }
}
