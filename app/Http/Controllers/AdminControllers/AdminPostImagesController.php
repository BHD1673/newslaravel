<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AdminPostImagesController extends Controller
{
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        if($image){
            Storage::delete('public/images/' . $image->path);
            $image->delete();
        }
    }
}
