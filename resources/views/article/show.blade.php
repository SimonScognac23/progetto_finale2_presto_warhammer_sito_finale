<!-- Layout principale per il dettaglio dell'articolo con tema Imperial -->
<x-layout>
    <!-- Container principale con sfondo Imperial scuro -->
    <div class="container-fluid bg-light py-5">
        <!-- Sezione header con titolo principale Imperial -->
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-12 text-center">
                    <!-- Titolo principale con styling Imperial dorato -->
                    <h1 class="display-4 display-md-3 display-lg-2 text-dark fw-bold mb-3">
                        {{ __('ui.dettaglio_articolo') }}
                    </h1>
                    
                    <!-- Sottotitolo con nome articolo in bianco -->
                    <h2 class="h3 h-md-2 text-muted text-break">
                        {{ $article->title }}
                    </h2>
                    
                    <!-- Separatore decorativo dorato -->
                    <hr class="w-25 mx-auto border-3 border-primary">
                </div>
            </div>
        </div>
        
        <!-- Container per la card principale Imperial -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <!-- Card per le immagini -->
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-4">
                        <!-- Container per il carousel con effetti Imperial -->
                        <div class="position-relative h-100">
                            @if ($article->images->count() > 0)
                                <!-- Carousel per multiple immagini con tema Imperial -->
                                <div id="articleCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                                    <div class="carousel-inner h-100">
                                        @foreach ($article->images as $key => $image)
                                            <div class="carousel-item h-100 @if ($loop->first) active @endif">
                                                <!-- Immagine con bordi dorati e effetti hover -->
                                                <img src="{{ $image->getUrl(400, 400) }}" 
                                                     class="d-block w-100 h-100 object-fit-cover"
                                                     alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}"
                                                     style="min-height: 300px;">
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                    <!-- Controlli del carousel con styling Imperial dorato -->
                                    @if ($article->images->count() > 1)
                                        <!-- Pulsante precedente con effetti Imperial -->
                                        <button class="carousel-control-prev" type="button" 
                                                data-bs-target="#articleCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" 
                                                  aria-hidden="true"></span>
                                            <span class="visually-hidden">Precedente</span>
                                        </button>
                                        
                                        <!-- Pulsante successivo con effetti Imperial -->
                                        <button class="carousel-control-next" type="button" 
                                                data-bs-target="#articleCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon bg-dark rounded-circle p-2" 
                                                  aria-hidden="true"></span>
                                            <span class="visually-hidden">Successivo</span>
                                        </button>
                                        
                                        <!-- Indicatori delle immagini con styling dorato -->
                                        <div class="carousel-indicators">
                                            @foreach ($article->images as $key => $image)
                                                <button type="button" data-bs-target="#articleCarousel" 
                                                        data-bs-slide-to="{{ $key }}" 
                                                        @if ($loop->first) class="active" @endif
                                                        aria-label="Immagine {{ $key + 1 }}">
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @else
                                <!-- Placeholder Imperial per immagini mancanti -->
                                <div class="d-flex align-items-center justify-content-center bg-light h-100" 
                                     style="min-height: 300px;">
                                    <div class="text-center text-muted">
                                        <!-- Icona placeholder per immagine mancante -->
                                        <i class="fas fa-image fa-3x fa-lg-2x mb-3"></i>
                                        <!-- Messaggio placeholder -->
                                        <p class="h5 h6-sm">Nessuna immagine disponibile</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Card per le informazioni -->
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <!-- Body della card con informazioni e colori Imperial -->
                        <div class="card-body d-flex flex-column justify-content-between p-3 p-md-4">
                            <!-- Sezione superiore - Titolo e dettagli Imperial -->
                            <div class="mb-3 mb-md-4">
                                <!-- Badge per categoria con styling Imperial dorato -->
                                <div class="mb-2 mb-md-3">
                                    <span class="badge bg-primary fs-6 fs-md-5 px-2 px-md-3 py-1 py-md-2">
                                        <i class="fas fa-tag me-1 me-md-2"></i>{{ __('ui.articolo') }}
                                    </span>
                                </div>
                                
                                <!-- Titolo articolo con colore dorato Imperial -->
                                <h3 class="card-title h3 h2-md fw-bold text-dark mb-2 mb-md-3 text-break">
                                    {{ $article->title }}
                                </h3>
                                
                                <!-- Prezzo evidenziato con testo bianco -->
                                <div class="mb-3 mb-md-4">
                                    <!-- Label prezzo in bianco -->
                                    <span class="text-white me-2 fs-6 fs-md-5">{{ __('ui.prezzo') }}:</span>
                                    <!-- Valore prezzo in bianco con formatting -->
                                    <span class="h4 h3-md fw-bold text-white">
                                        {{ $article->price }} €
                                    </span>
                                </div>
                                
                                <!-- Descrizione con testo bianco Imperial -->
                                <div class="mb-3 mb-md-4">
                                    <!-- Label descrizione in bianco -->
                                    <h5 class="text-white mb-2 h6 h5-md">{{ __('ui.descrizione') }}:</h5>
                                    <!-- Testo descrizione con word-break per testi lunghi -->
                                    <p class="card-text text-dark lh-base lh-lg-lg text-break">
                                        {{ $article->description }}
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Sezione inferiore - Azioni con styling Imperial -->
                            <div class="mt-auto">
                                <!-- Separatore dorato -->
                                <hr class="my-3 my-md-4">
                                
                                <!-- Pulsanti di azione con tema Imperial -->
                                <div class="d-flex flex-column flex-md-row gap-2 gap-md-3">
                                    <!-- Pulsante principale Acquista -->
                                    <button class="btn btn-primary btn-lg btn-md-lg flex-fill">
                                        <i class="fas fa-shopping-cart me-2"></i>
                                        <span class="text-truncate">{{ __('ui.acquista') }}</span>
                                    </button>
                                    <!-- Pulsante secondario Salva -->
                                    <button class="btn btn-outline-secondary btn-lg btn-md-lg flex-fill">
                                        <i class="fas fa-heart me-2"></i>
                                        <span class="text-truncate">{{ __('ui.salva') }}</span>
                                    </button>
                                </div>
                                
                                <!-- Link di navigazione con colori Imperial -->
                                <div class="mt-3 text-center">
                                    <a href="{{ route('article.index') }}" class="text-decoration-none text-muted small">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        <span class="text-break">{{ __('ui.torna_agli_articoli') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sezione aggiuntiva per informazioni extra con tema Imperial -->
        <div class="container mt-4 mt-md-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <!-- Card per informazioni aggiuntive con sfondo Imperial -->
                    <div class="card border-0 bg-transparent">
                        <div class="card-body text-center p-3 p-md-4">
                            <!-- Titolo sezione informazioni -->
                            <h4 class="text-white mb-3 h5 h4-md text-break">{{ __('ui.informazioni_aggiuntive') }}</h4>
                            <div class="row text-center g-2 g-md-3">
                                <!-- Icona spedizione con colore dorato Imperial -->
                                <div class="col-12 col-sm-4">
                                    <i class="fas fa-shipping-fast text-primary fa-2x fa-lg-3x mb-2"></i>
                                    <p class="small text-muted mb-0 text-break">{{ __('ui.spedizione_veloce') }}</p>
                                </div>
                                <!-- Icona sicurezza con colore dorato Imperial -->
                                <div class="col-12 col-sm-4">
                                    <i class="fas fa-shield-alt text-success fa-2x fa-lg-3x mb-2"></i>
                                    <p class="small text-muted mb-0 text-break">{{ __('ui.acquisto_sicuro') }}</p>
                                </div>
                                <!-- Icona reso con colore dorato Imperial -->
                                <div class="col-12 col-sm-4">
                                    <i class="fas fa-undo text-warning fa-2x fa-lg-3x mb-2"></i>
                                    <p class="small text-muted mb-0 text-break">{{ __('ui.reso_facile') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>