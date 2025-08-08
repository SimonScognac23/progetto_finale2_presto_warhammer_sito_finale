
            <!-- Card Articolo -->
       

            <!-- Card Articolo -->
      
                <div class="card warhammer-card-square text-center h-100 shadow-lg w-100" style="max-width: 400px;">
                    <div class="position-relative overflow-hidden rounded-top">
                        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(400, 400) : 'https://picsum.photos/400/400' }}"
                             class="card-img-top w-100 object-fit-cover" 
                             alt="Immagine dell'articolo {{ $article->title }}"
                             style="height: 300px;">
                    </div>
                    <div class="card-body d-flex flex-column p-3 p-md-4 bg-dark text-white">
                        <h4 class="card-title flex-grow-1 mb-3 fs-4 fs-md-3 fw-bold text-white text-center">{{ $article->title }}</h4>
                        <h5 class="card-price mb-3 mb-md-4 fs-3 fs-md-2 fw-bold text-warning text-center">{{ $article->price }} €</h5>
                        <div class="mt-auto d-grid gap-2 gap-md-3">
                            <a href="{{ route('article.show', compact('article')) }}"
                               class="btn btn-warning btn-lg fw-bold text-dark text-center">
                                <i class="fas fa-eye me-2"></i> Dettagli
                            </a>
                            <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                               class="btn btn-outline-warning btn-lg fw-bold text-center">
                                <i class="fas fa-tag me-2"></i> {{ $article->category->name }}
                            </a>
                        </div>
                    </div>
                </div>
    
 


   
            