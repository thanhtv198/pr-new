<?php

namespace App\Traits;


trait UploadFileTrait
{
    public function uploadFile($file)
    {
        $name = '';
        if (!is_null($file)) {
            $name = str_random(6) . '_' . $file->getClientOriginalName();

            $file->move(config('model.user.upload'), $name);
        }

        return $name;
    }
}