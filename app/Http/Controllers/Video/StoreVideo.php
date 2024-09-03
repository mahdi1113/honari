<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Models\FakeModel;
use App\Service\Responser;
use Illuminate\Http\Request;

class StoreVideo extends Controller
{
    public function __invoke(StoreVideoRequest $request)
    {
        $fakeModel = FakeModel::firstOrCreate(['batch_id' => $request->input('batch_id')]);
        $video = $fakeModel->addMedia($request->file('video'))->toMediaCollection('temp_video');

        return response()->json( Responser::success(
            'فایل با موفقیت بارگزاری گردید',
            'ذخیره فایل',
            ['id' => $video->id, 'url' => $video->getUrl()]
        ) );
    }
}
