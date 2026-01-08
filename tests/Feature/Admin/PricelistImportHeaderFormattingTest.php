<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Support\PricelistData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PricelistImportHeaderFormattingTest extends TestCase
{
    use RefreshDatabase;

    public function test_html_import_preserves_multiline_header_as_title_and_subtitle(): void
    {
        Storage::fake('local');

        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $html = <<<'HTML'
        <table>
            <tr>
                <th>Garansi Original<br>Apple 12 Bulan</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td>iPhone 12</td>
                <td>100000</td>
            </tr>
        </table>
        HTML;

        $file = UploadedFile::fake()->createWithContent('pricelist.html', $html);

        $response = $this
            ->actingAs($user)
            ->post(route('admin.pricelist.import', ['section' => 'lcd'], absolute: false), [
                'pricelist_file' => $file,
            ]);

        $response->assertRedirect(route('admin.pricelist.index', absolute: false));

        $data = PricelistData::get('lcd');
        $this->assertIsArray($data);
        $this->assertSame('Garansi Original', $data['headers'][0]['title'] ?? null);
        $this->assertSame('Apple 12 Bulan', $data['headers'][0]['subtitle'] ?? null);
    }

    public function test_json_import_splits_multiline_header_string(): void
    {
        Storage::fake('local');

        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $payload = [
            'headers' => [
                "Garansi Original\nApple 12 Bulan",
                'Harga',
            ],
            'rows' => [
                ['iPhone 12', '100000'],
            ],
        ];

        $file = UploadedFile::fake()->createWithContent('pricelist.json', json_encode($payload, JSON_THROW_ON_ERROR));

        $response = $this
            ->actingAs($user)
            ->post(route('admin.pricelist.import', ['section' => 'lcd'], absolute: false), [
                'pricelist_file' => $file,
            ]);

        $response->assertRedirect(route('admin.pricelist.index', absolute: false));

        $data = PricelistData::get('lcd');
        $this->assertIsArray($data);
        $this->assertSame('Garansi Original', $data['headers'][0]['title'] ?? null);
        $this->assertSame('Apple 12 Bulan', $data['headers'][0]['subtitle'] ?? null);
    }

    public function test_json_import_preserves_additional_header_line_breaks_in_subtitle(): void
    {
        Storage::fake('local');

        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $payload = [
            'headers' => [
                "Garansi Original\nApple 12 Bulan\nService Center",
                'Harga',
            ],
            'rows' => [
                ['iPhone 12', '100000'],
            ],
        ];

        $file = UploadedFile::fake()->createWithContent('pricelist.json', json_encode($payload, JSON_THROW_ON_ERROR));

        $response = $this
            ->actingAs($user)
            ->post(route('admin.pricelist.import', ['section' => 'lcd'], absolute: false), [
                'pricelist_file' => $file,
            ]);

        $response->assertRedirect(route('admin.pricelist.index', absolute: false));

        $data = PricelistData::get('lcd');
        $this->assertIsArray($data);
        $this->assertSame('Garansi Original', $data['headers'][0]['title'] ?? null);
        $this->assertSame("Apple 12 Bulan\nService Center", $data['headers'][0]['subtitle'] ?? null);
    }
}
