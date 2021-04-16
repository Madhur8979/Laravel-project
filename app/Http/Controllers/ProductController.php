<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\order;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    function index(){
        $data=Product::all();
        return view('products',['products'=>$data]);
    }
    function details($id){
        $data = Product::find($id);
        return view('details',['products'=>$data]);
    }
    function search(Request $req){
        $data = Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }
    function addtocart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('product');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $userId= Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId= Session::get('user')['id'];
       $data=  DB::table('cart')
         ->join('products','cart.product_id','products.id')
         ->select('products.*','cart.id as cart_id')
         ->where('cart.user_id',$userId)
         ->get();

         return view('cartlist',['products'=>$data]);

    }
    function removeCart($id)
    {
         cart::destroy($id);
        return redirect('cartlist');
    }

    function cancleorder($id)
    {
        $orders= DB::table('orders');
        $orders->delete($id);
        return redirect('myorder');
    }

    // function myorder1()
    // {
    //     $order=order::all();
    //     return view('myorder',['orders'=>$order]);
    // }
    function myorder()
    {
        $userId= Session::get('user')['id'];
        $orders= DB::table('orders')
          ->join('products','orders.product_id','products.id')
          ->where('orders.user_id',$userId)
          ->get();
 
          return view('myorder',['orders'=>$orders]); 
    }

    


    function orderNow()
    {
        $userId= Session::get('user')['id'];
        $total = DB::table('cart')
          ->join('products','cart.product_id','products.id')
          ->where('cart.user_id',$userId)
          ->sum('products.prise');
 
          return view('ordernow',['total'=>$total]);  
    }
    function orderPlace(Request $req)
    {
        $userId= Session::get('user')['id'];
        $allCart=Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart)
        {
            $order= new order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->address=$req->address;
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->save();
        }
        cart::where('user_id',$userId)->delete();
        return redirect('product');
        // return $req->input();
    }
    
}

