<x-layout>
   <div class="container">
       <div class="row py-5 justify-content-center align-items-center text-center">
           <div class="col-12 pt-5">
               <h1 class="display-2 display-4-sm text-white">{{ __('ui.articles_category') }}: <span
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
                      {{ __('ui.no_articles_category') }}
                   </h3>
                   @auth
                       <a class="btn btn-dark my-5" href="{{route('create.article')}}">{{ __('ui.publish_article') }}</a>
                   @endauth
               </div>
           @endforelse
       </div>
   </div>
</x-layout>