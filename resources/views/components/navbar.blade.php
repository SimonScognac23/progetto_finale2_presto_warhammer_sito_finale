<nav style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('homepage') }}" style="text-decoration: none; font-weight: bold; color: #333;">
            Presto.it
        </a>
        
        <div style="display: flex; align-items: center; gap: 15px;">
            <a href="{{ route('homepage') }}" style="text-decoration: none; color: #333;">
                Home
            </a>
            
            <a href="{{ route('article.index') }}" style="text-decoration: none; color: #333;">
                Tutti gli articoli
            </a>
            
            <!-- Dropdown Categorie -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a></li>
                        @if (!$loop->last)
                            <hr class="dropdown-divider">
                        @endif
                    @endforeach
                </ul>
            </div>
            
            @auth
                <span style="color: #333;">Ciao, {{ Auth::user()->name }}!</span>
                
                <a href="{{ route('article.create') }}" style="text-decoration: none; color: #007bff;">
                    Crea Articolo
                </a>
                
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #007bff; text-decoration: underline; cursor: pointer;">
                        Logout
                    </button>
                </form>
                
                 @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25"
                                href="{{ route('revisor.index') }}">Zona revisore
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
            @else
                <a href="{{ route('login') }}" style="text-decoration: none; color: #007bff;">
                    Accedi
                </a>
                <a href="{{ route('register') }}" style="text-decoration: none; color: #007bff;">
                    Registrati
                </a>
            @endauth
        </div>
    </div>
</nav>