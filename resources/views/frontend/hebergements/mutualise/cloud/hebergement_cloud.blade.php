@extends('frontend.layouts.base')

@section('content')
    <!-- ===================== PRIX AVEC BANNIÈRE ===================== -->
    <section class="section pricing-with-banner" style="background-image:url('{{ asset('assets/images/cloud.jpg') }}');">

        <div class="pricing-overlay"></div>

        <div class="container position-relative">

            <div class="section-title text-center text-white">
                <h3>Prix de nos <span>Packs d'hébergement cloud</span></h3>
                <p class="last opacity-90">
                    Ci-dessous nos packs d'hébergement cloud. Faites votre choix selon vos besoins.
                    <br>Contactez-nous pour une offre sur mesure.
                </p>
            </div>

            <div class="row text-center mb-5">
                @php
                    $plans = [
                        ['title' => 'Personnel Cloud', 'price' => '5.000 CFA /mois', 'btn' => 'btn-outline-primary'],
                        ['title' => 'Business Cloud', 'price' => '7.000 CFA /mois', 'btn' => 'btn-outline-primary'],
                        ['title' => 'Professionnal Cloud', 'price' => '10.000 CFA /mois', 'btn' => 'btn-primary'],
                    ];
                @endphp

                @foreach ($plans as $plan)
                    <div class="col-md-4 mb-4">
                        <div class="card pricing-card h-100">
                            <div class="card-body">
                                <h5>{{ $plan['title'] }}</h5>
                                <p class="card-price">{{ $plan['price'] }}</p>
                                <a href="{{ route('hebergement.inscription') }}"
                                    class="btn {{ $plan['btn'] }}">Inscrivez-vous</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- TABLE CARACTÉRISTIQUES -->
            @php
                $features = [
                    'Espace disque' => ['Illimité', 'Illimité', 'Illimité'],
                    'Bande passante' => ['Illimité', 'Illimité', 'Illimité'],
                    'Domaines permis' => ['1', 'Illimité', 'Illimité'],
                    'RAM' => ['2 Go', '4 Go', '6 Go'],
                    'CPU' => ['2', '4', '6'],
                    'Certificat SSL' => ['✓', '✓', '✓'],
                    'Visites supportées' => ['25.000', '300.000', '500.000'],
                ];
            @endphp

            <div class="pricing-features bg-white rounded shadow-sm p-4">
                @foreach ($features as $label => $values)
                    <div class="row align-items-center mb-2">
                        <div class="col-md-4 fw-bold">{{ $label }}</div>
                        <div class="col-md-8 d-flex">
                            @foreach ($values as $value)
                                <div class="flex-fill text-center border p-2 mx-1">{{ $value }}</div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- ===================== CATÉGORIES CLOUD ===================== -->
    {{-- <style>
        .section {
            position: relative;
            overflow: hidden;
        }

        /* IMAGE DE FOND VIA HTML */
        .section-bg-image {
            position: absolute;
            inset: 0;
            margin: auto;
            width: 650px;
            max-width: 100%;
            opacity: 0.12;
            /* ⬅ augmente la visibilité */
            z-index: 0;
            pointer-events: none;
        }

        /* LE CONTENEUR NE CACHE PLUS L’IMAGE */
        .section>.container {
            position: relative;
            z-index: 1;
            background: transparent !important;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .section-bg-image {
                width: 480px;
                opacity: 0.1;
            }
        }

        @media (max-width: 576px) {
            .section-bg-image {
                display: none;
            }
        }
        #caracteristiques {
            background-color: transparent !important;
        }
    </style>
    <section class="section" id="caracteristiques">

        <img src="{{ asset('assets/images/server.png') }}" alt="" class="section-bg-image" aria-hidden="true">

        <div class="container">

            <div class="section-title text-center">
                <h3>Caractéristiques de nos <span>hébergements cloud</span></h3>
                <p class="last text-muted">
                    Des solutions performantes, sécurisées et accessibles partout.
                </p>
            </div>

            @php
                $featuresCloud = [
                    ['icon' => 'cpanel.png', 'title' => 'CPANEL convivial', 'desc' => 'Gestion simple et efficace.'],
                    [
                        'icon' => 'disponibilite.png',
                        'title' => 'Disponibilité 99.9%',
                        'desc' => 'Haute fiabilité garantie.',
                    ],
                    ['icon' => 'mondial.png', 'title' => 'Accès mondial', 'desc' => 'Travaillez où que vous soyez.'],
                    ['icon' => 'support.png', 'title' => 'Support 24h/7', 'desc' => 'Assistance permanente.'],
                    ['icon' => 'application.png', 'title' => 'Multi-applications', 'desc' => 'CMS, PHP, frameworks.'],
                    ['icon' => 'serveur.png', 'title' => 'Serveurs sécurisés', 'desc' => 'Architecture robuste.'],
                ];
            @endphp

            <div class="row">
                @foreach ($featuresCloud as $feature)
                    <div class="col-md-6 mb-4">
                        <div class="feature-box text-center h-100">
                            <img src="{{ asset('assets/images/' . $feature['icon']) }}" alt="{{ $feature['title'] }}">
                            <h5>{{ $feature['title'] }}</h5>
                            <p>{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section> --}}

    <style>
        /* SECTION PRINCIPALE */
        .section {
            position: relative;
            overflow: hidden;
            background: transparent;
            /* aucun fond blanc */
        }

        /* IMAGE DE FOND VIA HTML */
        .section-bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* couvre toute la section sans déformation */
            opacity: 0.15;
            /* ajustable pour visibilité */
            z-index: 0;
            pointer-events: none;
            /* clics passent à travers */
        }

        /* CONTENU AU-DESSUS DE L'IMAGE */
        .section>.container {
            position: relative;
            z-index: 1;
            background: transparent !important;
        }

        /* TITRE ET TEXTE */
        .section-title {
            margin-bottom: 40px;
        }

        /* FEATURE BOX */
        .feature-box img {
            max-width: 80px;
            margin-bottom: 15px;
        }

        /* RESPONSIVE */
        @media (max-width: 991px) {
            .section-bg-image {
                opacity: 0.1;
                object-position: center top;
            }
        }

        @media (max-width: 576px) {
            .section-bg-image {
                display: none;
            }
        }
    </style>

    <section class="section" id="caracteristiques">
        <!-- IMAGE DE FOND -->
        <img src="{{ asset('assets/images/server.png') }}" alt="" class="section-bg-image" aria-hidden="true">

        <div class="container">
            <div class="section-title text-center">
                <h3>Caractéristiques de nos <span>hébergements cloud</span></h3>
                <p class="last text-muted">
                    Des solutions performantes, sécurisées et accessibles partout.
                </p>
            </div>

            @php
                $featuresCloud = [
                    ['icon' => 'cpanel.png', 'title' => 'CPANEL convivial', 'desc' => 'Gestion simple et efficace.'],
                    [
                        'icon' => 'disponibilite.png',
                        'title' => 'Disponibilité 99.9%',
                        'desc' => 'Haute fiabilité garantie.',
                    ],
                    ['icon' => 'mondial.png', 'title' => 'Accès mondial', 'desc' => 'Travaillez où que vous soyez.'],
                    ['icon' => 'support.png', 'title' => 'Support 24h/7', 'desc' => 'Assistance permanente.'],
                    ['icon' => 'application.png', 'title' => 'Multi-applications', 'desc' => 'CMS, PHP, frameworks.'],
                    ['icon' => 'serveur.png', 'title' => 'Serveurs sécurisés', 'desc' => 'Architecture robuste.'],
                ];
            @endphp

            <div class="row">
                @foreach ($featuresCloud as $feature)
                    <div class="col-md-6 mb-4">
                        <div class="feature-box text-center h-100">
                            <img src="{{ asset('assets/images/' . $feature['icon']) }}" alt="{{ $feature['title'] }}">
                            <h5>{{ $feature['title'] }}</h5>
                            <p>{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- ===================== POURQUOI TICAFRIQUE ===================== -->
    <section class="section bg-light">
        <div class="container">

            <div class="section-title text-center">
                <h3>Pourquoi héberger <span>chez TICAFRIQUE ?</span></h3>
                <p class="last text-muted">
                    Une expertise reconnue et un support professionnel.
                </p>
            </div>

            @php
                $services = [
                    [
                        'icon' => 'fa-server',
                        'title' => 'Infrastructure de pointe',
                        'desc' => 'Serveurs Dell sécurisés.',
                    ],
                    ['icon' => 'fa-wordpress', 'title' => 'Administration facile', 'desc' => 'cPanel inclus.'],
                    ['icon' => 'fa-envelope', 'title' => 'Emails professionnels', 'desc' => 'Webmail illimité.'],
                    ['icon' => 'fa-gear', 'title' => 'Sécurité maximale', 'desc' => 'SSL & FTP sécurisé.'],
                    ['icon' => 'fa-share-alt', 'title' => 'Installation rapide', 'desc' => 'Apps en 1 clic.'],
                    ['icon' => 'fa-empire', 'title' => 'Technologies avancées', 'desc' => 'PHP, SSH, MySQL.'],
                ];
            @endphp

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="service-box text-center h-100">
                            <i class="fa {{ $service['icon'] }}"></i>
                            <h5>{{ $service['title'] }}</h5>
                            <p>{{ $service['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
