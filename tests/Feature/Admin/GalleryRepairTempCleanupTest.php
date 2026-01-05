<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryRepairTempCleanupTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_clear_temp_uploads(): void
    {
        Storage::fake('local');

        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $uploadResponse = $this
            ->actingAs($user)
            ->postJson(route('admin.gallery.temp', absolute: false), [
                'images' => [UploadedFile::fake()->image('repair.jpg')],
            ]);

        $uploadResponse->assertOk();

        $token = $uploadResponse->json('items.0.token');
        $this->assertIsString($token);
        $this->assertNotSame('', $token);

        $expectedPath = 'tmp/gallery-repair/'.$token.'.jpg';
        $this->assertTrue(Storage::disk('local')->exists($expectedPath));

        $clearResponse = $this
            ->actingAs($user)
            ->postJson(route('admin.gallery.temp.clear', absolute: false), [
                'tokens' => [$token],
            ]);

        $clearResponse->assertOk();
        $this->assertFalse(Storage::disk('local')->exists($expectedPath));
    }
}
