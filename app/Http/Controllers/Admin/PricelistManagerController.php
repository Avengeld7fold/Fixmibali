<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\PricelistData;
use Carbon\Carbon;
use Illuminate\View\View;

class PricelistManagerController extends Controller
{
    public function index(): View
    {
        $groups = [
            [
                'key' => 'iphone',
                'title' => 'Import Pricelist iPhone',
                'sections' => $this->buildSections('iphone'),
            ],
            [
                'key' => 'ipad',
                'title' => 'Import Pricelist iPad',
                'sections' => $this->buildSections('ipad'),
            ],
            [
                'key' => 'macbook',
                'title' => 'Import Pricelist Macbook',
                'sections' => $this->buildSections('macbook'),
            ],
            [
                'key' => 'iwatch',
                'title' => 'Import Pricelist iWatch',
                'sections' => $this->buildSections('iwatch'),
            ],
            [
                'key' => 'android',
                'title' => 'Import Pricelist Android',
                'brands' => $this->androidBrands(),
            ],
        ];

        return view('admin.pricelist', [
            'priceSectionGroups' => $groups,
        ]);
    }

    private function buildSections(string $device): array
    {
        $sections = [];

        foreach (PricelistData::sectionsByDevice($device) as $key => $config) {
            $sections[] = $this->buildSection($key, $config);
        }

        return $sections;
    }

    private function buildSectionsForKeys(array $keys): array
    {
        $sections = [];

        foreach ($keys as $key) {
            $config = PricelistData::section($key);
            $sections[] = $this->buildSection($key, $config);
        }

        return $sections;
    }

    private function buildSection(string $key, array $config): array
    {
        $table = PricelistData::get($key);
        $meta = $table['meta'] ?? [];
        $importedAt = null;

        if (! empty($meta['imported_at'])) {
            $importedAt = Carbon::parse($meta['imported_at'])->setTimezone('Asia/Makassar');
        }

        return [
            'key' => $key,
            'label' => $config['label'],
            'file_hint' => $config['file_hint'] ?? null,
            'table' => $table,
            'meta' => $meta,
            'imported_at' => $importedAt,
            'updated_at' => PricelistData::lastUpdatedAt($key),
            'backup_updated_at' => PricelistData::backupUpdatedAt($key),
        ];
    }

    private function androidBrands(): array
    {
        return [
            [
                'key' => 'xiaomi',
                'title' => 'Xiaomi',
                'series' => [
                    [
                        'key' => 'xiaomi-mi',
                        'title' => 'Xiaomi Mi Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-xiaomi-mi-lcd',
                            'android-xiaomi-mi-battery',
                        ]),
                    ],
                    [
                        'key' => 'xiaomi-redmi',
                        'title' => 'Xiaomi Redmi Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-xiaomi-redmi-lcd',
                            'android-xiaomi-redmi-battery',
                        ]),
                    ],
                    [
                        'key' => 'xiaomi-poco',
                        'title' => 'Xiaomi Poco Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-xiaomi-poco-lcd',
                            'android-xiaomi-poco-battery',
                        ]),
                    ],
                ],
            ],
            [
                'key' => 'samsung',
                'title' => 'Samsung',
                'series' => [
                    [
                        'key' => 'samsung-galaxy-a',
                        'title' => 'Galaxy A Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-samsung-galaxy-a-lcd',
                            'android-samsung-galaxy-a-battery',
                        ]),
                    ],
                    [
                        'key' => 'samsung-galaxy-m',
                        'title' => 'Galaxy M Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-samsung-galaxy-m-lcd',
                            'android-samsung-galaxy-m-battery',
                        ]),
                    ],
                    [
                        'key' => 'samsung-galaxy-note',
                        'title' => 'Galaxy Note Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-samsung-galaxy-note-lcd',
                            'android-samsung-galaxy-note-battery',
                        ]),
                    ],
                    [
                        'key' => 'samsung-galaxy-s',
                        'title' => 'Galaxy S Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-samsung-galaxy-s-lcd',
                            'android-samsung-galaxy-s-battery',
                        ]),
                    ],
                    [
                        'key' => 'samsung-galaxy-tab',
                        'title' => 'Galaxy Tab Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-samsung-galaxy-tab-lcd',
                            'android-samsung-galaxy-tab-battery',
                        ]),
                    ],
                    [
                        'key' => 'samsung-galaxy-z',
                        'title' => 'Galaxy Z Fold & Z Flip Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-samsung-galaxy-z-lcd',
                            'android-samsung-galaxy-z-battery',
                        ]),
                    ],
                ],
            ],
            [
                'key' => 'realme',
                'title' => 'Realme',
                'sections' => $this->buildSectionsForKeys([
                    'android-realme-lcd',
                    'android-realme-battery',
                ]),
            ],
            [
                'key' => 'infinix',
                'title' => 'Infinix',
                'sections' => $this->buildSectionsForKeys([
                    'android-infinix-lcd',
                    'android-infinix-battery',
                ]),
            ],
            [
                'key' => 'oppo',
                'title' => 'Oppo',
                'sections' => $this->buildSectionsForKeys([
                    'android-oppo-lcd',
                    'android-oppo-battery',
                ]),
            ],
            [
                'key' => 'vivo',
                'title' => 'Vivo',
                'sections' => $this->buildSectionsForKeys([
                    'android-vivo-lcd',
                    'android-vivo-battery',
                ]),
            ],
            [
                'key' => 'asus',
                'title' => 'Asus',
                'series' => [
                    [
                        'key' => 'asus-zenfone',
                        'title' => 'Asus Zenfone',
                        'sections' => $this->buildSectionsForKeys([
                            'android-asus-zenfone-lcd',
                            'android-asus-zenfone-battery',
                        ]),
                    ],
                    [
                        'key' => 'asus-rog',
                        'title' => 'Asus ROG',
                        'sections' => $this->buildSectionsForKeys([
                            'android-asus-rog-lcd',
                            'android-asus-rog-battery',
                            'android-asus-rog-backglass',
                        ]),
                    ],
                ],
            ],
            [
                'key' => 'google-pixel',
                'title' => 'Google Pixel',
                'sections' => $this->buildSectionsForKeys([
                    'android-google-pixel-lcd',
                    'android-google-pixel-battery',
                ]),
            ],
            [
                'key' => 'itel',
                'title' => 'Itel',
                'sections' => $this->buildSectionsForKeys([
                    'android-itel-lcd',
                    'android-itel-battery',
                ]),
            ],
            [
                'key' => 'tecno',
                'title' => 'Tecno',
                'sections' => $this->buildSectionsForKeys([
                    'android-tecno-lcd',
                    'android-tecno-battery',
                ]),
            ],
            [
                'key' => 'huawei',
                'title' => 'Huawei',
                'series' => [
                    [
                        'key' => 'huawei-p-nova',
                        'title' => 'P and Nova Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-huawei-p-nova-lcd',
                            'android-huawei-p-nova-battery',
                        ]),
                    ],
                    [
                        'key' => 'huawei-y',
                        'title' => 'Y Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-huawei-y-lcd',
                            'android-huawei-y-battery',
                        ]),
                    ],
                    [
                        'key' => 'huawei-matebook-matepad',
                        'title' => 'Matebook and Matepad',
                        'sections' => $this->buildSectionsForKeys([
                            'android-huawei-matebook-matepad-lcd',
                            'android-huawei-matebook-matepad-battery',
                        ]),
                    ],
                    [
                        'key' => 'huawei-honor',
                        'title' => 'Honor Series',
                        'sections' => $this->buildSectionsForKeys([
                            'android-huawei-honor-lcd',
                            'android-huawei-honor-battery',
                        ]),
                    ],
                    [
                        'key' => 'huawei-mate',
                        'title' => 'Huawei Mate',
                        'sections' => $this->buildSectionsForKeys([
                            'android-huawei-mate-lcd',
                            'android-huawei-mate-battery',
                        ]),
                    ],
                ],
            ],
        ];
    }
}
