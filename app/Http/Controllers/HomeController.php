<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products= Product::paginate(2);
        return view('home.userpage', compact('products'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $products= Product::paginate(2);
            return view('home.userpage', compact('products'));        }

    }
    public function product_details($id)
    {
        $product= Product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart( Request $request, $id)
    {
        if(Auth::id())
        {
            $user= Auth::user();
            $product= Product::find($id);
            $cart= new Cart();
            $cart->name= $user->name;
            $cart->email= $user->email;
            $cart->phone= $user->phone;
            $cart->address= $user->address;
            $cart->product_title= $product->title;
            $cart->product_quantity= $product->quantity;
            $cart->product_price= $product->price * $request->quantity;
            $cart->image= $product->image;
            $cart->product_id= $product->id;
            $cart->user_id= $user->id;
            
            $cart->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('carts'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
        

    }

    public function cash_order()
{
    $user_id = Auth::user()->id;
    $data = Cart::where('user_id', '=', $user_id)->get();
    foreach ($data as $item) {
        $order = new Order();
        $order->name = $item->name;
        $order->email = $item->email;
        $order->phone = $item->phone;
        $order->address = $item->address;

        $order->user_id = $item->user_id;
        $order->product_title = $item->product_title;
        $order->price = $item->product_price;
        $order->quantity = $item->quantity;
        $order->image = $item->image;

        $order->payment_status = "Cash on delivery";
        $order->delivary_status = "on process";

        $order->save(); 

    }
    return redirect()->back();// Save the order to the database

}

   

}