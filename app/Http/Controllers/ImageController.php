<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Imagick\Driver;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $imageRequest = $request->file('file');

        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        // read image from filesystem
        $image = $manager->read( $imageRequest );

        $image = $image->resize(1000, 1000);

        $imageName = Str::uuid() . '.jpg';

        $image->toJpeg()->save(public_path() . '/' .'uploads/' .$imageName);

        return response()->json(['image' => $imageName]);
    }
}
