@if ((isset($errors) && count($errors)) > 0 || session('errors'))
    <div class="cms_fly-alert danger">
        <div class="content">
            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times"
                    class="svg-inline--fa fa-times fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 320 512">
                    <path fill="currentColor"
                        d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z">
                    </path>
                </svg>
            </div>
            <div class="desc">Lütfen formu uygun şekilde doldurunuz.</div>
            <ul class="desc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="close-btn">OK</button>
        </div>
    </div>
@endif

@if ($message = session('success'))
    <div class="cms_fly-alert success"{!! session('gtag-form-success') ? ' data-gtag-form-success="' . session('gtag-form-success') . '"' : '' !!}>
        <div class="content">
            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="check"
                    class="svg-inline--fa fa-check fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z">
                    </path>
                </svg>
            </div>
            <div class="desc">
                {{ strlen($message) > 0 ? $message : 'Başarıyla Gönderildi. Size En Kısa Sürede Dönüş Yapacağız.' }}
            </div>
            <button class="close-btn">OK</button>
        </div>
    </div>
@endif
