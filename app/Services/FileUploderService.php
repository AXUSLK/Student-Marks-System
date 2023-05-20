<?php

namespace App\Services;

class FileUploderService
{
    public function uploadStorageFile($fileData, $parent, $child,)
    {
        try {
            $file_name = time() . rand() . '.' . $fileData->getClientOriginalExtension();
            $relative =   DIRECTORY_SEPARATOR . $parent . DIRECTORY_SEPARATOR . $child . DIRECTORY_SEPARATOR;
            $directory = storage_path(DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . $relative);
            $fileData->move($directory, $file_name);
            $file = $relative . $file_name;
        } catch (\Throwable $th) {
            abort('404');
        }

        return $file;
    }
}
