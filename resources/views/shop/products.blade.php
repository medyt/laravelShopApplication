@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
    <h1>Online Store</h1>
    <a href="{{ route('product.logout') }}" class="button">Logout</a>
@endsection