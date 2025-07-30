<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;



class RevisorController extends Controller
{
     public function index()
    {

        $article_to_check = Article::where('is_accepted', null)->first();
        return view ('revisor.index', compact('article_to_check'));

    }


     public function accept(Article $article)
    {

       $article->setAccepted(true);
       return redirect()
            ->back()
            ->with('message', "Hai accettato l'articolo $article->title");

    }


      public function reject(Article $article)
    {

       $article->setAccepted(false);
       return redirect()
            ->back()
            ->with('message', "Hai rifiutato l'articolo $article->title");

            //   Come vediamo la logica è uguale alla funzione precedente, 
            // con la differenza che stiamo passando false come parametro alla funzione setAccepted() 

    }


    public function becomeRevisor(){

    Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    return redirect()->route('homepage')->with('message', 'Complimenti, Hai richiesto di diventare revisor');

}


public function makeRevisor(User $user)

{

    Artisan::call('app:make-user-revisor', ['email' => $user->email]);
    return redirect()->back();

    //Tramite la classe Artisan stiamo facendo partire il comando MakeUserRevisor creato precedentemente, 
    // a cui passiamo la mail dell'utente
 

}


}
