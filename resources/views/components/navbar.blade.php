<!-- NAVBAR PRINCIPALE CON LOGO, MENU CENTRATO E AUTENTICAZIONE -->
<nav class="custom-navbar">
    <div class="navbar-container">
        
        <!-- ========== SEZIONE LOGO - SINISTRA ========== -->
        <!-- Logo con immagine e testo "Home" stilizzato con Bootstrap -->
        <div class="navbar-logo-section">
            <a href="{{ route('homepage') }}" class="navbar-logo d-flex align-items-center text-decoration-none">
                
                <!-- LOGO IMMAGINE -->
                <!-- Immagine del brand con dimensioni responsive -->
                <img src="https://s1.qwant.com/thumbr/474x355/8/7/04b93379a9037223c7efa9cc158cfb10852c263a2fce59d32bc0f2f1c52fc6/OIP.mAVSKTc_BA7V61RT9QVpigHaFj.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%2Fid%2FOIP.mAVSKTc_BA7V61RT9QVpigHaFj%3Fpid%3DApi&q=0&b=1&p=0&a=0.png" 
                     alt="Presto.it Logo" 
                     class="logo-image me-3">
                
                <!-- TESTO HOME - STILIZZATO CON BOOTSTRAP -->
                <!-- Testo bianco, grassetto, dimensione media, maiuscolo -->
                <span class="text-white fw-bold fs-5 text-uppercase">Home</span>
                
                <!-- ALTERNATIVA: LOGO TESTUALE (rimuovi img sopra e usa questo) -->
                <!-- <span class="text-white fw-bold fs-4">Presto.it</span> -->
            </a>
        </div>
        
        <!-- ========== SEZIONE MENU - CENTRO ========== -->
        <!-- Menu principale centrato con tutti gli elementi di navigazione -->
        <div class="navbar-menu">
            
            <!-- LINK ARTICOLI -->
            <!-- Link diretto alla pagina di tutti gli articoli -->
            <a href="{{ route('article.index') }}" class="nav-link-custom">
                Tutti gli articoli
            </a>

            <!-- ========== DROPDOWN CATEGORIE ========== -->
            <!-- Menu a discesa per navigare per categoria -->
            <div class="nav-item dropdown custom-dropdown">
                <a class="dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </a>
                <ul class="dropdown-menu dropdown-menu-custom">
                    <!-- Loop attraverso tutte le categorie disponibili -->
                    @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item dropdown-item-custom" href="{{ route('byCategory', ['category' => $category]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        <!-- Separatore tra le categorie (non dopo l'ultima) -->
                        @if (!$loop->last)
                            <hr class="dropdown-divider dropdown-divider-custom">
                        @endif
                    @endforeach
                </ul>
            </div>
            
            <!-- ========== SEZIONE AUTENTICAZIONE ========== -->
            <!-- Contenuto diverso basato sullo stato di autenticazione dell'utente -->
            
            <!-- UTENTE AUTENTICATO -->
            @auth
                <!-- ZONA REVISORE (solo per utenti con ruolo revisor) -->
                @if (Auth::user()->is_revisor)
                    <div class="nav-item">
                        <a class="btn revisor-link position-relative" href="{{ route('revisor.index') }}">
                            <i class="fas fa-eye"></i> Zona revisore
                            <!-- Badge con numero di articoli da revisionare -->
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill revisor-badge">
                                {{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        </a>
                    </div>
                @endif
                
                <!-- PULSANTE LOGOUT -->
                <!-- Form per il logout dell'utente autenticato -->
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
                
            <!-- UTENTE NON AUTENTICATO -->
            @else
                <!-- DROPDOWN ACCOUNT -->
                <!-- Menu a discesa per accesso/registrazione -->
                <div class="nav-item dropdown custom-dropdown account-dropdown">
                    <a class="dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i>Account
                    </a>
                    <ul class="dropdown-menu dropdown-menu-custom">
                        <!-- LINK ACCEDI -->
                        <li>
                            <a href="{{ route('login') }}" class="dropdown-item-custom">
                                <i class="fas fa-sign-in-alt me-2"></i>Accedi
                            </a>
                        </li>
                        <!-- Separatore tra accedi e registrati -->
                        <li><hr class="dropdown-divider dropdown-divider-custom"></li>
                        <!-- LINK REGISTRATI -->
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

<!--
========== RIEPILOGO CARATTERISTICHE IMPLEMENTATE ==========

1. LOGO SEZIONE:
   - Immagine responsive con alt text
   - Testo "Home" stilizzato con Bootstrap (text-white fw-bold fs-5 text-uppercase)
   - Layout flex per allineamento perfetto
   - Link alla homepage

2. MENU CENTRATO:
   - Link "Tutti gli articoli"
   - Dropdown "Categorie" dinamico
   - Sezione autenticazione condizionale

3. DROPDOWN CATEGORIE:
   - Loop dinamico attraverso $categories
   - Separatori tra elementi (tranne l'ultimo)
   - Link funzionali per ogni categoria

4. AUTENTICAZIONE:
   - Stato auth: Zona revisore (se revisor) + Logout
   - Stato guest: Dropdown Account con Accedi/Registrati
   - Badge animato per conteggio revisioni

5. STILI APPLICATI:
   - CSS personalizzato per navbar stilosa
   - Classi Bootstrap per layout e tipografia
   - Effetti hover e transizioni
   - Design responsive per tutti i dispositivi

6. FUNZIONALITÀ:
   - Bootstrap dropdown funzionante
   - CSRF protection per logout
   - Route Laravel integrate
   - Icone FontAwesome
-->