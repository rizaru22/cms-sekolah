<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function head()
    {
        return $this->hasOne(Teacher::class, 'id', 'head_of_major_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'id','image','image_major','logo_major','name','slug','description','head_of_major_id','body','image_carousel'
       ];

       public function majorImages()
    {
        return $this->hasMany(ImageJurusan::class);
    }

}
