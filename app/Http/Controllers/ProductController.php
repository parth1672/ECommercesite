<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\product_image;
use App\Models\currency_type;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function addproduct(Request $request)
    {
        // die($request->p_images);

        $user = new product;
        
        $user->name=$request->p_name;
        $user->price=$request->p_price;
        $user->description=htmlentities($request->p_description); //for save product description in html https://stackoverflow.com/questions/50425305/laravel-how-to-save-html-to-database-and-then-retrieve-it
        $user->currency_type=$request->p_price_type;
        $user->category =$request->p_category;
        
        $user->save();
     
        if ($request->hasfile('p_images'))
        {
            $files=$request->file('p_images');
            foreach ($files as $key=> $product_image) 
            {
                
                $image = new product_image;
                $imageName = rand().'.'.$product_image->extension();  
                $product_image->move(public_path('product_image'), $imageName);
                if($key == 0)
                {
                    // for in upload first image in product table for displaying in home 
                    DB::table('products')->where('id',$user->id)->update(['image'=>$imageName]);
                    $user->image=$imageName;
                    $user->save();
                }
                $image->productid = $user->id;
                $image->image_name = $imageName;
                $image->save();

            }

        }
        
        
    }

    function get_product()
    {
          $product = product::get()->skip(0)->take(6);
         
          return view('index',['products' => $product]);
    }

    function productdetail($productid)
    {
        $productdetail =product::where('id','=',$productid)->first();
        $product_image =product_image::where('productid','=',$productid)->get();
        $product_category = DB::table('product_categories')->where('id','=',$productdetail->category)->first();
        $product_currency = DB::table('currency_types')->where('id','=',$productdetail->currency_type)->first();

        return view('product-info',['productdetails' => $productdetail,'product_images'=>$product_image, 'product_category'=>$product_category,'product_currency'=>$product_currency]);
    }


    function currency_type()
    {
    
        $currency_type = currency_type::all();
        $category = DB::table('product_categories')->get();


       return view('/admin-panel/product_admin',compact('currency_type'),compact('category'));
    }
}
