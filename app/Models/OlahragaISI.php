<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlahragaISI extends Model
{
    use HasFactory;

    protected $table = "olahragaISI";

protected $fillable = ['id','title', 'image_olahraga'];

public function getRouteKeyName()
    {
        return 'id';
    }
}
