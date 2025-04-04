@csrf
<input type="hidden" name="page_url" value="{{ url()->current() }}">
@if (isset($title) && $title)
    <input type="hidden" name="page_title" value="{{ $title }}">
@endif
@if (isset($config) && $config['enabled'])
    <input type="text" name="{{ $config['input_name'] }}" value="" style="display: none;">
    <input type="text" name="{{ $config['input_time_name'] }}" value="{{ now()->timestamp }}" style="display: none;">
@endif
