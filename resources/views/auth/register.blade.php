<!-- Layout principale con tema Imperial -->
<x-layout>
    <div class="container pt-5">
        <!-- Header section con titolo decorato -->
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-white display-4 pt-5">
                    Registrati
                </h1>
            </div>
        </div>

        <!-- Form section con styling Imperial -->
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
                <!-- Form di registrazione con classe personalizzata Imperial -->
                <form method="POST" action="{{ route('register') }}" class="form-dark shadow rounded p-5">
                    @csrf

                    <!-- Campo Nome con styling Imperial -->
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            <i class="fas fa-user me-2"></i>Nome:
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il tuo nome">
                    </div>

                    <!-- Campo Email con styling Imperial -->
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Indirizzo email:
                        </label>
                        <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Inserisci la tua email">
                    </div>

                    <!-- Campo Password con styling Imperial -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password:
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Inserisci la password">
                    </div>

                    <!-- Campo Conferma Password con styling Imperial -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            <i class="fas fa-shield-alt me-2"></i>Conferma la password:
                        </label>
                        <input type="password" class="form-control" id="password_confirmation" 
                               name="password_confirmation" placeholder="Conferma la password">
                    </div>

                    <!-- Pulsante di submit con styling Imperial -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-imperial">
                            <i class="fas fa-user-plus me-2"></i>
                            Registrati
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>