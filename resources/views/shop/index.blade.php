@extends('layouts.master')

@section('title')
    <?= trans('messages.Laravel Shopping Cart') ?>
@endsection
@section('content')
    <h1><?= trans('messages.Online Store') ?></h1>  
    <table>
        <tr>
            <th><?= trans('messages.Photo') ?></th>
            <th><?= trans('messages.Specification') ?></th>
            <th><?= trans('messages.Add') ?></th>
        </tr>
        @foreach($products->chunk(3) as $productChunk)
            @foreach($productChunk as $product)
            <tr>
                <td>
                    <img class ="image" src="public/photo/photo-{{$product->id}}.jpg">
                </td>
                <td>                        
                    <p><?= trans('messages.title') ?> : {{$product->title}} <br/> 
                    <?= trans('messages.description') ?> : {{$product->description}} <br/> 
                    <?= trans('messages.price') ?> : {{$product->price}} </p>
                </td>
                <td>
                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="button" role="button"><?= trans('messages.Add') ?></a>
                </td>
            </tr>
            @endforeach        
        @endforeach       
    </table>
    <a href="{{ route('product.login') }}" class="button"><?= trans('messages.Login') ?></a>
    <a href="{{ route('product.shoppingCart') }}" class="button" role="button"><?= trans('messages.Go to cart') ?></a>
@endsection