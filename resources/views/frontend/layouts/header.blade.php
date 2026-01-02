<!-- ================= TOP BAR ================= -->
<div class="topbar">
    <div class="container">
        <div class="topbar-left">
            <span><i class="fa fa-envelope"></i> info@ticafrique.com</span>
            <span><i class="fa fa-phone"></i> (+225) 25 22 00 20 77</span>
        </div>

        <div class="topbar-right">
            <a href="#">FAQ</a>
            <a href="#">Support</a>
            <a href="#">Nos Références</a>
        </div>
    </div>
</div>

<!-- ================= HEADER ================= -->
<header class="header">
    <div class="container header-content">
        <style>
            /* CONTENEUR DU LOGO */
            .logo {
                display: flex;
                /* pour centrer facilement si besoin */
                align-items: center;
                /* centre verticalement */
                justify-content: flex-start;
                /* change à center si tu veux centrer horizontalement */
                padding: 10px 0;
                /* espace autour du logo */
            }

            /* IMAGE DU LOGO */
            .logo img {
                height: 40px;
                /* ajuste la taille du logo */
                width: auto;
                /* conserve les proportions */
                display: block;
            }
        </style>

        <!-- HTML -->
        <div class="logo">
            <img src="{{ asset('assets/images/logoweb.jpg') }}" alt="Logo du site">
        </div>


        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('assets/images/logoweb.png') }}" alt="" height="20">
        </div>

        <!-- Burger -->
        <button class="menu-toggle" id="menuToggle">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Navigation -->
        <nav class="nav" id="navMenu">
            <ul class="menu">

                <li><a href="#">Accueil</a></li>

                <li class="has-dropdown">
                    <a href="#">Nom de domaine <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{ route('domaine.researcher') }}">Recherche de domaine</a></li>
                        <li><a href="{{ route('domaine.transfer') }}">Transfert</a></li>
                        <li><a href="{{ route('domaine.renew') }}">Renouvellement</a></li>
                    </ul>
                </li>


                <li class="has-dropdown">
                    <a href="#">Hébergement <i class="bi bi-database"></i> <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{ route('hebergement.mutualise') }}">Hébergement Mutualisé</a></li>
                        <li><a href="{{ route('hebergement.index_serveur_dedie') }}">Serveurs dédiés</a></li>
                        <li class="d-none"><a href="#">Hébergement Windows</a></li>
                        <li><a href="#">Reseller Hosting</a></li>
                    </ul>
                </li>

                <li class="has-dropdown">
                    <a href="#">Serveurs <i class="bi bi-hdd"></i><i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="#">Serveur Dédié Linux</a></li>
                        <li><a href="#">Serveur Dédié Windows</a></li>
                        <li><a href="#">Serveur Dédié Infogéré</a></li>
                        <li><a href="#">VPS</a></li>
                        <li><a href="#">VPS Infogéré</a></li>
                        <li><a href="#">Cloud</a></li>
                    </ul>
                </li>

                <li class="has-dropdown">
                    <a href="#">Messagerie <i class="bi bi-chat-left-text"></i><i
                            class="fa fa-angle-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="#">Enterprise Email</a></li>
                        <li><a href="#">Business Email</a></li>
                        <li><a href="#">Google Workspace</a></li>
                        <li><a href="#">Titan Email</a></li>
                    </ul>
                </li>

                <li class="has-dropdown">
                    <a href="#">Sécurité<i class="bi bi-shield-check"></i> <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="#">Sauvegarde</a></li>
                        <li><a href="#">Protection & Sécurité</a></li>
                    </ul>
                </li>

                <li><a href="#">Contact</a></li>

            </ul>
        </nav>
    </div>
</header>
