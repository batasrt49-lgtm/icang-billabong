<?php
// app/Http/Controllers/DataController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    public function show($id)
    {
        $data = Data::where('id_unik', $id)->firstOrFail();

        return view('view', compact('data'));
    }

    public function cekPassword(Request $request)
    {
        $data = Data::where('id_unik', $request->id)->first();

        if (!$data) {
            return response()->json([
                'status' => 'error'
            ]);
        }

        if ($data->password === $request->password) {
            return response()->json([
                'status' => 'success',
                'link' => $data->link
            ]);
        }

        return response()->json([
            'status' => 'error'
        ]);
    }
}