<?php

namespace App\Support;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;

class PricelistData
{
    public const SECTIONS = [
        'lcd' => [
            'label' => 'Price LCD iPhone',
            'slug' => 'iphone-lcd',
            'device' => 'iphone',
            'file_hint' => '1-Price-LCD-iPhone-2026-01-01.csv',
        ],
        'battery' => [
            'label' => 'Price Battery iPhone',
            'slug' => 'iphone-battery',
            'device' => 'iphone',
            'file_hint' => 'battery.csv',
        ],
        'charger' => [
            'label' => 'Price Charger iPhone',
            'slug' => 'iphone-charger',
            'device' => 'iphone',
            'file_hint' => 'charger.xlsx',
        ],
        'camera' => [
            'label' => 'Price Camera iPhone',
            'slug' => 'iphone-camera',
            'device' => 'iphone',
            'file_hint' => 'camera.csv',
        ],
        'face-id' => [
            'label' => 'Price Face ID iPhone',
            'slug' => 'iphone-face-id',
            'device' => 'iphone',
            'file_hint' => 'face-id.csv',
        ],
        'housing' => [
            'label' => 'Price Housing & Backglass iPhone',
            'slug' => 'iphone-housing-backglass',
            'device' => 'iphone',
            'file_hint' => 'housing.csv',
        ],
        'ipad-lcd' => [
            'label' => 'Price LCD Replacement iPad',
            'slug' => 'ipad-lcd-replacement',
            'device' => 'ipad',
            'file_hint' => 'ipad-lcd.csv',
        ],
        'ipad-touchscreen' => [
            'label' => 'Price Touchscreen iPad',
            'slug' => 'ipad-touchscreen',
            'device' => 'ipad',
            'file_hint' => 'ipad-touchscreen.csv',
        ],
        'ipad-battery' => [
            'label' => 'Price Battery iPad',
            'slug' => 'ipad-battery',
            'device' => 'ipad',
            'file_hint' => 'ipad-battery.csv',
        ],
        'ipad-flex-charger' => [
            'label' => 'Price Flexibel Charger iPad',
            'slug' => 'ipad-flex-charger',
            'device' => 'ipad',
            'file_hint' => 'ipad-flex-charger.csv',
        ],
        'ipad-flex-onoff' => [
            'label' => 'Price Flex On/Off iPad',
            'slug' => 'ipad-flex-onoff',
            'device' => 'ipad',
            'file_hint' => 'ipad-flex-onoff.csv',
        ],
        'macbook-lcd' => [
            'label' => 'Price LCD Macbook',
            'slug' => 'macbook-lcd',
            'device' => 'macbook',
            'file_hint' => 'macbook-lcd.csv',
        ],
        'macbook-battery' => [
            'label' => 'Price Battery Macbook',
            'slug' => 'macbook-battery',
            'device' => 'macbook',
            'file_hint' => 'macbook-battery.csv',
        ],
        'macbook-keyboard' => [
            'label' => 'Price Keyboard Macbook',
            'slug' => 'macbook-keyboard',
            'device' => 'macbook',
            'file_hint' => 'macbook-keyboard.csv',
        ],
        'macbook-speaker' => [
            'label' => 'Price Speaker Macbook',
            'slug' => 'macbook-speaker',
            'device' => 'macbook',
            'file_hint' => 'macbook-speaker.csv',
        ],
        'macbook-touchpad' => [
            'label' => 'Price Touch Pad Macbook',
            'slug' => 'macbook-touchpad',
            'device' => 'macbook',
            'file_hint' => 'macbook-touchpad.csv',
        ],
        'macbook-storage' => [
            'label' => 'Price SSD / Penyimpanan Storage Macbook',
            'slug' => 'macbook-storage',
            'device' => 'macbook',
            'file_hint' => 'macbook-storage.csv',
        ],
        'iwatch-lcd' => [
            'label' => 'Price LCD iWatch',
            'slug' => 'iwatch-lcd',
            'device' => 'iwatch',
            'file_hint' => 'iwatch-lcd.csv',
        ],
        'iwatch-battery' => [
            'label' => 'Price Battery iWatch',
            'slug' => 'iwatch-battery',
            'device' => 'iwatch',
            'file_hint' => 'iwatch-battery.csv',
        ],
        'android-xiaomi-mi-lcd' => [
            'label' => 'Harga Pergantian LCD Xiaomi Mi Series',
            'slug' => 'android-xiaomi-mi-lcd',
            'device' => 'android',
            'file_hint' => 'android-xiaomi-mi-lcd.csv',
        ],
        'android-xiaomi-mi-battery' => [
            'label' => 'Harga Pergantian Battery Xiaomi Mi Series',
            'slug' => 'android-xiaomi-mi-battery',
            'device' => 'android',
            'file_hint' => 'android-xiaomi-mi-battery.csv',
        ],
        'android-xiaomi-redmi-lcd' => [
            'label' => 'Harga Pergantian LCD Xiaomi Redmi Series',
            'slug' => 'android-xiaomi-redmi-lcd',
            'device' => 'android',
            'file_hint' => 'android-xiaomi-redmi-lcd.csv',
        ],
        'android-xiaomi-redmi-battery' => [
            'label' => 'Harga Pergantian Battery Xiaomi Redmi Series',
            'slug' => 'android-xiaomi-redmi-battery',
            'device' => 'android',
            'file_hint' => 'android-xiaomi-redmi-battery.csv',
        ],
        'android-xiaomi-poco-lcd' => [
            'label' => 'Harga Pergantian LCD Xiaomi Poco Series',
            'slug' => 'android-xiaomi-poco-lcd',
            'device' => 'android',
            'file_hint' => 'android-xiaomi-poco-lcd.csv',
        ],
        'android-xiaomi-poco-battery' => [
            'label' => 'Harga Pergantian Battery Xiaomi Poco Series',
            'slug' => 'android-xiaomi-poco-battery',
            'device' => 'android',
            'file_hint' => 'android-xiaomi-poco-battery.csv',
        ],
        'android-samsung-galaxy-a-lcd' => [
            'label' => 'Harga Pergantian LCD Galaxy A Series',
            'slug' => 'android-samsung-galaxy-a-lcd',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-a-lcd.csv',
        ],
        'android-samsung-galaxy-a-battery' => [
            'label' => 'Harga Pergantian Battery Galaxy A Series',
            'slug' => 'android-samsung-galaxy-a-battery',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-a-battery.csv',
        ],
        'android-samsung-galaxy-m-lcd' => [
            'label' => 'Harga Pergantian LCD Galaxy M Series',
            'slug' => 'android-samsung-galaxy-m-lcd',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-m-lcd.csv',
        ],
        'android-samsung-galaxy-m-battery' => [
            'label' => 'Harga Pergantian Battery Galaxy M Series',
            'slug' => 'android-samsung-galaxy-m-battery',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-m-battery.csv',
        ],
        'android-samsung-galaxy-note-lcd' => [
            'label' => 'Harga Pergantian LCD Galaxy Note Series',
            'slug' => 'android-samsung-galaxy-note-lcd',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-note-lcd.csv',
        ],
        'android-samsung-galaxy-note-battery' => [
            'label' => 'Harga Pergantian Battery Galaxy Note Series',
            'slug' => 'android-samsung-galaxy-note-battery',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-note-battery.csv',
        ],
        'android-samsung-galaxy-s-lcd' => [
            'label' => 'Harga Pergantian LCD Galaxy S Series',
            'slug' => 'android-samsung-galaxy-s-lcd',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-s-lcd.csv',
        ],
        'android-samsung-galaxy-s-battery' => [
            'label' => 'Harga Pergantian Battery Galaxy S Series',
            'slug' => 'android-samsung-galaxy-s-battery',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-s-battery.csv',
        ],
        'android-samsung-galaxy-tab-lcd' => [
            'label' => 'Harga Pergantian LCD Galaxy Tab Series',
            'slug' => 'android-samsung-galaxy-tab-lcd',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-tab-lcd.csv',
        ],
        'android-samsung-galaxy-tab-battery' => [
            'label' => 'Harga Pergantian Battery Galaxy Tab Series',
            'slug' => 'android-samsung-galaxy-tab-battery',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-tab-battery.csv',
        ],
        'android-samsung-galaxy-z-lcd' => [
            'label' => 'Harga Pergantian LCD Galaxy Z Fold & Z Flip Series',
            'slug' => 'android-samsung-galaxy-z-lcd',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-z-lcd.csv',
        ],
        'android-samsung-galaxy-z-battery' => [
            'label' => 'Harga Pergantian Battery Galaxy Z Fold & Z Flip Series',
            'slug' => 'android-samsung-galaxy-z-battery',
            'device' => 'android',
            'file_hint' => 'android-samsung-galaxy-z-battery.csv',
        ],
        'android-realme-lcd' => [
            'label' => 'Harga Pergantian LCD Realme',
            'slug' => 'android-realme-lcd',
            'device' => 'android',
            'file_hint' => 'android-realme-lcd.csv',
        ],
        'android-realme-battery' => [
            'label' => 'Harga Pergantian Battery Realme',
            'slug' => 'android-realme-battery',
            'device' => 'android',
            'file_hint' => 'android-realme-battery.csv',
        ],
        'android-infinix-lcd' => [
            'label' => 'Harga Pergantian LCD Infinix',
            'slug' => 'android-infinix-lcd',
            'device' => 'android',
            'file_hint' => 'android-infinix-lcd.csv',
        ],
        'android-infinix-battery' => [
            'label' => 'Harga Pergantian Battery Infinix',
            'slug' => 'android-infinix-battery',
            'device' => 'android',
            'file_hint' => 'android-infinix-battery.csv',
        ],
        'android-oppo-lcd' => [
            'label' => 'Harga Pergantian LCD Oppo',
            'slug' => 'android-oppo-lcd',
            'device' => 'android',
            'file_hint' => 'android-oppo-lcd.csv',
        ],
        'android-oppo-battery' => [
            'label' => 'Harga Pergantian Battery Oppo',
            'slug' => 'android-oppo-battery',
            'device' => 'android',
            'file_hint' => 'android-oppo-battery.csv',
        ],
        'android-vivo-lcd' => [
            'label' => 'Harga Pergantian LCD Vivo',
            'slug' => 'android-vivo-lcd',
            'device' => 'android',
            'file_hint' => 'android-vivo-lcd.csv',
        ],
        'android-vivo-battery' => [
            'label' => 'Harga Pergantian Battery Vivo',
            'slug' => 'android-vivo-battery',
            'device' => 'android',
            'file_hint' => 'android-vivo-battery.csv',
        ],
        'android-asus-lcd' => [
            'label' => 'Harga Pergantian LCD Asus',
            'slug' => 'android-asus-lcd',
            'device' => 'android',
            'file_hint' => 'android-asus-lcd.csv',
        ],
        'android-asus-battery' => [
            'label' => 'Harga Pergantian Battery Asus',
            'slug' => 'android-asus-battery',
            'device' => 'android',
            'file_hint' => 'android-asus-battery.csv',
        ],
        'android-google-pixel-lcd' => [
            'label' => 'Harga Pergantian LCD Google Pixel',
            'slug' => 'android-google-pixel-lcd',
            'device' => 'android',
            'file_hint' => 'android-google-pixel-lcd.csv',
        ],
        'android-google-pixel-battery' => [
            'label' => 'Harga Pergantian Battery Google Pixel',
            'slug' => 'android-google-pixel-battery',
            'device' => 'android',
            'file_hint' => 'android-google-pixel-battery.csv',
        ],
        'android-huawei-lcd' => [
            'label' => 'Harga Pergantian LCD Huawei',
            'slug' => 'android-huawei-lcd',
            'device' => 'android',
            'file_hint' => 'android-huawei-lcd.csv',
        ],
        'android-huawei-battery' => [
            'label' => 'Harga Pergantian Battery Huawei',
            'slug' => 'android-huawei-battery',
            'device' => 'android',
            'file_hint' => 'android-huawei-battery.csv',
        ],
    ];

    public static function sections(): array
    {
        return self::SECTIONS;
    }

    public static function sectionsByDevice(string $device): array
    {
        $sections = [];

        foreach (self::SECTIONS as $key => $config) {
            if (($config['device'] ?? 'iphone') === $device) {
                $sections[$key] = $config;
            }
        }

        return $sections;
    }

    public static function hasSection(string $section): bool
    {
        return array_key_exists($section, self::SECTIONS);
    }

    public static function section(string $section): array
    {
        if (! self::hasSection($section)) {
            throw new InvalidArgumentException('Section tidak dikenal.');
        }

        return self::SECTIONS[$section];
    }

    public static function get(string $section): ?array
    {
        $disk = Storage::disk('local');
        $path = self::storagePath($section);

        if (! $disk->exists($path)) {
            return null;
        }

        $data = json_decode($disk->get($path), true);
        if (! is_array($data)) {
            return null;
        }

        if (empty($data['headers']) || empty($data['rows'])) {
            return null;
        }

        return $data;
    }

    public static function put(string $section, array $data): void
    {
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);

        Storage::disk('local')->put(self::storagePath($section), $json);
    }

    public static function lastUpdatedAt(string $section): ?Carbon
    {
        $disk = Storage::disk('local');
        $path = self::storagePath($section);

        if (! $disk->exists($path)) {
            return null;
        }

        return Carbon::createFromTimestamp($disk->lastModified($path), 'Asia/Makassar');
    }

    public static function delete(string $section): bool
    {
        return Storage::disk('local')->delete(self::storagePath($section));
    }

    public static function backup(string $section): void
    {
        $disk = Storage::disk('local');
        $path = self::storagePath($section);

        if (! $disk->exists($path)) {
            return;
        }

        $disk->put(self::backupPath($section), $disk->get($path));
    }

    public static function restoreBackup(string $section): bool
    {
        $disk = Storage::disk('local');
        $backupPath = self::backupPath($section);

        if (! $disk->exists($backupPath)) {
            return false;
        }

        $disk->put(self::storagePath($section), $disk->get($backupPath));

        return true;
    }

    public static function backupUpdatedAt(string $section): ?Carbon
    {
        $disk = Storage::disk('local');
        $path = self::backupPath($section);

        if (! $disk->exists($path)) {
            return null;
        }

        return Carbon::createFromTimestamp($disk->lastModified($path), 'Asia/Makassar');
    }

    private static function storagePath(string $section): string
    {
        $config = self::section($section);

        return 'pricelist/'.$config['slug'].'.json';
    }

    private static function backupPath(string $section): string
    {
        $config = self::section($section);

        return 'pricelist/'.$config['slug'].'.backup.json';
    }
}
