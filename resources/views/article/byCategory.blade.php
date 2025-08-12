<x-layout>
   <div class="container">
       <div class="row py-5 justify-content-center align-items-center text-center">
           <div class="col-12 pt-5">
               <h1 class="display-2 display-4-sm text-white">Articoli della categoria <span
                   class="fst-italic fw-bold">{{ $category->name }}</span></h1>
           </div>
       </div>
       <div class="row height-custom justify-content-center align-items-center py-5">
           @forelse ($articles as $article)
               <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                   <x-card :article="$article" />
               </div>
           @empty
               <div class="text-white col-12 text-center">
                   <h3 class="h4 h3-md">
                       Non sono ancora stati creati articoli per questa categoria!
                   </h3>
                   @auth
                       <a class="btn btn-dark my-5" href="{{route('create.article')}}">Pubblica un articolo</a>
                   @endauth
               </div>
           @endforelse
       </div>
   </div>
</x-layout>