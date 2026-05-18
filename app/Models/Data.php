<?php
// app/Models/Data.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'link',
        'kategori',
        'date',
        'gambar',
        'id_unik',
        'password'
    ];
}
