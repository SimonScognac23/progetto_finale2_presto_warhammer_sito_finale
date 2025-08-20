<x-layout>
   <!-- Header Sezione con Atmosfera Warhammer -->
   <div class="warhammer-header">
       <div class="header-overlay"></div>
       <div class="container-fluid">
           <div class="row height-custom justify-content-center align-items-center text-center">
               <div class="col-12">
                   <div class="header-content">
                       <div class="imperial-aquila">
                           <i class="fas fa-chess-rook"></i>
                       </div>
                       <h1 class="display-1 imperial-title">
                           <span class="title-primary">{{ __('ui.benvenuto_nel') }}</span>
                           <span class="title-accent">{{ __('ui.catalogo') }} Warhammer 40k</span>
                       </h1>
                       <p class="imperial-subtitle">
                           <i class="fas fa-skull me-2"></i>
                           The Collegiate Astrolex
                           <i class="fas fa-skull ms-2"></i>
                       </p>
                       
                       <!-- Form di ricerca Imperial -->
                       <div class="nav-item imperial-search-container mt-4">
                           <form class="search-form imperial-search-form" role="search" action="{{ route('article.search') }}" method="GET">
                               <div class="input-group imperial-input-group">
                                   <!-- Decorazione sinistra -->
                                   <div class="search-decoration-left">
                                       <i class="fas fa-cog decoration-icon"></i>
                                   </div>
                                   
                                   <!-- Campo di input -->
                                   <input type="search" 
                                          name="query" 
                                          class="form-control search-input imperial-search-input" 
                                          placeholder="{{ __('ui.archivio') }}" 
                                          aria-label="Imperial Search"
                                          autocomplete="off">
                                   
                                   <!-- Pulsante di ricerca -->
                                   <button type="submit" 
                                           class="btn search-btn imperial-search-btn" 
                                           id="imperial-search-addon">
                                       <span class="btn-icon">
                                           <i class="fas fa-search"></i>
                                       </span>
                                       <span class="btn-text">Cerca</span>
                                       <span class="btn-glow"></span>
                                   </button>
                                   
                                   <!-- Decorazione destra 
                                   <div class="search-decoration-right">
                                       <i class="fas fa-skull decoration-icon"></i>
                                   </div>
                               </div>
-->
                               <!-- Indicatore di stato 
                               <div class="search-status-indicator">
                                   <div class="status-line"></div>
                                   <div class="status-text">Sistema di Ricerca Attivo</div>
                               </div>
-->
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!-- Sezione Articoli -->
   <div class="articles-battleground">
       <div class="container-fluid">
           <div class="row height-custom justify-content-center align-items-center py-5">
               @forelse ($articles as $article)
                   <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                       <div class="relic-card-wrapper">
                           <x-card :article="$article" class="relic-card" />
                       </div>
                   </div>
               @empty
                   <!-- Stato Vuoto con Tema Warhammer -->
                   <div class="col-12">
                       <div class="empty-vault">
                           <div class="empty-icon">
                               <i class="fas fa-exclamation-triangle"></i>
                           </div>
                           <h3 class="empty-title">
                               {{ __('ui.le_volte_imperiali_sono_vuote') }}
                           </h3>
                           <p class="empty-subtitle">
                              {{ __('ui.nessuna_reliquia_catalogata') }}
                               <br>
                               <em>{{ __('ui.per_imperatore_inizia_collezione') }}</em>
                           </p>
                           <div class="empty-decoration">
                               <i class="fas fa-cog me-2"></i>
                               <i class="fas fa-hammer"></i>
                               <i class="fas fa-cog ms-2"></i>
                           </div>
                       </div>
                   </div>
               @endforelse
           </div>
       </div>
   </div>

   <!-- Paginazione con Stile Imperiale 
   <div class="imperial-pagination-wrapper">
       <div class="container">
           <div class="d-flex justify-content-center">
               <div class="imperial-pagination">
                   {{ $articles->links() }}
               </div>
           </div>
       </div>
   </div>
-->
   <!-- Decorazioni di Sfondo -->
   <div class="background-decorations">
       <div class="decoration-gear decoration-gear-1">
           <i class="fas fa-cog"></i>
       </div>
       <div class="decoration-gear decoration-gear-2">
           <i class="fas fa-cog"></i>
       </div>
       <div class="decoration-gear decoration-gear-3">
           <i class="fas fa-cog"></i>
       </div>
   </div>

   <!-- Effetti Particelle -->
   <div class="imperial-particles"></div>
</x-layout>