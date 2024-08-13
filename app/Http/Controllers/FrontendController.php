<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('home', compact('products'));
    }
    public function viewproduct($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->back();

        }
        return view('product_view', compact('product'));
    }

    public function addToCart($id)
    {
        $user_id = Auth::user()->id;
        if ($user_id == null) {
            return redirect()->back()->with('message', "Please Login To Add product To CART");
        }
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->back();
        }
       
        $check = Cart::where('product_id', $id)->where('user_id', $user_id)->first();
       
        if ($check != null) {
        
        Cart::findOrfail($check->id)->update(
            [
                'product_id' =>$id,
                'user_id' =>$user_id,
                'quantity' =>$check->id +1
         
            ]
            );
        
            return redirect()->back()->with('message', "Product Added To Cart Successfully");
                  } 
        else {
            $cartt = new Cart;
            $cartt->product_id = $id;
            $cartt->user_id = $user_id;
            $cartt->quantity = 1;
            $cartt->save();
            return redirect()->back()->with('message', "Product Added To Cart Successfully");
             }
       

    }

    public function viewMyCart()
    {
        $user_id = Auth::user()->id;
        if ($user_id == null) {
            return redirect()->back()->with('message', "Please Login To View Your CART");
        } 
        $carts=Cart::where('user_id',$user_id)->get();
        if ($carts->isEmpty() ) {
            return redirect()->back()->with('message', "Your CART is Empty");
        }
        return view('cart',compact('carts'));
    }
}
