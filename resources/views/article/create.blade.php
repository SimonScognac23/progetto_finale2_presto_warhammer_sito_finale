<x-layout>
    <!-- Background Image Section -->
    <div class="hero-background">
        <!-- Overlay per migliorare leggibilità -->
        <div class="hero-overlay"></div>
        
        <div class="container-fluid py-5 position-relative">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5">
                    <h1 class="display-4 fw-bold text-white mb-3 hero-title">
                        Pubblica un articolo
                    </h1>
                    <p class="lead text-white-50 hero-subtitle">
                        Condividi i tuoi prodotti con la nostra community
                    </p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-6">
                    <div class="card shadow-lg border-0 glass-card">
                        <div class="card-header bg-primary text-white text-center py-4 card-header-modern">
                            <h4 class="mb-0">
                                <i class="fas fa-plus-circle me-2"></i>
                                Nuovo Articolo
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

    <!-- CSS per Background Image e Effetti -->
    <style>
        /* Background Image Hero Section */
        .hero-background {
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), 
                              url('https://s1.qwant.com/thumbr/474x266/9/1/fdb9d57a9f58d355d9232781e38090c663f2f7298126148d67a1869a39bb61/OIP.0X7hSX49qPrmbd5C28On_gHaEK.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%2Fid%2FOIP.0X7hSX49qPrmbd5C28On_gHaEK%3Fpid%3DApi&q=0&b=1&p=0&a=0');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
        }

        /* Overlay per migliorare contrasto */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, 
                rgba(0, 123, 255, 0.1) 0%, 
                rgba(0, 86, 179, 0.2) 50%, 
                rgba(0, 0, 0, 0.3) 100%);
            pointer-events: none;
        }

        /* Titolo hero con effetti */
        .hero-title {
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            animation: fadeInDown 1s ease-out;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
            animation: fadeInUp 1s ease-out 0.3s both;
            font-size: 1.3rem;
        }

        /* Card con effetto glass morphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            animation: slideInUp 1.2s ease-out 0.6s both;
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 35px 60px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.15);
        }

        /* Header card moderno */
        .card-header-modern {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border-radius: 20px 20px 0 0;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .card-header-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 3s infinite;
        }

        /* Body card con sfondo subtle */
        .card-body-modern {
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.9) 0%, 
                rgba(248, 249, 250, 0.9) 100%);
            border-radius: 0 0 20px 20px;
        }

        /* Animazioni */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Particelle fluttuanti opzionali */
        .hero-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 80% 30%, rgba(255, 255, 255, 0.08) 1px, transparent 1px),
                radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.12) 1px, transparent 1px);
            background-size: 200px 200px, 300px 300px, 250px 250px;
            animation: floatParticles 20s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes floatParticles {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-background {
                background-attachment: scroll;
                min-height: 100vh;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .glass-card {
                margin: 0 15px;
                border-radius: 15px;
            }
            
            .card-header-modern {
                border-radius: 15px 15px 0 0;
            }
            
            .card-body-modern {
                border-radius: 0 0 15px 15px;
            }
        }

        /* Scroll Snap per mobile */
        @media (max-width: 768px) {
            .hero-background {
                scroll-snap-align: start;
            }
        }

        /* Effetto hover su testo */
        .hero-title:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Loading animation subtle */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            transform: scaleX(0);
            transform-origin: left;
            animation: loadingProgress 4s ease-in-out infinite;
            border-radius: 20px 20px 0 0;
        }

        @keyframes loadingProgress {
            0% { transform: scaleX(0); }
            50% { transform: scaleX(1); }
            100% { transform: scaleX(0); }
        }

        /* Tema scuro per form elements */
        .glass-card .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 123, 255, 0.2);
            transition: all 0.3s ease;
        }

        .glass-card .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</x-layout>