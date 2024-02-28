<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $fillable = ['name','visi','misi','image'];
    
            public function getvisiWithNewLine(): string
            {
                $texts = [];
                foreach (explode('<p>', $this->visi) as $text) {
                    if ($text)
                        $texts[] = $text;
                }
                return str_replace("</p>", "", join("\\n", $texts));
            }
            public function getmisiWithNewLine(): string
            {
                $texts = [];
                foreach (explode('<p>', $this->misi) as $text) {
                    if ($text)
                        $texts[] = $text;
                }
                return str_replace("</p>", "", join("\\n", $texts));
            }
}
