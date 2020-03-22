<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Brand;
use App\Category_type;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use FFI\CData;

class FrontendController extends Controller
{
  
    public function index()
    {
       $products = DB::table('products')->limit(4)->orderBy('created_at', 'desc')->get();
      
        return view('home')->with(compact('products'));
    }

    

 //PRODUCT METHODS

 public function getSingleProduct($id){

    $product = Product::find($id);
     
    return view('frontend.product')->with(compact('product'));
 }

 public function getAllProduct()
 {
    
    $products = Product::latest()->paginate(12);
  
    return view('frontend.products',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 12);
 }



 public function getAllProductCategory()
 {
     return view('user.all_product_category');
 }

 public function getSingleProductCategory()
 {
     return view('user.single_product_category');
 }


}
