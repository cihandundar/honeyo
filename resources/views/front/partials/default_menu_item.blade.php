@if ($data && isset($data['item']))
    <li class="{{ isActivePage($data['item']) ? 'active' : '' }}">
        <a href="{{ $data['item']->url() }}"{!! isset($data['item']->new_tab) && $data['item']->new_tab ? ' target="_blank"' : '' !!}>
            {!! $data['item']->custom_data !!} {{-- Özel linkdeki Özel Alanı Çeker --}}
            {{ $data['item']->get('title') }}
        </a>
        @if (isset($data['children']))
            <ul>
                @foreach ($data['children'] as $data)
                    @include('front.partials.default_menu_item')
                @endforeach
            </ul>
        @endif
    </li>
@endif
