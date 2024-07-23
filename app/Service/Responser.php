<?php

namespace App\Service;

class Responser
{
    public static function success($content = null, $title = null, $data = []): array
    {
        $content = $content ? : trans('messages.success_content');
        $title = $title ? : trans('messages.success_title');
        return [
            'message' => [
                'title' => $title,
                'content' => $content,
            ],
            'data' => $data,
        ];
    }

    public static function error( array $error = null, $data = []): array
    {
        $error = ! empty( $error ) ? $error : [ trans( 'messages.error_title' ) => trans( 'messages.error_content' ) ];
        return [
            'data' => $data ,
            'errors' => $error
        ];
    }
}
