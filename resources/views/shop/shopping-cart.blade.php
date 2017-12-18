@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
    <h1>Online Store</h1>  
    <table>
        <tr>
            <th>Photo</th>
            <th>Specification</th>
            <th>Add</th>
        </tr>
        @if(Session::has('cart'))
            @foreach($products as $product)
            <tr>
                <td>
                    <img class ="image" src="public/photo/photo-{{ $product['item']['id'] }}.jpg">
                </td>
                <td>                        
                    <p>title : {{ $product['item']['title'] }} <br/> 
                    description : {{ $product['item']['description'] }} <br/> 
                    price : {{ $product['price'] }} </p>
                </td>
                <td>
                    
                </td>
            </tr>
            @endforeach    
        @endif
    </table>    
@endsection
