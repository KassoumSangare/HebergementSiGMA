<!-- ================= FOOTER ================= -->
<footer class="footer">

    <!-- Top footer (newsletter légère) -->
    <div class="footer-top">
        <div class="container footer-top-content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <h3>Recevez nos offres et nouveautés</h3>

            <form action="{{ route('newsletter.store') }}" method="POST" class="footer-newsletter">
                @csrf
                <input type="email" name="email" placeholder="Votre adresse email" required>
                <button type="submit">S’inscrire</button>
            </form>
        </div>
    </div>

    <!-- Main footer -->
    <div class="footer-main">
        <div class="container footer-grid">

            <div class="footer-col">
                <h4>Hébergement</h4>
                <ul>
                    <li><a href="#">Hébergement mutualisé</a></li>
                    <li><a href="#">Hébergement WordPress</a></li>
                    <li><a href="#">Hébergement Windows</a></li>
                    <li><a href="#">Serveur VPS</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Serveurs</h4>
                <ul>
                    <li><a href="#">Serveur dédié Linux</a></li>
                    <li><a href="#">Serveur dédié Windows</a></li>
                    <li><a href="#">Infogérance</a></li>
                    <li><a href="#">Cloud</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Messagerie & Sécurité</h4>
                <ul>
                    <li><a href="#">Business Email</a></li>
                    <li><a href="#">Google Workspace</a></li>
                    <li><a href="#">Certificats SSL</a></li>
                    <li><a href="#">Sauvegarde</a></li>
                </ul>
            </div>

            <div class="footer-col">
              <div class="logo">
            <img src="{{ asset('assets/images/logoweb.jpg') }}" alt="Logo du site">
        </div>

                <ul class="footer-contact">
                    <li><i class="fa fa-map-marker"></i> Cocody-Angré, Belles Fleurs 3</li>
                    <li><i class="fa fa-phone"></i> +225 25 22 00 20 77</li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:commercial@ticafrique.com">
                            commercial@ticafrique.com
                        </a>
                    </li>
                </ul>

                <div class="footer-socials">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom -->
    <div class="footer-bottom">
        © 2025 Tic@frica — Tous droits réservés
    </div>
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/22522002077" class="whatsapp-float" target="_blank" aria-label="Contactez-nous sur WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>


</footer>
<!-- ================= END FOOTER ================= -->
