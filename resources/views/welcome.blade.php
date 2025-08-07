   <x-layout>
       @if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50">
        {{ session('message') }}
    </div>
@endif


  <!-- Form di ricerca -->
            <div class="nav-item">
                <form class="search-form" role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control search-input" placeholder="Cerca..." aria-label="search">
                        <button type="submit" class="btn search-btn" id="basic-addon2">
                            <i class="fas fa-search"></i> Cerca
                        </button>
                    </div>
                </form>
            </div>



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
     <div class="container-fluid text-center ">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-1">Presto.it</h1>
                <div class="my-3">
                    @auth
                        <a class="btn btn-dark" href="{{ route('create.article') }}">Pubblica un articolo</a>
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
