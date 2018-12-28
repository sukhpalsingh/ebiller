<?php

namespace App\Services;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileService {

    /**
     * Save file record
     * @param Request $request
     * @param String  $category
     * @return mixed
     */
    public function save(Request $request, $category = 'bill')
    {
        if ($request->hasFile('file')) {
            $path = Storage::put('files', $request->file('file'), 'private');
            $file = new File();
            $file->category = $category;
            $file->path = $path;
            $file->save();
            return $file->id;
        }

        return null;
    }
}
