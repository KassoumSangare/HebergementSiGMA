@extends('frontend.layouts.base')

@section('content')
    {{-- ================= BANNIÈRE ================= --}}
    <section class="section paralbackground page-banner"
        style="background-image:url('{{ asset('assets/images/hebergement.jpg') }}'); background-size: cover; background-position: center;">
    </section>
    <!-- PACKS D'HÉBERGEMENT WINDOWS -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h3>Prix de nos <span>Packs d'hébergement Windows</span></h3>
                <p class="text-muted">
                    Ci-dessous nos packs d'hébergement Windows. Faites votre choix en fonction de votre besoin.<br>
                    Si votre pack ne figure pas ici, contactez-nous avec vos besoins spécifiques.
                </p>
            </div>

            <div class="row">
                <!-- Features Column -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-header bg-primary text-white text-center">
                            <h5>Hébergement Web Professionnel</h5>
                            <p>Comparez nos plans</p>
                        </div>
                        <div class="card-body p-3">
                            @php
                                $features = [
                                    'Espace disque',
                                    'Nombre de domaines hébergeables',
                                    'Email compte POP',
                                    'Nom domaine',
                                    'Système d\'exploitation',
                                    'Serveur HTTP',
                                    'Accès FTP privé',
                                    'Statistiques journalières',
                                    'Modification de DNS',
                                    'Webmail',
                                    'Configuration Outlook',
                                    'Base de données',
                                    'Support technique',
                                    'Satisfait ou remboursé',
                                    '&nbsp;',
                                ];
                            @endphp
                            <ul class="list-unstyled">
                                @foreach ($features as $feature)
                                    <li class="border-bottom py-2">{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Plan Columns -->
                @php
                    $plans = [
                        [
                            'title' => 'Présence',
                            'price' => '3000 CFA HT / mois',
                            'color' => '#355d93',
                            'features' => [
                                '100 Go',
                                '1',
                                '100',
                                '.Ci offert la 1er année',
                                'Centos 7',
                                'Apache 2.4',
                                '2',
                                'Inclus',
                                '✓',
                                '✓',
                                '✓',
                                '3',
                                'Inclus',
                                '30 jours',
                            ],
                            'link' => 'webcompte_presence_windows.php',
                        ],
                        [
                            'title' => 'Confort',
                            'price' => '5000 CFA HT / mois',
                            'color' => '#4178c0',
                            'features' => [
                                '300 Go',
                                '3',
                                '300',
                                '.Ci offert la 1er année',
                                'Centos 7',
                                'Apache 2.4',
                                '3',
                                'Inclus',
                                '✓',
                                '✓',
                                '✓',
                                '10',
                                'Inclus',
                                '30 jours',
                            ],
                            'link' => 'webcompte_confort_windows.php',
                        ],
                        [
                            'title' => 'Prestige',
                            'price' => '7000 CFA HT / mois',
                            'color' => '#ff8c00',
                            'features' => [
                                '750 Go',
                                '10',
                                '1000',
                                '.Ci offert la 1er année',
                                'Centos 7',
                                'Apache 2.4',
                                '10',
                                'Inclus',
                                '✓',
                                '✓',
                                '✓',
                                '20',
                                'Inclus',
                                '30 jours',
                            ],
                            'link' => 'webcompte_prestige_windows.php',
                        ],
                        [
                            'title' => 'Autres',
                            'price' => 'Sur mesure',
                            'color' => '#6c757d',
                            'features' => ['Contactez-nous pour un plan spécifique'],
                            'link' => 'webcompte_premim_linix.php',
                        ],
                    ];
                @endphp

                @foreach ($plans as $plan)
                    <div class="col-md-2 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header text-white text-center" style="background-color: {{ $plan['color'] }}">
                                <p>{{ $plan['price'] }}</p>
                                <h5>{{ $plan['title'] }}</h5>
                            </div>
                            <div class="card-body p-2">
                                <ul class="list-unstyled text-center">
                                    @foreach ($plan['features'] as $feat)
                                        <li class="py-2 border-bottom">{{ $feat }}</li>
                                    @endforeach
                                    <li class="pt-2">
                                        <a href="{{ route('hebergement.inscription') }}" class="btn btn-primary btn-block">Commandez</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CARACTÉRISTIQUES DES HÉBERGEMENTS WINDOWS -->
    <section class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Caractéristiques de nos <span>hébergements Windows</span></h3>
                <p class="text-muted text-center">
                    TICAFRIQUE offre des packs d'Hébergement Web Windows exceptionnels et sur mesure !
                </p>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="hfeatures">
                        @php
                            $featuresWin = [
                                [
                                    'icon' => 'cpanel.png',
                                    'title' => 'CPANEL convivial',
                                    'desc' =>
                                        'Simplifiez la gestion de vos hébergements web avec le CPANEL de TICAFRIQUE.',
                                ],
                                [
                                    'icon' => 'disponibilite.png',
                                    'title' => 'Disponibilité à 99.9%',
                                    'desc' => 'Services disponibles à plus de 99,99%, satisfait ou remboursé.',
                                ],
                                [
                                    'icon' => 'mondial.png',
                                    'title' => 'Accès mondial',
                                    'desc' => 'Accédez à vos hébergements web partout où vous vous trouvez.',
                                ],
                                [
                                    'icon' => 'support.png',
                                    'title' => 'Support 24h/7',
                                    'desc' => 'Une équipe dédiée vous assiste à chaque sollicitation.',
                                ],
                                [
                                    'icon' => 'application.png',
                                    'title' => 'Supporte plusieurs applications',
                                    'desc' =>
                                        'Hébergement Windows et Linux compatibles avec plusieurs applications (PHP, CMS, etc.).',
                                ],
                                [
                                    'icon' => 'serveur.png',
                                    'title' => 'Serveur de Connexion',
                                    'desc' => 'Gère plusieurs serveurs en parallèle pour limiter les indisponibilités.',
                                ],
                            ];
                        @endphp

                        <ul class="list-unstyled">
                            @foreach ($featuresWin as $feature)
                                <li class="mb-4 d-flex align-items-start">
                                    <div class="mr-3">
                                        <img src="{{ asset('assets/images/' . $feature['icon']) }}" alt="{{ $feature['title'] }}"
                                            style="height:50px;">
                                    </div>
                                    <div>
                                        <h5>{{ $feature['title'] }}</h5>
                                        <p>{{ $feature['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('assets/images/server.png') }}" alt="Server" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- POURQUOI CHOISIR TICAFRIQUE -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title text-center">
                <h3>Pourquoi héberger <span>chez TICAFRIQUE ?</span></h3>
                <p class="text-muted">
                    Avec un support professionnel inégalé, TICAFRIQUE est votre partenaire idéal pour tous vos projets
                    d'hébergement web.
                </p>
            </div>

            <div class="row text-center">
                @php
                    $services = [
                        [
                            'icon' => 'fa-server',
                            'title' => 'Infrastructure de pointe',
                            'desc' => 'Architecture basée sur des serveurs Dell haut de gamme et réseau sécurisé.',
                        ],
                        [
                            'icon' => 'fa-wordpress',
                            'title' => 'Console d\'administration',
                            'desc' => 'Tous nos plans Windows sont équipés de cPanel pour gérer facilement votre pack.',
                        ],
                        [
                            'icon' => 'fa-envelope',
                            'title' => 'Caractéristiques des emails',
                            'desc' => 'Nombre illimité de comptes de messagerie avec interface webmail élégante.',
                        ],
                        [
                            'icon' => 'fa-gear',
                            'title' => 'Sécurité assurée',
                            'desc' => 'Toutes les communications et données sont cryptées avec FTP SSL.',
                        ],
                        [
                            'icon' => 'fa-share-alt',
                            'title' => 'Installation facile',
                            'desc' => 'Installation en 1 clic de plus de 300 applications via Softaculous.',
                        ],
                        [
                            'icon' => 'fa-empire',
                            'title' => 'Programmes disponibles',
                            'desc' => 'Bases de données MySQL illimitées, accès SSH, CGI, PHP, ASP, Python, SSL.',
                        ],
                    ];
                @endphp

                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="service-box p-4 shadow-sm h-100">
                            <i class="fa {{ $service['icon'] }} fa-2x mb-3"></i>
                            <h5>{{ $service['title'] }}</h5>
                            <p>{{ $service['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
