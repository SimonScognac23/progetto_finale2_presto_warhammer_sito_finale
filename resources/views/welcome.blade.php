<x-layout>
   @if (session()->has('message'))
<div class="alert alert-success text-center shadow rounded w-50">
    {{ session('message') }}
</div>
@endif


<!--
Demo Container per visualizzare il form
<div class="demo-container mb-2">
   Form di ricerca Imperial
   <div class="nav-item imperial-search-container">
       <form class="search-form imperial-search-form" role="search" action="{{ route('article.search') }}" method="GET">
           <div class="input-group imperial-input-group">
               Decorazione sinistra
               <div class="search-decoration-left">
                   <i class="fas fa-cog decoration-icon"></i>
               </div>
                               
               Campo di input
               <input type="search"
                       name="query"
                       class="form-control search-input imperial-search-input"
                       placeholder="Archivio"
                       aria-label="Imperial Search"
                      autocomplete="off">
                               
               Pulsante di ricerca
               <button type="submit"
                        class="btn search-btn imperial-search-btn"
                        id="imperial-search-addon">
                   <span class="btn-icon">
                       <i class="fas fa-search"></i>
                   </span>
                   <span class="btn-text">Cerca</span>
                   <span class="btn-glow"></span>
               </button>
           </div>
       </form>
   </div>
</div>
-->

@if (session()->has('errorMessage'))
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger text-center shadow rounded">
                    {{ session('errorMessage') }}
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container-fluid text-center position-relative mt-2" style="background-image: url('https://cdn.wccftech.com/wp-content/uploads/2023/05/WCCFwarhammer40kspacemarine2-728x410.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
   <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>             
   <div class="row vh-100 justify-content-center align-items-center position-relative">                     
       <div class="col-12">                             
           <h1 class="display-1 text-white fw-bold" style="text-shadow: 3px 3px 6px rgba(0,0,0,0.8);">Warhammer 40k</h1>                             
           <div class="my-3">                                     
               @auth                                             
                   <a class="btn btn-light btn-lg shadow" href="{{ route('create.article') }}">Pubblica un articolo</a>                                     
               @endauth                             
           </div>                     
       </div>             
   </div>      
</div>

<div class="row height-custom justify-content-center align-items-center py-5">
    @forelse ($articles as $article)
        <div class="col-12 col-md-3">
            <x-card :article="$article" />
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">
                Non sono ancora stati creati articoli
            </h3>
        </div>
    @endforelse
</div>
</x-layout>