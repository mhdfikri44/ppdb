<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function registerForm()
    {
        if (!Setting::get('ppdb_open')) {
            return redirect()->route('landingPage');
        }
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:students,nisn|digits:10',
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:100',
            'konfirmasi_password' => 'required|same:password',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $student = Student::create([
                    'nisn' => $request->nisn,
                    'nama_lengkap' => ucwords(strtolower($request->nama_lengkap)),
                    'password' => Hash::make($request->password)
                ]);

                $student->guardian()->create([]);
                $student->registration()->create([]);
            });

            return redirect()->route('student.login.form')
                ->with('sukses', 'Pendaftaran berhasil, silahkan login.');
        } catch (\Throwable $e) {

            return back()->with('error', 'Terjadi kesalahan saat mendaftar.');
        }

        return redirect()->route('student.login.form')->with('sukses', 'Pendaftaran berhasil, silahkan login.');
    }

    public function loginForm()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:students,nisn|digits:10',
            'password' => 'required|string|min:8|max:100',
        ]);

        $credentials = $request->only('nisn', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('student.index');
        }

        return back()->with('error', 'Password salah, silahkan coba lagi.');
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/login');
    }
}
