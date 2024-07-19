<?php

namespace Yudhadev\LaravelImageHelper;

class ImageHelper
{
    public static function upload($file, $path)
    {
        // Membuat direktori jika belum ada
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $imageName = uniqid() . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $file->move($path, $imageName);

        return $imageName;
    }

    public static function deleteImage($imagePath)
    {
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
