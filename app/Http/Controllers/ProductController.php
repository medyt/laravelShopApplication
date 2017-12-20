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
        if ($inCart) {
            $products = Product::select('*')->whereNotIn('id', $inCart->ids)->get();
        } else {
            $products = Product::all();
        }
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
                echo trans('messages.Wrong username or password');
            }
        }         
    }
    public function logout(Request $request) 
    {        
        $request->session()->put('username',"");
        $request->session()->put('isLoggedIn',false);
        return redirect()->route('product.index');
    }
    public function checkout(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $msg = '<html><body>';
        $msg .= trans('messages.Dear').$_POST["Name"].",\n\n\n".trans('messages.My contact details is').$_POST["Contact"]."\n".$_POST["Comments"];
        if (count($cart->ids) > 0) {
            $msg .= trans('messages.Your products is')." : \n";
            for ($i=0; $i < count($cart->ids); $i++) {                
                $msg .= '<img src="photo/photo-'.$cart->ids[$i].'.jpg">'."\n";                        
                $msg .= trans('messages.title')." : ". $cart->titles[$i]."\n";
                $msg .= trans('messages.description')." : ".$cart->descriptions[$i]."\n";
                $msg .= trans('messages.price')." : ".$cart->prices[$i]."\n";
            }
        }
        $msg .= '</body></html>';
        $msg = wordwrap($msg, 70);
        ini_set('smtp_port', env("CHECKOUT_PORT")); 
        $headers = 'From: Your name <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        mail(env("CHECKOUT_EMAIL"), "My order", $msg, $headers);
        return redirect()->route('product.index');
    }
}
