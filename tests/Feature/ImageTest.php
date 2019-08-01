<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use DB;
use \Illuminate\Http\Response;
use App\Services\StorageService;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    /**
    * @test
    */
    public function canDeleteImageFromS3()
    {
        $disk = Storage::disk('s3');
        $image = UploadedFile::fake()->image('test.jpg');
        $imageUrl = StorageService::saveImageReturnUrl($image);
        $imageName = urldecode(pathinfo($imageUrl)['basename']);
        $isStored = $disk->exists($imageName);
        StorageService::deleteImage($imageUrl);
        $isDeleted = (! $disk->exists($imageName));
        $this->assertTrue($isStored&&$isDeleted);
    }

}