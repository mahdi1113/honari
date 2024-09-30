<?php

namespace App\Providers;

use Aws\S3\S3Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        File::macro('streamUpload', function($path, $fileName, $file, $overWrite = true) {
            // تنظیم اتصال به Arvan S3
            set_time_limit(300);
            $resource = fopen($file->getRealPath(), 'r+'); // باز کردن فایل برای استریم
            $config = Config::get('filesystems.disks.arvan-s3'); // تنظیمات Arvan S3

            $client = new S3Client([
                'credentials' => [
                    'key'    => $config['key'],
                    'secret' => $config['secret'],
                ],
                'region' => $config['region'],
                'version' => 'latest',
                'endpoint' => $config['endpoint'], // استفاده از endpoint مخصوص Arvan
            ]);

            // ایجاد آداپتور S3
            $adapter = new AwsS3V3Adapter($client, $config['bucket'], $path);
            $filesystem = new Filesystem($adapter);

            // آپلود به صورت استریم
            return $overWrite
                    ? $filesystem->writeStream($fileName, $resource)
                    : $filesystem->writeStream($fileName, $resource);
        });
    }
}
