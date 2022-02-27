<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
use App\Models\Useraccount;




class CartController extends Controller
{
    function getcart()
    {
        $email = session()->get('email');
        // die($email);

        if($email != NULL)
        {
    
            $userid =Useraccount::where('email','=',$email)->get()->first();
        
            
            $product_id= cart::where('userid',$userid->id)->get('productid');
            $products=product::find($product_id);
             
            // $cartid= cart::where('userid',$userid->id)->get('id');
            if($products->count() == 0)
            {
                return view('cart',['products'=>""]);
            }
           
            return view('cart',['products'=>$products],['userdetail'=>$userid]);   
        }     
        // dd(['products'=>201]);     
      return view('cart',['products'=>201]);       
    }
}
