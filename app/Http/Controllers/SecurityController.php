<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class SecurityController extends Controller
{
    public function getProducts() 
    {
        if (Session::get('username') == env("LOGIN_USERNAME") && Session::get('isLoggedIn')) {
            $products = Product::all();
            return view('user.products', ['products' => $products]);
        } else {
            echo trans('messages.You must be logged in');
        }        
    }
    public function deleteProduct($id)
    {
        if (Session::get('username') == env("LOGIN_USERNAME") && Session::get('isLoggedIn')) {
            $product = Product::find($id);
            $product->delete();
            return redirect()->route('security.products');
        } else {
            echo trans('messages.You must be logged in');
        }
    }
    public function updateProduct($id)
    {
        if (Session::get('username') == env("LOGIN_USERNAME") && Session::get('isLoggedIn')) {
            return view('user.product' , ['id' => $id]);
        } else {
            echo trans('messages.You must be logged in');
        }
    }
    public function getProduct()
    {
        if (Session::get('username') == env("LOGIN_USERNAME") && Session::get('isLoggedIn')) {
            return view('user.product', ['id' => null]);
        } else {
            echo trans('messages.You must be logged in');
        }
    }
    public function addProduct()
    {
        if (Session::get('username') == env("LOGIN_USERNAME") && Session::get('isLoggedIn')) {
            $addphoto = false;
            if ($_FILES["fileToUpload"]["size"] != 0) {
                if (strpos($_FILES["fileToUpload"]["type"], "image") !== false) {
                    $input = $_FILES["fileToUpload"]["tmp_name"];
                    $addphoto = true;
                } else {
                    echo trans('messages.The type of your file is not accepted. We accept image file.');
                }
            } else {
                echo trans('messages.You did not insert the picture');
            }
            if($addphoto) {
                if($_POST['id']){
                    $output = "public/photo/photo-". $_POST["id"] .'.jpg';
                    $product = Product::find($_POST['id']);
                    $product->title = $_POST['Title'];
                    $product->description = $_POST['Description'];
                    $product->price = $_POST['Price'];
                    $product->save();
                } else {
                    $product = new Product([
                        'title' => $_POST['Title'],
                        'description' => $_POST['Description'],
                        'price' => $_POST['Price']
                    ]);
                    $product->save();
                    $output = "public/photo/photo-".$product->id.'.jpg';
                }
                move_uploaded_file(file_get_contents($input),$output);
                return redirect()->route('security.products');
            } else {
                echo trans('messages.You must be logged in');
            }
        }               
    }
}