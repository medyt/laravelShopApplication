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
        @foreach($products as $product)
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
                    <a href="{{ route('security.delete', ['id' => $product->id]) }}"><input type="submit" value="<?= trans('messages.Delete') ?>"</a>
                    <a href="{{ route('security.update', ['id' => $product->id]) }}"><input type="submit" value="<?= trans('messages.Update') ?>"</a>
                </td>
            </tr>        
        @endforeach       
    </table>
    <a href="{{ route('security.product' )}}" class="button"><?= trans('messages.Add') ?></a>
    <a href="{{ route('product.logout') }}" class="button"><?= trans('messages.Logout') ?></a>
@endsection