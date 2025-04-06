<ul>
    @if ($menuData = getMenu('Ana Menü')->data)
        @foreach ($menuData as $data)
            @include('front.partials.default_menu_item')
        @endforeach
    @endif
</ul>
