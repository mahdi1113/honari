<?php

namespace App\Service;

use App\Models\FakeModel;
use DB;
use Log;

class MediaHelper
{
    /**
     * متد عمومی برای انتقال رسانه‌ها به مدل اصلی
     *
     * @param $model
     * @param string $batchIdKey
     * @param string $mediaCollection
     * @param string $destinationCollection
     * @param string $storageDisk
     * @return void
     */
    private static function moveMediaWithBatchId($model, $batchIdKey, $mediaCollection, $destinationCollection)
    {

        $rules = [
            $batchIdKey => ($batchIdKey === 'file_batch_id' || 'video_batch_id') ? 'nullable' : 'nullable|array',
        ];

        $request = request()->validate($rules);

        $batchIds = is_array($request[$batchIdKey]) ? $request[$batchIdKey] : [$request[$batchIdKey]];
        $fakeModels = FakeModel::whereIn('batch_id', $batchIds)->get();

        foreach ($fakeModels as $fakeModel) {
            foreach ($fakeModel->getMedia($mediaCollection) as $media) {
                $batchId = $fakeModel->batch_id;
                $media->setCustomProperty('batch_id', $batchId);
                $media->save();

                $media->copy($model, $destinationCollection);
                DB::table('media')->where('id', $media->id)->delete();

            }
            $fakeModel->delete();
        }
    }

    /**
     * انتقال فایل‌ها به مدل اصلی
     *
     * @param $model
     * @return void
     */
    public static function moveMediaTo($model)
    {
        self::moveMediaWithBatchId($model, 'file_batch_id', 'temp_medias', 'files');
    }

    /**
     * انتقال تصاویر TinyMCE به مدل اصلی
     *
     * @param $model
     * @return void
     */
    public static function moveTinyMCEMediaTo($model)
    {
        self::moveMediaWithBatchId($model, 'tinymce_batch_id', 'temp_medias', 'tinymce_images');
    }

    /**
     * انتقال ویدیوها به مدل اصلی
     *
     * @param $model
     * @return void
     */
    public static function moveVideoTo($model)
    {
        self::moveMediaWithBatchId($model, 'video_batch_id', 'temp_video', 'videos');
    }
}
