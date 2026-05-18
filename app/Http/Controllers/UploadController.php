<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class UploadController extends Controller
{
    public function store(Request $request)
{
    try {

        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:100000',
            'nama' => 'required',
            'link' => 'required',
            'kategori' => 'required',
        ]);

        $id_unik = \Illuminate\Support\Str::random(16);

        $targetDir = public_path('image');

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $file = $request->file('gambar');

        if (!$file->isValid()) {

            dd([
                'error_code' => $file->getError(),
                'error_message' => $file->getErrorMessage(),
            ]);
        }

        if (!$file) {
            return back()->with('error', 'File gambar tidak ditemukan');
        }

        $ext = strtolower($file->getClientOriginalExtension());

        $newName = time() . '_' . rand(1000,9999) . '.' . $ext;

        $destination = $targetDir . '/' . $newName;

        // Upload gambar
        if (!move_uploaded_file($file->getPathname(), $destination)) {
            return back()->with('error', 'Gagal upload gambar');
        }

        // Simpan database
        $insert = Data::create([
            'nama' => $request->nama,
            'link' => $request->link,
            'kategori' => $request->kategori,
            'date' => now(),
            'gambar' => $newName,
            'id_unik' => $id_unik,
            'password' => $request->password ?? ''
        ]);

        if (!$insert) {
            return back()->with('error', 'Data gagal masuk database');
        }

        return back()->with('success', 'Upload berhasil');

    } catch (\Exception $e) {

        return back()->with(
            'error',
            $e->getMessage()
        );
    }
}
}