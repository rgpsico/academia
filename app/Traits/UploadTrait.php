<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Http\Concerns\InteractsWithInput;

trait UploadTrait
{
    use InteractsWithInput;

    public function multipleFilesUploads(array $files, string $folder, string $column = 'image')
    {
        $uploadedFile = [];

        foreach ($files as $file) {
            $uploadedFiles[] = [$column => $this->upload($file, $folder)];
        }

        return $uploadedFile;
    }

    public function upload(UploadedFile $file, string $folder)
    {
        $extension = $file->extension();
        $name = uniqid(date('HisYmd'));
        $nameFile = "{$name}.{$extension}";
        return $upload = $file->store($folder, 'public');
    }
}
