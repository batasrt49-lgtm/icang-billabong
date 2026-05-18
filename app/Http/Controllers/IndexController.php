<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $items = DB::table('data')
            ->orderBy('kategori')
            ->orderByDesc('date')
            ->get();

        $dataKategori = $items->groupBy('kategori');

        return view('index', compact('dataKategori'));
    }
}