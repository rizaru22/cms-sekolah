<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GurupemanduISI extends Model
{
    use HasFactory;

    protected $table = "gurupemanduISI";

    protected $fillable = ['id','name','pemandu', 'image'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
