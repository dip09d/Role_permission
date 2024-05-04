<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait ImageUploadTrait
{
    public function uploadImage($image, $path)
    {

        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        Storage::putFileAs($path, $image, $filename);
        return $filename;
    }
}
