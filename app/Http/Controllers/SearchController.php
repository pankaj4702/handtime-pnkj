<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function product_searching(Request $request){
       
      if($request->ajax()){
        if($request->name != null){
        $data = Product::where('product_name','LIKE',$request->name.'%')->get();
        
        $output = '';
    
        if(count($data)>0){
            $output = '<ul style="background:white;display:block;position:absolute;z-index:1">';  
            foreach($data as $row){
                $output .= '<a href="' . route('productdetail', ['id' => $row->id]) . '"><li style="list-style-type: none; color:black;font-family:Bell MT;">' . $row->product_name . '</li></a>';

            }
            $output .='<ul>';
        }
        else{
            $output .= '<li>No data found</li>';
        }
        return $output;
    }
    else{
        $output1 = null;
        return $output1;
         }
      }
    
    }
}
