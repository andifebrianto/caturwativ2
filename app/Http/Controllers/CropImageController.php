<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaroselThumbnail;
use App\Models\Category;
use App\Models\Profil;

class CropImageController extends Controller
{
    public function index()
    {
        return view('crop-image-upload', [
            'title' => 'Carosel | Upload',
            'profil' => Profil::all(),
            'categories' => Category::all(),
            'carosels' => CaroselThumbnail::latest()->limit(4)->get()
        ]);
    }

    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('carosel_thumbnails/');

        // Delete old image
        // $oldImage = $request->old_image;
        // if (!empty($oldImage)) {
        //     $filePathDelete = public_path('carosel_thumbnails/' . $oldImage);
        //     if (file_exists($filePathDelete)) {
        //         unlink($filePathDelete);
        //     }
        //     CaroselThumbnail::destroy($request->old_image_id);
        // }


        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        $saveFile = new CaroselThumbnail;
        $saveFile->name = $imageName;
        $saveFile->save();

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }
}
