<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Services\NSFWDetect\Facades\NSFWDetect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TestController extends Controller
{
    public function parseImageByUrl(Request $request)
    {

        $url = $request->url;
        $data =  NSFWDetect::parseImageByUrl($url);

        return $data;

    }

    public function parseVideoByFile(Request $request)
    {
        $path = $request->file('file')->store('public/files');
        $file_local_path = asset(Storage::url($path));
        $data = NSFWDetect::parseVideoByFile($file_local_path);

        return $data;

    }
}
