<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Http\Requests\Media\StoreMediaRequest;
use App\Models\FakeModel;
use App\Service\Responser;
use Illuminate\Http\Request;

class StoreMedia extends Controller
{
    public function __invoke(StoreMediaRequest $request)
{
    // دریافت یا ایجاد fakeModel بر اساس batch_id
    $fakeModel = FakeModel::firstOrCreate(['batch_id' => $request->input('batch_id')]);

    // افزودن رسانه به fakeModel
    $media = $fakeModel->addMedia($request->file('file'))
        ->addCustomHeaders(['ACL' => 'public-read'])
        // تنظیم batch_id به عنوان custom property در رسانه
        ->withCustomProperties(['batch_id' => $request->input('batch_id')])
        ->toMediaCollection('temp_medias');

    return response()->json(Responser::success(
        'فایل با موفقیت بارگذاری گردید',
        'ذخیره فایل',
        ['id' => $media->id, 'url' => $media->getUrl()]
    ));
}

}
