<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahSekolah extends Model
{
    use HasFactory;
 
    protected $fillable = ['name','sejarah','image'];
    
    public function getsejarahWithNewLine(): string
    {
        $texts = [];
        foreach (explode('<p>', $this->sejarah) as $text) {
            if ($text)
                $texts[] = $text;
        }
        return str_replace("</p>", "", join("\\n", $texts));
    }
}
