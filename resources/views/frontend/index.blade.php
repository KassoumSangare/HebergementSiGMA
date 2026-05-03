@extends('frontend.layouts.base')

@section('title', 'TICAFRIQUE — Hébergement Web Professionnel en Côte d\'Ivoire')

@section('content')

  {{-- ============================================================
  STYLES — welcome.blade.php
  Palette TICAFRIQUE : #122457 · #2a4d84 · #4370aa · #84a1c0 · #bfcfdd · #fdfdfd
  Framework : Bootstrap 5 (grille) + CSS custom
  Fonts : Clash Display (display) + DM Sans (body)
  ============================================================ --}}
  <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap');
    @import url('https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap');

    /* ── Tokens ── */
    :root {
      --navy: #122457;
      --navy-md: #2a4d84;
      --navy-lt: #1a3366;
      --blue: #4370aa;
      --blue-lt: #84a1c0;
      --white: #fdfdfd;
      --grey-bg: #eef2f7;
      --muted: #84a1c0;
      --pale: #bfcfdd;
      --border: rgba(191, 207, 221, .25);
      --border-dk: rgba(255, 255, 255, .1);
      --radius-sm: 10px;
      --radius: 16px;
      --radius-lg: 24px;
      --shadow: 0 20px 56px rgba(18, 36, 87, .14);
      --shadow-lg: 0 32px 80px rgba(18, 36, 87, .22);
      --font-d: 'Clash Display', sans-serif;
      --font-b: 'DM Sans', sans-serif;
      --tr: .28s cubic-bezier(.4, 0, .2, 1);
    }

    /* ── Reset ── */
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      font-family: var(--font-b);
      color: var(--navy);
      background: var(--white);
    }

    a {
      text-decoration: none;
    }

    img {
      max-width: 100%;
    }

    /* ── Utilities ── */
    .w-section {
      padding: 88px 0;
    }

    .w-section--dark {
      background: var(--navy);
      color: var(--white);
    }

    .w-section--grey {
      background: var(--grey-bg);
    }

    .w-tag {
      display: inline-block;
      padding: 5px 14px;
      border-radius: 100px;
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .1em;
      text-transform: uppercase;
      margin-bottom: 14px;
    }

    .w-tag--blue {
      background: rgba(67, 112, 170, .12);
      color: var(--blue);
    }

    .w-tag--light {
      background: rgba(255, 255, 255, .12);
      color: rgba(255, 255, 255, .8);
    }

    .w-heading {
      font-family: var(--font-d);
      font-size: clamp(1.9rem, 3.8vw, 2.9rem);
      font-weight: 700;
      line-height: 1.15;
    }

    .w-heading em {
      color: var(--blue);
      font-style: normal;
    }

    .w-heading--light {
      color: var(--white);
    }

    .w-heading--light em {
      background: linear-gradient(135deg, var(--pale), var(--blue-lt));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .w-sub {
      color: var(--muted);
      font-size: 1rem;
      line-height: 1.72;
      margin-top: 14px;
    }

    .w-sub--light {
      color: rgba(255, 255, 255, .55);
    }

    /* Buttons */
    .w-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 26px;
      border-radius: 100px;
      font-weight: 600;
      font-size: .9rem;
      cursor: pointer;
      transition: var(--tr);
      border: none;
      font-family: var(--font-b);
      white-space: nowrap;
    }

    .w-btn--primary {
      background: var(--blue);
      color: var(--white);
    }

    .w-btn--primary:hover {
      background: var(--navy-md);
      color: var(--white);
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(67, 112, 170, .35);
    }

    .w-btn--outline {
      background: transparent;
      border: 1.5px solid rgba(255, 255, 255, .3);
      color: var(--white);
    }

    .w-btn--outline:hover {
      border-color: var(--pale);
      color: var(--pale);
      transform: translateY(-2px);
    }

    .w-btn--light-outline {
      background: transparent;
      border: 1.5px solid var(--pale);
      color: var(--navy);
    }

    .w-btn--light-outline:hover {
      border-color: var(--blue);
      color: var(--blue);
      background: rgba(67, 112, 170, .05);
    }

    /* ── Fade-in animation (triggered by IntersectionObserver) ── */
    .fade-up {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity .6s ease, transform .6s ease;
    }

    .fade-up.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .fade-up-d1 {
      transition-delay: .1s;
    }

    .fade-up-d2 {
      transition-delay: .2s;
    }

    .fade-up-d3 {
      transition-delay: .3s;
    }

    .fade-up-d4 {
      transition-delay: .4s;
    }

    .fade-up-d5 {
      transition-delay: .5s;
    }

    /* ──────────────────────────────────────────────
       1. HERO
    ────────────────────────────────────────────── */
    .hero {
      position: relative;
      min-height: 90vh;
      background: var(--navy);
      overflow: hidden;
      display: flex;
      align-items: center;
      padding: 90px 0 70px;
    }

    .hero__bg {
      position: absolute;
      inset: 0;
      background-image: url('{{ asset("build/icons/bg-home.jpg") }}');
      background-size: cover;
      background-position: center;
      opacity: .08;
      pointer-events: none;
    }

    .hero__blob-1 {
      position: absolute;
      width: 650px;
      height: 650px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(67, 112, 170, .25) 0%, transparent 70%);
      top: -120px;
      right: -80px;
      pointer-events: none;
    }

    .hero__blob-2 {
      position: absolute;
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(191, 207, 221, .1) 0%, transparent 70%);
      bottom: -80px;
      left: -60px;
      pointer-events: none;
    }

    .hero__content {
      position: relative;
      z-index: 2;
    }

    .hero__eyebrow {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 22px;
    }

    .hero__dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #22c55e;
      box-shadow: 0 0 0 4px rgba(34, 197, 94, .2);
      animation: dot-pulse 2.2s ease infinite;
      flex-shrink: 0;
    }

    @keyframes dot-pulse {

      0%,
      100% {
        box-shadow: 0 0 0 4px rgba(34, 197, 94, .2);
      }

      50% {
        box-shadow: 0 0 0 9px rgba(34, 197, 94, .07);
      }
    }

    .hero__eyebrow span {
      color: rgba(255, 255, 255, .5);
      font-size: .8rem;
      letter-spacing: .08em;
      text-transform: uppercase;
    }

    .hero__title {
      font-family: var(--font-d);
      font-size: clamp(2.6rem, 5.5vw, 4.2rem);
      font-weight: 700;
      color: var(--white);
      line-height: 1.08;
      margin-bottom: 18px;
    }

    .hero__title .accent {
      background: linear-gradient(135deg, var(--pale) 0%, var(--blue-lt) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero__tagline {
      color: rgba(255, 255, 255, .45);
      font-size: .82rem;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    .hero__tagline span {
      color: rgba(255, 255, 255, .7);
    }

    .hero__desc {
      color: rgba(255, 255, 255, .55);
      font-size: 1rem;
      line-height: 1.78;
      max-width: 490px;
      margin-bottom: 36px;
    }

    .hero__actions {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
    }

    .hero__since {
      margin-top: 44px;
      display: flex;
      align-items: center;
      gap: 16px;
      padding-top: 30px;
      border-top: 1px solid rgba(191, 207, 221, .15);
    }

    .hero__since-num {
      font-family: var(--font-d);
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--white);
      line-height: 1;
    }

    .hero__since-num span {
      color: var(--blue-lt);
      font-size: 1rem;
    }

    .hero__since-text {
      color: rgba(255, 255, 255, .45);
      font-size: .82rem;
      line-height: 1.5;
    }

    .hero__since-text strong {
      display: block;
      color: rgba(255, 255, 255, .75);
      font-weight: 600;
    }

    /* Hero image side */
    .hero__visual {
      position: relative;
      z-index: 2;
    }

    .hero__img-wrap {
      border-radius: var(--radius-lg);
      overflow: hidden;
      position: relative;
      box-shadow: 0 32px 80px rgba(0, 0, 0, .4);
    }

    .hero__img-wrap img {
      width: 100%;
      height: 440px;
      object-fit: cover;
      display: block;
    }

    .hero__img-badge {
      position: absolute;
      bottom: 24px;
      left: 24px;
      right: 24px;
      background: rgba(18, 36, 87, .85);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(191, 207, 221, .2);
      border-radius: 14px;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .hero__img-badge-icon {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: var(--blue);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .hero__img-badge-icon svg {
      color: white;
    }

    .hero__img-badge-text strong {
      display: block;
      color: white;
      font-weight: 700;
      font-size: .95rem;
    }

    .hero__img-badge-text span {
      color: var(--muted);
      font-size: .8rem;
    }

    .hero__float-card {
      position: absolute;
      top: -16px;
      right: -20px;
      background: var(--navy-md);
      border: 1px solid var(--border-dk);
      border-radius: 14px;
      padding: 14px 18px;
      text-align: center;
      min-width: 130px;
    }

    .hero__float-card .num {
      font-family: var(--font-d);
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--white);
      line-height: 1;
    }

    .hero__float-card .num span {
      color: #22c55e;
    }

    .hero__float-card .lbl {
      color: var(--muted);
      font-size: .73rem;
      margin-top: 4px;
    }

    /* ──────────────────────────────────────────────
       2. FEATURES STRIP
    ────────────────────────────────────────────── */
    .strip {
      background: var(--grey-bg);
      border-top: 1px solid var(--pale);
      border-bottom: 1px solid var(--pale);
      padding: 22px 0;
    }

    .strip__list {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 18px;
      align-items: center;
    }

    .strip__item {
      display: flex;
      align-items: center;
      gap: 9px;
      font-size: .85rem;
      font-weight: 500;
      color: var(--navy);
    }

    .strip__item svg {
      color: var(--blue);
      flex-shrink: 0;
    }

    /* ──────────────────────────────────────────────
       3. SERVICES / PRICING CARDS
    ────────────────────────────────────────────── */
    .services {
      background: var(--white);
    }

    .services__tabs {
      display: flex;
      gap: 6px;
      flex-wrap: wrap;
      border-bottom: 1px solid var(--pale);
      margin-bottom: 48px;
    }

    .services__tab {
      padding: 10px 22px;
      border-radius: 100px 100px 0 0;
      font-size: .88rem;
      font-weight: 600;
      cursor: pointer;
      background: none;
      border: none;
      color: var(--muted);
      font-family: var(--font-b);
      transition: var(--tr);
      position: relative;
      bottom: -1px;
      border-bottom: 2px solid transparent;
    }

    .services__tab.active {
      color: var(--blue);
      border-bottom-color: var(--blue);
      background: rgba(67, 112, 170, .06);
    }

    .services__tab .badge-sale {
      display: inline-block;
      font-size: .62rem;
      font-weight: 800;
      padding: 2px 6px;
      border-radius: 6px;
      background: #22c55e;
      color: white;
      margin-left: 6px;
      vertical-align: middle;
      letter-spacing: .04em;
      text-transform: uppercase;
    }

    .services__panel {
      display: none;
    }

    .services__panel.active {
      display: block;
    }

    /* Expert col */
    .expert-col {
      background: var(--navy);
      border-radius: var(--radius-lg);
      padding: 36px 28px;
      height: 100%;
      color: var(--white);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      overflow: hidden;
    }

    .expert-col::before {
      content: '';
      position: absolute;
      right: -40px;
      bottom: -40px;
      width: 220px;
      height: 220px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(67, 112, 170, .3) 0%, transparent 70%);
      pointer-events: none;
    }

    .expert-col__title {
      font-family: var(--font-d);
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--white);
      line-height: 1.2;
      margin-bottom: 16px;
    }

    .expert-col__title em {
      color: var(--pale);
      font-style: normal;
    }

    .expert-col__desc {
      color: rgba(255, 255, 255, .5);
      font-size: .88rem;
      line-height: 1.7;
      margin-bottom: 24px;
    }

    .expert-col__img {
      border-radius: var(--radius);
      overflow: hidden;
      margin-bottom: 24px;
      height: 180px;
    }

    .expert-col__img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: brightness(.8) saturate(1.1);
    }

    /* Pricing cards */
    .price-card {
      border: 1.5px solid var(--pale);
      border-radius: var(--radius-lg);
      overflow: hidden;
      transition: var(--tr);
      background: var(--white);
      height: 100%;
    }

    .price-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow);
      border-color: var(--blue);
    }

    .price-card__head {
      padding: 24px 24px 18px;
      background: linear-gradient(135deg, var(--grey-bg) 0%, var(--white) 100%);
    }

    .price-card__icon {
      width: 48px;
      height: 48px;
      background: rgba(67, 112, 170, .1);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 16px;
    }

    .price-card__icon svg {
      color: var(--blue);
    }

    .price-card__name {
      font-family: var(--font-d);
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 6px;
    }

    .price-card__tagline {
      color: var(--muted);
      font-size: .8rem;
    }

    .price-card__body {
      padding: 18px 24px 24px;
    }

    .price-card__from {
      color: var(--muted);
      font-size: .75rem;
      margin-bottom: 4px;
      text-transform: uppercase;
      letter-spacing: .06em;
    }

    .price-card__price {
      font-family: var(--font-d);
      font-size: 2.4rem;
      font-weight: 700;
      color: var(--navy);
      line-height: 1;
    }

    .price-card__price sup {
      font-size: .9rem;
      vertical-align: top;
      padding-top: 8px;
    }

    .price-card__price sub {
      font-size: .8rem;
      color: var(--muted);
      font-weight: 400;
    }

    .price-card__link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 16px;
      font-size: .82rem;
      font-weight: 600;
      color: var(--blue);
      transition: var(--tr);
    }

    .price-card__link:hover {
      color: var(--navy-md);
      gap: 10px;
    }

    /* ──────────────────────────────────────────────
       4. MANAGED HOSTING FEATURES (2-col)
    ────────────────────────────────────────────── */
    .managed {
      background: var(--grey-bg);
    }

    .managed__card {
      border: 1.5px solid var(--pale);
      border-radius: var(--radius-lg);
      padding: 32px;
      height: 100%;
      background: var(--white);
    }

    .managed__card-title {
      font-family: var(--font-d);
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--blue);
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .managed__card-title svg {
      background: rgba(67, 112, 170, .1);
      padding: 6px;
      border-radius: 8px;
      color: var(--blue);
    }

    .managed__feat-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .managed__feat {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 10px;
    }

    .managed__feat-icon {
      width: 56px;
      height: 56px;
      border-radius: 14px;
      background: var(--grey-bg);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .managed__feat-icon svg {
      color: var(--blue);
    }

    .managed__feat-label {
      font-size: .82rem;
      font-weight: 500;
      color: var(--navy);
      line-height: 1.4;
    }

    /* ──────────────────────────────────────────────
       5. THREE STEPS
    ────────────────────────────────────────────── */
    .steps {
      background: var(--white);
    }

    .steps__connector {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .steps__connector-line {
      flex: 1;
      height: 1px;
      background: linear-gradient(90deg, transparent, var(--pale), transparent);
    }

    .step-card {
      text-align: center;
      position: relative;
    }

    .step-card__num {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: var(--blue);
      color: white;
      font-family: var(--font-d);
      font-size: 1.3rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      position: relative;
      z-index: 1;
      box-shadow: 0 8px 24px rgba(67, 112, 170, .35);
    }

    .step-card__img {
      width: 120px;
      height: 120px;
      border-radius: var(--radius);
      object-fit: cover;
      margin: 0 auto 20px;
      display: block;
      filter: drop-shadow(0 8px 20px rgba(18, 36, 87, .12));
    }

    .step-card__title {
      font-family: var(--font-d);
      font-size: 1rem;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 10px;
    }

    .step-card__desc {
      color: var(--muted);
      font-size: .85rem;
      line-height: 1.65;
    }

    /* ──────────────────────────────────────────────
       6. PERFORMANCE SECTION (split)
    ────────────────────────────────────────────── */
    .perf {
      background: var(--navy);
    }

    .perf__img-wrap {
      border-radius: var(--radius-lg);
      overflow: hidden;
      position: relative;
      height: 100%;
      min-height: 360px;
    }

    .perf__img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      filter: brightness(.8) saturate(1.3);
    }

    .perf__img-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(18, 36, 87, .6) 0%, transparent 60%);
    }

    .perf__list {
      list-style: none;
      padding: 0;
      margin: 24px 0;
      display: flex;
      flex-direction: column;
      gap: 11px;
    }

    .perf__list li {
      display: flex;
      align-items: center;
      gap: 10px;
      color: rgba(255, 255, 255, .65);
      font-size: .88rem;
    }

    .perf__list li svg {
      color: #22c55e;
      flex-shrink: 0;
    }

    /* ──────────────────────────────────────────────
       7. FEATURES GRID (6-up)
    ────────────────────────────────────────────── */
    .feats {
      background: var(--grey-bg);
    }

    .feat-card {
      background: var(--white);
      border: 1.5px solid var(--pale);
      border-radius: var(--radius-lg);
      padding: 32px;
      text-align: center;
      transition: var(--tr);
      height: 100%;
    }

    .feat-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow);
      border-color: var(--blue);
    }

    .feat-card__icon {
      width: 70px;
      height: 70px;
      border-radius: 18px;
      background: rgba(67, 112, 170, .08);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
    }

    .feat-card__icon svg {
      color: var(--blue);
    }

    .feat-card__icon img {
      width: 38px;
      height: 38px;
      object-fit: contain;
    }

    .feat-card__title {
      font-family: var(--font-d);
      font-size: 1rem;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 10px;
    }

    .feat-card__desc {
      color: var(--muted);
      font-size: .85rem;
      line-height: 1.65;
    }

    /* ──────────────────────────────────────────────
       8. STATS / SUPPORT
    ────────────────────────────────────────────── */
    .stats-section {
      background: var(--navy);
    }

    .stat-box {
      border-radius: var(--radius-lg);
      padding: 32px 24px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .stat-box--blue {
      background: var(--blue);
    }

    .stat-box--teal {
      background: #1eadaa;
    }

    .stat-box--grey {
      background: var(--navy-md);
    }

    .stat-box__num {
      font-family: var(--font-d);
      font-size: 2.8rem;
      font-weight: 700;
      color: white;
      line-height: 1;
      margin-bottom: 8px;
    }

    .stat-box__label {
      color: rgba(255, 255, 255, .75);
      font-size: .88rem;
      line-height: 1.4;
    }

    .stat-box__icon {
      position: absolute;
      top: 16px;
      right: 16px;
      opacity: .2;
    }

    .stat-box__icon svg {
      width: 40px;
      height: 40px;
      color: white;
    }

    /* Support channels */
    .support-card {
      background: rgba(255, 255, 255, .05);
      border: 1px solid var(--border-dk);
      border-radius: var(--radius);
      padding: 24px;
      text-align: center;
      transition: var(--tr);
      height: 100%;
    }

    .support-card:hover {
      background: rgba(67, 112, 170, .12);
      border-color: rgba(191, 207, 221, .25);
    }

    .support-card__icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      background: rgba(67, 112, 170, .15);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 14px;
    }

    .support-card__icon svg {
      color: var(--pale);
    }

    .support-card__title {
      font-family: var(--font-d);
      font-weight: 700;
      font-size: .95rem;
      color: white;
      margin-bottom: 8px;
    }

    .support-card__desc {
      color: var(--muted);
      font-size: .82rem;
      line-height: 1.55;
    }

    /* ──────────────────────────────────────────────
       9. CLIENT PRIORITY
    ────────────────────────────────────────────── */
    .priority {
      background: var(--white);
    }

    .priority__card {
      border: 1.5px solid var(--pale);
      border-radius: var(--radius-lg);
      padding: 32px 28px;
      height: 100%;
      transition: var(--tr);
    }

    .priority__card:hover {
      border-color: var(--blue);
      transform: translateY(-4px);
      box-shadow: var(--shadow);
    }

    .priority__icon {
      width: 58px;
      height: 58px;
      border-radius: 16px;
      background: rgba(67, 112, 170, .1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }

    .priority__icon svg {
      color: var(--blue);
    }

    .priority__title {
      font-family: var(--font-d);
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 10px;
    }

    .priority__desc {
      color: var(--muted);
      font-size: .88rem;
      line-height: 1.7;
    }

    .priority__desc strong {
      color: var(--navy);
    }

    /* ──────────────────────────────────────────────
       10. SECURITY
    ────────────────────────────────────────────── */
    .security {
      background: var(--grey-bg);
    }

    .security__list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .security__list li {
      background: var(--white);
      border: 1.5px solid var(--pale);
      border-radius: var(--radius);
      padding: 18px 22px;
      display: flex;
      align-items: flex-start;
      gap: 14px;
      transition: var(--tr);
    }

    .security__list li:hover {
      border-color: var(--blue);
      transform: translateX(4px);
    }

    .security__list li svg {
      color: var(--blue);
      flex-shrink: 0;
      margin-top: 2px;
    }

    .security__list li .text strong {
      display: block;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 3px;
      font-size: .9rem;
    }

    .security__list li .text span {
      color: var(--muted);
      font-size: .82rem;
      line-height: 1.55;
    }

    .security__visual {
      border-radius: var(--radius-lg);
      overflow: hidden;
      height: 100%;
      min-height: 320px;
      position: relative;
    }

    .security__visual img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .security__visual-badge {
      position: absolute;
      bottom: 24px;
      left: 24px;
      right: 24px;
      background: rgba(18, 36, 87, .88);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(191, 207, 221, .2);
      border-radius: 12px;
      padding: 16px 20px;
    }

    .security__visual-badge strong {
      color: white;
      display: block;
      font-weight: 700;
      font-size: .95rem;
      margin-bottom: 4px;
    }

    .security__visual-badge span {
      color: var(--muted);
      font-size: .8rem;
    }

    /* ──────────────────────────────────────────────
       11. TESTIMONIALS
    ────────────────────────────────────────────── */
    .testimonials {
      background: var(--navy);
    }

    .testi-card {
      background: var(--navy-md);
      border: 1px solid var(--border-dk);
      border-radius: var(--radius-lg);
      padding: 32px;
      height: 100%;
      position: relative;
      overflow: hidden;
      transition: var(--tr);
    }

    .testi-card:hover {
      border-color: rgba(191, 207, 221, .25);
      transform: translateY(-4px);
    }

    .testi-card__quote {
      color: var(--blue-lt);
      font-size: 3rem;
      font-family: Georgia, serif;
      line-height: 1;
      margin-bottom: 16px;
      opacity: .6;
    }

    .testi-card__text {
      color: rgba(255, 255, 255, .65);
      font-size: .9rem;
      line-height: 1.75;
      margin-bottom: 24px;
      font-style: italic;
    }

    .testi-card__author {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .testi-card__avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      overflow: hidden;
      border: 2px solid var(--border-dk);
      flex-shrink: 0;
    }

    .testi-card__avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .testi-card__name {
      font-weight: 700;
      color: white;
      font-size: .9rem;
    }

    .testi-card__company {
      color: var(--muted);
      font-size: .78rem;
    }

    .testi-card__stars {
      color: #f59e0b;
      font-size: .9rem;
      margin-bottom: 16px;
    }

    /* ──────────────────────────────────────────────
       12. FAQ
    ────────────────────────────────────────────── */
    .faq {
      background: var(--white);
    }

    .faq__cats {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 32px;
    }

    .faq__cat {
      padding: 7px 18px;
      border-radius: 100px;
      border: 1.5px solid var(--pale);
      font-size: .82rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--tr);
      background: none;
      font-family: var(--font-b);
      color: var(--muted);
    }

    .faq__cat.active,
    .faq__cat:hover {
      border-color: var(--blue);
      color: var(--blue);
      background: rgba(67, 112, 170, .06);
    }

    .faq__item {
      border: 1.5px solid var(--pale);
      border-radius: var(--radius);
      overflow: hidden;
      margin-bottom: 10px;
    }

    .faq__q {
      width: 100%;
      background: none;
      border: none;
      text-align: left;
      padding: 18px 22px;
      font-family: var(--font-b);
      font-size: .9rem;
      font-weight: 600;
      color: var(--navy);
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      transition: var(--tr);
    }

    .faq__q:hover {
      color: var(--blue);
    }

    .faq__q svg {
      flex-shrink: 0;
      transition: transform .32s ease;
    }

    .faq__q[aria-expanded="true"] svg {
      transform: rotate(45deg);
    }

    .faq__a {
      max-height: 0;
      overflow: hidden;
      transition: max-height .36s ease;
    }

    .faq__a.open {
      max-height: 240px;
    }

    .faq__a-inner {
      padding: 0 22px 18px;
      color: var(--muted);
      font-size: .88rem;
      line-height: 1.72;
    }

    /* ──────────────────────────────────────────────
       13. CTA BANNER
    ────────────────────────────────────────────── */
    .cta-banner {
      background: linear-gradient(135deg, var(--navy) 0%, var(--navy-md) 100%);
      border-radius: var(--radius-lg);
      padding: 60px 52px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 24px;
      position: relative;
      overflow: hidden;
    }

    .cta-banner::before {
      content: '';
      position: absolute;
      right: -60px;
      top: -60px;
      width: 280px;
      height: 280px;
      border-radius: 50%;
      background: rgba(67, 112, 170, .12);
      pointer-events: none;
    }

    .cta-banner__title {
      font-family: var(--font-d);
      font-size: 2rem;
      font-weight: 700;
      color: white;
      position: relative;
      z-index: 1;
    }

    .cta-banner__sub {
      color: rgba(255, 255, 255, .5);
      font-size: .95rem;
      margin-top: 8px;
      position: relative;
      z-index: 1;
    }

    .cta-banner__actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      flex-shrink: 0;
      position: relative;
      z-index: 1;
    }

    /* ── Price card spec list ── */
    .price-card__specs {
      list-style: none;
      padding: 0;
      margin: 16px 0 20px;
      display: flex;
      flex-direction: column;
      gap: 8px;
      border-top: 1px solid var(--pale);
      padding-top: 16px;
    }

    .price-card__specs li {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      font-size: .82rem;
    }

    .price-card__specs li .spec-label {
      color: var(--muted);
      display: flex;
      align-items: center;
      gap: 6px;
      flex-shrink: 0;
    }

    .price-card__specs li .spec-label svg {
      color: var(--blue);
      flex-shrink: 0;
    }

    .price-card__specs li .spec-val {
      font-weight: 700;
      color: var(--navy);
      text-align: right;
    }

    /* Featured card dark head — spec values light */
    .price-card--featured .price-card__head {
      background: var(--navy) !important;
    }

    .price-card--featured .price-card__name {
      color: var(--white) !important;
    }

    .price-card--featured .price-card__tagline {
      color: var(--muted) !important;
    }

    .price-card--featured .price-card__icon {
      background: rgba(255, 255, 255, .1) !important;
    }

    /* Other plans badge */
    .price-card--other .price-card__head {
      background: var(--grey-bg);
    }

    .price-card--other .price-card__body {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 28px 24px;
    }

    .price-card--other .price-card__other-msg {
      color: var(--muted);
      font-size: .88rem;
      line-height: 1.7;
      margin: 16px 0 24px;
      font-style: italic;
    }

    /* Popular ribbon */
    .price-card__ribbon {
      display: inline-block;
      background: #22c55e;
      color: white;
      font-size: .65rem;
      font-weight: 800;
      letter-spacing: .08em;
      text-transform: uppercase;
      padding: 3px 10px;
      border-radius: 100px;
      margin-bottom: 10px;
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {
      .hero__float-card {
        display: none;
      }

      .cta-banner {
        flex-direction: column;
        text-align: center;
        padding: 40px 28px;
      }

      .managed__feat-grid {
        grid-template-columns: 1fr 1fr;
      }

      .steps__connector {
        display: none;
      }
    }

    @media (max-width: 767px) {
      .w-section {
        padding: 60px 0;
      }

      .hero {
        padding: 70px 0 50px;
        min-height: auto;
      }

      .hero__title {
        font-size: 2.4rem;
      }

      .strip__list {
        justify-content: flex-start;
      }

      .managed__feat-grid {
        grid-template-columns: 1fr 1fr;
        gap: 14px;
      }
    }

    @media (max-width: 575px) {
      .hero__img-wrap {
        display: none;
      }

      .managed__feat-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>

  {{-- ================================================================
  1. HERO
  ================================================================ --}}
  <section class="hero" aria-label="Section principale">
    <div class="hero__bg" aria-hidden="true"></div>
    <div class="hero__blob-1" aria-hidden="true"></div>
    <div class="hero__blob-2" aria-hidden="true"></div>

    <div class="container">
      <div class="row align-items-center g-5">

        {{-- Copy --}}
        <div class="col-lg-6 hero__content">
          <div class="hero__eyebrow fade-up">
            <div class="hero__dot" aria-hidden="true"></div>
            <span>Hébergeur professionnel depuis 11 ans</span>
          </div>

          <h1 class="hero__title fade-up fade-up-d1">
            DÉCOUVREZ<br>UN HÉBERGEMENT<br><span class="accent">WEB PUISSANT</span>
          </h1>

          <p class="hero__tagline fade-up fade-up-d2">
            <span>Hébergement mutualisé</span> | <span>VPS</span> |
            <span>Serveur dédié</span> | <span>Hébergement revendeur</span>
          </p>

          <p class="hero__desc fade-up fade-up-d2">
            Depuis <strong style="color:rgba(255,255,255,.85)">11 ans</strong>, TICAFRIQUE accompagne
            les professionnels du web vers le succès grâce à une large gamme de services d'hébergement
            et <strong style="color:rgba(255,255,255,.85)">une assistance</strong> rapide et performante 24h/24 et 7j/7.
          </p>

          <div class="hero__actions fade-up fade-up-d3">
            <a href="#services" class="w-btn w-btn--primary">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
              Voir les produits
            </a>
            <a href="https://wa.me/22522002077" target="_blank" rel="noopener" class="w-btn w-btn--outline">
              <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path
                  d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592" />
              </svg>
              Planifiez un rappel
            </a>
          </div>

          <div class="hero__since fade-up fade-up-d4">
            <div>
              <div class="hero__since-num">11<span>ans</span></div>
            </div>
            <div class="hero__since-text">
              <strong>Expertise reconnue</strong>
              Accompagnement des professionnels<br>du web en Côte d'Ivoire et en Afrique
            </div>
            <div class="ms-auto">
              <div class="hero__since-num">860<span>+</span></div>
              <div class="hero__since-text" style="text-align:right;">
                <strong>Clients satisfaits</strong>
              </div>
            </div>
          </div>
        </div>

        {{-- Visual --}}
        <div class="col-lg-6 hero__visual fade-up fade-up-d2">
          <div class="hero__float-card">
            <div class="num">99<span>%</span></div>
            <div class="lbl">Disponibilité<br>garantie</div>
          </div>
          <div class="hero__img-wrap">
            <img src="{{ asset('assets/images/hebergement.jpg') }}" alt="Hébergement web professionnel TICAFRIQUE"
              loading="eager">
            <div class="hero__img-badge">
              <div class="hero__img-badge-icon">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
              </div>
              <div class="hero__img-badge-text">
                <strong>Activé en quelques minutes</strong>
                <span>cPanel + SSL + Sauvegardes inclus</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ================================================================
  FEATURES STRIP
  ================================================================ --}}
  <div class="strip" aria-label="Points clés">
    <div class="container">
      <div class="strip__list">
        <div class="strip__item">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
          SSL Gratuit
        </div>
        <div class="strip__item">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
          Sauvegardes quotidiennes
        </div>
        <div class="strip__item">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
          Support 24h/7j
        </div>
        <div class="strip__item">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
          Installation CMS 1 clic
        </div>
        <div class="strip__item">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
          </svg>
          Remboursé sous 30j
        </div>
        <div class="strip__item">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
          cPanel inclus
        </div>
      </div>
    </div>
  </div>

  {{-- ================================================================
  2. SERVICES — Tabbed pricing grid
  ================================================================ --}}
  <section class="w-section services" id="services" aria-labelledby="services-heading">
    <div class="container">

      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--blue">Nos solutions</span>
        <h2 class="w-heading" id="services-heading">
          Une gamme de solutions <em>robustes</em><br>pour tous les professionnels
        </h2>
        <p class="w-sub" style="max-width:560px;margin:0 auto;">
          Vous ne savez pas quel forfait d'hébergement vous convient ? <a href="https://wa.me/22522002077" target="_blank"
            rel="noopener" style="color:var(--blue);font-weight:600;">Contactez-nous sur WhatsApp</a>.
        </p>
      </div>

      {{-- Tabs --}}
      <div class="services__tabs fade-up" role="tablist" aria-label="Catégories de services">
        <button class="services__tab active" role="tab" aria-selected="true" aria-controls="tab-servers"
          onclick="switchTab(this,'tab-servers')">
          Serveurs <span class="badge-sale">SALE</span>
        </button>
        <button class="services__tab" role="tab" aria-selected="false" aria-controls="tab-cloud"
          onclick="switchTab(this,'tab-cloud')">
          Hébergement cloud
        </button>
        <button class="services__tab" role="tab" aria-selected="false" aria-controls="tab-web"
          onclick="switchTab(this,'tab-web')">
          Hébergement Web
        </button>
      </div>

      {{-- Panel: Serveurs --}}
      <div class="services__panel active" id="tab-servers" role="tabpanel">
        <div class="row g-4">

          {{-- Expert col --}}
          <div class="col-lg-3 fade-up">
            <div class="expert-col">
              <div>
                <h3 class="expert-col__title">Une équipe d'<em>experts</em> à votre service</h3>
                <p class="expert-col__desc">
                  Nous sommes conscients des défis liés au métier d'hébergeur et de l'importance cruciale de
                  l'infrastructure.
                  Notre équipe répond rapidement et efficacement dans la langue de votre choix.
                </p>
              </div>
              <div class="expert-col__img">
                <img src="{{ asset('assets/images/support.png') }}" alt="Équipe support TICAFRIQUE" loading="lazy">
              </div>
              <a href="https://wa.me/22522002077" target="_blank" rel="noopener" class="w-btn w-btn--outline"
                style="width:100%;justify-content:center;">
                <svg width="15" height="15" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                  <path
                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326z" />
                </svg>
                Planifiez un rappel
              </a>
            </div>
          </div>

          {{-- VPS --}}
          <div class="col-lg-3 col-md-6 fade-up fade-up-d1">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <rect x="2" y="2" width="20" height="8" rx="2" />
                    <rect x="2" y="14" width="20" height="8" rx="2" />
                    <path stroke-linecap="round" d="M6 6h.01M6 18h.01" />
                  </svg>
                </div>
                <div class="price-card__name">Hébergement de serveurs VPS</div>
                <div class="price-card__tagline">VPS SSD haute performance basé sur KVM</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price">
                  <sup>FCFA </sup>2 400<sub>/mo</sub>
                </div>
                <a href="{{ route('hebergement.index_serveur_dedie') }}" class="price-card__link">
                  Consulter les plans
                  <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          {{-- VPS géré --}}
          <div class="col-lg-3 col-md-6 fade-up fade-up-d2">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                  </svg>
                </div>
                <div class="price-card__name">Hébergement VPS géré</div>
                <div class="price-card__tagline">VPS haute performance avec SSD et HDD, basé sur KVM</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price">
                  <sup>FCFA </sup>50 000<sub>/mo</sub>
                </div>
                <a href="{{ route('hebergement.index_serveur_dedie') }}" class="price-card__link">
                  Consulter les plans
                  <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          {{-- Serveur dédié --}}
          <div class="col-lg-3 col-md-6 fade-up fade-up-d3">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h7" />
                  </svg>
                </div>
                <div class="price-card__name">Serveur dédié</div>
                <div class="price-card__tagline">Performances et sécurité optimales pour votre activité</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price">
                  <sup>FCFA </sup>62 000<sub>/mo</sub>
                </div>
                <a href="{{ route('hebergement.index_serveur_dedie') }}" class="price-card__link">
                  Consulter les plans
                  <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          {{-- Dédié géré --}}
          <div class="col-lg-3 col-md-6 offset-lg-3 fade-up fade-up-d4">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                  </svg>
                </div>
                <div class="price-card__name">Serveur dédié géré</div>
                <div class="price-card__tagline">Services gérés et assistance experte pour votre hébergement</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price">
                  <sup>FCFA </sup>110 000<sub>/mo</sub>
                </div>
                <a href="{{ route('hebergement.index_serveur_dedie') }}" class="price-card__link">
                  Consulter les plans
                  <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

        </div>{{-- /row --}}
      </div>{{-- /panel servers --}}

      {{-- Panel: Cloud --}}
      <div class="services__panel" id="tab-cloud" role="tabpanel">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 fade-up">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                  </svg>
                </div>
                <div class="price-card__name">Cloud Starter</div>
                <div class="price-card__tagline">Idéal pour les PME et startups</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price"><sup>FCFA </sup>15 000<sub>/mo</sub></div>
                <a href="{{ route('hebergement.commander') }}" class="price-card__link">Consulter les plans <svg
                    width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 fade-up fade-up-d1">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18" />
                  </svg>
                </div>
                <div class="price-card__name">Cloud Business</div>
                <div class="price-card__tagline">Ressources dédiées et hautes performances</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price"><sup>FCFA </sup>35 000<sub>/mo</sub></div>
                <a href="{{ route('hebergement.commander') }}" class="price-card__link">Consulter les plans <svg
                    width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 fade-up fade-up-d2">
            <div class="price-card">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <div class="price-card__name">Cloud Enterprise</div>
                <div class="price-card__tagline">Infrastructure évolutive pour grandes entreprises</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">À partir de</div>
                <div class="price-card__price"><sup>FCFA </sup>90 000<sub>/mo</sub></div>
                <a href="{{ route('hebergement.commander') }}" class="price-card__link">Consulter les plans <svg
                    width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                  </svg></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Panel: Web (Linux) — tarifs réels + specs complètes --}}
      <div class="services__panel" id="tab-web" role="tabpanel">
        <div class="row g-4 align-items-stretch">

          {{-- ── Présence ── --}}
          <div class="col-lg-3 col-md-6 fade-up">
            <div class="price-card h-100">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                  </svg>
                </div>
                <div class="price-card__name">Présence</div>
                <div class="price-card__tagline">Idéal pour votre 1er site web</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">Prix annuel TTC</div>
                <div class="price-card__price"><sup>FCFA </sup>54 000<sub>/an</sub></div>

                <ul class="price-card__specs" role="list">
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                      </svg>
                      Espace disque
                    </span>
                    <span class="spec-val">100 Go</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      Domaines hébergeables
                    </span>
                    <span class="spec-val">1</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                      </svg>
                      Bande passante
                    </span>
                    <span class="spec-val">1 000 Go</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      Emails POP
                    </span>
                    <span class="spec-val">100</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10m16-10v10M4 12h16" />
                      </svg>
                      Serveurs FTP privés
                    </span>
                    <span class="spec-val">2</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <ellipse cx="12" cy="5" rx="9" ry="3" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 12c0 1.657-4.03 3-9 3S3 13.657 3 12M21 19c0 1.657-4.03 3-9 3S3 20.657 3 19" />
                        <path d="M21 5v14M3 5v14" />
                      </svg>
                      Bases de données
                    </span>
                    <span class="spec-val">3</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                      </svg>
                      Remboursement
                    </span>
                    <span class="spec-val">30 jours</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path stroke-linecap="round" d="M8 21h8M12 17v4" />
                      </svg>
                      Serveur HTTP
                    </span>
                    <span class="spec-val">Apache 2.4</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      Système
                    </span>
                    <span class="spec-val">CentOS 7</span>
                  </li>
                </ul>

                <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--light-outline"
                  style="width:100%;justify-content:center;font-size:.85rem;">
                  Commander →
                </a>
              </div>
            </div>
          </div>

          {{-- ── Confort MDH Business (featured) ── --}}
          <div class="col-lg-3 col-md-6 fade-up fade-up-d1">
            <div class="price-card price-card--featured h-100"
              style="border-color:var(--blue);box-shadow:0 20px 56px rgba(67,112,170,.25);">
              <div class="price-card__head">
                <span class="price-card__ribbon">Recommandé</span>
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                  </svg>
                </div>
                <div class="price-card__name">Confort MDH Business</div>
                <div class="price-card__tagline">Idéal pour les PME</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">Prix annuel TTC</div>
                <div class="price-card__price"><sup>FCFA </sup>90 000<sub>/an</sub></div>

                <ul class="price-card__specs" role="list">
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                      </svg>
                      Espace disque
                    </span>
                    <span class="spec-val">300 Go</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      Domaines hébergeables
                    </span>
                    <span class="spec-val">3</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                      </svg>
                      Bande passante
                    </span>
                    <span class="spec-val">3 000 Go</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      Emails POP
                    </span>
                    <span class="spec-val">300</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10m16-10v10M4 12h16" />
                      </svg>
                      Serveurs FTP privés
                    </span>
                    <span class="spec-val">2</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <ellipse cx="12" cy="5" rx="9" ry="3" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 12c0 1.657-4.03 3-9 3S3 13.657 3 12M21 19c0 1.657-4.03 3-9 3S3 20.657 3 19" />
                        <path d="M21 5v14M3 5v14" />
                      </svg>
                      Bases de données
                    </span>
                    <span class="spec-val">10</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                      </svg>
                      Remboursement
                    </span>
                    <span class="spec-val">30 jours</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path stroke-linecap="round" d="M8 21h8M12 17v4" />
                      </svg>
                      Serveur HTTP
                    </span>
                    <span class="spec-val">Apache 2.4</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      Système
                    </span>
                    <span class="spec-val">CentOS 7</span>
                  </li>
                </ul>

                <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--primary"
                  style="width:100%;justify-content:center;font-size:.85rem;">
                  Commander →
                </a>
              </div>
            </div>
          </div>

          {{-- ── Prestige MHD PRO ── --}}
          <div class="col-lg-3 col-md-6 fade-up fade-up-d2">
            <div class="price-card h-100">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                </div>
                <div class="price-card__name">Prestige MHD PRO</div>
                <div class="price-card__tagline">Solution complète, multi-domaines</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from">Prix annuel TTC</div>
                <div class="price-card__price"><sup>FCFA </sup>102 000<sub>/an</sub></div>

                <ul class="price-card__specs" role="list">
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2" />
                      </svg>
                      Espace disque
                    </span>
                    <span class="spec-val">750 Go</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      Domaines hébergeables
                    </span>
                    <span class="spec-val">10</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                      </svg>
                      Bande passante
                    </span>
                    <span class="spec-val">Illimitée</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      Emails POP
                    </span>
                    <span class="spec-val">Illimité</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10m16-10v10M4 12h16" />
                      </svg>
                      Serveurs FTP privés
                    </span>
                    <span class="spec-val">10</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <ellipse cx="12" cy="5" rx="9" ry="3" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 12c0 1.657-4.03 3-9 3S3 13.657 3 12M21 19c0 1.657-4.03 3-9 3S3 20.657 3 19" />
                        <path d="M21 5v14M3 5v14" />
                      </svg>
                      Bases de données
                    </span>
                    <span class="spec-val">20</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                      </svg>
                      Remboursement
                    </span>
                    <span class="spec-val">30 jours</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path stroke-linecap="round" d="M8 21h8M12 17v4" />
                      </svg>
                      Serveur HTTP
                    </span>
                    <span class="spec-val">Apache 2.4</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      Système
                    </span>
                    <span class="spec-val">CentOS 7</span>
                  </li>
                </ul>

                <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--light-outline"
                  style="width:100%;justify-content:center;font-size:.85rem;">
                  Commander →
                </a>
              </div>
            </div>
          </div>

          {{-- ── Autres formules ── --}}
          <div class="col-lg-3 col-md-6 fade-up fade-up-d3">
            <div class="price-card price-card--other h-100">
              <div class="price-card__head">
                <div class="price-card__icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                  </svg>
                </div>
                <div class="price-card__name">Autres formules</div>
                <div class="price-card__tagline">Plan sur mesure selon vos besoins</div>
              </div>
              <div class="price-card__body">
                <div class="price-card__from" style="margin-top:4px;">Sur devis personnalisé</div>
                <div class="price-card__price" style="font-size:1.5rem;margin-top:8px;">
                  <span style="color:var(--blue);">Contactez-nous</span>
                </div>

                <p class="price-card__other-msg">
                  Votre projet a des besoins spécifiques ? Nous construisons un plan d'hébergement sur mesure — espace,
                  domaines, emails, BDD — selon vos contraintes.
                </p>

                <ul class="price-card__specs" role="list" style="width:100%;">
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                      </svg>
                      Espace disque
                    </span>
                    <span class="spec-val">Sur mesure</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                      </svg>
                      Domaines & emails
                    </span>
                    <span class="spec-val">Sur mesure</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                      </svg>
                      Support dédié
                    </span>
                    <span class="spec-val">Inclus</span>
                  </li>
                  <li>
                    <span class="spec-label">
                      <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                      </svg>
                      Remboursement
                    </span>
                    <span class="spec-val">30 jours</span>
                  </li>
                </ul>

                <a href="https://wa.me/22522002077" target="_blank" rel="noopener" class="w-btn w-btn--primary"
                  style="width:100%;justify-content:center;font-size:.85rem;margin-top:auto;">
                  <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path
                      d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326z" />
                  </svg>
                  Nous contacter
                </a>
              </div>
            </div>
          </div>

        </div>{{-- /row --}}

        {{-- Note commune --}}
        <p class="text-center mt-4 fade-up" style="color:var(--muted);font-size:.83rem;">
          Tous les plans incluent : <strong style="color:var(--navy);">cPanel</strong> · <strong
            style="color:var(--navy);">SSL gratuit</strong> · <strong style="color:var(--navy);">Webmail</strong> ·
          <strong style="color:var(--navy);">Modification DNS</strong> · <strong style="color:var(--navy);">Configuration
            Outlook</strong> · <strong style="color:var(--navy);">Sauvegardes quotidiennes</strong>
        </p>

      </div>{{-- /panel web --}}

    </div>
  </section>

  {{-- ================================================================
  3. MANAGED HOSTING FEATURES (VPS géré vs Dédié géré)
  ================================================================ --}}
  <section class="w-section managed" aria-labelledby="managed-heading">
    <div class="container">
      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--blue">Infogérance</span>
        <h2 class="w-heading" id="managed-heading">Services d'hébergement <em>dédiés & VPS</em><br>en infogérance</h2>
        <p class="w-sub" style="max-width:580px;margin:0 auto;">
          Bénéficiez de performances optimales, d'une sécurité maximale et d'une assistance dédiée pour une gestion
          simplifiée de vos serveurs.
        </p>
      </div>

      <div class="row g-4">

        {{-- VPS géré --}}
        <div class="col-md-6 fade-up">
          <div class="managed__card">
            <div class="managed__card-title">
              <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <rect x="2" y="2" width="20" height="8" rx="2" />
                <rect x="2" y="14" width="20" height="8" rx="2" />
                <path stroke-linecap="round" d="M6 6h.01M6 18h.01" />
              </svg>
              Hébergement VPS géré
            </div>
            <div class="managed__feat-grid">
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                </div>
                <div class="managed__feat-label">Convient aux sites de petite et moyenne taille</div>
              </div>
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                  </svg>
                </div>
                <div class="managed__feat-label">Gestion sécurité & mises à jour logicielles</div>
              </div>
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div class="managed__feat-label">Configuration serveur, migration et plus encore</div>
              </div>
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </div>
                <div class="managed__feat-label">Assistance dédiée 24h/24 et 7j/7</div>
              </div>
            </div>
          </div>
        </div>

        {{-- Dédié géré --}}
        <div class="col-md-6 fade-up fade-up-d1">
          <div class="managed__card">
            <div class="managed__card-title">
              <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h7" />
              </svg>
              Hébergement dédié géré
            </div>
            <div class="managed__feat-grid">
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <div class="managed__feat-label">Adapté aux sites à fort trafic</div>
              </div>
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5" />
                  </svg>
                </div>
                <div class="managed__feat-label">Infrastructure haute performance</div>
              </div>
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                  </svg>
                </div>
                <div class="managed__feat-label">Experts hébergement certifiés et formés</div>
              </div>
              <div class="managed__feat">
                <div class="managed__feat-icon">
                  <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                </div>
                <div class="managed__feat-label">Assistance avancée 24h/24 et 7j/7</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ================================================================
  4. THREE STEPS
  ================================================================ --}}
  <section class="w-section steps" id="get-started" aria-labelledby="steps-heading">
    <div class="container">

      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--blue">Démarrage rapide</span>
        <h2 class="w-heading" id="steps-heading">Mettez votre site web en ligne<br>en <em>trois étapes</em> simples</h2>
        <p class="w-sub" style="max-width:600px;margin:0 auto;">
          Nous vous aidons à concrétiser vos idées. Des meilleurs noms de domaine aux formules d'hébergement les plus
          abordables, nous sommes votre interlocuteur unique.
        </p>
      </div>

      <div class="row g-4 align-items-center">

        {{-- Step 1 --}}
        <div class="col-md-4 fade-up">
          <div class="step-card">
            <div class="step-card__num" aria-label="Étape 1">1</div>
            <img src="{{ asset('assets/images/hebergement.jpg') }}" alt="Choisir un forfait d'hébergement"
              class="step-card__img" loading="lazy">
            <h3 class="step-card__title">Choisissez un forfait<br>d'hébergement adapté</h3>
            <p class="step-card__desc">Choisissez le forfait adapté à vos besoins. Besoin d'aide ? Contactez nos experts
              en hébergement.</p>
          </div>
        </div>

        {{-- Connector --}}
        <div class="col-md-auto d-none d-md-block steps__connector fade-up fade-up-d1">
          <svg width="40" height="16" viewBox="0 0 40 16" fill="none" aria-hidden="true">
            <path d="M0 8h36M30 2l8 6-8 6" stroke="var(--pale)" stroke-width="1.5" stroke-linecap="round" />
          </svg>
        </div>

        {{-- Step 2 --}}
        <div class="col-md-4 fade-up fade-up-d2">
          <div class="step-card">
            <div class="step-card__num" aria-label="Étape 2">2</div>
            <img src="{{ asset('assets/images/mondial.png') }}" alt="Rechercher un nom de domaine"
              class="step-card__img" loading="lazy">
            <h3 class="step-card__title">Rechercher et acheter<br>un nom de domaine</h3>
            <p class="step-card__desc">Choisissez un nom de domaine simple, mémorable et qui laisse une impression
              durable.</p>
          </div>
        </div>

        {{-- Connector --}}
        <div class="col-md-auto d-none d-md-block steps__connector fade-up fade-up-d3">
          <svg width="40" height="16" viewBox="0 0 40 16" fill="none" aria-hidden="true">
            <path d="M0 8h36M30 2l8 6-8 6" stroke="var(--pale)" stroke-width="1.5" stroke-linecap="round" />
          </svg>
        </div>

        {{-- Step 3 --}}
        <div class="col-md-4 fade-up fade-up-d4">
          <div class="step-card">
            <div class="step-card__num" aria-label="Étape 3">3</div>
            <img src="{{ asset('assets/images/installation.png') }}" alt="Mettre en ligne son site web"
              class="step-card__img" loading="lazy">
            <h3 class="step-card__title">Téléchargez les données<br>de votre site web</h3>
            <p class="step-card__desc">Téléchargez vos fichiers ou créez un site via WordPress. Configurez vos DNS et
              mettez votre site en ligne.</p>
          </div>
        </div>

      </div>

      <div class="text-center mt-5 fade-up fade-up-d3">
        <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--primary">
          <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
          Commencer maintenant
        </a>
      </div>

    </div>
  </section>

  {{-- ================================================================
  5. PERFORMANCE (split section)
  ================================================================ --}}
  <section class="w-section perf" aria-labelledby="perf-heading">
    <div class="container">
      <div class="row g-5 align-items-center">

        {{-- Image --}}
        <div class="col-lg-5 fade-up">
          <div class="perf__img-wrap">
            <img src="{{ asset('assets/images/hebergement.jpg') }}" alt="Performances d'hébergement cloud TICAFRIQUE"
              loading="lazy">
            <div class="perf__img-overlay" aria-hidden="true"></div>
          </div>
        </div>

        {{-- Content --}}
        <div class="col-lg-7 fade-up fade-up-d1">
          <span class="w-tag w-tag--light">Infrastructure</span>
          <h2 class="w-heading w-heading--light" id="perf-heading">
            Des performances d'hébergement<br><em>inégalées</em> qui vous font briller
          </h2>
          <p class="w-sub w-sub--light">Vitesse, fiabilité et contrôle supérieur, le tout dans un seul appareil !</p>

          <ul class="perf__list" role="list">
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Serveurs haute performance (SSD NVMe)
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Mesures de sécurité avancées
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Ressources évolutives à la demande
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Services d'hébergement gérés
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Assistance dédiée 24h/24 et 7j/7
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Centres de données mondiaux
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Aide gratuite à la migration
            </li>
            <li>
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Garantie de remboursement de 30 jours
            </li>
          </ul>

          <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--primary" style="margin-top:8px;">
            Voir tous les produits
          </a>
        </div>

      </div>
    </div>
  </section>

  {{-- ================================================================
  6. FEATURES GRID (6-up)
  ================================================================ --}}
  <section class="w-section feats" aria-labelledby="feats-heading">
    <div class="container">
      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--blue">Avantages inclus</span>
        <h2 class="w-heading" id="feats-heading">Un hébergement qui répond à tous<br>les besoins des
          <em>professionnels</em></h2>
      </div>

      <div class="row g-4">

        <div class="col-lg-4 col-md-6 fade-up">
          <div class="feat-card">
            <div class="feat-card__icon">
              <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <div class="feat-card__title">Installation facile</div>
            <div class="feat-card__desc">Notre plateforme est conçue pour mettre votre site web en ligne rapidement et
              sans tracas, en quelques clics.</div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d1">
          <div class="feat-card">
            <div class="feat-card__icon">
              <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"
                aria-hidden="true">
                <rect x="2" y="3" width="20" height="14" rx="2" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8M12 17v4" />
              </svg>
            </div>
            <div class="feat-card__title">WHM et cPanel</div>
            <div class="feat-card__desc">La gestion de votre hébergement devient un jeu d'enfant avec WHM et cPanel, des
              outils simples et efficaces.</div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d2">
          <div class="feat-card">
            <div class="feat-card__icon">
              <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
              </svg>
            </div>
            <div class="feat-card__title">Migration libre</div>
            <div class="feat-card__desc">La migration de votre site est facile grâce à notre service gratuit : sans
              stress, sans interruption, sans perte de données.</div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d1">
          <div class="feat-card">
            <div class="feat-card__icon">
              <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div class="feat-card__title">Softaculous</div>
            <div class="feat-card__desc">Softaculous simplifie la création de sites avec plus de 400 applications pour
              blogs, forums et boutiques en ligne.</div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d2">
          <div class="feat-card">
            <div class="feat-card__icon">
              <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
              </svg>
            </div>
            <div class="feat-card__title">Protection Cloudflare</div>
            <div class="feat-card__desc">Cloudflare optimise votre domaine et votre hébergement grâce à une sécurité et
              des performances de vitesse de pointe.</div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d3">
          <div class="feat-card">
            <div class="feat-card__icon">
              <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"
                aria-hidden="true">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12,6 12,12 16,14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
              </svg>
            </div>
            <div class="feat-card__title">Disponibilité de 99,99%</div>
            <div class="feat-card__desc">Une garantie de disponibilité de 99,99 % assure à vos plans d'hébergement un
              service constant et fiable.</div>
          </div>
        </div>

      </div>

      <div class="text-center mt-5 fade-up">
        <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--light-outline">
          Voir tous les produits →
        </a>
      </div>
    </div>
  </section>

  {{-- ================================================================
  7. CLIENT PRIORITY
  ================================================================ --}}
  <section class="w-section priority" aria-labelledby="priority-heading">
    <div class="container">
      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--blue">Pourquoi TICAFRIQUE</span>
        <h2 class="w-heading" id="priority-heading">Nos clients sont notre priorité.<br>C'est pourquoi vous ne méritez que
          <em>le meilleur</em>.</h2>
      </div>

      <div class="row g-4">

        <div class="col-lg-4 col-md-6 fade-up">
          <div class="priority__card">
            <div class="priority__icon">
              <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div class="priority__title">Échelle et expertise éprouvées</div>
            <div class="priority__desc">
              Nous servons plus de <strong>860 clients</strong> en Côte d'Ivoire et en Afrique. Notre équipe gère
              plus de <strong>551 sites hébergés</strong> et <strong>128 domaines enregistrés</strong>.
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d1">
          <div class="priority__card">
            <div class="priority__icon">
              <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <div class="priority__title">Assistance rapide et de qualité</div>
            <div class="priority__desc">
              Assistance dédiée et spécialisée 24h/24 et 7j/7 assurée par notre <strong>équipe d'experts</strong> avec une
              personne dédiée pour chaque client.
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d2">
          <div class="priority__card">
            <div class="priority__icon">
              <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <div class="priority__title">Garantie de remboursement 30 jours</div>
            <div class="priority__desc">
              Vous n'êtes pas satisfait de votre achat ? Obtenez un <strong>remboursement intégral</strong>, sans aucune
              question posée dans les 30 jours.
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ================================================================
  8. STATS + SUPPORT CHANNELS
  ================================================================ --}}
  <section class="w-section stats-section" aria-labelledby="stats-heading">
    <div class="container">

      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--light">Nos chiffres</span>
        <h2 class="w-heading w-heading--light" id="stats-heading">
          Assistance rapide et de <em>qualité supérieure</em>
        </h2>
        <p class="w-sub w-sub--light" style="max-width:520px;margin:0 auto;">
          Notre équipe d'assistance vous offre une aide et des conseils de premier ordre.
        </p>
      </div>

      {{-- Stat boxes --}}
      <div class="row g-3 mb-5">
        <div class="col-md-4 fade-up">
          <div class="stat-box stat-box--blue">
            <div class="stat-box__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12,6 12,12 16,14" stroke="currentColor" stroke-width="1.5" />
              </svg>
            </div>
            <div class="stat-box__num">10<span style="font-size:1.4rem;">s</span></div>
            <div class="stat-box__label">Temps d'attente moyen<br>pour nos clients</div>
          </div>
        </div>
        <div class="col-md-4 fade-up fade-up-d1">
          <div class="stat-box stat-box--teal">
            <div class="stat-box__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
            </div>
            <div class="stat-box__num">60<span style="font-size:1.4rem;">s</span></div>
            <div class="stat-box__label">Temps de réponse<br>du chat en direct</div>
          </div>
        </div>
        <div class="col-md-4 fade-up fade-up-d2">
          <div class="stat-box stat-box--grey">
            <div class="stat-box__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
            </div>
            <div class="stat-box__num">4,65<span style="font-size:1.4rem;">/5</span></div>
            <div class="stat-box__label">Score CSAT<br>satisfaction client</div>
          </div>
        </div>
      </div>

      {{-- Support channels --}}
      <div class="row g-3">
        <div class="col-lg-3 col-md-6 fade-up">
          <div class="support-card">
            <div class="support-card__icon">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
            </div>
            <div class="support-card__title">Chat en direct</div>
            <div class="support-card__desc">Bénéficiez d'une assistance par chat 24h/24 et 7j/7 assurée par notre équipe
              d'experts.</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 fade-up fade-up-d1">
          <div class="support-card">
            <div class="support-card__icon">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div class="support-card__title">Courriel d'assistance</div>
            <div class="support-card__desc">Envoyez-nous vos questions via le panneau ou à <a
                href="mailto:commercial@ticafrique.com" style="color:var(--pale);">commercial@ticafrique.com</a>.</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 fade-up fade-up-d2">
          <div class="support-card">
            <div class="support-card__icon">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div class="support-card__title">Contactez-nous</div>
            <div class="support-card__desc"><a href="tel:+2252522002077" style="color:var(--pale);">(+225) 25 22 00 20
                77</a><br>Disponible tous les jours</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 fade-up fade-up-d3">
          <div class="support-card">
            <div class="support-card__icon">
              <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
            </div>
            <div class="support-card__title">Centre d'assistance</div>
            <div class="support-card__desc">Trouvez des réponses instantanément en consultant notre base de connaissances.
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  {{-- ================================================================
  9. SECURITY
  ================================================================ --}}
  <section class="w-section security" aria-labelledby="security-heading">
    <div class="container">
      <div class="row g-5 align-items-center">

        {{-- List --}}
        <div class="col-lg-7 fade-up">
          <span class="w-tag w-tag--blue">Sécurité avancée</span>
          <h2 class="w-heading mb-4" id="security-heading">
            Fonctions de sécurité<br><em>avancées</em>
          </h2>
          <p class="w-sub mb-4">
            Nous proposons des fonctionnalités de sécurité d'hébergement web de pointe pour protéger votre site contre les
            menaces potentielles.
          </p>

          <ul class="security__list" role="list">
            <li>
              <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
              <div class="text">
                <strong>Certificats SSL/TLS gratuits</strong>
                <span>Pour chiffrer le trafic de votre site et gagner la confiance de vos clients.</span>
              </div>
            </li>
            <li>
              <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg>
              <div class="text">
                <strong>Mises à jour et sauvegardes automatiques</strong>
                <span>Pour protéger votre site contre les dangers imprévus en permanence.</span>
              </div>
            </li>
            <li>
              <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
              </svg>
              <div class="text">
                <strong>Cloudflare anti-DDoS</strong>
                <span>Protège les serveurs de noms de domaine contre les attaques DDoS de grande envergure.</span>
              </div>
            </li>
            <li>
              <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
              <div class="text">
                <strong>Surveillance des serveurs 24h/24 et 7j/7</strong>
                <span>Pour la détection et la prévention précoces des menaces et incidents.</span>
              </div>
            </li>
          </ul>
        </div>

        {{-- Visual --}}
        <div class="col-lg-5 fade-up fade-up-d1">
          <div class="security__visual">
            <img src="{{ asset('assets/images/server_dedie.png') }}" alt="Sécurité hébergement TICAFRIQUE"
              loading="lazy">
            <div class="security__visual-badge">
              <strong>Protection maximale incluse</strong>
              <span>SSL · DDoS · Sauvegardes · Pare-feu applicatif</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ================================================================
  10. TESTIMONIALS
  ================================================================ --}}
  <section class="w-section testimonials" aria-labelledby="testi-heading">
    <div class="container">
      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--light">Témoignages</span>
        <h2 class="w-heading w-heading--light" id="testi-heading">
          Fournir de l'énergie à <em>nos clients</em>
        </h2>
        <p class="w-sub w-sub--light" style="max-width:500px;margin:0 auto;">
          Ne vous fiez pas seulement à nos dires, voici ce que certains de nos clients ont à dire.
        </p>
      </div>

      <div class="row g-4">

        <div class="col-lg-4 col-md-6 fade-up">
          <div class="testi-card">
            <div class="testi-card__quote" aria-hidden="true">"</div>
            <div class="testi-card__stars" aria-label="5 étoiles">★★★★★</div>
            <p class="testi-card__text">Au fil des ans, TICAFRIQUE a fait preuve d'une grande capacité d'innovation. Notre
              gamme de produits n'a cessé de s'étoffer, nous permettant d'offrir davantage de services et d'accroître nos
              sources de revenus.</p>
            <div class="testi-card__author">
              <div class="testi-card__avatar">
                <img src="{{ asset('assets/images/domaine.png') }}" alt="Client JustHostMe" loading="lazy">
              </div>
              <div>
                <div class="testi-card__name">Konan A.</div>
                <div class="testi-card__company">JustHostMe — Abidjan</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d1">
          <div class="testi-card">
            <div class="testi-card__quote" aria-hidden="true">"</div>
            <div class="testi-card__stars" aria-label="5 étoiles">★★★★★</div>
            <p class="testi-card__text">Nous avions besoin de proposer davantage de solutions à nos clients. Après avoir
              testé les produits TICAFRIQUE, nous avons été impressionnés par leur nombre, leur qualité et leurs prix.
              Nous avons même migré notre site principal chez eux.</p>
            <div class="testi-card__author">
              <div class="testi-card__avatar">
                <img src="{{ asset('assets/images/domaine.png') }}" alt="Client Solutions Web" loading="lazy">
              </div>
              <div>
                <div class="testi-card__name">Diabaté M.</div>
                <div class="testi-card__company">Solutions Web Startec</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 fade-up fade-up-d2">
          <div class="testi-card">
            <div class="testi-card__quote" aria-hidden="true">"</div>
            <div class="testi-card__stars" aria-label="5 étoiles">★★★★★</div>
            <p class="testi-card__text">En ce qui concerne les services de TICAFRIQUE, le point le plus important à
              souligner est la qualité de leur assistance. Disponible 24h/24 et 7j/7, elle nous permet de maîtriser les
              attaques et de garantir notre politique de disponibilité.</p>
            <div class="testi-card__author">
              <div class="testi-card__avatar">
                <img src="{{ asset('assets/images/domaine.png') }}" alt="Client Solution Infinity" loading="lazy">
              </div>
              <div>
                <div class="testi-card__name">Touré S.</div>
                <div class="testi-card__company">Solution Infinity Pvt Ltd</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ================================================================
  11. FAQ
  ================================================================ --}}
  <section class="w-section faq" id="faq" aria-labelledby="faq-heading">
    <div class="container" style="max-width:820px;">
      <div class="text-center mb-5 fade-up">
        <span class="w-tag w-tag--blue">FAQ</span>
        <h2 class="w-heading" id="faq-heading">Foire aux questions</h2>
      </div>

      {{-- Category pills --}}
      <div class="faq__cats fade-up" role="group" aria-label="Filtrer par catégorie">
        <button class="faq__cat active" onclick="filterFaq(this,'all')">Tous</button>
        <button class="faq__cat" onclick="filterFaq(this,'hebergement')">Hébergement</button>
        <button class="faq__cat" onclick="filterFaq(this,'revendeur')">Programme revendeurs</button>
        <button class="faq__cat" onclick="filterFaq(this,'facturation')">Facturation</button>
        <button class="faq__cat" onclick="filterFaq(this,'assistance')">Assistance & migration</button>
      </div>

      <div class="faq__list fade-up" id="faq-accordion">

        <div class="faq__item" data-cat="hebergement">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            Qu'est-ce que l'hébergement web ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              L'hébergement web est un service qui permet d'héberger des sites web pour ses clients et de les rendre
              accessibles sur Internet. Chez TICAFRIQUE, nos services offrent aux particuliers et aux PME une plateforme
              idéale pour développer leur activité en ligne grâce à une architecture de pointe et un support expert.
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="hebergement">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            Pourquoi ai-je besoin d'un site web pour mon entreprise ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              Un site web permet à votre entreprise d'être visible 24h/24 sur Internet, d'atteindre de nouveaux clients,
              de renforcer votre crédibilité et de développer vos ventes en ligne. C'est un investissement indispensable
              pour toute entreprise moderne.
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="hebergement">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            Quels sont les différents types d'hébergement web proposés ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              TICAFRIQUE propose : l'hébergement mutualisé (idéal pour débuter), le VPS (plus de ressources dédiées), les
              serveurs dédiés (performances maximales), le Reseller hosting (pour les webmasters) et le Cloud (évolutivité
              totale).
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="hebergement">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            En combien de temps mon hébergement est-il activé ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              Votre hébergement est activé instantanément dès confirmation du paiement. Vous recevez vos accès cPanel par
              email dans les minutes suivantes.
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="revendeur">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            TICAFRIQUE est-il avantageux pour les petites entreprises ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              Absolument. Nos plans mutualisés à partir de 54 000 FCFA/an sont spécialement conçus pour les PME et
              startups. Vous bénéficiez des mêmes garanties de fiabilité et de sécurité que les grands comptes, avec un
              budget maîtrisé.
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="facturation">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            Le choix de mon hébergement dépend-il de mon système d'exploitation ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              Non, votre système d'exploitation (Mac, Windows, Linux) n'influence pas votre choix d'hébergement. Nos plans
              fonctionnent avec tous les systèmes. Le choix dépend plutôt de votre type de site, du trafic attendu et de
              votre budget.
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="assistance">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            Est-il possible de changer de plan après souscription ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              Oui, vous pouvez upgrader vers un plan supérieur à tout moment depuis votre espace client, sans interruption
              de service. Notre équipe vous accompagne dans la migration.
            </div>
          </div>
        </div>

        <div class="faq__item" data-cat="facturation">
          <button class="faq__q" onclick="toggleFaq(this)" aria-expanded="false">
            Proposez-vous une garantie satisfait ou remboursé ?
            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
          </button>
          <div class="faq__a">
            <div class="faq__a-inner">
              Absolument. Si vous n'êtes pas satisfait dans les 30 jours suivant votre commande, nous vous remboursons
              intégralement, sans aucune condition.
            </div>
          </div>
        </div>

      </div>{{-- /accordion --}}
    </div>
  </section>

  {{-- ================================================================
  12. CTA BANNER
  ================================================================ --}}
  <section class="w-section w-section--grey" style="padding-top:0;">
    <div class="container">
      <div class="cta-banner fade-up">
        <div>
          <div class="cta-banner__title">Prêt à lancer votre site web ?</div>
          <div class="cta-banner__sub">Démarrez dès aujourd'hui avec un plan adapté à votre budget.</div>
        </div>
        <div class="cta-banner__actions">
          <a href="{{ route('hebergement.commander') }}" class="w-btn w-btn--primary">
            Choisir mon hébergement
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
              aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </a>
          <a href="https://wa.me/22522002077" target="_blank" rel="noopener" class="w-btn w-btn--outline">
            Nous contacter
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- ================================================================
  VANILLA JS — Interactions
  ================================================================ --}}
  <script>
    (function () {
      'use strict';

      /* ── 1. IntersectionObserver — Fade-up on scroll ── */
      const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            io.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

      document.querySelectorAll('.fade-up').forEach(el => io.observe(el));

      /* ── 2. Smooth scroll for anchor links ── */
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
        });
      });

      /* ── 3. Services tab switcher ── */
      window.switchTab = function (clickedBtn, panelId) {
        // Update tab buttons
        document.querySelectorAll('.services__tab').forEach(btn => {
          btn.classList.remove('active');
          btn.setAttribute('aria-selected', 'false');
        });
        clickedBtn.classList.add('active');
        clickedBtn.setAttribute('aria-selected', 'true');

        // Show matching panel
        document.querySelectorAll('.services__panel').forEach(panel => {
          panel.classList.remove('active');
        });
        const target = document.getElementById(panelId);
        if (target) {
          target.classList.add('active');
          // Re-trigger fade-ups in the new panel
          target.querySelectorAll('.fade-up').forEach(el => {
            el.classList.remove('visible');
            setTimeout(() => el.classList.add('visible'), 30);
          });
        }
      };

      /* ── 4. FAQ accordion ── */
      window.toggleFaq = function (btn) {
        const isOpen = btn.getAttribute('aria-expanded') === 'true';
        // Close all
        document.querySelectorAll('.faq__q').forEach(q => {
          q.setAttribute('aria-expanded', 'false');
          q.nextElementSibling.classList.remove('open');
        });
        // Open clicked if it was closed
        if (!isOpen) {
          btn.setAttribute('aria-expanded', 'true');
          btn.nextElementSibling.classList.add('open');
        }
      };

      /* ── 5. FAQ category filter ── */
      window.filterFaq = function (clickedBtn, cat) {
        document.querySelectorAll('.faq__cat').forEach(b => b.classList.remove('active'));
        clickedBtn.classList.add('active');

        // Close all open answers first
        document.querySelectorAll('.faq__q').forEach(q => {
          q.setAttribute('aria-expanded', 'false');
          q.nextElementSibling.classList.remove('open');
        });

        document.querySelectorAll('.faq__item').forEach(item => {
          if (cat === 'all' || item.dataset.cat === cat) {
            item.style.display = '';
            // Micro animation
            item.style.opacity = '0';
            item.style.transform = 'translateY(10px)';
            setTimeout(() => {
              item.style.transition = 'opacity .3s ease, transform .3s ease';
              item.style.opacity = '1';
              item.style.transform = 'translateY(0)';
            }, 20);
          } else {
            item.style.display = 'none';
          }
        });
      };

      /* ── 6. Button scale hover (CSS handles :hover, this adds touch feedback) ── */
      document.querySelectorAll('.w-btn, .price-card, .feat-card, .priority__card').forEach(el => {
        el.addEventListener('pointerdown', () => el.style.transform = 'scale(0.97)');
        el.addEventListener('pointerup', () => el.style.transform = '');
        el.addEventListener('pointerleave', () => el.style.transform = '');
      });

      /* ── 7. Counter animation for stat numbers ── */
      const statEls = document.querySelectorAll('.stat-box__num');
      const counterIo = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          const text = el.textContent.trim();
          const match = text.match(/^([\d.,]+)/);
          if (!match) return;
          const target = parseFloat(match[1].replace(',', '.'));
          const suffix = text.replace(match[0], '');
          let start = 0;
          const duration = 1600;
          const startTime = performance.now();
          const step = (now) => {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = eased * target;
            const display = Number.isInteger(target) ? Math.round(current) : current.toFixed(2).replace('.', ',');
            el.textContent = display + suffix;
            if (progress < 1) requestAnimationFrame(step);
          };
          requestAnimationFrame(step);
          counterIo.unobserve(el);
        });
      }, { threshold: 0.6 });

      statEls.forEach(el => counterIo.observe(el));

    }());
  </script>

@endsection