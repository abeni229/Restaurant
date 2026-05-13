<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saveurs du Bénin — Restaurant Gastronomique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold: #C9873C;
            --gold-light: #E5A85E;
            --gold-pale: #F5E3C8;
            --charcoal: #0F0D09;
            --charcoal-mid: #1C1A14;
            --charcoal-soft: #2E2B20;
            --cream: #FAF6EF;
            --cream-dark: #EDE5D3;
            --terracotta: #C24B2A;
            --forest: #1E3D1C;
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'DM Sans', system-ui, sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--charcoal);
            color: var(--cream);
            font-family: var(--font-body);
            font-weight: 300;
            overflow-x: hidden;
        }

        /* ─── GRAIN OVERLAY ─── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.5;
        }

        /* ─── NAV ─── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 1.4rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background 0.4s ease, padding 0.4s ease;
        }

        nav.scrolled {
            background: rgba(15,13,9,0.97) !important;
            padding: 1rem 3rem;
            border-bottom: 1px solid rgba(201,135,60,0.15);
            backdrop-filter: blur(10px);
        }

        .nav-logo {
            font-family: var(--font-display);
            font-size: 1.45rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            color: var(--gold);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .nav-logo span {
            font-size: 0.52rem;
            font-family: var(--font-body);
            font-weight: 400;
            letter-spacing: 0.38em;
            text-transform: uppercase;
            color: var(--gold-light);
            opacity: 0.65;
            margin-top: 4px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2.8rem;
            list-style: none;
        }

        .nav-links a {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.65);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-links a:hover { color: var(--gold); }

        .nav-cta {
            color: var(--charcoal) !important;
            background: var(--gold);
            padding: 0.75rem 1.8rem;
            transition: background 0.3s ease !important;
        }

        .nav-cta:hover { background: var(--gold-light) !important; color: var(--charcoal) !important; }

        /* ─── HERO ─── */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            position: relative;
            overflow: hidden;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10rem 4rem 6rem 5rem;
            position: relative;
            z-index: 2;
        }

        .hero-bg-overlay {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(105deg, rgba(15,13,9,0.95) 0%, rgba(15,13,9,0.7) 55%, rgba(15,13,9,0.1) 100%);
            z-index: 1;
        }

        .hero-right {
            position: relative;
            overflow: hidden;
        }

        .hero-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            filter: brightness(0.82) saturate(1.1);
            transition: transform 8s ease;
        }

        .hero:hover .hero-img { transform: scale(1.04); }

        .hero-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(15,13,9,0.6) 0%, transparent 60%);
            z-index: 1;
        }

        /* Floating badge */
        .hero-badge {
            position: absolute;
            bottom: 4rem;
            right: 3rem;
            z-index: 3;
            background: rgba(15,13,9,0.85);
            border: 1px solid rgba(201,135,60,0.35);
            backdrop-filter: blur(8px);
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .hero-badge-num {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 400;
            color: var(--gold);
            line-height: 1;
        }

        .hero-badge-text {
            font-size: 0.65rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.5);
            line-height: 1.5;
        }

        .hero-label {
            font-size: 0.62rem;
            font-weight: 400;
            letter-spacing: 0.42em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .hero-label::before {
            content: '';
            width: 30px;
            height: 1px;
            background: var(--gold);
            opacity: 0.6;
        }

        h1 {
            font-family: var(--font-display);
            font-size: clamp(3rem, 5vw, 4.5rem);
            font-weight: 400;
            line-height: 1.08;
            color: var(--cream);
            margin-bottom: 1.8rem;
        }

        h1 em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero-desc {
            font-size: 0.95rem;
            line-height: 1.85;
            color: rgba(250,246,239,0.55);
            max-width: 430px;
            margin-bottom: 3rem;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .btn-primary {
            font-family: var(--font-body);
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--charcoal);
            background: var(--gold);
            padding: 1.1rem 2.2rem;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        .btn-primary:hover { background: var(--gold-light); transform: translateY(-2px); }

        .btn-ghost {
            font-family: var(--font-body);
            font-size: 0.68rem;
            font-weight: 400;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.6);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            transition: color 0.3s ease;
        }

        .btn-ghost:hover { color: var(--gold); }

        .btn-ghost svg { transition: transform 0.3s ease; }
        .btn-ghost:hover svg { transform: translateX(4px); }

        /* scroll indicator */
        .scroll-hint {
            position: absolute;
            bottom: 2.5rem;
            left: 5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            z-index: 2;
        }

        .scroll-hint span {
            font-size: 0.58rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.25);
        }

        .scroll-line {
            width: 50px;
            height: 1px;
            background: linear-gradient(to right, rgba(201,135,60,0.6), transparent);
            animation: scrollRight 2.5s ease-in-out infinite;
        }

        @keyframes scrollRight {
            0% { transform: scaleX(0); transform-origin: left; }
            50% { transform: scaleX(1); transform-origin: left; }
            51% { transform: scaleX(1); transform-origin: right; }
            100% { transform: scaleX(0); transform-origin: right; }
        }

        /* ─── SECTION: HISTOIRE ─── */
        .section-histoire {
            padding: 10rem 5rem;
            background: var(--charcoal-mid);
        }

        .histoire-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 7rem;
            align-items: center;
        }

        .histoire-media {
            position: relative;
        }

        .histoire-img-main {
            width: 100%;
            aspect-ratio: 3/4;
            overflow: hidden;
            position: relative;
        }

        .histoire-img-main img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            filter: brightness(0.88) saturate(1.05);
            transition: transform 0.8s ease;
        }

        .histoire-img-main:hover img { transform: scale(1.04); }

        .histoire-img-accent {
            position: absolute;
            bottom: -2.5rem;
            right: -2.5rem;
            width: 55%;
            aspect-ratio: 1;
            overflow: hidden;
            border: 4px solid var(--charcoal-mid);
        }

        .histoire-img-accent img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .histoire-frame-deco {
            position: absolute;
            top: -1rem;
            left: -1rem;
            right: 1rem;
            bottom: -1rem;
            border: 1px solid rgba(201,135,60,0.15);
            pointer-events: none;
        }

        .section-label {
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.38em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-label::before {
            content: '';
            width: 25px;
            height: 1px;
            background: var(--gold);
            opacity: 0.6;
            flex-shrink: 0;
        }

        h2 {
            font-family: var(--font-display);
            font-size: clamp(2.2rem, 3.5vw, 3.2rem);
            font-weight: 400;
            line-height: 1.1;
            color: var(--cream);
            margin-bottom: 2rem;
        }

        h2 em { font-style: italic; color: var(--gold-light); }

        .histoire-text {
            font-size: 0.9rem;
            line-height: 1.9;
            color: rgba(250,246,239,0.45);
            margin-bottom: 1.2rem;
        }

        .deco-line {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 2.5rem 0;
        }

        .deco-line::before, .deco-line::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(201,135,60,0.18);
        }

        .deco-diamond {
            width: 5px;
            height: 5px;
            background: var(--gold);
            transform: rotate(45deg);
            opacity: 0.5;
        }

        .stat-row {
            display: flex;
            gap: 3rem;
        }

        .stat-item {}

        .stat-num {
            display: block;
            font-family: var(--font-display);
            font-size: 2.8rem;
            font-weight: 400;
            color: var(--gold);
            line-height: 1;
            margin-bottom: 0.4rem;
        }

        .stat-label {
            display: block;
            font-size: 0.68rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.35);
        }

        /* ─── SECTION: MENU ─── */
        .section-menu {
            padding: 8rem 0;
            background: var(--charcoal);
        }

        .section-header {
            text-align: center;
            max-width: 500px;
            margin: 0 auto 5rem;
            padding: 0 3rem;
        }

        .section-header .section-label {
            justify-content: center;
        }

        .section-header .section-label::before { display: none; }

        .section-header p {
            font-size: 0.9rem;
            line-height: 1.8;
            color: rgba(250,246,239,0.4);
            margin-top: 1rem;
        }

        .menu-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5px;
            padding: 0 3rem;
        }

        .menu-card {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 3/4;
        }

        .menu-card img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
            filter: brightness(0.7) saturate(1.1);
        }

        .menu-card:hover img { transform: scale(1.06); }

        .menu-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15,13,9,0.97) 0%, rgba(15,13,9,0.3) 50%, transparent 100%);
            transition: background 0.5s ease;
        }

        .menu-card:hover .menu-card-overlay {
            background: linear-gradient(to top, rgba(15,13,9,0.97) 0%, rgba(15,13,9,0.5) 60%, rgba(15,13,9,0.1) 100%);
        }

        .menu-card-content {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 2.5rem;
        }

        .menu-tag {
            font-family: var(--font-body);
            font-size: 0.55rem;
            font-weight: 500;
            letter-spacing: 0.38em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.8rem;
        }

        .menu-name {
            font-family: var(--font-display);
            font-size: 1.7rem;
            font-weight: 400;
            line-height: 1.1;
            color: var(--cream);
            margin-bottom: 0.6rem;
        }

        .menu-desc {
            font-size: 0.78rem;
            color: rgba(250,246,239,0.45);
            line-height: 1.65;
            margin-bottom: 1rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.5s ease;
            opacity: 0;
        }

        .menu-card:hover .menu-desc { max-height: 80px; opacity: 1; }

        .menu-price {
            font-family: var(--font-display);
            font-size: 1.3rem;
            font-weight: 400;
            color: var(--gold-light);
        }

        /* ─── SECTION: CHIFFRES ─── */
        .section-chiffres {
            padding: 6rem 3rem;
            background: var(--gold);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }

        .chiffre-item {
            padding: 3rem;
            border-right: 1px solid rgba(15,13,9,0.12);
            text-align: center;
        }

        .chiffre-item:last-child { border-right: none; }

        .chiffre-num {
            font-family: var(--font-display);
            font-size: 3.5rem;
            font-weight: 400;
            color: var(--charcoal);
            line-height: 1;
            display: block;
            margin-bottom: 0.5rem;
        }

        .chiffre-label {
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(15,13,9,0.55);
        }

        /* ─── SECTION: RÉSERVATION ─── */
        .section-reservation {
            padding: 10rem 5rem;
            background: var(--cream);
        }

        .reservation-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 7rem;
            align-items: start;
        }

        .reservation-left h2 { color: var(--charcoal); }
        .reservation-left .section-label { color: var(--terracotta); }
        .reservation-left .section-label::before { background: var(--terracotta); }

        .reservation-left p {
            font-size: 0.9rem;
            line-height: 1.9;
            color: rgba(26,23,16,0.5);
            margin-bottom: 2.5rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1.2rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(26,23,16,0.07);
        }

        .contact-item:last-child { border-bottom: none; }

        .contact-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(201,135,60,0.3);
            flex-shrink: 0;
            background: rgba(201,135,60,0.04);
        }

        .contact-icon svg { width: 16px; stroke: var(--gold); fill: none; }

        .contact-info strong {
            display: block;
            font-family: var(--font-body);
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--charcoal);
            margin-bottom: 0.3rem;
        }

        .contact-info span {
            font-size: 0.88rem;
            color: rgba(26,23,16,0.5);
        }

        /* FORMULAIRE */
        .reservation-form { display: flex; flex-direction: column; gap: 1.2rem; margin-top: 65px; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }

        .form-label {
            font-size: 0.58rem;
            font-weight: 500;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: rgba(26,23,16,0.45);
        }

        .form-input {
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 300;
            color: var(--charcoal);
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(26,23,16,0.15);
            padding: 0.8rem 0;
            outline: none;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .form-input:focus { border-color: var(--gold); }
        .form-input::placeholder { color: rgba(26,23,16,0.2); }

        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%23C9873C' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0 center;
            cursor: pointer;
        }

        .form-submit {
            font-family: var(--font-body);
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--cream);
            background: var(--charcoal);
            border: none;
            padding: 1.2rem 2.8rem;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-top: 0.5rem;
            align-self: flex-start;
            position: relative;
        }

        .form-submit::after {
            content: '';
            position: absolute;
            bottom: -4px; right: -4px;
            width: 100%; height: 100%;
            border: 1px solid rgba(201,135,60,0.35);
            transition: bottom 0.2s ease, right 0.2s ease;
        }

        .form-submit:hover { background: var(--charcoal-soft); }
        .form-submit:hover::after { bottom: -6px; right: -6px; }

        /* ─── SECTION: AMBIANCE GALERIE ─── */
        .section-ambiance {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            height: 70vh;
            gap: 2px;
            background: var(--charcoal-mid);
        }

        .ambiance-cell {
            position: relative;
            overflow: hidden;
        }

        .ambiance-cell.large { grid-row: 1 / 3; }

        .ambiance-cell img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
            filter: brightness(0.72) saturate(1.05);
        }

        .ambiance-cell:hover img { transform: scale(1.06); }

        .ambiance-cell-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15,13,9,0.8) 0%, transparent 60%);
        }

        .ambiance-label {
            position: absolute;
            bottom: 1.5rem; left: 1.8rem;
            font-family: var(--font-display);
            font-size: 1.05rem;
            font-weight: 400;
            font-style: italic;
            color: rgba(250,246,239,0.75);
            z-index: 1;
        }

        /* ─── TÉMOIGNAGES ─── */
        .section-temoignages {
            padding: 8rem 5rem;
            background: var(--charcoal-mid);
        }

        .temoignages-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .temoignages-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 4rem;
        }

        .temoignage-card {
            background: rgba(250,246,239,0.03);
            border: 1px solid rgba(201,135,60,0.1);
            padding: 2.5rem;
            transition: border-color 0.3s ease;
        }

        .temoignage-card:hover { border-color: rgba(201,135,60,0.25); }

        .stars {
            display: flex;
            gap: 3px;
            margin-bottom: 1.5rem;
        }

        .star { color: var(--gold); font-size: 0.8rem; }

        .temoignage-text {
            font-family: var(--font-display);
            font-size: 1rem;
            font-style: italic;
            font-weight: 400;
            line-height: 1.7;
            color: rgba(250,246,239,0.65);
            margin-bottom: 1.5rem;
        }

        .temoignage-author {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .author-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--charcoal);
            flex-shrink: 0;
        }

        .author-name {
            font-size: 0.75rem;
            font-weight: 500;
            color: rgba(250,246,239,0.7);
        }

        .author-origin {
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            color: rgba(250,246,239,0.3);
            text-transform: uppercase;
        }

        /* ─── FOOTER ─── */
        footer {
            background: var(--charcoal);
            border-top: 1px solid rgba(201,135,60,0.1);
            padding: 6rem 5rem 3rem;
        }

        .footer-top {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto 4rem;
        }

        .footer-brand .nav-logo {
            display: inline-flex;
            margin-bottom: 1.5rem;
        }

        .footer-brand p {
            font-size: 0.82rem;
            line-height: 1.85;
            color: rgba(250,246,239,0.28);
            max-width: 280px;
        }

        .footer-col h4 {
            font-family: var(--font-body);
            font-size: 0.58rem;
            font-weight: 500;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.5rem;
        }

        .footer-col ul { list-style: none; }

        .footer-col li { margin-bottom: 0.85rem; }

        .footer-col a {
            font-size: 0.82rem;
            color: rgba(250,246,239,0.28);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-col a:hover { color: var(--gold); }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(201,135,60,0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-bottom p {
            font-size: 0.72rem;
            color: rgba(250,246,239,0.18);
        }

        .footer-social {
            display: flex;
            gap: 0.8rem;
        }

        .social-link {
            width: 38px;
            height: 38px;
            border: 1px solid rgba(201,135,60,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: border-color 0.3s ease, background 0.3s ease;
        }

        .social-link:hover {
            border-color: var(--gold);
            background: rgba(201,135,60,0.08);
        }

        .social-link svg { width: 14px; stroke: rgba(250,246,239,0.4); fill: none; }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(28px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-label { animation: fadeInUp 0.8s ease 0.2s both; }
        h1 { animation: fadeInUp 0.9s ease 0.4s both; }
        .hero-desc { animation: fadeInUp 0.8s ease 0.65s both; }
        .hero-actions { animation: fadeInUp 0.8s ease 0.85s both; }
        .scroll-hint { animation: fadeInUp 0.8s ease 1.1s both; }
        .hero-badge { animation: fadeInUp 0.8s ease 1s both; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 768px) {
            nav { padding: 1.2rem 1.5rem; }
            .nav-links { display: none; }
            .hero { grid-template-columns: 1fr; min-height: 100vh; }
            .hero-left { padding: 8rem 2rem 4rem; grid-row: 2; }
            .hero-right { height: 50vh; grid-row: 1; }
            .hero-badge { display: none; }
            .scroll-hint { left: 2rem; }
            .section-histoire, .section-reservation { padding: 5rem 2rem; }
            .histoire-grid, .reservation-inner { grid-template-columns: 1fr; gap: 3rem; }
            .histoire-img-accent { display: none; }
            .menu-grid { grid-template-columns: 1fr; padding: 0 1.5rem; }
            .section-chiffres { grid-template-columns: 1fr 1fr; }
            .section-ambiance { height: auto; grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
            .ambiance-cell.large { grid-row: auto; height: 50vw; }
            .ambiance-cell { height: 35vw; }
            .temoignages-grid { grid-template-columns: 1fr; }
            .footer-top { grid-template-columns: 1fr 1fr; gap: 2rem; }
            footer { padding: 4rem 2rem 2rem; }
        }
    </style>
</head>
<body>

    <!-- ─── NAVIGATION ─── -->
    <nav id="navbar">
        <a href="/" class="nav-logo">
            Saveurs du Bénin
            <span>Restaurant Gastronomique · Cotonou</span>
        </a>
        <ul class="nav-links">
            <li><a href="#histoire">Notre Histoire</a></li>
            <li><a href="#carte">La Carte</a></li>
            <li><a href="#ambiance">L'Espace</a></li>
            <li><a href="#reservation" class="nav-cta">Réserver</a></li>
        </ul>
    </nav>

    <!-- ─── HERO ─── -->
    <section class="hero">
        <div class="hero-bg-overlay"></div>

        <div class="hero-left">
            <div class="hero-label">Restaurant Gastronomique</div>
            <h1>L'Âme de la<br><em>Cuisine Béninoise</em><br>Revisitée</h1>
            <p class="hero-desc">Une expérience culinaire raffinée où les saveurs ancestrales du Bénin rencontrent l'excellence de la gastronomie contemporaine, au cœur de Cotonou.</p>
            <div class="hero-actions">
                <a href="#reservation" class="btn-primary">Réserver une table</a>
                <a href="#carte" class="btn-ghost">
                    Découvrir la carte
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                        <path d="M4 10h12M12 6l4 4-4 4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                </a>
                @guest
                    <a href="{{ route('login') }}" class="btn-primary">Connexion</a>
                    <a href="{{ route('register') }}" class="btn-ghost">Inscription</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn-ghost">Mon compte</a>
                @endguest
            </div>
        </div>

        <!-- Image héro : plat africain élaboré -->
        <div class="hero-right">
            <img class="hero-img"
                src="https://plus.unsplash.com/premium_photo-1669687070821-328b9ef599f5?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Gastronomie africaine raffinée">
            <div class="hero-img-overlay"></div>

            <!-- Badge flottant -->
            <div class="hero-badge">
                <span class="hero-badge-num">★ 4.9</span>
                <span class="hero-badge-text">Note clientèle<br>+ 50 avis</span>
            </div>
        </div>

        <div class="scroll-hint">
            <div class="scroll-line"></div>
            <span>Défiler</span>
        </div>
    </section>

    <!-- ─── HISTOIRE ─── -->
    <section class="section-histoire" id="histoire">
        <div class="histoire-grid">
            <div class="histoire-media">
                <div class="histoire-frame-deco"></div>

                <!-- Image principale : chef cuisinant -->
                <div class="histoire-img-main">
                    <img src="https://media.istockphoto.com/id/171348352/photo/kitchen-worker.jpg?s=612x612&w=0&k=20&c=Y3z83PcHo6DlAo2nI046dcKhS0NedeFjuPn7Aoc8CCg="
                         alt="Notre chef en cuisine">
                </div>

                <!-- Image accent : marché africain coloré -->
                <div class="histoire-img-accent">
                    <img src="https://media.istockphoto.com/id/2207324055/photo/served-meal-on-leaf.jpg?s=612x612&w=0&k=20&c=r9fmle-2Ctk9achp55CYc7C0rqkqHpOlQVylAkQ3mEQ="
                         alt="Épices et ingrédients locaux">
                </div>
            </div>

            <div class="histoire-text-col">
                <div class="section-label">Notre Histoire</div>
                <h2>Né des<br><em>terres fertiles</em><br>du Bénin</h2>
                <p class="histoire-text">Fondé en 2018 au cœur de Cotonou, Saveurs du Bénin est né d'une passion profonde pour le patrimoine culinaire béninois. Notre chef exécutif, formé dans les grandes maisons parisiennes, a choisi de revenir sur sa terre natale pour célébrer les richesses gastronomiques souvent méconnues du golfe de Guinée.</p>
                <p class="histoire-text">Chaque plat raconte une histoire — celle des marchés colorés de Dantokpa, des pêcheurs de Fidjrossè, des agriculteurs du Zou. Nous travaillons exclusivement avec des producteurs locaux pour vous offrir une cuisine d'exception, enracinée et contemporaine.</p>

                <div class="deco-line">
                    <div class="deco-diamond"></div>
                </div>

                <div class="stat-row">
                    <div class="stat-item">
                        <span class="stat-num">7</span>
                        <span class="stat-label">Années d'excellence</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">42</span>
                        <span class="stat-label">Producteurs locaux</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">3</span>
                        <span class="stat-label">Distinctions</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── MENU VEDETTE ─── -->
    <section class="section-menu" id="carte">
        <div class="section-header">
            <div class="section-label">La Carte</div>
            <h2>Nos Plats<br><em>Signatures</em></h2>
            <p>Une sélection soigneuse de créations inspirées des quatre coins du Bénin, revisitées avec l'élégance qui nous caractérise.</p>
        </div>

        <div class="menu-grid">
            <!-- Carte 1 :  Ebà sauce légumes verts protéinée— légumes des cuisines africaines -->
            <div class="menu-card">
                <img src="https://media.istockphoto.com/id/1387397063/photo/nigerian-egusi-melon-soup-with-garri-eba-for-lunch-nigerian-food.jpg?s=612x612&w=0&k=20&c=hFCrkY8HTKz0JxLt0AduXm-d33oKwHUSqBf0b4na4_o="
                     alt="Ebà sauce légumes verts protéinée ">
                <div class="menu-card-overlay"></div>
                <div class="menu-card-content">
                    <div class="menu-tag">Entrée Signature</div>
                    <div class="menu-name">Ebà sauce<br>légumes verts protéinée</div>
                    <div class="menu-desc">Pâte de Gari ancestrale, accompagné de légumes du lac Nokoué, huile de palme première pression</div>
                    <div class="menu-price">4 500 FCFA</div>
                </div>
            </div>

            <!-- Carte 2 : Poulet en sauce gboma — volaille mijotée -->
            <div class="menu-card">
                <img src="https://images.unsplash.com/photo-1694579740719-0e601c5d2437?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                     alt="Poulet Bicyclette en Sauce Gboma">
                <div class="menu-card-overlay"></div>
                <div class="menu-card-content">
                    <div class="menu-tag">Plat Principal</div>
                    <div class="menu-name">Poulet Bicyclette<br>en Sauce Gboma</div>
                    <div class="menu-desc">Volaille fermière de Glazoué, feuilles d'épinards sauvages, épices du marché de Parakou</div>
                    <div class="menu-price">9 800 FCFA</div>
                </div>
            </div>

            <!-- Carte 3 : Dessert coco — dessert élégant -->
            <div class="menu-card">
                <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600&q=80&fit=crop"
                     alt="Parfait à la Noix de Coco">
                <div class="menu-card-overlay"></div>
                <div class="menu-card-content">
                    <div class="menu-tag">Dessert</div>
                    <div class="menu-name">Parfait à la<br>Noix de Coco</div>
                    <div class="menu-desc">Coco de Ouidah, caramel de canne à sucre locale, biscuit fondant au gingembre</div>
                    <div class="menu-price">3 200 FCFA</div>
                </div>
            </div>
        </div>

        <div style="text-align:center; margin-top: 4.5rem;">
            <a href="#" class="btn-primary">Voir toute la carte</a>
        </div>
    </section>

    <!-- ─── CHIFFRES CLÉS ─── -->
    <section class="section-chiffres">
        <div class="chiffre-item">
            <span class="chiffre-num">7</span>
            <span class="chiffre-label">Années d'excellence</span>
        </div>
        <div class="chiffre-item">
            <span class="chiffre-num">42</span>
            <span class="chiffre-label">Producteurs béninois</span>
        </div>
        <div class="chiffre-item">
            <span class="chiffre-num">12K+</span>
            <span class="chiffre-label">Clients satisfaits</span>
        </div>
        <div class="chiffre-item">
            <span class="chiffre-num">3</span>
            <span class="chiffre-label">Distinctions reçues</span>
        </div>
    </section>

    <!-- ─── RÉSERVATION ─── -->
    <section class="section-reservation" id="reservation">
        <div class="reservation-inner">
            <div class="reservation-left">
                <div class="section-label">Réservation</div>
                <h2 style="color:var(--charcoal)">Réservez<br>Votre <em style="color:var(--terracotta)">Table</em></h2>
                <p>Pour une expérience mémorable, nous vous recommandons de réserver à l'avance. Notre équipe est disponible pour personnaliser chaque détail de votre soirée.</p>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><path d="M14 10.5c-1.5 0-3-.5-4-1l-1 1.5C7.5 11.5 6 11 5 10L3 9c-1-1-1.5-2.5-1-4l1.5-1c-.5-1-1-2.5-1-4H1C0 8 8 16 14.5 16v-1.5c-1.5 0-3-.5-4-1z" stroke-width="1" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>Téléphone</strong>
                        <span>+229 01 29 30 00 00</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><path d="M2 3h12v10H2z" stroke-width="1" fill="none" rx="1"/><path d="M2 3l6 6 6-6" stroke-width="1" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>E-mail</strong>
                        <span>reservation@saveursdubénin.bj</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><circle cx="8" cy="7" r="3" stroke-width="1" fill="none"/><path d="M8 1C5.2 1 3 3.2 3 6c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke-width="1" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>Adresse</strong>
                        <span>Avenue Jean-Paul II, Cotonou · Bénin</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6" stroke-width="1" fill="none"/><path d="M8 4v4l3 2" stroke-width="1" stroke-linecap="round" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>Horaires</strong>
                        <span>Lun–Sam · 12h–15h · 19h–23h</span>
                    </div>
                </div>
            </div>

            <div>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="card">
                        <p class="text-muted">Les administrateurs ne peuvent pas créer de réservations depuis cette page.</p>
                    </div>
                @else
                    <form class="reservation-form" method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        <input type="hidden" name="type" value="table">

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Prénom</label>
                                <input type="text" class="form-input" placeholder="Jean" name="prenom" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-input" placeholder="Adansi" name="nom" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" class="form-input" placeholder="+229 97 ..." name="telephone">
                            </div>
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-input" placeholder="jean@email.com" name="email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-input" name="date" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Heure</label>
                                <select class="form-input" name="heure" required>
                                    <option value="">Choisir...</option>
                                    <optgroup label="Déjeuner">
                                        <option>12h00</option><option>12h30</option>
                                        <option>13h00</option><option>13h30</option>
                                    </optgroup>
                                    <optgroup label="Dîner">
                                        <option>19h00</option><option>19h30</option>
                                        <option>20h00</option><option>20h30</option><option>21h00</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Nombre de couverts</label>
                                <select class="form-input" name="couverts" required>
                                    <option value="">Choisir...</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'personne' : 'personnes' }}</option>
                                    @endfor
                                    <option value="13+">Plus de 12 (groupe)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Occasion</label>
                                <select class="form-input" name="occasion">
                                    <option value="">Aucune</option>
                                    <option>Anniversaire</option>
                                    <option>Repas d'affaires</option>
                                    <option>Romantique</option>
                                    <option>Famille</option>
                                    <option>Autre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Demandes particulières</label>
                            <textarea class="form-input" rows="3" name="notes"
                                placeholder="Allergies, préférences, aménagement spécial..."
                                style="resize:none; line-height:1.6"></textarea>
                        </div>

                        <button type="submit" class="form-submit">Confirmer la réservation</button>
                    </form>

                    @guest
                        <div class="card" style="margin-top: 1.5rem;">
                            <p class="text-muted">Vous devrez vous connecter pour finaliser la réservation.</p>
                            <a href="{{ route('login') }}" class="btn-dark"></a>
                        </div>
                    @endguest
                @endif
            </div>
        </div>
    </section>

    <!-- ─── GALERIE AMBIANCE ─── -->
    <section class="section-ambiance" id="ambiance">
        <!-- Image large : salle de restaurant africain élégant -->
        <div class="ambiance-cell large">
            <img src="https://media.istockphoto.com/id/626641860/photo/empty-glasses-in-restaurant-table-set-restaurant.jpg?s=612x612&w=0&k=20&c=8gdhXEbvhyuVzG7WIrbGrKTcyrfBoID4ofTDWTjaoW4="
                 alt="La salle principale">
            <div class="ambiance-cell-overlay"></div>
            <div class="ambiance-label">La Grande Salle</div>
        </div>

        <!-- Terrasse extérieure -->
        <div class="ambiance-cell">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=500&q=80&fit=crop"
                 alt="La terrasse">
            <div class="ambiance-cell-overlay"></div>
            <div class="ambiance-label">La Terrasse</div>
        </div>

        <!-- Bar / cave -->
        <div class="ambiance-cell">
            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=500&q=80&fit=crop"
                 alt="La cave">
            <div class="ambiance-cell-overlay"></div>
            <div class="ambiance-label">La Cave</div>
        </div>

        <!-- Salon privé -->
        <div class="ambiance-cell">
            <img src="https://media.istockphoto.com/id/1135324760/photo/where-for-dinner.jpg?s=612x612&w=0&k=20&c=TxORRvbgvWXlgm6L5NvIrEH1SxKsuL_bK388HVj3u1I="
                 alt="Le salon privé">
            <div class="ambiance-cell-overlay"></div>
            <div class="ambiance-label">Le Salon Privé</div>
        </div>

        <!-- Cuisine ouverte -->
        <div class="ambiance-cell">
            <img src="https://media.istockphoto.com/id/171348352/photo/kitchen-worker.jpg?s=612x612&w=0&k=20&c=Y3z83PcHo6DlAo2nI046dcKhS0NedeFjuPn7Aoc8CCg="
                 alt="La cuisine ouverte">
            <div class="ambiance-cell-overlay"></div>
            <div class="ambiance-label">La Cuisine</div>
        </div>
    </section>

    <!-- ─── TÉMOIGNAGES ─── -->
    <section class="section-temoignages">
        <div class="temoignages-inner">
            <div style="display:flex; align-items:flex-end; justify-content:space-between; flex-wrap:wrap; gap:1rem;">
                <div>
                    <div class="section-label">Témoignages</div>
                    <h2>Ce que nos<br>clients <em>disent</em></h2>
                </div>
                <a href="#" class="btn-ghost" style="margin-bottom:0.5rem;">
                    Tous les avis
                    <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                        <path d="M4 10h12M12 6l4 4-4 4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>

            <div class="temoignages-grid">
                <div class="temoignage-card">
                    <div class="stars">★★★★★</div>
                    <p class="temoignage-text">« Une révélation. Les saveurs sont profondes, authentiques, et le cadre est d'une élégance rare à Cotonou. Je recommande vivement l'Amiwo de crevettes. »</p>
                    <div class="temoignage-author">
                        <div class="author-avatar">KA</div>
                        <div>
                            <div class="author-name">Kofi Adansi</div>
                            <div class="author-origin">Cotonou, Bénin</div>
                        </div>
                    </div>
                </div>

                <div class="temoignage-card">
                    <div class="stars">★★★★★</div>
                    <p class="temoignage-text">« Le meilleur repas de tout mon séjour au Bénin. Le service est impeccable, l'accueil chaleureux, et le menu dégustation est une véritable odyssée gustative. »</p>
                    <div class="temoignage-author">
                        <div class="author-avatar">ML</div>
                        <div>
                            <div class="author-name">Marie Lefebvre</div>
                            <div class="author-origin">Paris, France</div>
                        </div>
                    </div>
                </div>

                <div class="temoignage-card">
                    <div class="stars">★★★★★</div>
                    <p class="temoignage-text">« Un lieu d'exception qui valorise notre cuisine locale avec finesse et modernité. Fier que Cotonou ait enfin un restaurant de ce calibre. »</p>
                    <div class="temoignage-author">
                        <div class="author-avatar">OD</div>
                        <div>
                            <div class="author-name">Oladélé Dossou</div>
                            <div class="author-origin">Porto-Novo, Bénin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── FOOTER ─── -->
    <footer>
        <div class="footer-top">
            <div class="footer-brand">
                <a href="/" class="nav-logo">
                    Saveurs du Bénin
                    <span>Restaurant Gastronomique · Cotonou</span>
                </a>
                <p>Une expérience culinaire unique au carrefour des traditions béninoises et de la gastronomie contemporaine. Avenue Jean-Paul II, Cotonou, Bénin.</p>
            </div>

            <div class="footer-col">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#histoire">Notre histoire</a></li>
                    <li><a href="#carte">La carte</a></li>
                    <li><a href="#ambiance">L'espace</a></li>
                    <li><a href="#reservation">Réservation</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Menus</h4>
                <ul>
                    <li><a href="{{ route('menu.categorie', 'Entrées') }}">Entrées</a></li>
                    <li><a href="{{ route('menu.categorie', 'Plats principaux') }}">Plats principaux</a></li>
                    <li><a href="{{ route('menu.categorie', 'Desserts') }}">Desserts</a></li>
                    <li><a href="{{ route('menu.categorie', 'Boissons') }}">Boissons</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="tel:+22921300000">+229 21 30 XX XX</a></li>
                    <li><a href="mailto:info@saveurs.bj">info@saveursdubénin.bj</a></li>
                    <li><a href="#">Av. Jean-Paul II, Cotonou</a></li>
                    <li><a href="#">Lun–Sam · 12h–23h</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© {{ date('Y') }} Saveurs du Bénin · Tous droits réservés</p>
            <div class="footer-social">
                <a href="#" class="social-link" aria-label="Facebook">
                    <svg viewBox="0 0 16 16"><path d="M9 1H7C5.3 1 5 2.3 5 3v2H3v3h2v7h3V8h2.5L11 5H8V3.5C8 3 8.3 3 9 3V1z" stroke-width="1" fill="none"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="3" stroke-width="1" fill="none"/><circle cx="8" cy="8" r="3" stroke-width="1" fill="none"/><circle cx="12" cy="4" r="0.8" fill="rgba(250,246,239,0.4)"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="WhatsApp">
                    <svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6" stroke-width="1" fill="none"/><path d="M5 8c0 1.7 1.3 3 3 3 .6 0 1.1-.2 1.5-.5L11 11l-.5-1.5C11.2 9 11.5 8.5 11.5 8c0-1.7-1.3-3-3-3S5 6.3 5 8z" stroke-width="1" fill="none"/></svg>
                </a>
            </div>
        </div>
    </footer>

    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });

        // Reveal on scroll
        const reveals = document.querySelectorAll('.histoire-grid, .menu-card, .stat-item, .contact-item, .temoignage-card, .chiffre-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(22px)';
                    requestAnimationFrame(() => {
                        entry.target.style.transition = 'opacity 0.75s ease, transform 0.75s ease';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        reveals.forEach(el => observer.observe(el));

        // Set min date to today for reservation form
        const dateInput = document.querySelector('input[type="date"]');
        if (dateInput) {
            dateInput.min = new Date().toISOString().split('T')[0];
        }
    </script>
</body>
</html>