<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StreamVideoController extends Controller
{
    public function stream(Request $request)
    {
        $filename = $request->filename;
        // مسیر فایل ویدیویی در storage
        $path = public_path('upload/images/' . $filename);

        if (!File::exists($path)) {
            return response()->json(['message' => 'File not found','path' => $path], 404);
        }

        $fileSize = filesize($path);
        $mimeType = mime_content_type($path);

        $start = 0;
        $end = $fileSize - 1;

        // بررسی اینکه آیا کلاینت درخواست byte-range داده است
        if (request()->hasHeader('Range')) {
            $range = request()->header('Range');
            [$start, $end] = explode('-', str_replace('bytes=', '', $range));
            $end = $end === '' ? $fileSize - 1 : $end;
        }

        $length = $end - $start + 1;

        $headers = [
            'Content-Type' => $mimeType,
            'Content-Length' => $length,
            'Content-Range' => "bytes $start-$end/$fileSize",
            'Accept-Ranges' => 'bytes',
        ];

        $file = fopen($path, 'rb');
        fseek($file, $start);

        return response()->stream(function () use ($file, $length) {
            echo fread($file, $length);
            fclose($file);
        }, 206, $headers); // استفاده از وضعیت 206 برای درخواست‌های byte-range
    }
}
