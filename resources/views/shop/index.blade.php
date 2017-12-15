@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
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
                <form action="index.php" method="post">
                    <input type="hidden" name="id" value="1">
                    <input type="submit" name="add" value="Add">
               </form>
            </td>
        </tr>
            @endforeach        
        @endforeach       
    </table>
@endsection