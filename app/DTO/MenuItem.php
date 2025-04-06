<?php

namespace App\DTO;

class MenuItem
{
    public $title;
    public $url;
    public $new_tab;
    public $custom_data;

    public function __construct($title, $url, $new_tab = false, $custom_data = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->new_tab = $new_tab;
        $this->custom_data = $custom_data;
    }

    /**
     * URL'yi döndüren metot
     *
     * @return string
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * Özelliklere erişim sağlayan metot
     *
     * @param string $key Özellik adı
     * @return mixed Özellik değeri veya null
     */
    public function get($key)
    {
        if (property_exists($this, $key)) {
            return $this->{$key};
        }

        return null;
    }
}
