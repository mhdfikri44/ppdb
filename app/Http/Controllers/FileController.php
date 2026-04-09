<?php

namespace App\Http\Controllers;


class FileController extends Controller
{
    public function show($path)
    {
        $path = storage_path('app/private/' . $path);
        if (!file_exists($path)) abort(404);
        return response()->file($path);
    }
}
