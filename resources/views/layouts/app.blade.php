<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Saveurs du Bénin — Restaurant Gastronomique')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts identiques au welcome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">

    @stack('styles')

    <style>
        /* ══════════════════════════════════════════════
           DESIGN SYSTEM — Saveurs du Bénin
           Cohérent avec welcome.blade.php
        ══════════════════════════════════════════════ */

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold:          #C9A84C;
            --gold-light:    #E8C97A;
            --gold-pale:     #F5E9C8;
            --charcoal:      #1A1710;
            --charcoal-mid:  #2C2A22;
            --charcoal-soft: #3D3A2E;
            --cream:         #F9F5EC;
            --cream-dark:    #EDE7D6;
            --terracotta:    #B5533C;
            --forest:        #2D4A2A;
            --font-display:  'Cormorant Garamond', Georgia, serif;
            --font-body:     'Jost', system-ui, sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--charcoal);
            color: var(--cream);
            font-family: var(--font-body);
            font-weight: 300;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ─── GRAIN OVERLAY ─── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.6;
        }

        /* ══════════════════════
           NAVIGATION
        ══════════════════════ */
        .site-nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 200;
            padding: 1.4rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to bottom, rgba(26,23,16,0.97) 0%, rgba(26,23,16,0) 100%);
            transition: background 0.4s ease, border-color 0.4s ease;
        }

        .site-nav.scrolled {
            background: rgba(26,23,16,0.98) !important;
            border-bottom: 1px solid rgba(201,168,76,0.15);
        }

        /* Logo */
        .nav-logo {
            font-family: var(--font-display);
            font-size: 1.45rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            color: var(--gold);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            line-height: 1;
            flex-shrink: 0;
        }

        .nav-logo span {
            font-family: var(--font-body);
            font-size: 0.52rem;
            font-weight: 400;
            letter-spacing: 0.38em;
            text-transform: uppercase;
            color: var(--gold-light);
            opacity: 0.65;
            margin-top: 4px;
        }

        /* Liens desktop */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(249,245,236,0.65);
            text-decoration: none;
            transition: color 0.3s ease;
            white-space: nowrap;
        }

        .nav-links a:hover,
        .nav-links a.active { color: var(--gold); }

        /* Bouton CTA nav */
        .nav-cta {
            font-family: var(--font-body) !important;
            font-size: 0.68rem !important;
            font-weight: 400 !important;
            letter-spacing: 0.2em !important;
            text-transform: uppercase !important;
            color: var(--charcoal) !important;
            background: var(--gold);
            padding: 0.65rem 1.5rem;
            text-decoration: none;
            transition: background 0.3s ease;
            white-space: nowrap;
        }

        .nav-cta:hover { background: var(--gold-light) !important; color: var(--charcoal) !important; }

        /* ── Burger (mobile) ── */
        .nav-burger {
            display: none;
            background: none;
            border: 1px solid rgba(201,168,76,0.3);
            color: var(--gold);
            font-size: 1.3rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: border-color 0.3s ease, background 0.3s ease;
        }

        .nav-burger:hover {
            background: rgba(201,168,76,0.1);
            border-color: var(--gold);
        }

        /* ══════════════════════
           PAGE HERO INTERNE
           (pour toutes les pages sauf welcome)
        ══════════════════════ */
        .page-hero {
            padding: 9rem 3rem 4rem;
            background:
                radial-gradient(ellipse 80% 60% at 30% 100%, rgba(201,168,76,0.06) 0%, transparent 60%),
                var(--charcoal-mid);
            border-bottom: 1px solid rgba(201,168,76,0.1);
            position: relative;
            overflow: hidden;
        }

        .page-hero::after {
            content: '';
            position: absolute;
            right: 0; top: 0; bottom: 0;
            width: 40%;
            background: repeating-linear-gradient(
                0deg,
                transparent, transparent 39px,
                rgba(201,168,76,0.03) 39px, rgba(201,168,76,0.03) 40px
            ),
            repeating-linear-gradient(
                90deg,
                transparent, transparent 39px,
                rgba(201,168,76,0.03) 39px, rgba(201,168,76,0.03) 40px
            );
        }

        .page-hero-label {
            font-family: var(--font-body);
            font-size: 0.6rem;
            font-weight: 400;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .page-hero-label::before {
            content: '';
            width: 30px;
            height: 1px;
            background: var(--gold);
            opacity: 0.6;
        }

        .page-hero h1 {
            font-family: var(--font-display);
            font-size: clamp(2.2rem, 5vw, 4rem);
            font-weight: 300;
            line-height: 1.05;
            color: var(--cream);
        }

        .page-hero h1 em {
            font-style: italic;
            color: var(--gold-light);
        }

        /* ══════════════════════
           CONTENU PRINCIPAL
        ══════════════════════ */
        .site-main {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        /* Container générique réutilisable */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 3rem;
        }

        /* Sections génériques */
        .section {
            padding: 5rem 3rem;
        }

        .section-cream {
            background: var(--cream);
            color: var(--charcoal);
        }

        .section-mid {
            background: var(--charcoal-mid);
        }

        /* ── Labels de section ── */
        .section-label {
            font-family: var(--font-body);
            font-size: 0.6rem;
            font-weight: 400;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-label::before {
            content: '';
            width: 28px;
            height: 1px;
            background: var(--gold);
            opacity: 0.6;
        }

        .section-cream .section-label { color: var(--terracotta); }
        .section-cream .section-label::before { background: var(--terracotta); }

        /* ── Titres ── */
        h2 {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 3.5vw, 3rem);
            font-weight: 300;
            line-height: 1.1;
            color: var(--cream);
        }

        h2 em { font-style: italic; color: var(--gold-light); }
        .section-cream h2 { color: var(--charcoal); }
        .section-cream h2 em { color: var(--terracotta); }

        h3 {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--cream);
        }

        /* ── Textes courants ── */
        p { line-height: 1.85; }

        .text-muted { color: rgba(249,245,236,0.45); font-size: 0.9rem; }
        .section-cream .text-muted { color: rgba(26,23,16,0.5); }

        /* ── Ligne déco ── */
        .deco-line {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin: 2rem 0;
        }

        .deco-line::before, .deco-line::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(201,168,76,0.2);
        }

        .deco-diamond {
            width: 6px;
            height: 6px;
            background: var(--gold);
            transform: rotate(45deg);
            opacity: 0.55;
            flex-shrink: 0;
        }

        /* ══════════════════════
           BOUTONS
        ══════════════════════ */
        .btn-primary {
            font-family: var(--font-body);
            font-size: 0.68rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--charcoal);
            background: var(--gold);
            padding: 1rem 2.5rem;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            position: relative;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            bottom: -4px; right: -4px;
            width: 100%; height: 100%;
            border: 1px solid rgba(201,168,76,0.4);
            transition: all 0.3s ease;
        }

        .btn-primary:hover { background: var(--gold-light); }
        .btn-primary:hover::after { bottom: -6px; right: -6px; }

        .btn-outline {
            font-family: var(--font-body);
            font-size: 0.68rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            background: transparent;
            padding: 0.9rem 2.2rem;
            text-decoration: none;
            display: inline-block;
            border: 1px solid rgba(201,168,76,0.4);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: rgba(201,168,76,0.08);
            border-color: var(--gold);
        }

        .btn-dark {
            font-family: var(--font-body);
            font-size: 0.68rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--cream);
            background: var(--charcoal);
            padding: 1rem 2.5rem;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            position: relative;
        }

        .btn-dark::after {
            content: '';
            position: absolute;
            bottom: -3px; right: -3px;
            width: 100%; height: 100%;
            border: 1px solid rgba(201,168,76,0.35);
        }

        .btn-dark:hover { background: var(--charcoal-soft); }

        /* ══════════════════════
           FORMULAIRES
        ══════════════════════ */
        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }

        .form-label {
            font-size: 0.6rem;
            font-weight: 400;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(249,245,236,0.45);
        }

        .section-cream .form-label { color: rgba(26,23,16,0.45); }

        .form-input {
            font-family: var(--font-body);
            font-size: 0.88rem;
            font-weight: 300;
            color: var(--cream);
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(201,168,76,0.2);
            padding: 0.8rem 0;
            outline: none;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .form-input:focus { border-color: var(--gold); }
        .form-input::placeholder { color: rgba(249,245,236,0.2); }

        .section-cream .form-input {
            color: var(--charcoal);
            border-bottom-color: rgba(26,23,16,0.2);
        }

        .section-cream .form-input:focus { border-color: var(--terracotta); }
        .section-cream .form-input::placeholder { color: rgba(26,23,16,0.25); }

        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%23C9A84C' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 2px center;
            cursor: pointer;
        }

        /* ══════════════════════
           CARTES GÉNÉRIQUES
        ══════════════════════ */
        .card {
            background: var(--charcoal-mid);
            border: 1px solid rgba(201,168,76,0.1);
            padding: 2rem;
            transition: border-color 0.3s ease;
        }

        .card:hover { border-color: rgba(201,168,76,0.3); }

        /* ══════════════════════
           ALERTES / FLASH
        ══════════════════════ */
        .alert {
            padding: 1rem 1.5rem;
            font-size: 0.85rem;
            font-weight: 400;
            border-left: 3px solid;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background: rgba(45,74,42,0.3);
            border-color: var(--forest);
            color: #a3c99e;
        }

        .alert-error {
            background: rgba(181,83,60,0.2);
            border-color: var(--terracotta);
            color: #e8a090;
        }

        .alert-info {
            background: rgba(201,168,76,0.1);
            border-color: var(--gold);
            color: var(--gold-light);
        }

        /* ══════════════════════
           BADGES / TAGS
        ══════════════════════ */
        .badge {
            font-family: var(--font-body);
            font-size: 0.58rem;
            font-weight: 400;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            padding: 0.3rem 0.8rem;
            display: inline-block;
        }

        .badge-gold { background: rgba(201,168,76,0.12); color: var(--gold); border: 1px solid rgba(201,168,76,0.25); }
        .badge-terracotta { background: rgba(181,83,60,0.15); color: #e8997f; border: 1px solid rgba(181,83,60,0.3); }
        .badge-forest { background: rgba(45,74,42,0.25); color: #8dc48a; border: 1px solid rgba(45,74,42,0.4); }

        /* ══════════════════════
           FOOTER
        ══════════════════════ */
        .site-footer {
            background: var(--charcoal);
            border-top: 1px solid rgba(201,168,76,0.1);
            padding: 5rem 3rem 2.5rem;
            position: relative;
            z-index: 1;
        }

        .footer-grid {
            max-width: 1200px;
            margin: 0 auto 4rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
        }

        .footer-brand p {
            font-size: 0.82rem;
            line-height: 1.85;
            color: rgba(249,245,236,0.32);
            max-width: 280px;
            margin-top: 1.2rem;
        }

        .footer-col h4 {
            font-family: var(--font-body);
            font-size: 0.58rem;
            font-weight: 500;
            letter-spacing: 0.32em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.5rem;
        }

        .footer-col ul { list-style: none; }

        .footer-col li { margin-bottom: 0.75rem; }

        .footer-col a {
            font-size: 0.82rem;
            color: rgba(249,245,236,0.32);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-col a:hover { color: var(--gold); }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(201,168,76,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-bottom p {
            font-size: 0.7rem;
            color: rgba(249,245,236,0.18);
            letter-spacing: 0.06em;
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(201,168,76,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: border-color 0.3s ease, background 0.3s ease;
            font-size: 0.8rem;
            color: rgba(249,245,236,0.4);
        }

        .social-link:hover {
            border-color: var(--gold);
            background: rgba(201,168,76,0.08);
            color: var(--gold);
        }

        /* ══════════════════════
           MOBILE
        ══════════════════════ */
        @media (max-width: 768px) {

            .site-nav { padding: 1.2rem 1.5rem; }

            .nav-burger { display: flex; }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0; right: 0;
                background: rgba(26,23,16,0.98);
                border-top: 1px solid rgba(201,168,76,0.12);
                border-bottom: 1px solid rgba(201,168,76,0.12);
                flex-direction: column;
                gap: 0;
                padding: 1rem 0;
            }

            .nav-links.open { display: flex; }

            .nav-links li { width: 100%; }

            .nav-links a {
                display: block;
                padding: 0.9rem 2rem;
                border-bottom: 1px solid rgba(201,168,76,0.06);
                font-size: 0.72rem;
            }

            .nav-links a:last-child, .nav-links li:last-child a { border-bottom: none; }

            .nav-cta {
                margin: 0.8rem 2rem;
                display: block;
                text-align: center;
                background: var(--gold) !important;
                color: var(--charcoal) !important;
                padding: 0.8rem 1rem !important;
            }

            .page-hero { padding: 7rem 1.5rem 3rem; }

            .section { padding: 3.5rem 1.5rem; }

            .container { padding: 0 1.5rem; }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
            }

            .footer-brand { grid-column: 1 / -1; }

            .site-footer { padding: 4rem 1.5rem 2rem; }

            .footer-bottom { flex-direction: column; text-align: center; }
        }

        @media (max-width: 480px) {
            .footer-grid { grid-template-columns: 1fr; }
        }

        /* ══════════════════════
           UTILITAIRES
        ══════════════════════ */
        .text-gold { color: var(--gold); }
        .text-cream { color: var(--cream); }
        .text-terracotta { color: var(--terracotta); }
        .text-center { text-align: center; }
        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 2rem; }
        .gap-1 { gap: 0.5rem; }
        .gap-2 { gap: 1rem; }
        .gap-3 { gap: 1.5rem; }
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
        .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }

        @media (max-width: 768px) {
            .grid-2, .grid-3, .grid-4 { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

    {{-- ══════════════════════════════════
         NAVIGATION
    ══════════════════════════════════ --}}
    <nav class="site-nav" id="site-nav">

        <a href="{{ route('home') }}" class="nav-logo">
            Saveurs du Bénin
            <span>Restaurant Gastronomique · Cotonou</span>
        </a>

        {{-- Burger mobile --}}
        <button class="nav-burger" id="nav-burger" aria-label="Menu" aria-expanded="false">
            <svg id="burger-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
                <line x1="2" y1="4"  x2="16" y2="4"  stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="2" y1="9"  x2="16" y2="9"  stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="2" y1="14" x2="16" y2="14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            <svg id="close-icon" width="18" height="18" viewBox="0 0 18 18" fill="none" style="display:none">
                <line x1="3" y1="3" x2="15" y2="15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="15" y1="3" x2="3" y2="15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </button>

        <ul class="nav-links" id="nav-links">
            <li>
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Accueil
                </a>
            </li>
            <li>
                <a href="{{ route('home') }}#histoire"
                   class="">
                    Notre Histoire
                </a>
            </li>
            <li>
                <a href="{{ route('carte') }}"
                   class="{{ request()->routeIs('carte') ? 'active' : '' }}">
                    La Carte
                </a>
            </li>
            <li>
                <a href="{{ route('menus.index') }}"
                   class="{{ request()->routeIs('menus.*') ? 'active' : '' }}">
                    Menus
                </a>
            </li>
            <li>
                <a href="{{ route('reservations.create') }}"
                   class="nav-cta {{ request()->routeIs('reservations.*') ? 'active' : '' }}">
                    Réserver
                </a>
            </li>
        </ul>
    </nav>

    {{-- ══════════════════════════════════
         HERO INTERNE (optionnel par page)
         Usage dans une vue enfant :
         @section('page-hero')
             <div class="page-hero">
                 <div class="page-hero-label">La Carte</div>
                 <h1>Nos <em>Saveurs</em></h1>
             </div>
         @endsection
    ══════════════════════════════════ --}}
    @hasSection('page-hero')
        @yield('page-hero')
    @endif

    {{-- ══════════════════════════════════
         MESSAGES FLASH
    ══════════════════════════════════ --}}
    @if(session('success') || session('error') || session('info'))
        <div style="position:relative; z-index:10; padding: 0 3rem; margin-top: {{ !request()->routeIs('home') ? '0' : '0' }};">
            <div style="max-width:1200px; margin:0 auto; padding-top:1rem;">
                @if(session('success'))
                    <div class="alert alert-success">
                        ✓ &nbsp;{{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-error">
                        ✕ &nbsp;{{ session('error') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="alert alert-info">
                        ℹ &nbsp;{{ session('info') }}
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- ══════════════════════════════════
         CONTENU PRINCIPAL
    ══════════════════════════════════ --}}
    <main class="site-main">
        @yield('content')
    </main>

    {{-- ══════════════════════════════════
         FOOTER
    ══════════════════════════════════ --}}
    <footer class="site-footer">
        <div class="footer-grid">

            {{-- Marque --}}
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="nav-logo">
                    Saveurs du Bénin
                    <span>Restaurant Gastronomique · Cotonou</span>
                </a>
                <p>Une expérience culinaire unique au carrefour des traditions béninoises et de la gastronomie contemporaine. Avenue Jean-Paul II, Cotonou, Bénin.</p>
            </div>

            {{-- Navigation --}}
            <div class="footer-col">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('home') }}#histoire">Notre histoire</a></li>
                    <li><a href="{{ route('carte') }}">La carte</a></li>
                    <li><a href="{{ route('menus.index') }}">Nos menus</a></li>
                </ul>
            </div>

            {{-- Services --}}
            <div class="footer-col">
                <h4>Services</h4>
                <ul>
                    <li><a href="{{ route('reservations.create') }}">Réservation</a></li>
                    <li><a href="#">Événements privés</a></li>
                    <li><a href="#">Traiteur</a></li>
                    <li><a href="#">Carte cadeau</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="tel:+22921300000">+229 21 30 XX XX</a></li>
                    <li><a href="mailto:info@saveursdubénin.bj">info@saveurs.bj</a></li>
                    <li><a href="#">Av. Jean-Paul II, Cotonou</a></li>
                    <li><a href="#">Lun–Sam · 12h–23h</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Saveurs du Bénin · Tous droits réservés.</p>
            <div class="footer-social">
                <a href="#" class="social-link" aria-label="Facebook">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                        <path d="M9 1H7C5.3 1 5 2.3 5 3v2H3v3h2v7h3V8h2.5L11 5H8V3.5C8 3 8.3 3 9 3V1z" stroke="currentColor" stroke-width="1.2"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                        <rect x="2" y="2" width="12" height="12" rx="3" stroke="currentColor" stroke-width="1.2"/>
                        <circle cx="8" cy="8" r="3" stroke="currentColor" stroke-width="1.2"/>
                        <circle cx="12" cy="4" r="0.8" fill="currentColor"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="WhatsApp">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                        <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.2"/>
                        <path d="M5 8c0 1.7 1.3 3 3 3 .6 0 1.1-.2 1.5-.5L11 11l-.5-1.5C10.8 9 11 8.5 11 8c0-1.7-1.3-3-3-3S5 6.3 5 8z" stroke="currentColor" stroke-width="1.2"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    {{-- ══════════════════════════════════
         SCRIPTS
    ══════════════════════════════════ --}}
    <script>
        // ── Nav scroll effect ──
        const nav = document.getElementById('site-nav');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 60);
        }, { passive: true });

        // ── Burger menu ──
        const burger     = document.getElementById('nav-burger');
        const navLinks   = document.getElementById('nav-links');
        const burgerIcon = document.getElementById('burger-icon');
        const closeIcon  = document.getElementById('close-icon');

        burger.addEventListener('click', () => {
            const isOpen = navLinks.classList.toggle('open');
            burger.setAttribute('aria-expanded', isOpen);
            burgerIcon.style.display = isOpen ? 'none'  : 'block';
            closeIcon.style.display  = isOpen ? 'block' : 'none';
        });

        // Fermer menu au clic sur un lien
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('open');
                burgerIcon.style.display = 'block';
                closeIcon.style.display  = 'none';
                burger.setAttribute('aria-expanded', 'false');
            });
        });

        // ── Reveal au scroll ──
        const revealEls = document.querySelectorAll('.card, .section-label, h2, h3');
        const observer  = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
                    entry.target.style.opacity    = '1';
                    entry.target.style.transform  = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        revealEls.forEach(el => {
            el.style.opacity   = '0';
            el.style.transform = 'translateY(16px)';
            observer.observe(el);
        });
    </script>

    @stack('scripts')

</body>
</html>