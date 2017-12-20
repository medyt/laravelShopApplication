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
        @if (Session::has('cart'))
            @for ($i=0; $i < count($products); $i++)
                <tr>
                    <td>
                        <img class ="image" src="public/photo/photo-{{$products->ids[$i]}}.jpg">
                    </td>
                    <td>                        
                        <p>title : {{ $products->titles[$i] }} <br/> 
                        description : {{ $products->descriptions[$i] }} <br/> 
                        price : {{ $products->prices[$i] }} </p>
                    </td>
                    <td>
                        <a href="{{ route('product.removeFromCart', ['id' => $products->ids[$i]]) }}" class="btn" role="button">Remove</a>
                    </td>
                    
                </tr>
            @endfor
        @endif
    </table>    
    <a href="{{ route('product.index') }}" class="button" role="button">Go to index</a>
    <a href="login.php" class="button">Checkout</a>    
@endsection
