<?php

namespace App\Http\Controllers;
use App\Http\Middleware\HasMiddleware;
use App\Http\Middleware\Middleware;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }
}
