<?php

namespace Tests\Feature;

use App\Support\PricelistData;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PricelistRenderingLineBreakTest extends TestCase
{
    public function test_pricelist_table_renders_line_breaks_from_imported_cells(): void
    {
        Storage::fake('local');

        PricelistData::put('lcd', [
            'headers' => [
                [
                    'title' => 'Garansi',
                    'subtitle' => "Original\nApple 12 Bulan",
                ],
                [
                    'title' => 'Model',
                    'subtitle' => '',
                ],
            ],
            'rows' => [
                [
                    "Line 1\nLine 2",
                    'iPhone 12',
                ],
            ],
        ]);

        $response = $this->get(route('pricelist', absolute: false));

        $response->assertOk();
        $response->assertSee('Original<br', false);
        $response->assertSee('Line 1<br', false);
    }
}
