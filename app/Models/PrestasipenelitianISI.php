<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasipenelitianISI extends Model
{
    use HasFactory;

    protected $table = "prestasipenelitianISI";

    protected $fillable = ['id','image_lomba','nama_lomba','tingkat','tanggal_pelaksanaan','peringkat','nama_peserta','nama_pembimbing'];
}
