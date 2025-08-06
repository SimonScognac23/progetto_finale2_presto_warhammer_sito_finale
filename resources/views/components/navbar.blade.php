<nav class="custom-navbar">
    <div class="navbar-container">
        <a href="{{ route('homepage') }}" class="custom-brand">
            Presto.it
        </a>
        
        <div class="navbar-menu">
            <a href="{{ route('homepage') }}" class="nav-link-custom">
                Home
            </a>
            
            <a href="{{ route('article.index') }}" class="nav-link-custom">
                Tutti gli articoli
            </a>
            
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
            
            <!-- Dropdown Categorie -->
            <div class="nav-item dropdown custom-dropdown">
                <a class="dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </a>
                <ul class="dropdown-menu dropdown-menu-custom">
                    @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item dropdown-item-custom" href="{{ route('byCategory', ['category' => $category]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @if (!$loop->last)
                            <hr class="dropdown-divider dropdown-divider-custom">
                        @endif
                    @endforeach
                </ul>
            </div>
            
            @auth
                <span class="user-greeting">
                    Ciao, {{ Auth::user()->name }}!
                </span>
                
                <a href="{{ route('create.article') }}" class="btn-action">
                    <i class="fas fa-plus"></i> Crea Articolo
                </a>
                
                @if (Auth::user()->is_revisor)
                    <div class="nav-item">
                        <a class="btn revisor-link position-relative" href="{{ route('revisor.index') }}">
                            <i class="fas fa-eye"></i> Zona revisore
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill revisor-badge">
                                {{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        </a>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-action">
                    <i class="fas fa-sign-in-alt"></i> Accedi
                </a>
                
                <a href="{{ route('register') }}" class="btn-action">
                    <i class="fas fa-user-plus"></i> Registrati
                </a>
            @endauth
        </div>
    </div>
</nav>