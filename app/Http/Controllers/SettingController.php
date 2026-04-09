<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = (object) [
            'ppdb_open' => Setting::get('ppdb_open'),
            'final_result_published' => Setting::get('final_result_published'),
        ];
        // dd($settings->ppdb_open);
        return view('admin.pages.pengaturan', compact('settings'));
    }

    public function update(Request $request)
    {
        Setting::set('ppdb_open', $request->has('ppdb_open'));
        Setting::set('final_result_published', $request->has('final_result_published'));

        return response()->json([
            'message' => 'Pengaturan berhasil diperbarui'
        ]);
    }
}
