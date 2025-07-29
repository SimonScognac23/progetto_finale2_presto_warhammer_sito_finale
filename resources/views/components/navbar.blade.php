<nav style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('homepage') }}" style="text-decoration: none; font-weight: bold; color: #333;">
            Presto.it
        </a>
        
        <div>
            <a href="{{ route('homepage') }}" style="margin-right: 20px; text-decoration: none; color: #333;">
                Home
            </a>
            
            @auth
                <span style="color: #333; margin-right: 15px;">Ciao, {{ Auth::user()->name }}!</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #007bff; text-decoration: underline; cursor: pointer;">
                        Logout
                    </button>
                </form>
                   <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea</a></li>
            @else
                <a href="{{ route('login') }}" style="margin-right: 10px; text-decoration: none; color: #007bff;">
                    Accedi
                </a>
                <a href="{{ route('register') }}" style="text-decoration: none; color: #007bff;">
                    Registrati
                </a>
            @endauth
        </div>
    </div>
</nav>

