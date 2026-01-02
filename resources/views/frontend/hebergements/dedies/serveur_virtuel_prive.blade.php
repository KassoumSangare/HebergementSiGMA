@extends('frontend.layouts.base')

@section('title', 'Serveurs VPS Performance | TICAFRIQUE')

@section('content')

    {{-- HERO SECTION --}}
    <section class="vps-hero"
        style="background-image: linear-gradient(135deg, rgba(13, 110, 253, 0.85), rgba(10, 14, 23, 0.9)), url('{{ asset('images/bandeau/hosting.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <div class="tech-tag vps-animate-up">Technologie KVM & SSD</div>
                    <h1 class="vps-animate-up delay-1">Votre propre <span>serveur virtuel</span> en quelques minutes</h1>
                    <p class="vps-animate-up delay-2">
                        Profitez d'une puissance dédiée et d'une flexibilité totale.
                        Idéal pour le développement, l'hébergement web et les applications critiques.
                    </p>
                    <div class="vps-animate-up delay-3">
                        <a href="#plans" class="btn btn-vps-primary">Découvrir les plans</a>
                        <a href="#features" class="btn btn-link text-white text-decoration-none ms-3">Pourquoi le VPS ? <i
                                class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRICING SECTION --}}
    <section id="plans" class="vps-section">
        <div class="container">
            <div class="vps-section-title text-center host-animate">
                <h2 class="section-title">Nos <span>Plans VPS</span></h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Une gamme complète pour tous vos projets de croissance</p>
            </div>

            @php
                $plans = [
                    [
                        'name' => 'VPS Standard',
                        'price' => '20.000',
                        'specs' => ['2 Cores', '30 Go Disque', '2 Go RAM', '1 To BP', '1 IP dédiée', 'cPanel offert'],
                        'link' => 'webcompte_Serveur pro_SVP.php',
                    ],
                    [
                        'name' => 'VPS Business',
                        'price' => '30.000',
                        'specs' => ['2 Cores', '60 Go Disque', '4 Go RAM', '2 To BP', '2 IP dédiées', 'cPanel offert'],
                        'link' => 'webcompte_Serveur business_SVP.php',
                    ],
                    [
                        'name' => 'VPS Pro',
                        'price' => '50.000',
                        'specs' => ['3 Cores', '120 Go Disque', '6 Go RAM', '3 To BP', '2 IP dédiées', 'cPanel offert'],
                        'featured' => true,
                        'link' => 'webcompte_Serveur pro_SVP.php',
                    ],
                    [
                        'name' => 'VPS Elite',
                        'price' => '60.000',
                        'specs' => ['4 Cores', '240 Go Disque', '8 Go RAM', '3 To BP', '2 IP dédiées', 'cPanel offert'],
                        'link' => 'webcompte_Serveur elite_SVP.php',
                    ],
                ];
            @endphp

            <div class="row g-4 align-items-end">
                @foreach ($plans as $plan)
                    <div class="col-xl-3 col-md-6">
                        <div class="vps-card {{ $plan['featured'] ?? false ? 'featured' : '' }} vps-animate">
                            @if ($plan['featured'] ?? false)
                                <div class="badge-featured">Meilleur Rapport Qualité/Prix</div>
                            @endif

                            <div class="vps-card-top">
                                <h4>{{ $plan['name'] }}</h4>
                                <div class="vps-price">
                                    <span class="price-val">{{ $plan['price'] }}</span>
                                    <span class="currency-period">FCFA<br>/MOIS</span>
                                </div>
                            </div>

                            <ul class="vps-specs-list">
                                @foreach ($plan['specs'] as $spec)
                                    <li><i class="fas fa-bolt"></i> {{ $spec }}</li>
                                @endforeach
                            </ul>

                            <a href="{{ $plan['link'] }}"
                                class="btn {{ $plan['featured'] ?? false ? 'btn-vps-primary' : 'btn-vps-outline' }} w-100">
                                Configurer maintenant
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FEATURES SECTION --}}
    <section id="features" class="vps-section vps-light">
        <div class="container">
            <div class="vps-section-title text-center mb-5">
                <h2>L'avantage <span>TICAFRIQUE</span></h2>
            </div>

            <div class="row g-4">
                @php
                    $features = [
                        [
                            'icon' => 'fa-bolt',
                            'title' => 'Performance SSD',
                            'text' => 'Stockage ultra-rapide pour des temps de réponse éclairs.',
                        ],
                        [
                            'icon' => 'fa-cloud',
                            'title' => 'KVM Isolation',
                            'text' => 'Isolation matérielle totale pour une sécurité maximale.',
                        ],
                        [
                            'icon' => 'fa-shield-halved',
                            'title' => 'Protection Anti-DDoS',
                            'text' => 'Filtrage avancé inclus sur toutes nos offres.',
                        ],
                        [
                            'icon' => 'fa-user-shield',
                            'title' => 'Accès Root Total',
                            'text' => 'Installez les logiciels et configurations de votre choix.',
                        ],
                        [
                            'icon' => 'fa-clock',
                            'title' => 'Déploiement Rapide',
                            'text' => 'Votre VPS est prêt et activé en quelques minutes.',
                        ],
                        [
                            'icon' => 'fa-headset',
                            'title' => 'Expertise 24/7',
                            'text' => 'Nos ingénieurs sont là pour vous accompagner.',
                        ],
                    ];
                @endphp
                @foreach ($features as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="vps-feature-card vps-animate">
                            <i class="fa {{ $item['icon'] }}"></i>
                            <h5>{{ $item['title'] }}</h5>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="hosting-why-vps-section">
        <div class="container">
            <!-- TITLE -->
            <div class="hosting-why-title text-center">
                <h2>Pourquoi acheter un VPS chez <span>TICAFRIQUE</span> ?</h2>
                <p>
                    Des serveurs virtuels performants, sécurisés et déployés en quelques minutes
                    pour accompagner la croissance de vos projets.
                </p>
            </div>

            <div class="row align-items-center">
                <!-- TABS -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <ul class="nav hosting-why-tabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#vps-dashboard">
                                <h5>Tableau de bord intuitif</h5>
                                <span>Gestion simple et rapide de votre VPS</span>
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vps-install">
                                <h5>Installation rapide</h5>
                                <span>Serveur opérationnel en quelques minutes</span>
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#vps-ddos">
                                <h5>Protection Anti-DDoS</h5>
                                <span>Sécurité réseau avancée avec filtrage intelligent</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- CONTENT -->
                <div class="col-lg-8">
                    <div class="tab-content hosting-why-content">
                        <div class="tab-pane fade show active" id="vps-dashboard">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/dashbord.png') }}" alt="Dashboard VPS">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="vps-install">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/analyse.png') }}" alt="Installation rapide VPS">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="vps-ddos">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/cpanelimg.png') }}" alt="Protection Anti-DDoS VPS">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- FAQ --}}
    <section class="vps-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="vps-section-title text-center mb-5">
                        <h2>Questions <span>Fréquentes</span></h2>
                    </div>
                    <div class="accordion vps-accordion" id="vpsFaq">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    Qu'est-ce qu'un serveur VPS TICAFRIQUE ?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#vpsFaq">
                                <div class="accordion-body">
                                    C'est une partition virtuelle isolée d'un serveur physique puissant, vous offrant des
                                    ressources garanties et un contrôle total (Root) sans le coût d'un serveur dédié.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mt-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    Puis-je augmenter mes ressources plus tard ?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#vpsFaq">
                                <div class="accordion-body">
                                    Absolument. Vous pouvez passer d'un plan Standard à Business ou Pro à tout moment depuis
                                    votre console client sans perte de données.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
