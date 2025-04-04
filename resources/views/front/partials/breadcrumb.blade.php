@php
    $firstStep = 'Ana Sayfa';
    if (!isset($links)) {
        $links = [];
    }
    foreach ($links as $key => $link) {
        if (!isPost($link)) {
            continue;
        }
        $links[$key] = [
            'title' => $link->get('title'),
            'link' => $link->url(),
        ];
    }
@endphp
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "BreadcrumbList",
	"itemListElement": [{
			"@type": "ListItem",
			"position": 1,
			"name": "{{$firstStep}}",
			"item": "{{getHomeUrl()}}"
		}
		@if(isset($links))
			@foreach($links as $link)
			, {
				"@type": "ListItem",
				"position": {{$loop -> index + 2}},
				"name": "{{$link['title']}}",
				"item": "{{$link['link']}}"
			}
			@endforeach
		@endif
		@isset($post)
		, {
			"@type": "ListItem",
			"position": {{isset($links) ? (count($links) + 2) : 2}},
			"name": "{{$post->get('title')}}",
			"item": "{{$post->url()}}"
		}
		@endisset
	]
}
</script>
@if (!(isset($noTitle) && $noTitle))
    <h1 class="title">{{ $post->get('title') }}</h1>
@endif
<ul class="links">
    <li>
        <a href="{{ getHomeUrl() }}">{{ $firstStep }}</a>
    </li>
    @isset($links)
        @foreach ($links as $link)
            <li><a href="{{ $link['link'] }}">{{ $link['title'] }}</a></li>
        @endforeach
    @endisset
    <li>{{ $post->get('title') }}</li>
</ul>
