@extends('layouts.master')

@section('title')
    <?= trans('messages.Laravel Shopping Cart') ?>
@endsection
@section('content')
    <h1><?= trans('messages.Online Store') ?></h1>
    <form action="{{ route('security.addproduct') }}" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">                   
        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="solid" type="text" name="Title" placeholder="title"><br>
        <input class="solid" type="text" name="Description" placeholder="description"><br>    
        <input class="solid" type="text" name="Price" placeholder="price"><br>
        <p name="Photo"><?= trans('messages.Photo') ?></p>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <div>
            <a href="{{ route('security.products') }}" class="button"><?= trans('messages.Products') ?></a>
            <input type="submit" class="button" value="<?= trans('messages.Save') ?>" name="submit">
        </div>
    </form>
@endsection