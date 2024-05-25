<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageJurusan extends Model
{
    use HasFactory;

    protected $table = 'image_jurusans';
    protected $fillable = ['image_carousel', 'major_id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    
    
    // public function getsejarahWithNewLine(): string
    // {
    //     $texts = [];
    //     foreach (explode('<p>', $this->sejarah) as $text) {
    //         if ($text)
    //             $texts[] = $text;
    //     }
    //     return str_replace("</p>", "", join("\\n", $texts));
    // }
}
