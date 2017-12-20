@extends('layouts.master')

@section('title')
    <?= trans('messages.Laravel Shopping Cart') ?>
@endsection
@section('content')
    <h1><?= trans('messages.Online Store') ?></h1>
    <a href="{{ route('product.logout') }}" class="button">Logout</a>
@endsection