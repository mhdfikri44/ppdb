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

        return view('admin.pages.pengaturan', compact('settings'));
    }

    public function update(Request $request)
    {
        Setting::set('ppdb_open', (bool) $request->input('ppdb_open', 0));
        Setting::set('final_result_published', (bool) $request->input('final_result_published', 0));

        return response()->json([
            'message' => 'Pengaturan berhasil diperbarui'
        ]);
    }
}
