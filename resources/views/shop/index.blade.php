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
        @foreach($products->chunk(3) as $productChunk)
            @foreach($productChunk as $product)
            <tr>
                <td>
                    <img class ="image" src="public/photo/photo-{{$product->id}}.jpg">
                </td>
                <td>                        
                    <p>title : {{$product->title}} <br/> 
                    description : {{$product->description}} <br/> 
                    price : {{$product->price}} </p>
                </td>
                <td>
                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn" role="button">Add</a>
                </td>
            </tr>
            @endforeach        
        @endforeach       
    </table>
    <a href="{{ route('product.login') }}" class="button">Login</a>
    <a href="{{ route('product.shoppingCart') }}" class="button" role="button">Go to cart</a>
@endsection