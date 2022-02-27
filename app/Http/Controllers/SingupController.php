<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Useraccount;
use Illuminate\Support\Facades\Hash;
use Validator;


class SingupController extends Controller
{
    function singup(Request $request)
   {
      $validator = \Validator::make($request->all(), [

         'name'=>'required|min:3|max:15',
        'email' => 'required|email|unique:useraccounts',
        'password' => 'required|confirmed',
        'password_confirmation'=>'required'

     ]);


       
   //  $request->validate([
            
   //      'name'=>'required|min:3|max:15',
   //      'email' => 'required|email|unique:useraccounts',
   //      'password' => 'required|confirmed',
   //      'password_confirmation'=>'required'

   //  ]);

    if (!$validator->passes())
    {
      return response()->json(['error'=>$validator->errors()->all()]);
    }
   
    if($request->remember_me)
 {
     
  \Cookie::queue("email", $request->input('email'), time()+(10*24*60*60));


 }

  //save data
   
  $user = new Useraccount;
  $user->name=$request->name;
  $user->email=$request->email;
  $user->password= Hash::make($request->password);
  $user->save();
  
  //store data in session
  if($user->save())
  {
        $request->session()->put('user',$request['name']);
        $request->session()->put('email',$request['email']);
        return redirect('/');
  }
  else
     {
        return redirect('singup')->withErrors('Error'); 
     
     }

   } 


   function login(Request $request)
   {
      $email = $request->email;//form enter email
        $password = $request->password;//form enter password

        $data=Useraccount::where('email','=',$email)->get()->first();
      //   for email check,get is for get data form database ,first get first record and dos't give array
      //     $data store quary data  ,in compresion of user enter email in the login form,if find give data
      if($data==null){
            // return redirect()->back()->withErrors('Email or password is incorrect');//redirect to back page
            return response()->json(['error'=>"Login for this emial is no exit"]);
      }else{

            //if user enter email find in database then store password(according to find email) in $user_current_password
         $user_current_password =  $data->password; //password of user stored in database according to find email
         if($password = Hash::check($password,$user_current_password)){
               // Hash::check is to chaeck both password are same or not
            //    die('user valid');
            $user_current_name = $data->name;//database
            $user_current_email = $data->email;//database

            $request->session()->put('user',$user_current_name);
            $request->session()->put('email',$user_current_email);
            return redirect('/');

         }else{
            // return redirect('login')->withErrors('Email or password is incorrect');
            return response()->json(['error'=>"Password is incorect"]);
         }
         
      }
   }
}
