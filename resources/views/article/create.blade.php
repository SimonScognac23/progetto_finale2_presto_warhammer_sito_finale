<x-layout>
    <!-- Background Image Section -->
    <div class="hero-background">
        <!-- Overlay per migliorare leggibilità -->
        <div class="hero-overlay"></div>
        
        <div class="container-fluid py-5 position-relative">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5">
                    <h1 class="display-4 fw-bold text-white mb-3 hero-title">
                          {{ __('ui.publish_article') }}
                    </h1>
                    <p class="lead text-white-50 hero-subtitle">
                       {{ __('ui.condividi_prodotti_community') }}
                    </p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-6">
                    <div class="card shadow-lg border-0 glass-card">
                        <div class="card-header bg-primary text-white text-center py-4 card-header-modern">
                            <h4 class="mb-0">
                                <i class="fas fa-plus-circle me-2"></i>
                             {{ __('ui.nuovo_articolo') }}
                            </h4>
                        </div>
                        <div class="card-body p-4 p-md-5 card-body-modern">
                            <livewire:create-article-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>