<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::orderBy('created_at' , 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }
}