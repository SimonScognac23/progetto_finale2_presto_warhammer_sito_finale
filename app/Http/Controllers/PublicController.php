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
    $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
    return view('welcome', compact('articles'));
}
}