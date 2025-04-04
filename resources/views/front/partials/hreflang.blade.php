@if (languageStatus() && ($hreflang = $post?->hreflang ?? null))
    @php
        $hrefLinks = $hreflang->links();
        $activeLang = activeLanguage();
        $otherLanguages = getLanguages();
    @endphp
    @section('hreflang')
        <link rel="alternate" href="{{ url()->current() }}" hreflang="{{ $activeLang['code'] }}" />
        @foreach ($otherLanguages as $site => $item)
            @php
                $code = $item['code'];
            @endphp
            <link rel="alternate" href="{{ $site . '/' . $hrefLinks->$code }}" hreflang="{{ $code }}" />
        @endforeach
        @if ($activeLang['code'] == defaultLanguage()['item']['code'])
            <link rel="alternate" href="{{ url()->current() }}" hreflang="x-default" />
        @else
            <link rel="alternate"
                href="{{ defaultLanguage()['link'] . '/' . $hrefLinks->{defaultLanguage()['item']['code']} }}"
                hreflang="x-default" />
        @endif
    @endsection

    @foreach ($otherLanguages as $site => $item)
        @php
            $code = $item['code'];
        @endphp
        @section('lang_url_' . $item['code'], $site . '/' . $hrefLinks->$code)
    @endforeach
@elseif(Request::is('/'))
    @foreach (getLanguages(false) as $site => $item)
        <link rel="alternate" href="{{ $site }}" hreflang="{{ $item['code'] }}" />
    @endforeach
    <link rel="alternate" href="{{ defaultLanguage()['link'] }}" hreflang="x-default" />

@endif
