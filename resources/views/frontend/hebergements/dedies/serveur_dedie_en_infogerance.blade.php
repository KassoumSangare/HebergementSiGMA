@extends('frontend.layouts.base')

@section('title', 'Serveurs dédiés en infogérance | Expertise & Sérénité')

@section('content')

    {{-- HERO SECTION --}}
    <section class="info-hero"
        style="background-image: linear-gradient(135deg, rgba(10, 14, 23, 0.9), rgba(10, 14, 23, 0.7)), url('{{ asset('images/bandeau/hebergement.jpg') }}')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-start">
                    <span class="status-badge info-animate-up">Disponibilité 99.9%</span>
                    <h1 class="info-animate-up delay-1">Serveurs dédiés en <span>infogérance</span></h1>
                    <p class="info-animate-up delay-2">
                        Libérez-vous des contraintes techniques. Nos experts gèrent votre infrastructure
                        pour que vous puissiez vous concentrer sur votre cœur de métier.
                    </p>
                    <div class="info-animate-up delay-3">
                        <a href="#offres" class="btn btn-primary-custom">Voir les tarifs</a>
                        <span class="ms-3 text-white-50"><i class="fas fa-shield-alt text-success me-2"></i>Sécurité
                            incluse</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- OFFRES --}}
    <section id="offres" class="info-section">
        <div class="container">
            <div class="info-title text-center host-animate">
                <h2 class="section-title">Nos <span>Offres</span> d’infogérance</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Des configurations puissantes, clé en main, adaptées à vos besoins</p>
            </div>

            @php
                $offers = [
                    [
                        'name' => 'Standard',
                        'price' => '110.000',
                        'specs' => ['2 Cores', '1 To HDD', '4 Go RAM', '5 To BP', '2 IP dédiées', 'cPanel inclus'],
                        'link' => 'webcompte_Serveur standard_SDI.php',
                    ],
                    [
                        'name' => 'Business',
                        'price' => '125.000',
                        'specs' => ['4 Cores', '1 To HDD', '4 Go RAM', '5 To BP', '2 IP dédiées', 'cPanel inclus'],
                        'link' => 'webcompte_Serveur business_SDI.php',
                    ],
                    [
                        'name' => 'Pro',
                        'price' => '135.000',
                        'specs' => ['4 Cores', '1 To HDD', '8 Go RAM', '10 To BP', '2 IP dédiées', 'cPanel inclus'],
                        'featured' => true,
                        'link' => 'webcompte_Serveur pro_SDI.php',
                    ],
                    [
                        'name' => 'Elite',
                        'price' => '155.000',
                        'specs' => ['4 Cores', '1 To HDD', '16 Go RAM', '15 To BP', '2 IP dédiées', 'cPanel inclus'],
                        'link' => 'webcompte_Serveur elite_SDI.php',
                    ],
                ];
            @endphp

            <div class="row g-4 pt-4">
                @foreach ($offers as $offer)
                    <div class="col-xl-3 col-lg-6">
                        <div class="info-card {{ $offer['featured'] ?? false ? 'featured' : '' }} info-animate">
                            @if ($offer['featured'] ?? false)
                                <div class="featured-label">Recommandé</div>
                            @endif
                            <div class="card-header-plan">
                                <h4>{{ $offer['name'] }}</h4>
                                <div class="info-price">
                                    <span class="currency">FCFA</span>{{ $offer['price'] }}<span class="period">/mois</span>
                                </div>
                            </div>

                            <ul class="specs-list">
                                @foreach ($offer['specs'] as $spec)
                                    <li><i class="fas fa-check"></i> {{ $spec }}</li>
                                @endforeach
                            </ul>

                            <a href="{{ $offer['link'] }}"
                                class="btn {{ $offer['featured'] ?? false ? 'btn-primary-custom' : 'btn-outline-dark' }} w-100">
                                Choisir ce serveur
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- AVANTAGES --}}
    <section class="info-section info-light">
        <div class="container">
            <div class="info-title text-center">
                <h2>Pourquoi l’infogérance <span>TICAFRIQUE</span> ?</h2>
            </div>

            <div class="row g-4 mt-2">
                @php
                    $features = [
                        [
                            'icon' => 'fa-user-cog',
                            'title' => 'Gestion complète',
                            'text' => 'Administration serveur 24/7 proactive.',
                        ],
                        [
                            'icon' => 'fa-shield-alt',
                            'title' => 'Sécurité renforcée',
                            'text' => 'Pare-feu, anti-DDoS et mises à jour.',
                        ],
                        [
                            'icon' => 'fa-sync',
                            'title' => 'Maintenance',
                            'text' => 'Optimisation continue de vos performances.',
                        ],
                        [
                            'icon' => 'fa-headset',
                            'title' => 'Support expert',
                            'text' => 'Accès direct à nos techniciens certifiés.',
                        ],
                        [
                            'icon' => 'fa-lock',
                            'title' => 'Accès root',
                            'text' => 'Gardez le contrôle si vous le souhaitez.',
                        ],
                        [
                            'icon' => 'fa-chart-line',
                            'title' => 'Monitoring',
                            'text' => 'Surveillance en temps réel des ressources.',
                        ],
                    ];
                @endphp
                @foreach ($features as $item)
                    <div class="col-md-4">
                        <div class="info-feature-box info-animate">
                            <div class="icon-circle">
                                <i class="fa {{ $item['icon'] }}"></i>
                            </div>
                            <h5>{{ $item['title'] }}</h5>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="hosting-why-managed-section">
        <div class="container">
            <!-- TITLE -->
            <div class="hosting-why-title text-center">
                <h2>
                    Pourquoi choisir des serveurs dédiés
                    <span>en infogérance chez TICAFRIQUE</span> ?
                </h2>
                <p>
                    Confiez la gestion de votre infrastructure à nos experts
                    et concentrez-vous pleinement sur votre activité.
                </p>
            </div>

            <div class="row align-items-center">
                <!-- TABS -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <ul class="nav hosting-why-tabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#managed-dashboard">
                                <h5>Tableau de bord intuitif</h5>
                                <span>Supervision et gestion simplifiées</span>
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#managed-root">
                                <h5>Accès root maîtrisé</h5>
                                <span>Contrôle total avec accompagnement expert</span>
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#managed-tools">
                                <h5>cPanel, WHMCS & IPs</h5>
                                <span>Outils professionnels disponibles à la demande</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- CONTENT -->
                <div class="col-lg-8">
                    <div class="tab-content hosting-why-content">
                        <div class="tab-pane fade show active" id="managed-dashboard">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/dashbord.png') }}" alt="Dashboard infogérance serveur">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="managed-root">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/analyse.png') }}" alt="Accès root serveur infogéré">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="managed-tools">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/cpanelimg.png') }}" alt="Outils serveur infogéré">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="info-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="info-title text-center mb-5">
                        <h2>Questions <span>Fréquentes</span></h2>
                    </div>

                    <div class="accordion custom-accordion" id="infoFaq">
                        <div class="accordion-item shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#i1">
                                    Qu’est-ce que l’infogérance inclut réellement ?
                                </button>
                            </h2>
                            <div id="i1" class="accordion-collapse collapse show" data-bs-parent="#infoFaq">
                                <div class="accordion-body">
                                    L'infogérance comprend l'installation initiale, la configuration de sécurité, les
                                    sauvegardes régulières, les mises à jour logicielles et une surveillance 24/7 pour
                                    intervenir avant même que vous ne remarquiez un problème.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item shadow-sm mt-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#i2">
                                    Puis-je changer d'offre à tout moment ?
                                </button>
                            </h2>
                            <div id="i2" class="accordion-collapse collapse" data-bs-parent="#infoFaq">
                                <div class="accordion-body">
                                    Oui, nos solutions sont évolutives. Vous pouvez migrer vers une configuration supérieure
                                    (Business vers Pro par exemple) sans interruption majeure de service.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
