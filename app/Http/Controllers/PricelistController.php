<?php

namespace App\Http\Controllers;

use App\Support\PricelistData;
use Illuminate\View\View;

class PricelistController extends Controller
{
    public function show(): View
    {
        $priceTables = $this->tablesForDevice('iphone');

        return view('pricelist', [
            'priceTables' => $priceTables,
        ]);
    }

    public function showIpad(): View
    {
        $priceTables = $this->tablesForDevice('ipad');

        return view('pricelist-ipad', [
            'priceTables' => $priceTables,
        ]);
    }

    public function showMacbook(): View
    {
        $priceTables = $this->tablesForDevice('macbook');

        return view('pricelist-macbook', [
            'priceTables' => $priceTables,
        ]);
    }

    public function showIwatch(): View
    {
        $priceTables = $this->tablesForDevice('iwatch');

        return view('pricelist-iwatch', [
            'priceTables' => $priceTables,
        ]);
    }

    public function showAndroid(): View
    {
        $priceTables = $this->tablesForDevice('android');

        return view('pricelist-android', [
            'priceTables' => $priceTables,
        ]);
    }

    private function tablesForDevice(string $device): array
    {
        $priceTables = [];

        foreach (PricelistData::sectionsByDevice($device) as $key => $config) {
            $priceTables[$key] = PricelistData::get($key);
        }

        return $priceTables;
    }
}
