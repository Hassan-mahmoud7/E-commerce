<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageManger
{
    public function uploadImages($images, $model , $disk)
    {
        foreach ($images as $image) {
            $file_name = $this->generateImageName($image);
            $this->storeImageInLocal($image, '/', $file_name, $disk);
            $model->images()->create(['file_name' => $file_name]);
        }
    }
    // public static function deleteImages($images)
    // {
    //     if ($images->count() > 0) {
    //         foreach ($images as $image) {
    //             self::deleteImageFromLocal($image->path);
    //             $image->delete();
    //         }
    //     }
    // }

    public function uploadSingleImage($path, $image, $disk)
    {
        $file_name = $this->generateImageName($image);
        $this->storeImageInLocal($image, $path, $file_name, $disk);
        return $file_name;
    }
    public function generateImageName($image)
    {
        $file = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
        return $file;
    }
    public  function storeImageInLocal($image, $path, $fileName, $disk)
    {
        $path = $image->storeAs($path, $fileName, ['disk' => $disk]);
        return $path;
    }
    public function deleteImageFromLocal($images_path ,$disk = null) :void
    {
        if (File::exists(public_path($images_path))) {
            File::delete(public_path($images_path));
        }
        // Another solution
        // if (Storage::disk($disk.$images_path)->exists($images_path)) {
        //     Storage::disk($disk.$images_path)->delete($images_path);
        // }
    }
}
