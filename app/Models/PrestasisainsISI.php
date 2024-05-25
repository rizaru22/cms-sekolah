<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasisainsISI extends Model
{
    use HasFactory;
    
    protected $table = "prestasisainsISI";

    protected $fillable = ['id','image_lomba','nama_lomba','tingkat','tanggal_pelaksanaan','peringkat','nama_peserta','nama_pembimbing'];
}
