<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\cart;
use App\Models\order;
use App\Models\Useraccount;
use App\Models\Userdetail;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    function checkout(Request $request)
    { 

        $email = session()->get('email');
        $userid =Useraccount::where('email','=',$email)->get()->first();
        // dd($userid->id);
          if($email == "")
          {
              return redirect("/");
          }    

        $keyq = 0;
         foreach ($request->productid as $product)
         {
             foreach($request->quantity as $key => $quantity)
             {
                cart::where([['userid','=',$userid->id],['productid','=',$product]])->update(['quantity'=>$request->quantity[$keyq]]);
                $keyq++;
                break;
             }
            
         }

         return 1;
    }

    function userdetail(Request $request)
    {
        $email = session()->get('email');
        $userid =Useraccount::where('email','=',$email)->get()->first();
        $userdetail = new Userdetail;
        $userdetail->userid = $userid->id;
        $userdetail->name=$request->name;
        $userdetail->phone=$request->phone;
        $userdetail->address=$request->address;
        $userdetail->email=$email;
        $userdetail->pincode=$request->pincode;
        $userdetail->save();

        //  return "ok";
    }

    function payment(Request $request)
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51KWl5kSJeRvB8myUGhjJ6MNET2gm4rY7RYR4HcjNes1dKUhxnFH7tCcj8uUcUquxKJHTaflbZbDcZdiQ8JwcSzCF00NBznmFfA'); 
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $request->total,
			'currency' => 'INR',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
         
        $intent = $payment_intent->client_secret;

        return view('payment',compact('intent'));
    }

    function user()
    {
        $email = session()->get('email');
        $userid =Useraccount::where('email','=',$email)->get()->first();
        if($email == "")
        {
            return redirect("/");
        } 
        $finaltotals=cart::where('userid',$userid->id)->get();
        $total = 0;
        
        foreach($finaltotals as $finaltotal)
        {
            $total += ($finaltotal->price * $finaltotal->quantity);
        }
          

        return view('checkout',['userdetail'=>$userid],['total'=>$total]);
    }
}
