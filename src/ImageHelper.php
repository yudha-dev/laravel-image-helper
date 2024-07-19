<?php

namespace Yudhadev\LaravelImageHelper;

use Illuminate\Http\UploadedFile;

class ImageHelper
{
    public static function upload(UploadedFile $file, $path)
    {
        // Membuat direktori jika belum ada
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }

        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $imageName);

        return $imageName;
    }

    public static function deleteImage($imageName, $path)
    {
        $imagePath = public_path($path . '/' . $imageName);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
