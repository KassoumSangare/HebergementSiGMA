{{-- ================================================================
     FOOTER — TICAFRIQUE
     Palette: #122457 · #2a4d84 · #4370aa · #84a1c0 · #bfcfdd · #fdfdfd
================================================================ --}}
<style>
    /* ── Footer vars (inherits from header :root if both loaded) ── */
    .tic-footer {
        --navy: #122457;
        --navy-md: #2a4d84;
        --navy-lt: #1a3366;
        --orange: #4370aa;
        --orange-lt: #84a1c0;
        --white: #fdfdfd;
        --muted: #84a1c0;
        --pale: #bfcfdd;
        --border: rgba(191, 207, 221, 0.18);
        --font-display: 'Clash Display', sans-serif;
        --font-body: 'DM Sans', sans-serif;
        --tr: .22s cubic-bezier(.4, 0, .2, 1);
        font-family: var(--font-body);
    }

    /* ── Newsletter band ── */
    .tic-footer__newsletter {
        background: linear-gradient(135deg, var(--navy-lt) 0%, var(--navy-md) 100%);
        border-bottom: 1px solid var(--border);
        padding: 40px 0;
    }

    .tic-footer__nl-inner {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 28px;
        flex-wrap: wrap;
    }

    .tic-footer__nl-copy h3 {
        font-family: var(--font-display);
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--white);
        margin: 0 0 4px;
    }

    .tic-footer__nl-copy p {
        color: var(--muted);
        font-size: .875rem;
        margin: 0;
    }

    .tic-footer__nl-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .tic-footer__nl-form input {
        padding: 11px 20px;
        border-radius: 100px;
        border: 1.5px solid var(--border);
        background: rgba(255, 255, 255, .06);
        color: var(--white);
        font-family: var(--font-body);
        font-size: .875rem;
        width: 280px;
        outline: none;
        transition: border-color var(--tr), background var(--tr);
    }

    .tic-footer__nl-form input::placeholder {
        color: var(--muted);
    }

    .tic-footer__nl-form input:focus {
        border-color: var(--orange);
        background: rgba(255, 255, 255, .09);
    }

    .tic-footer__nl-form button {
        padding: 11px 24px;
        border-radius: 100px;
        background: var(--orange);
        color: var(--white);
        font-weight: 600;
        font-size: .875rem;
        border: none;
        cursor: pointer;
        font-family: var(--font-body);
        transition: background var(--tr), transform var(--tr);
        white-space: nowrap;
    }

    .tic-footer__nl-form button:hover {
        background: var(--orange-lt);
        transform: translateY(-1px);
    }

    /* Flash alert override — slim */
    .tic-footer .alert {
        padding: 10px 16px;
        border-radius: 10px;
        font-size: .85rem;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ── Main footer ── */
    .tic-footer__main {
        background: var(--navy);
        padding: 64px 0 48px;
    }

    .tic-footer__grid {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 1.6fr 1fr 1fr 1.4fr;
        gap: 48px;
    }

    /* Brand column */
    .tic-footer__brand img {
        height: 36px;
        width: auto;
        margin-bottom: 18px;
        display: block;
    }

    .tic-footer__brand p {
        color: var(--muted);
        font-size: .875rem;
        line-height: 1.7;
        margin: 0 0 24px;
        max-width: 260px;
    }

    /* Contact list */
    .tic-footer__contact {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .tic-footer__contact li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        color: var(--muted);
        font-size: .875rem;
        line-height: 1.5;
    }

    .tic-footer__contact li i {
        color: var(--orange);
        flex-shrink: 0;
        margin-top: 2px;
        width: 14px;
        text-align: center;
    }

    .tic-footer__contact li a {
        color: inherit;
        transition: color var(--tr);
    }

    .tic-footer__contact li a:hover {
        color: var(--orange);
    }

    /* Socials */
    .tic-footer__socials {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .tic-footer__socials a {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: rgba(255, 255, 255, .06);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--muted);
        font-size: 1rem;
        transition: background var(--tr), color var(--tr), border-color var(--tr);
    }

    .tic-footer__socials a:hover {
        background: var(--orange);
        color: var(--white);
        border-color: var(--orange);
    }

    /* Link columns */
    .tic-footer__col h4 {
        font-family: var(--font-display);
        font-size: .9rem;
        font-weight: 600;
        color: var(--white);
        text-transform: uppercase;
        letter-spacing: .08em;
        margin: 0 0 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border);
    }

    .tic-footer__col ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .tic-footer__col ul li a {
        color: var(--muted);
        font-size: .875rem;
        transition: color var(--tr), padding-left var(--tr);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .tic-footer__col ul li a::before {
        content: '→';
        font-size: .72rem;
        opacity: 0;
        color: var(--orange);
        transition: opacity var(--tr);
    }

    .tic-footer__col ul li a:hover {
        color: var(--white);
        padding-left: 4px;
    }

    .tic-footer__col ul li a:hover::before {
        opacity: 1;
    }

    /* ── Divider ── */
    .tic-footer__divider {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
        border: none;
        border-top: 1px solid var(--border);
    }

    /* ── Bottom bar ── */
    .tic-footer__bottom {
        background: var(--navy);
        padding: 20px 0;
    }

    .tic-footer__bottom-inner {
        max-width: 1180px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .tic-footer__copy {
        color: var(--muted);
        font-size: .8rem;
    }

    .tic-footer__copy a {
        color: var(--muted);
        transition: color var(--tr);
    }

    .tic-footer__copy a:hover {
        color: var(--orange);
    }

    .tic-footer__legal {
        display: flex;
        gap: 20px;
    }

    .tic-footer__legal a {
        color: var(--muted);
        font-size: .8rem;
        transition: color var(--tr);
    }

    .tic-footer__legal a:hover {
        color: var(--white);
    }

    /* ── WhatsApp float ── */
    .tic-whatsapp {
        position: fixed;
        bottom: 28px;
        right: 28px;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: #25D366;
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        z-index: 900;
        box-shadow: 0 8px 28px rgba(37, 211, 102, .4);
        transition: transform var(--tr), box-shadow var(--tr);
        animation: wa-bounce 3s ease infinite;
    }

    .tic-whatsapp:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 36px rgba(37, 211, 102, .55);
        color: var(--white);
    }

    @keyframes wa-bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    /* Tooltip */
    .tic-whatsapp::before {
        content: 'Discutons sur WhatsApp';
        position: absolute;
        right: calc(100% + 12px);
        top: 50%;
        transform: translateY(-50%);
        background: var(--navy-md);
        color: var(--white);
        font-family: var(--font-body);
        font-size: .78rem;
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 8px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity var(--tr);
        border: 1px solid var(--border);
    }

    .tic-whatsapp:hover::before {
        opacity: 1;
    }

    /* ── Responsive ── */
    @media (max-width: 900px) {
        .tic-footer__grid {
            grid-template-columns: 1fr 1fr;
            gap: 36px;
        }

        .tic-footer__nl-inner {
            flex-direction: column;
            align-items: flex-start;
        }

        .tic-footer__nl-form input {
            width: 100%;
        }

        .tic-footer__nl-form {
            width: 100%;
        }
    }

    @media (max-width: 560px) {
        .tic-footer__grid {
            grid-template-columns: 1fr;
        }

        .tic-footer__bottom-inner {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<footer class="tic-footer" role="contentinfo">

    {{-- ── Newsletter band ── --}}
    <div class="tic-footer__newsletter">
        <div class="tic-footer__nl-inner">

            <div class="tic-footer__nl-copy">
                @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
                @endif
                <h3>Recevez nos offres &amp; nouveautés</h3>
                <p>Rejoignez +300 abonnés. Zéro spam, désinscription en 1 clic.</p>
            </div>

            <form action="{{ route('newsletter.store') }}" method="POST" class="tic-footer__nl-form">
                @csrf
                <input type="email" name="email" placeholder="votre@email.com" required autocomplete="email">
                <button type="submit">S'inscrire</button>
            </form>

        </div>
    </div>

    {{-- ── Main grid ── --}}
    <div class="tic-footer__main">
        <div class="tic-footer__grid">

            {{-- Brand + contact --}}
            <div class="tic-footer__brand">
                <img src="{{ asset('assets/images/logoweb.jpg') }}" alt="TICAFRIQUE">
                <p>Solutions d'hébergement web, noms de domaine et messagerie professionnelle pour les entreprises africaines depuis Abidjan.</p>

                <ul class="tic-footer__contact">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        Cocody-Angré, Belles Fleurs 3, Abidjan
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="tel:+2252522002077">+225 25 22 00 20 77</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:commercial@ticafrique.com">commercial@ticafrique.com</a>
                    </li>
                </ul>

                <div class="tic-footer__socials">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Twitter/X"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            {{-- Hébergement --}}
            <div class="tic-footer__col">
                <h4>Hébergement</h4>
                <ul>
                    <li><a href="{{ route('hebergement.mutualise') }}">Hébergement Mutualisé</a></li>
                    <li><a href="#">Hébergement WordPress</a></li>
                    <li><a href="#">Hébergement Windows</a></li>
                    <li><a href="#">Reseller Hosting</a></li>
                </ul>
            </div>

            {{-- Serveurs --}}
            <div class="tic-footer__col">
                <h4>Serveurs</h4>
                <ul>
                    <li><a href="#">Serveur Dédié Linux</a></li>
                    <li><a href="#">Serveur Dédié Windows</a></li>
                    <li><a href="#">Infogérance</a></li>
                    <li><a href="#">VPS</a></li>
                    <li><a href="#">Cloud</a></li>
                </ul>
            </div>

            {{-- Messagerie & Sécurité --}}
            <div class="tic-footer__col">
                <h4>Messagerie &amp; Sécurité</h4>
                <ul>
                    <li><a href="#">Business Email</a></li>
                    <li><a href="#">Google Workspace</a></li>
                    <li><a href="#">Titan Email</a></li>
                    <li><a href="#">Certificats SSL</a></li>
                    <li><a href="#">Sauvegarde</a></li>
                </ul>
            </div>

        </div>

        {{-- Divider --}}
        <hr class="tic-footer__divider" style="margin-top:48px;">
    </div>

    {{-- ── Bottom bar ── --}}
    <div class="tic-footer__bottom">
        <div class="tic-footer__bottom-inner">
            <span class="tic-footer__copy">
                © {{ date('Y') }} <a href="{{ url('/') }}">Tic@frica</a> — Tous droits réservés.
            </span>
            <div class="tic-footer__legal">
                <a href="#">Mentions légales</a>
                <a href="#">CGV</a>
                <a href="#">Confidentialité</a>
            </div>
        </div>
    </div>

    {{-- ── WhatsApp float ── --}}
    <a href="https://wa.me/22522002077"
        class="tic-whatsapp"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Contactez-nous sur WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

</footer>