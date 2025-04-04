@extends('front.base')

@section('title', $post->getTitle())
@section('seotitle', $post->getSeoTitle())
@section('seodesc', $post->getSeoDesc())

@if (!$post->get('index'))
    @section('custom_head')
        <meta name="robots" content="noindex, nofollow">
    @endsection
    @section('hide_canonical', true)
@endif

@include('front.partials.hreflang')

@section('content')

@endsection
