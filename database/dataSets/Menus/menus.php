<?php

return [
    'Ana Menü' => [
        [
            'text' => 'Home',
            'url' => '/',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'About',
            'url' => '/about',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'Services',
            'url' => '/services',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'Blog',
            'url' => '/blog',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'Contact',
            'url' => '/contact',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'Team',
            'url' => '/team',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'Shop',
            'url' => '/shop',
            'new_tab' => false,
            'custom_data' => '',
        ],
    ],
    'Footer Menü - 1' => [
        [
            'text' => 'Anasayfa',
            'url' => '/',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'Hakkımızda',
            'url' => '/hakkimizda',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'KVKK',
            'url' => '/standart-sayfa',
            'new_tab' => false,
            'custom_data' => '',
        ],
        [
            'text' => 'İletişim',
            'url' => '/iletisim',
            'new_tab' => false,
            'custom_data' => '',
        ],
    ],
    'Örnek Yavrulu Menü' => [
        [
            'text' => 'Home',
            'url' => '/',
            'new_tab' => false,
            'custom_data' => '<i class="fas fa-home"></i>',
        ],
        [
            'text' => 'About Us',
            'url' => '/about',
            'new_tab' => true,
            'custom_data' => '<i class="fas fa-info-circle"></i>',
            'children' => [
                [
                    'text' => 'Our Team',
                    'url' => '/about/team',
                ],
                [
                    'text' => 'Our History',
                    'url' => '/about/history',
                ],
            ],
        ],
        [
            'text' => 'Services',
            'url' => '/services',
        ],
    ],
];
