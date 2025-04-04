@extends('front.pages.default')

@push('footer_mutable')
    @include('front.partials.json_LocalBusiness')
@endpush

@section('content')
    <form action="{{ formAction('contact') }}" method="POST">
        @csrf
        {!! getMailInputs($post->title) !!}
        <input type="text" name="name" placeholder="name">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="phone" placeholder="phone">
        <button type="submit">submit</button>
    </form>
@endsection
