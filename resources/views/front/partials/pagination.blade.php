@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Önceki Sayfa Link --}}
        @if (!$paginator->onFirstPage())
            <li class="page-item"><a
                    href="{{ $paginator->currentPage() == 2 ? $paginator->toArray()['path'] : $paginator->previousPageUrl() }}"
                    rel="prev">Önceki</a></li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item"><a href="JavaScript:void(0)">{{ $element }}</a></li>
            @endif

            {{-- Sayfalar --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a href="JavaScript:void(0)">{{ $page }}</a></li>
                        {{-- Aktif Olan Link --}}
                    @elseif($page == 1)
                        <li class="page-item"><a class="page-link"
                                href="{{ $paginator->toArray()['path'] }}">{{ $page }}</a></li>
                        {{-- İlk Link --}}
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li> {{-- Normal Link --}}
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Sonraki Sayfa Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Sonraki</a>
            </li>
        @endif
    </ul>
@endif
