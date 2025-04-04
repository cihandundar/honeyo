<li>
    <b>{{ $item->name }} - {{ $item->email }}</b>
    <p>{{ $item->message }}</p>
    <button class="js-reply" data-id="{{ $item->id }}" data-name="{{ $item->name }}">Yanıtla</button>
</li>
@if ($item->childs->count())
    <ul>
        @foreach ($item->childs as $child)
            @include('front.partials.comment.item', ['item' => $child])
        @endforeach
    </ul>
@endif
