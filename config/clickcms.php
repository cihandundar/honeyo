<?php

return [
    'file_mimes' => 'application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/wps-office.docx,application/wps-office.doc,application/wps-office.xlsx,application/wps-office.xls,application/vnd.ms-office',
    'all_noindex' => env('ALL_NOINDEX', false),
    'html_cache' => env('HTML_CACHE', false) && config('app.env') != 'local',
    'sql_cache' => ! config('clickcms.html_cache') && env('SQL_CACHE', false) && config('app.env') != 'local',
    'no_follow_middleware' => env('NO_FOLLOW_MIDDLEWARE', false),
    'honeypot' => [
        'enabled' => env('HONEYPOT_ENABLED', true),
        'input_name' => 'my_name',
        'input_time_name' => 'timestamp',
        'minimum_time' => 3,
    ],
];
