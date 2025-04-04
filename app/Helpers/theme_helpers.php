<?php

use App\DTO\DataItem;
use App\DTO\MenuItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


if (!function_exists('getHomeUrl')) {
    /**
     * Anasayfanın URL'sini döndürür
     *
     * @return string
     */
    function getHomeUrl(): string
    {
        return url('/');
    }
}

if (!function_exists('getSiteTitle')) {
    function getSiteTitle()
    {
        return setting('ana-sayfa-baslik');
    }
}






if (!function_exists('isActivePage')) {
    /**
     * Her zaman false dönen bir fonksiyon
     *
     * @param mixed $item Menü öğesi
     * @return bool
     */
    function isActivePage($item): bool
    {
        return false;
    }
}



function phoneNumberCleaner($phone)
{
    return str_replace(['(', ')', '-', ' '], '', $phone);
}

function phoneLink($phone)
{
    return 'tel:'.phoneNumberCleaner($phone);
}

function mailLink($email)
{
    return 'mailto:'.$email;
}

function whatsappLink($phone, $message = '')
{
    $phone = phoneNumberCleaner($phone);

    if (Str::startsWith($phone, '+')) {
        $phone = ltrim($phone, '+');
    } else {
        $phone = ltrim($phone, '+90');
        $phone = ltrim($phone, '90');
        $phone = ltrim($phone, '0');
        $phone = '90'.$phone;
    }

    if ($message) {
        $message = '?text='.urlencode($message);
    }

    return 'https://wa.me/'.$phone.$message;
}


if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        $settings = include(base_path('database/dataSets/Settings/siteSettings.php'));
        return Arr::get($settings, $key, $default);
    }
}

if (!function_exists('getMenu')) {
    /**
     * Menü verilerini alır ve yapılandırır
     *
     * @param string $menuName Menü adı
     * @return object|null Menü verileri veya null
     */
    function getMenu(string $menuName)
    {
        $menus = include(base_path('database/dataSets/Menus/menus.php'));
        $menuData = $menus[$menuName] ?? null;

        if (!$menuData) {
            return null; // Menü bulunamadıysa null döndür
        }

        // Menü öğelerini yapılandır
        $structuredMenu = array_map(function ($item) {
            return [
                'item' => new MenuItem(
                    $item['text'],
                    $item['url'],
                    $item['new_tab'] ?? false,
                    $item['custom_data'] ?? ''
                ),
                'children' => isset($item['children']) ? array_map(function ($child) {
                    return [
                        'item' => new MenuItem(
                            $child['text'],
                            $child['url'],
                            $child['new_tab'] ?? false,
                            $child['custom_data'] ?? ''
                        ),
                    ];
                }, $item['children']) : [],
            ];
        }, $menuData);

        return (object) [
            'name' => $menuName,
            'data' => $structuredMenu,
        ];
    }
}


if (!function_exists('findPage')) {
    /**
     * Belirtilen sayfayı dataSets klasöründen bulur ve döndürür.
     *
     * @param string $title Aranacak başlık
     * @return \App\DTO\DataItem|null Bulunan veri nesnesi veya null
     */
    function findPage(string $title)
    {
        $dataSetsPath = base_path('database/dataSets/postTypes');
        $files = glob($dataSetsPath . '/*.php');

        foreach ($files as $file) {
            $data = include $file;

            if (is_array($data)) {
                foreach ($data as $item) {
                    if (is_array($item) && isset($item['title']) && $item['title'] === $title) {
                        return new \App\DTO\DataItem($item);
                    }
                }
            }
        }

        return null;
    }
}


if (!function_exists('getDatas')) {
    /**
     * Belirtilen dataSets dosyasını yükler ve verileri nesneler halinde döndürür.
     *
     * @param string $dataName Verilerin bulunduğu mantıksal adı (ör: 'Blog', 'Müşteri Yorumları', 'Neden Biz')
     * @param int|null $limit Döndürülecek veri sayısı (null: sınırsız)
     * @return array Verilerin nesne olarak listesi
     */
    function getDatas(string $dataName, ?int $limit = null): array
    {
        // Türkçe karakterleri dönüştür ve küçük harfe çevir
        $fileName = Str::of($dataName)
            ->lower()
            ->replaceArray(
                ['ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç', ' '],
                ['i', 'g', 'u', 's', 'o', 'c', 'i', 'g', 'u', 's', 'o', 'c', '-']
            );

        // Dataset dosyasının yolunu belirle
        $filePath = base_path('database/dataSets/postTypes/' . $fileName . '.php');

        if (file_exists($filePath)) {
            $data = include $filePath;

            if (is_array($data)) {
                // Verileri nesne olarak dönüştür
                $objects = array_map(function ($item) {
                    return new DataItem($item);
                }, $data);

                // Eğer bir limit belirlenmişse, o kadar veri döndür
                return is_null($limit) ? $objects : array_slice($objects, 0, $limit);
            }
        }

        return []; // Eğer dosya yoksa veya veri geçerli değilse boş dizi döndür
    }
}

if (!function_exists('frontAsset')) {
    /**
     * Front dizini altındaki asset dosyalarının URL'sini oluşturur
     * 
     * @param string $path Assets klasörü altındaki dosya yolu
     * @return string Asset'in tam URL'si
     */
    function frontAsset(string $path): string 
    {
        // Yolu temizle ve birleştir
        $path = trim($path, '/');
        $assetPath = 'front/assets/' . $path;
        
        // Asset URL'sini oluştur
        return asset($assetPath);
    }
}

if (!function_exists('fakePost')) {
    /**
     * Verilen başlıkla sahte bir post/sayfa nesnesi oluşturur
     * 
     * @param string $title Sayfa başlığı
     * @return \App\DTO\DataItem
     */
    function fakePost(string $title): DataItem
    {
        return new DataItem([
            'id' => 0,
            'title' => $title,
            'url' => request()->path(),
            'index' => false,
            'aciklama' => '',
        ]);
    }
}

if (!function_exists('nonCache')) {
    /**
     * Önbellekleme bypass fonksiyonu (dummy)
     * 
     * @param string $key Önbellek anahtarı
     * @return string Boş string
     */
    function nonCache(string $key): string
    {
        return '';
    }
}


if (!function_exists('getLanguages')) {
    function getLanguages($others = true)
    {
        $sites = collect(config('clickcms_language.sites', []));
        if ($others) {
            return $sites->except('www.example.com');
        }
        return $sites;
    }
}

if (!function_exists('getLanguage')) {
    function getLanguage($siteUrl)
    {
        return collect(config('clickcms_language.sites'))->get($siteUrl);
    }
}

if (!function_exists('activeLanguage')) {
    function activeLanguage()
    {
        return true;
    }
}

if (!function_exists('defaultLanguage')) {
    function defaultLanguage(): array
    {
        $sites = config('clickcms_language.sites', []);
        return !empty($sites) ? array_shift($sites) : [
            'link' => 'www.site.com',
            'item' => [
                'code' => 'tr',
                'name' => 'Türkçe',
                'default' => true,
                'locale' => 'tr_TR'
            ]
        ];
    }
}

if (!function_exists('languageStatus')) {
    function languageStatus()
    {
        return config('clickcms_language.status', true);
    }
}

if (!function_exists('getCommentInputs')) {
    function getCommentInputs($key)
    {
        // Blade içerisinde sorun oluşmaması için boş string dönüyoruz
        return '';
    }
}

if (!function_exists('hasPages')) {
    function hasPages()
    {
        // Mock olarak her zaman true dönüyoruz
        // Böylece sayfalama her zaman görünür olacak
        return false;
        

    }
}

