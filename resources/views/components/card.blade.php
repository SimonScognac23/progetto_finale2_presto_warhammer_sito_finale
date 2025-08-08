  <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Card Articolo -->
            <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                <div class="card warhammer-card text-center">
                    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/400/400' }}"
                         class="card-img-top ratio ratio-1x1" alt="Immagine dell'articolo {{ $article->title }}">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title">{{ $article->title }}</h4>
                        <h5 class="card-price">{{ $article->price }} €</h5>
                        <div class="card-buttons mt-auto">
                            <a href="{{ route('article.show', compact('article')) }}"
                               class="btn btn-warhammer-gold mb-2">
                                <i class="fas fa-eye me-1"></i> Dettagli
                            </a>
                            <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                               class="btn btn-warhammer-outline">
                                <i class="fas fa-tag me-1"></i> {{ $article->category->name }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>