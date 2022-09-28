<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->imageUpload) {
            $path = $request->file('imageUpload')->store('tmp', 'public');
        }

        return $path;
    }
}
