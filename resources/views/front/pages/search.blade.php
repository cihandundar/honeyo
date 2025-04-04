@extends('front.base')

@php
    $title = setting('arama-seo-baslik') ?: $searchKey . ' için Arama Sonuçları';
    $post = fakePost($title);
@endphp

@section('title', setting('arama-seo-baslik'))
@section('seotitle', setting('arama-seo-baslik'))
@section('seodesc', setting('arama-seo-aciklama'))

@section('custom_head')
    <meta name="robots" content="noindex, follow">
@endsection

@section('content')

    @include('front.partials.breadcrumb')

    <h1>{{ $searchKey }}</h1>

    @foreach ($postTypes as $postType)
        @include('front.search.' . sefurl($postType->title))
    @endforeach

@endsection
