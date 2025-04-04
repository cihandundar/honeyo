@if ($details = session('enchanced-form-conversion'))
    @php/** @var \App\Helpers\EnhancedFormDetail $details */@endphp

    <div data-gtag-form-success>
        <div data-gtag-form-email="{{ $details->email }}"></div>
        <div data-gtag-form-phone="{{ $details->phone }}"></div>
    </div>
@endif
