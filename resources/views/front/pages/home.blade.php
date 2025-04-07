@extends('front.base')
@section('title', setting('ana-sayfa-baslik'))
@section('seotitle', setting('ana-sayfa-seo-baslik'))
@section('seodesc', setting('ana-sayfa-seo-aciklama'))

@push('header_mutable')
    @include('front.partials.hreflang')
@endpush

@section('content')
    @include('front.partials.sections.hero')
@endsection
