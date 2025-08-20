<!-- Layout principale con tema Imperial per Login -->
<x-layout>
    <div class="container mt-5">
        <!-- Header section con titolo decorato -->
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="text-white display-4 pt-5">
                    {{ __('ui.login') }}
                </h1>
            </div>
        </div>
                
        <!-- Form section con styling Imperial -->
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
                <!-- Form di accesso con classe personalizzata Imperial -->
                <form method="POST" action="{{ route('login') }}" class="login-form-dark shadow rounded p-5">
                    @csrf
                                        
                    <!-- Campo Email con styling Imperial -->
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">
                            <i class="fas fa-envelope me-2"></i>{{ __('ui.email_address') }}
                        </label>
                        <input type="email" class="form-control" id="loginEmail" name="email" placeholder="{{ __('ui.enter_email') }}" required>
                    </div>
                                        
                    <!-- Campo Password con styling Imperial -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>
                            {{ __('ui.password') }}
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('ui.password') }}" required>
                    </div>
                                        
                    <!-- Pulsante di submit con styling Imperial -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-login-imperial">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            {{ __('ui.login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>


