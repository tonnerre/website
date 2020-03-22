<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Brand;
use App\type;
use App\Product;
use App\item;
use App\cart; 
use App\Address;
use App\Order;
use App\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use FFI\CData;

class UserController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


//USER CART ITEM

    //Create cart Item
    public function addCartItem(Request $request){

    
        $order = DB::table('orders')->get()->last();
        
        $user_order = DB::table('orders')->where('user_id', '=', auth()->user()->id)->where('order_status','=', 0)->get()->last();
        
        
        if(!empty($order)){
         
    
            if(!empty($user_order)){

                $i_order = new Order();
                $i_order->order_number = $user_order->order_number;
                $i_order->user_id = auth()->user()->id;
                $i_order->order_price = $request->order_price;
                $i_order->product_id = $request->product_id;
                $i_order->order_status = 0;
                $i_order->save();
            }

            else{


                $cart = new Order();
                $cart->order_number = $order->order_number += 1;
                $cart->order_price = $request->order_price;
                $cart->product_id = $request->product_id;
                $cart->user_id = auth()->user()->id;
                $cart->save();


              }
            

           }
        
        else{

            $i = 1110;
        
            $init = new Order();
            $init->order_number = $i;
            $init->save();

            $cart = new Order();
            $cart->order_number = $init->order_number =+1;
            $cart->order_price = $request->order_price;
            $cart->product_id = $request->product_id;
            $cart->user_id = auth()->user()->id;
            $cart->save();

            


            }


    
        return back()->with('success', 'article ajouté!');
    }

    //Delete cart
    public function deleteCart($id) {
        $cart = Order::find($id);
        $cart->delete();
        return back()->with('success', 'L article a été supprimé!');
    }

    //USER CART


      
 //ORDER PRODUCT

 public function getDelivery()
 {

  
    $count =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->count();
    
    $price =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->sum('products.product_price');
 
    $orders = DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->get();

      return view('frontend.delivery')->with(compact('orders','price','count'));
 }

  public function getAddress()
  {
      return view('frontend.address');
  }


  public function updateAddress(Request $request, User $user)
  {

    $order = DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->get();  

    if(!empty($order)){

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        $update = ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'phone' => $request->phone, 'address' => $request->address, 'country' => $request->country, 'city' => $request->city, 'commune' => $request->commune, 'email' => $request->email];
        user::where('id',auth()->user()->id)->update($update);


        return redirect()->route('delivery')->with('success', 'Addresse mise a jour!');
    }

    elseif(empty($order->address)){

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        $update = ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'phone' => $request->phone, 'address' => $request->address, 'country' => $request->country, 'city' => $request->city, 'commune' => $request->commune, 'email' => $request->email];
        user::where('id',auth()->user()->id)->update($update);

        return redirect()->route('home')->with('success', 'Addresse mise a jour!');
    }

    elseif(!empty($order) && !empty($order->address)){ 
        
        $request->validate([
        'firstname' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'phone' => ['required'],
        'address' => ['required'],
        

        ]);

        $update = ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'phone' => $request->phone, 'address' => $request->address, 'country' => $request->country, 'city' => $request->city, 'commune' => $request->commune, 'email' => $request->email];
        user::where('id',auth()->user()->id)->update($update);

        return back()->with('success', 'Addresse mise a jour!');
    }
    else{


        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'address' => ['required'],

        ]);

        $update = ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'phone' => $request->phone, 'address' => $request->address, 'country' => $request->country, 'city' => $request->city, 'commune' => $request->commune, 'email' => $request->email];
        user::where('id',auth()->user()->id)->update($update);

        return back()->with('success', 'Addresse mise a jour!');
    }
    

  }


  public function getCart()
  {

    $count =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->where('orders.user_id', '=', auth()->user()->id)->count();
    
    $price =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->where('orders.user_id', '=', auth()->user()->id)->sum('products.product_price');
 
    $orders = DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->where('orders.user_id', '=', auth()->user()->id)->get();

      return view('frontend.cart')->with(compact('orders','price','count'));
  }


  public function deliveryFee(Request $request){

    $last_order = DB::table('orders')->where('user_id', '=', auth()->user()->id)->where('order_status','=', 0)->get()->last();

    $order = Order::find($last_order->id);
    $order->delivery_Fee = $request->input('delivery_fee');
    $order->save(); //persist the data
    return redirect()->route('summary')->with('succes','Employee Updated Successfully');

  }



  public function placeOrder(Request $request){

    $last_order = DB::table('orders')->where('user_id', '=', auth()->user()->id)->where('order_status','=', 0)->get()->last();


    $confirm = DB::table('orders')->where('user_id', '=', auth()->user()->id)->update(['order_status' => 2]);
     


    return redirect()->route('confirm.user')->with('success', 'Commande Confirmee!');


  }

  public function confirmOrderUser(){

     
    return view('frontend.confirm');

  }


  //Summary

  public function getSummary()
 {

    $count =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->count();
    
    $price =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->sum('products.product_price');
 
    $orders = DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->get();

      
    return view('frontend.summary')->with(compact('orders','price','count'));
    
}

 //ACCOUNT 

 public function getAccount()
 {

    $count1 =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 0)->count();
   
    $count2 =  DB::table('products')->leftJoin('orders', 'products.id', '=', 'orders.product_id')->where('order_status', '=', 1)->count();
   

     return view('frontend.account')->with(compact('count1','count2'));
 }


 public function addProductItem(Request $request){

    $order = DB::table('orders')->get()->last();
        
        $user_order = DB::table('orders')->where('user_id', '=', auth()->user()->id)->where('order_status','=', 0)->get()->last();
        
        
        if(!empty($order)){
         
    
            if(!empty($user_order)){

                $i_order = new Order();
                $i_order->order_number = $user_order->order_number;
                $i_order->user_id = auth()->user()->id;
                $i_order->product_id = $request->product_id;
                $i_order->order_status = 0;
                $i_order->save();
            }

            else{


                $cart = new Order();
                $cart->order_number = $order->order_number += 1;
                $cart->order_price = $request->order_price;
                $cart->product_id = $request->product_id;
                $cart->user_id = auth()->user()->id;
                $cart->save();


              }
            

           }
        
        else{

            $i = 111;
        
            $init = new Order();
            $init->order_number = $i;
            $init->save();

            $cart = new Order();
            $cart->order_number = $init->order_number =+1;
            $cart->order_price = $request->order_price;
            $cart->product_id = $request->product_id;
            $cart->user_id = auth()->user()->id;
            $cart->save();

            


            }


        return back()->with('success', 'article ajouté!');

 }









 
 }
