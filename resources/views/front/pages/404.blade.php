@extends('front.base')

@php
    $post = fakePost(setting('404-seo-baslik'));
@endphp

@section('title', setting('404-seo-baslik'))
@section('seotitle', setting('404-seo-baslik'))
@section('seodesc', setting('404-seo-aciklama'))

@section('custom_head')
    <meta name="robots" content="noindex, follow">
@endsection

@section('canonical', '404')

@section('content')
    @include('front.partials.breadcrumb')
@endsection
