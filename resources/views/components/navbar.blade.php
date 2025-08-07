<!-- CODICE HTML NAVBAR COMPLETO -->
<nav class="custom-navbar">
    <div class="navbar-container">
        
        
        <div class="navbar-menu">
            <a href="{{ route('homepage') }}" class="nav-link-custom">
                Home
            </a>
            
            <a href="{{ route('article.index') }}" class="nav-link-custom">
                Tutti gli articoli
            </a>

            <!-- Dropdown Lingua -->
            <div class="nav-item dropdown custom-dropdown">
                <a class="dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-globe me-1"></i>Lingua
                </a>
                <ul class="dropdown-menu dropdown-menu-custom">
                    <li>
                        <x-_locale lang="it" class="dropdown-item-custom" />
                    </li>
                    <li>
                        <x-_locale lang="en" class="dropdown-item-custom" />
                    </li>
                    <li>
                        <x-_locale lang="es" class="dropdown-item-custom" />
                    </li>
                </ul>
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
            
            <!-- Sezione Autenticazione -->
            @auth
              
              
                
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
                <!-- NUOVO DROPDOWN ACCOUNT -->
                <div class="nav-item dropdown custom-dropdown account-dropdown">
                    <a class="dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i>Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-custom">
                        <li>
                            <a href="{{ route('login') }}" class="dropdown-item-custom">
                                <i class="fas fa-sign-in-alt me-2"></i>Accedi
                            </a>
                        </li>
                        <li><hr class="dropdown-divider dropdown-divider-custom"></li>
                        <li>
                            <a href="{{ route('register') }}" class="dropdown-item-custom">
                                <i class="fas fa-user-plus me-2"></i>Registrati
                            </a>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>