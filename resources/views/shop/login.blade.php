@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
    <h1>Online Store</h1>       
    <form class = "form-signin" role = "form"  method = "post">
        <input type = "text" class = "form-control" name = "username" required autofocus></br>
        <input type = "password" class = "form-control" name = "password" required></br>
        <button class = "button" type = "submit"name = "login">Login</button>
    </form>             
@endsection