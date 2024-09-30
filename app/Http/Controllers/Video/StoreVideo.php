<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Models\FakeModel;
use App\Service\Responser;
use Illuminate\Http\Request;
use Log;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Illuminate\Http\UploadedFile;

class StoreVideo extends Controller
{
    public function __invoke(Request $request)
{
    $receiver = new FileReceiver("video", $request, HandlerFactory::classFromRequest($request));

    if (!$receiver->isUploaded()) {
        throw new UploadMissingFileException();
    }

    $save = $receiver->receive();

    if ($save->isFinished()) {
        return $this->saveFileToMediaLibrary($save->getFile(), $request);
    }

    $handler = $save->handler();
    return response()->json([
        'done' => $handler->getPercentageDone(),
    ]);
}
    /**
     * ذخیره فایل در Media Library بعد از آپلود کامل
     *
     * @param UploadedFile $file
     * @param Request $request
     * @return JsonResponse
     */
    protected function saveFileToMediaLibrary(UploadedFile $file, Request $request)
    {
        // ذخیره اطلاعات مربوط به ویدیو فقط زمانی که آپلود تمام شده باشد
        if ($request->input('totalChunks') == $request->input('chunkNumber')) {
            // پیدا کردن یا ایجاد FakeModel برای نگهداری اطلاعات مربوط به ویدیو
            $fakeModel = FakeModel::firstOrCreate(['batch_id' => $request->input('batch_id')]);

            // اضافه کردن فایل به Media Library (temp_video collection)
            $video = $fakeModel->addMedia($file)
                ->withCustomProperties(['batch_id' => $request->input('batch_id')])
                ->toMediaCollection('temp_video');

            // نیازی به unlink نیست چون فایل قبلاً به مسیر جدید منتقل شده است

            $fullUrl = $video->getUrl();
            $relativeUrl = str_replace("http://localhost:8000/upload/images/", "", $fullUrl);

            // برگرداندن پاسخ با موفقیت آپلود
            return response()->json(Responser::success(
                'فایل با موفقیت بارگزاری گردید',
                'ذخیره فایل',
                ['id' => $video->id, 'url' => $relativeUrl]
            ));
        }

        // اگر آپلود کامل نشده است، هیچ عملیات ذخیره‌سازی انجام نمی‌شود
        return response()->json([
            'status' => 'chunk uploaded'
        ]);
    }
}
