<!DOCTYPE html>
<html lang="{{ config('clickcms_user.site_locale') }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title', getSiteTitle())</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="content-language" content="{{ config('clickcms_user.site_locale') }}" />
    <link rel="icon" href="{{ setting('favicon') }}" type="image/png">
    @if (config('clickcms.all_noindex') || setting('tum-site-index-kapat'))
        <meta name="robots" content="noindex,nofollow">
    @endif

    @hasSection('seotitle')
        <meta property="og:title" content="@yield('seotitle')" />
    @endif

    @hasSection('seodesc')
        <meta name="description" content="@yield('seodesc')">
        <meta property="og:description" content="@yield('seodesc')" />
    @endif

    @hasSection('hide_canonical')
    @else
        @hasSection('canonical')
            <link rel="canonical" href="{{ url('/') }}/@yield('canonical')" />
        @elseif(request()->is('/'))
            @php($url = parse_url(url('/')))
            @isset($url['path'])
                <link rel="canonical" href="{{ \Illuminate\Support\Str::finish(url('/'), '/') }}" />
            @else
                <link rel="canonical" href="{{ url('/') }}" />
            @endisset
        @else
            <link rel="canonical" href="{{ url()->current() }}" />
        @endif
    @endif

    @yield('custom_head')

    @yield('hreflang')

    {{-- CSS Files --}}
    <link rel="stylesheet" href="{{ frontAsset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    {!! setting('head-meta-kodlari') !!}
    {!! setting('google-head-kodlari') !!}
    {!! setting('google-remarketing-kodlari') !!}
    {!! setting('google-analytics-kodlari') !!}

    @stack('header_mutable')

    @if (setting('ozel-css-kodlari'))
        <style>
            {!! setting('ozel-css-kodlari') !!}
        </style>
    @endif
</head>

<body>
    {!! setting('google-body-kodlari') !!}

    @include('front.partials._header')

    @yield('content')

    @include('front.partials._footer')

    {{-- JS Files --}}
    <script type="module" src="{{ frontAsset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

    {!! nonCache('mail_alerts') !!}
    {!! setting('footer-meta-kodlari') !!}
    @stack('footer_mutable')
    {!! nonCache('click_status') !!}
    @include('front.partials.enhanced_form')
</body>

</html>
