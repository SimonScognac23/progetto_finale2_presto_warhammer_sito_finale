<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
   public function homepage()
   {
       return view('welcome');
   }
}