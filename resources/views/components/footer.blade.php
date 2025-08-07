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
                    <p class="footer-subtitle">Il tuo marketplace di fiducia</p>
                    <p class="footer-text">
                        Scopri migliaia di prodotti selezionati e venditori verificati. 
                        La qualità e l'affidabilità che meriti.
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
                                <i class="fas fa-globe me-2"></i>Lingua
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-flag me-2"></i>🇮🇹 Italiano</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-flag me-2"></i>🇺🇸 English</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-flag me-2"></i>🇪🇸 Español</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ========== SEZIONE REVISORE ========== -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="revisor-section text-center h-100 d-flex flex-column justify-content-center">
                    <h5 class="mb-3">
                        <i class="fas fa-user-shield me-2"></i>Vuoi diventare revisore?
                    </h5>
                    <p class="mb-4 flex-grow-1">
                        Unisciti al nostro team di revisori e aiutaci a mantenere 
                        alta la qualità del marketplace. Clicca il pulsante per fare richiesta.
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('become.revisor') }}" class="btn btn-revisor">
                            <i class="fas fa-star me-2"></i>Diventa Revisore
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
                        © 2024 Presto.it - Tutti i diritti riservati | 
                        Made with <i class="fas fa-heart text-danger"></i> in Italy
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>