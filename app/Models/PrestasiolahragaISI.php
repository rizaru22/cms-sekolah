<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiolahragaISI extends Model
{
    use HasFactory;

    protected $table = "prestasiolahragaISI";

    protected $fillable = ['id','image_lomba','nama_lomba','tingkat','tanggal_pelaksanaan','peringkat','nama_peserta','nama_pembimbing'];
}
