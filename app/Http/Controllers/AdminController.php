<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Brand;
use App\type;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use FFI\CData;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //ADD CATEGORY
  
    public function getCategory(){

        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();

        return view('admin.add_category')->with(compact('categories'));
    }

    public function addCategory(Request $request)
    {

        request()->validate([
            'category_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_name' => 'required',
            'category_gender' => 'required',
            'category_description' => 'required',

        ]);

        if($files = $request->file('category_photo')){
            
            $destinationPath = public_path('/photo/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";

            //save in database
            
            $categorymodel = new Category();
            $categorymodel->category_photo="$profileImage";
            $categorymodel->category_name = $request->category_name;
            $categorymodel->category_gender = $request->category_gender;
            $categorymodel->category_description = $request->category_description;
            $categorymodel->save();


        }

        return back()->with('success', 'La catégorie a été ajoutée!');
    }


    public function deleteCategory($id) {
        $article = Category::find($id);
        $article->delete();
        return back()->with('success', 'La catégorie a été supprimée!');
    }

    //CATEGORY TYPE

    public function getCategoryType(){

        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $types = DB::table('types')->orderBy('created_at', 'desc')->get();

        return view('admin.add_type')->with(compact('categories','types'));
    }

    public function addCategoryType(Request $request)
    {

        request()->validate([
            'type_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_name' => 'required',
            'type_gender' => 'required',
            'type_description' => 'required',
            'category_id' => 'required',

        ]);

        if($files = $request->file('type_photo')){
            
            $destinationPath = public_path('/photo/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";

            //save in database
            
            $typemodel = new type();
            $typemodel->type_photo="$profileImage";
            $typemodel->category_id = $request->category_id;
            $typemodel->type_name = $request->type_name;
            $typemodel->type_gender = $request->type_gender;
            $typemodel->type_description = $request->type_description;
            $typemodel->save();


        }

        return back()->with('success', 'Le type de catégorie a été ajouté!');
    }

    public function deleteCategoryType($id) {
        $type = type::find($id);
        $type->delete();
        return back()->with('success', 'Le type catégorie a été supprimé!');
    }

    // BRAND

    public function getBrand(){

        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $types = DB::table('types')->orderBy('created_at', 'desc')->get();
        $brands = DB::table('brands')->orderBy('created_at', 'desc')->get();

        return view('admin.add_brand')->with(compact('categories','brands','types'));
    }

    public function addBrand(Request $request)
    {

        request()->validate([
            'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_name' => 'required',
            'brand_description' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',

        ]);

        if($files = $request->file('brand_logo')){
            
            $destinationPath = public_path('/photo/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";

            //save in database
            
            $brandmodel = new Brand();
            $brandmodel->brand_logo="$profileImage";
            $brandmodel->category_id = $request->category_id;
            $brandmodel->type_id = $request->type_id;
            $brandmodel->brand_name = $request->brand_name;
            $brandmodel->brand_description = $request->brand_description;
            $brandmodel->save();


        }

        return back()->with('success', 'La marque a été ajoutée!');
    }

    public function deleteBrand($id) {
        $brand = Brand::find($id);
        $brand->delete();
        return back()->with('success', 'La marque a été supprimé!');
    }

    // PRODUCT

    public function getProduct(){

        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $brands = DB::table('brands')->orderBy('created_at', 'desc')->get();
        $types = DB::table('types')->orderBy('created_at', 'desc')->get();
        $products = DB::table('products')->orderBy('created_at', 'desc')->get();

        return view('admin.add_product')->with(compact('categories','brands','types','products'));
    }

    public function getAllProduct(){

        $products = Product::latest()->paginate(10);

        $count = DB::table('products')->count();


        return view('admin.list_product')->with(compact('products','count'))->with('i', (request()->input('page', 1) - 1) * 10);;
    }

    public function addProduct(Request $request)
    {

        request()->validate([
            'product_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required',
            'product_price' => 'required',
            'units' => 'required',
            'product_description' => 'required',
            'category_id' => 'required',
            'brand_name' => 'required',
            'type_name' => 'required',

        ]);

        if($files = $request->file('product_photo')){
            
            $destinationPath = public_path('/photo/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";

            //save in database
            
            $productmodel = new Product();
            $productmodel->product_photo="$profileImage";
            $productmodel->category_id = $request->category_id;
            $productmodel->brand_name = $request->brand_name;
            $productmodel->type_name = $request->type_name;
            $productmodel->product_name = $request->product_name;
            $productmodel->product_price = $request->product_price;
            $productmodel->units = $request->units;
            $productmodel->in_stock = $request->in_stock;
            $productmodel->product_description = $request->product_description;
            $productmodel->user_id = auth()->user()->id;
            $productmodel->save();


        }

        return back()->with('success', 'L article a été ajoutée!');
    }

    public function editProduct($id){

        $s_product = Product::find($id);

        $categories = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $brands = DB::table('brands')->orderBy('created_at', 'desc')->get();
        $types = DB::table('types')->orderBy('created_at', 'desc')->get();
        $products = DB::table('products')->orderBy('created_at', 'desc')->get();

        return view('admin.edit_product')->with(compact('s_product','products','categories','brands','types'));
    }

    

    public function deleteProduct($id) {
        $brand = Product::find($id);
        $brand->delete();
        return back()->with('success', 'L article a été supprimé!');
    }


    
    public function singleProduct($id){

        $product = Product::find($id);

        return view('admin.single_product')->with(compact('product'));
    }


    //ORDERS

    public function getAllOrder(){
        

        $orders = Order::orderBy('id', 'DESC')->latest()->paginate(10);

        $count = DB::table('orders')->count();


        return view('admin.list_orders')->with(compact('orders','count'))->with('i', (request()->input('page', 1) - 1) * 10);;
    }



    
    public function deleteOrder($id) {
        $order = Order::find($id);
        $order->delete();
        return back()->with('success', 'L article a été supprimé!');
    }


    
    public function singleOrder($id){

        $order = Order::find($id);

        $count = DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('orders.order_number', '=', $order->order_number)->count();

        $price =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('orders.order_number', '=', $order->order_number)->sum('products.product_price');
        
        $products = DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('orders.order_number', '=', $order->order_number)->get();

        $user = DB::table('users')->leftJoin('orders', 'users.id', '=', 'orders.user_id')->where('orders.order_number', '=', $order->order_number)->get()->last();


        return view('admin.single_order')->with(compact('order','products','count','price','user'));

    }


    public function confirmOrder(Request $request){

        $order = Order::find($request->input('order_id'));

        $confirm = DB::table('orders')->where('order_number', $order->order_number)->update(['order_status' => 1]);
        
        return back()->with('success', 'Commande Confirmee!');
 
    }


    public function sendOrder(Request $request){

        
        $order = Order::find($request->input('order_id'));

        $confirm = DB::table('orders')->where('order_number', $order->order_number)->update(['is_delivered' => 1]);
        
        return back()->with('success', 'Livraison en cours!');
 
    }


    public function initOrder(){
        $i = 1110;
        
        $init = new Order();
        $init->order_number = $i;
        $init->save();

        return back()->with('success', 'Commande initier');
    }




}
