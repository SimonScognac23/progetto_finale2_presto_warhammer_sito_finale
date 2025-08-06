<footer class="bg-dark text-white py-4 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Presto.it</h5>
                <p class="mb-0">Il tuo marketplace di fiducia</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-1">© 2024 Presto.it - Tutti i diritti riservati</p>
                <div>
                    <a href="#" class="text-white me-3 text-decoration-none">Privacy Policy</a>
                    <a href="#" class="text-white me-3 text-decoration-none">Termini di Servizio</a>
                    <a href="#" class="text-white text-decoration-none">Contatti</a>
                </div>
                 <div class="col-md-5 offset-md-1 mb-3 text-center">
                        <h5>Vuoi diventare revisore?</h5>
                        <p>Cliccando il bottone sottostante farai richiesta al nostro admin</p>
                        <a href="{{ route('become.revisor') }}" class="btn btn-success">diventa revisore</a>
                    </div>
            </div>



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
        </div>
    </div>
</footer>