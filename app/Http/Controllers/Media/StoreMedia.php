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
        $fakeModel = FakeModel::firstOrCreate(['batch_id' => $request->input('batch_id')]);

        $media = $fakeModel->addMedia($request->file('file'))
            ->addCustomHeaders(['ACL' => 'public-read'])
            ->toMediaCollection('temp_medias', 'arvan-s3');

        return response()->json(Responser::success(
            'فایل با موفقیت بارگذاری گردید',
            'ذخیره فایل',
            ['id' => $media->id, 'url' => $media->getUrl()]
        ));

    }
}
