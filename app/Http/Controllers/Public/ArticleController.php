<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        if (!$article->is_published) {
            return abort(404);
        }
    
        $article->increment('views', 1);
    
        $articleshare = \Share::page(
            url('/post'),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
    
        return $this->view('public.articles.show', [
            "title" => $article->title,
            "article" => $article,
            "articleshare" => $articleshare, // Mengirimkan variabel $articleshare ke tampilan
        ]);
    }
    

    // public function ShareWidget()
    // {
    //     $articleshare = \Share::page(
    //         url('/post'),
    //         'Your share text comes here',
    //     )
    //     ->facebook()
    //     ->twitter()
    //     ->linkedin()
    //     ->telegram()
    //     ->whatsapp()        
    //     ->reddit();
        
    //     return view('posts', compact('articleshare'));
    // }
}
