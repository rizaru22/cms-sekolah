<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiseniISI extends Model
{
    use HasFactory;

    protected $table = "prestasiseniISI";

    protected $fillable = ['id','image_lomba','nama_lomba','tingkat','tanggal_pelaksanaan','peringkat','nama_peserta','nama_pembimbing'];
}
