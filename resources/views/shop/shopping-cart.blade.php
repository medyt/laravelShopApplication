@extends('layouts.master')

@section('title')
    <?= trans('messages.Laravel Shopping Cart') ?>
@endsection
@section('content')
    <h1><?= trans('messages.Online Store') ?></h1>  
    @if ($display)
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
                        <p><?= trans('messages.title') ?> : {{ $product->title }} <br/> 
                        <?= trans('messages.description') ?> : {{ $product->description }} <br/> 
                        <?= trans('messages.price') ?> : {{ $product->price }} </p>
                    </td>
                    <td>
                        <a href="{{ route('product.removeFromCart', ['id' => $product->id]) }}" class="button" role="button"><?= trans('messages.Remove') ?></a>
                    </td>                        
                </tr>
            @endforeach
        </table>    
    @endif
    <div>
        <form action="{{ route('product.checkout') }}" method="post">
            <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
            <input class="solid" type="text" name="Name" placeholder="<?= trans('messages.Name') ?>"><br>
            <input class="solid" type="text" name="Contact" placeholder="<?= trans('messages.Contact details') ?>"><br>    
            <input class="solid" type="text" name="Comments" placeholder="<?= trans('messages.Comments') ?>"><br>
            <div>
                <a href="{{ route('product.index') }}" class="button" role="button"><?= trans('messages.Go to index') ?></a>
                <button type = "submit" class="button"><?= trans('messages.Checkout') ?></button>
            </div>
        </form>
    </div>        
@endsection
