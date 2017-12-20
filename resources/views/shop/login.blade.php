@extends('layouts.master')

@section('title')
    <?= trans('messages.Laravel Shopping Cart') ?>
@endsection
@section('content')
    <h1><?= trans('messages.Online Store') ?></h1>     
    <form action="{{ route('product.loginSet') }}" class = "form-signin" role = "form"  method = "post">
        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        <input type = "text" class = "form-control" name = "username" required autofocus></br>
        <input type = "password" class = "form-control" name = "password" required></br>
        <button type = "submit" class="button"><?= trans('messages.Login') ?></button>
    </form>         
@endsection