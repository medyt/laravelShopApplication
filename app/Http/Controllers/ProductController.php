<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductController extends Controller
{
    public function getIndex(Request $request)
    {
        //$products = Product::all();
        $inCart = Session::get('cart');
        $products = Product::select('*')->whereNotIn('id', $inCart->ids)->get();
        return view('shop.index', ['products' => $products]);
    }
    public function getCart() 
    {
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        if (count($cart->ids) == 0) {
            return view('shop.shopping-cart', ['display' => false]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['display' => true ,'products' => $cart]);    
    }
    public function getAddToCart(Request $request, $id) 
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product);
        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }
    public function getRemoveFromCart(Request $request, $id) 
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->remove($product);
        $request->session()->put('cart',$cart);
        return redirect()->route('product.index');        
    }    
    public function login(Request $request) 
    {
        if (!$request->session()->get('isLoggedIn')) {
            return view('shop.login');
        } else {
            return view('shop.products');
        }
    }
    public function loginSet(Request $request)
    {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {				
            if ($_POST['username'] == env("LOGIN_USERNAME") && $_POST['password'] == env("LOGIN_PASSWORD")) {
                $request->session()->put('isLoggedIn',true);
                $request->session()->put('username',env("LOGIN_USERNAME"));
                return view('shop.products');
            } else {
                echo "Wrong username or password";
            }
        }         
    }
    public function logout(Request $request) 
    {        
        $request->session()->put('username',"");
        $request->session()->put('isLoggedIn',false);
        return redirect()->route('product.index');
    }
}
