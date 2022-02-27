<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Useraccount;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Session;

// use App\Http\Controllers\Session;


class AddcartController extends Controller
{

  function Addcart(Request $requestre)
  {
    
        $email = session()->get('email');
        $product = new cart;

        if ($email != null) 
        { 
          $userid =Useraccount::where('email','=',$email)->get()->first();
             
          $check = cart::where([["userid","=",$userid->id],["productid","=",$requestre->p_id]])->get();
           
          
          if ($check->count() > 0) 
           {
    
             return 2;
           }
           else
           {
            
            $product->productid = $requestre->p_id;
            $product->price = $requestre->p_price;
            $product->userid = $userid->id;
            $product->save();
               
            return 1;
           }
        }
        return 0;

       
  }

  function removecart($productid)
  {
    $email = session()->get('email');
    $userid =Useraccount::where('email','=',$email)->get()->first();
    cart::where([["productid","=",$productid],["userid","=",$userid->id]])->delete(); //write delete quary with AND
    
    return redirect()->back();

  }

    
    // function AddCart($productid)
    // { 
         
    //   $email = \Session::get('email');

    //     $userid =Useraccount::where('email','=',$email)->get()->first();

    //    $product = new cart;

    //    $product->productid = $productid;
    //    $product->userid = $userid->id;
    //    $product->save();
       
    //    return redirect('/');
    // }
}
