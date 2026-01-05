<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryRepairUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_upload_gallery_repair_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this
            ->actingAs($user)
            ->postJson(route('admin.gallery.store', absolute: false), [
                'images' => [UploadedFile::fake()->image('repair.jpg')],
            ]);

        $response->assertOk();

        $files = Storage::disk('public')->files('gallery-repair');
        $this->assertCount(1, $files);
        $this->assertStringEndsWith('.jpg', $files[0]);
    }
}
