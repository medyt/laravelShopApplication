<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class SecurityController extends Controller
{
    public function getProducts() {
        if (Session::get('username') == env("LOGIN_USERNAME") && Session::get('isLoggedIn')) {
            
            return view('user.products');
        } else {
            echo trans('messages.You must be logged in');
        }        
    }
}