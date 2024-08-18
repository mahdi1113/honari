<?php

namespace App\Service;

use App\Models\FakeModel;

class MediaHelper
{
    public static function moveMediaTo( $model )
    {
        request()->validate( [
            'file_batch_id' => 'nullable|string' ,
        ] );

        if ( $fakeModel = FakeModel::where( 'batch_id' , request( 'file_batch_id' ) )->first() ) {
            foreach ( $fakeModel->getMedia( 'temp_medias' ) as $media ) {
                $media->move( $model , 'files' );
            }
            $fakeModel->delete();
        }
    }
}
