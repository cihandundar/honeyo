@if (auth('admin')->check())
    @php
        $isSuperUser = auth('admin')->user()->can('admin');
        $clickPost = config('click_app_cache.clickPost');
        $clickMailStatus = config('mail.mailers.smtp.username') && config('mail.mailers.smtp.password');
        $clickSeoIndex = config('clickcms.all_noindex') || setting('tum-site-index-kapat');
        $isLocalWebSite = \Illuminate\Support\Str::contains(url('/'), ['clicktocms.com', 'localhost']);
    @endphp
    @if ($isSuperUser || $clickPost)
        <div class="click-admin-bar">
            @if ($isSuperUser)
                <div
                    class="click-admin-bar-item"{{ !$isLocalWebSite && config('app.env') != 'production' ? '  click-danger' : '' }}">
                    <b>Env: </b>{{ config('app.env') }}
                </div>
                <div class="click-admin-bar-item{{ !$isLocalWebSite && config('app.debug') ? '  click-danger' : '' }}">
                    <b>Debug: </b> {{ config('app.debug') ? 'Açık' : 'Kapalı' }}
                </div>
                <div class="click-admin-bar-item">
                    <b>Cache: </b> {{ config('clickcms.html_cache') ? 'Açık' : 'Kapalı' }}
                </div>
                <div class="click-admin-bar-item{{ !$isLocalWebSite && $clickSeoIndex ? ' click-danger' : '' }}">
                    <b>Index: </b> {{ $clickSeoIndex ? 'Kapalı' : 'Açık' }}
                </div>
                <div class="click-admin-bar-item{{ !$clickMailStatus ? ' click-danger' : '' }}">
                    <b>Mail: </b> {{ $clickMailStatus ? 'Aktif' : 'Pasif' }}
                </div>
                @if ($clickPost)
                    <div class="click-admin-bar-item{{ !$clickMailStatus ? ' click-danger' : '' }}">
                        <b>{{ __('admin.update_time') }}: </b> {{ humanDate($clickPost->get('updated_at')) }}
                    </div>
                    <div class="click-admin-bar-item{{ !$clickMailStatus ? ' click-danger' : '' }}">
                        <b>{{ __('admin.release_time') }}: </b> {{ humanDate($clickPost->get('published_at')) }}
                    </div>
                @endif
            @endif
            @if ($clickPost)
                <a href="{{ $clickPost->adminEditUrl() }}" class="click-admin-bar-item">
                    <b>✎</b> {{ __('admin.edit_post') }}
                </a>
                <a href="{{ route('admin.home') }}" class="click-admin-bar-item">
                    <b>⇢</b> {{ __('admin.go_dashboard') }}
                </a>
                @php
                    $clickPostIsScheduled = $clickPost->isScheduled();
                @endphp
                <div
                    class="click-admin-bar-item{{ !$clickPost->status ? ' click-danger' : ($clickPostIsScheduled ? ' click-warning' : '') }}">
                    {{ __('admin.post') }}
                    {{ !$clickPost->status ? __('admin.passive') : ($clickPostIsScheduled ? __('admin.scheduled') : __('admin.active')) }}
                </div>
            @endif
            @if (config('clickcms_user.support') && !$isSuperUser)
                <a href="{{ route('admin.support', ['page' => url()->current()]) }}" class="click-admin-bar-item">
                    <b>✉</b> {{ __('admin.want_support') }}
                </a>
            @endif
        </div>

        <style>
            .click-admin-bar {
                position: sticky;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #1A202C;
                display: flex;
                align-items: stretch;
                justify-content: space-between;
                color: #fff;
                font-family: sans-serif;
                font-size: 14px;
                overflow-x: auto;
                z-index: 99999999;
            }

            .click-admin-bar a {
                color: #fff;
                text-decoration: none
            }

            .click-admin-bar-item {
                padding: 5px 10px;
                width: 100%;
                white-space: nowrap;
                text-align: center;
            }

            .click-admin-bar-item:nth-child(even) {
                background-color: #2D3748;
            }

            .click-admin-bar-item.click-danger {
                background-color: #E53E3E;
            }

            .click-admin-bar-item.click-warning {
                background-color: #DD6B20;
            }
        </style>
    @endif

@endif
