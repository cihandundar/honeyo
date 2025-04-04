<?php

return [
    'cache_time' => now()->addMinutes(1440),
    'cache_disabled_pages' => [
        //'/iletisim'
    ],
    'search_types' => [

    ],
    'relation_search_types' => [

    ],
    'comment_form_website_input' => false,
    'support' => true,
    'telegram_report' => true,
    'uploads_folder' => env('UPLOADS_FOLDER', 'yuklemeler'), /* uploads */
    'site_locale' => env('SITE_LOCALE', 'tr'), /* en */
    'app_locale_code' => env('APP_LOCALE_CODE', 'tr_TR.UTF-8'), /* en_US.UTF-8 */
    'pagination_page_key' => env('PAGINATION_PAGE_KEY', 'sayfa'),
];
