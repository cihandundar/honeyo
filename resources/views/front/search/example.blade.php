@foreach ($postType->posts as $item)
    {{ $item->get('title') }}
@endforeach
