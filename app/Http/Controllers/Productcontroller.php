<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use App\Models\order;
use Session;
use Illuminate\Support\Facades\DB;
class Productcontroller extends Controller
{


    
    //view all product 
    function index(){

        $data = Product::all();
        return view('product',['products' => $data]);
        //return Product::all();
    }

    //product details page

    function detail($id){

        $data = Product::find($id);
        return view('detail',['product' => $data]);

    }
    //product addto carttable

    function addtocart(Request $request){

        if($request->session()->has('user'))
        {   
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect ('/product');
        }
        else{

            return redirect ('/login');
        }
    }

    function Search(Request $request)
    {
       //return $request->input();
        $data = Product::
        where('name','like','%'.$request->input('query').'%')
        ->get();
        return view ('search',['products'=>$data]);
    }

    //product count on cart harder
    
    static function cartitem()
    {
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    //product list for add in the cart
    function cartList()
    {
        $userId = session()->get('user')['id'];
         $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }
        //remove product form cart
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');

    }
        //product final order and billling and payment work
    function orderNow()
    {
        $userId = session()->get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);

    }
        //palceorder so all product move to ordertable and remove to carttable
    function orderPlace(Request $request)
    {
        $userId = session()->get('user')['id'];
        $allcart = Cart::where('user_id',$userId)->get();
        foreach($allcart as $cart)
        {
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$request->payment;
            $order->payment_status="pending";
            $order->address=$request->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }   
        
         return redirect ('/product');
    }

    function orderHistory()
    {
        $userId = session()->get('user')['id'];
        $order = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('/orderhistory',['order'=>$order]);


    }
}   
    