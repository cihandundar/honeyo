<?php

namespace App\DTO;

class DataItem
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Belirtilen key'e ait değeri döndürür.
     *
     * @param string $key Anahtar adı
     * @return mixed Anahtarın değeri veya false
     */
    public function get(string $key)
    {
        return $this->data[$key] ?? false;
    }

    public function __get(string $property)
    {
        return $this->get($property);
    }

    /**
     * İlişkili öğeleri getiren metod
     *
     * @param string $key İlişki türü (benzer-urunler veya benzer-bloglar)
     * @return array DataItem nesnelerinden oluşan dizi
     */
    public function getEach(string $key): object
    {
        $dataSetsPath = match ($key) {
            'benzer-urunler' => base_path("database/dataSets/postTypes/urunler.php"),
            'benzer-bloglar' => base_path("database/dataSets/postTypes/blog.php"),
            default => null
        };

        if (!$dataSetsPath || !file_exists($dataSetsPath)) {
            return (object) [
                'data' => [],
                'total' => 0
            ];
        }

        $allItems = include $dataSetsPath;
        if (!is_array($allItems)) {
            return (object) [
                'data' => [],
                'total' => 0
            ];
        }

        $relatedIds = $this->get($key);
        if (!is_array($relatedIds)) {
            return (object) [
                'data' => [],
                'total' => 0
            ];
        }

        $items = array_map(
            fn($item) => new self($item),
            array_filter($allItems, fn($item) => in_array($item['id'] ?? null, $relatedIds))
        );

        return (object) [
            'data' => $items,
            'total' => count($items)
        ];
    }


    // Yardımcı metodlar
    public function isDiscounted()
    {
        return $this->get('discount') ? true : false;
    }

    public function inStock()
    {
        return $this->stock;
    }

    public function noStock()
    {
        return !$this->inStock();
    }

    public function url()
    {
        return $this->get('url') ?: false;
    }

    public function discountRate()
    {
        return $this->get('discount-rate') ?: false;
    }

    public function secondImage()
    {
        return $this->get('second_image') ?: false;
    }

    public function getTitle() {
        return $this->get('title') ?: false;
    }

    public function getSeoTitle() {
        return $this->get('seotitle') ?: false;
    }

    public function getSeoDesc() {
        return $this->get('seodesc') ?: false;
    }
}
