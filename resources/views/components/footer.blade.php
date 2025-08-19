<!-- FOOTER STILIZZATO CON LAYOUT BOOTSTRAP OTTIMIZZATO -->
<footer class="custom-footer py-5">
    <div class="container footer-content">
        <div class="row g-4 justify-content-center">
            
            <!-- ========== SEZIONE BRAND ========== -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="text-center text-md-start">
                    <h5 class="footer-title">
                        <i class="fas fa-store me-2"></i>Presto.it
                    </h5>
                    <p class="footer-subtitle">{{ __('ui.il_tuo_marketplace_di_fiducia') }}</p>
                    <p class="footer-text">
                        {{ __('ui.scopri_migliaia_prodotti') }}
                        {{ __('ui.qualita_affidabilita') }}

                    </p>
                    
                    <!-- SOCIAL LINKS COLLEGATI A FONTAWESOME -->
                    <div class="social-links d-flex justify-content-center justify-content-md-start mt-3">
                        <a href="https://fontawesome.com/icons/facebook-f?f=brands&s=solid" class="social-link me-3" title="Facebook" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://fontawesome.com/icons/twitter?f=brands&s=solid" class="social-link me-3" title="Twitter" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://fontawesome.com/icons/instagram?f=brands&s=solid" class="social-link me-3" title="Instagram" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://fontawesome.com/icons/linkedin-in?f=brands&s=solid" class="social-link" title="LinkedIn" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    
                    <!-- DROPDOWN LINGUA -->
                    <div class="footer-dropdown mt-4 d-flex justify-content-center justify-content-md-start">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-globe me-2"></i>
                                {{ __('ui.lingua') }}
                            </button>
                            <li class="nav-item d-flex align-items-center gap-1 ms-3">
                    <!-- Ogni componente invia un form POST per cambiare lingua -->
                    <x-_locale lang="it" />
                    <x-_locale lang="en" />
                    <x-_locale lang="es" />
                </li>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ========== SEZIONE REVISORE ========== -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="revisor-section text-center h-100 d-flex flex-column justify-content-center">
                    <h5 class="mb-3">
                        <i class="fas fa-user-shield me-2"></i>{{ __('ui.vuoi_diventare_revisore') }}
                    </h5>
                    <p class="mb-4 flex-grow-1">
                        {{ __('ui.unisciti_team_revisori') }}                                               
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('become.revisor') }}" class="btn btn-revisor">
                            <i class="fas fa-star me-2"></i>{{ __('ui.diventa_revisore') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ========== COPYRIGHT ========== -->
        <div class="copyright-section">
            <div class="row">
                <div class="col-12">
                    <p class="copyright-text text-center mb-0">
                        © 2024 Presto.it - {{ __('ui.tutti_diritti_riservati') }} | 
                        Made with <i class="fas fa-heart text-danger"></i> in Italy
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>