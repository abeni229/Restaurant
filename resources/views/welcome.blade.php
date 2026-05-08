<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saveurs du Bénin — Restaurant Gastronomique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --gold: #C9A84C;
            --gold-light: #E8C97A;
            --gold-pale: #F5E9C8;
            --charcoal: #1A1710;
            --charcoal-mid: #2C2A22;
            --charcoal-soft: #3D3A2E;
            --cream: #F9F5EC;
            --cream-dark: #EDE7D6;
            --terracotta: #B5533C;
            --forest: #2D4A2A;
            --font-display: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Jost', system-ui, sans-serif;
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
            opacity: 0.6;
        }

        /* ─── NAV ─── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1.5rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to bottom, rgba(26,23,16,0.95) 0%, rgba(26,23,16,0) 100%);
            transition: background 0.4s ease;
        }

        nav.scrolled {
            background: rgba(26,23,16,0.97) !important;
            border-bottom: 1px solid rgba(201,168,76,0.15);
        }

        .nav-logo {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            color: var(--gold);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .nav-logo span {
            font-size: 0.55rem;
            font-family: var(--font-body);
            font-weight: 400;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold-light);
            opacity: 0.7;
            margin-top: 3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            font-family: var(--font-body);
            font-size: 0.72rem;
            font-weight: 400;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(249,245,236,0.7);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-links a:hover { color: var(--gold); }

        .nav-cta {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--charcoal) !important;
            background: var(--gold);
            padding: 0.7rem 1.6rem;
            text-decoration: none;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .nav-cta:hover { background: var(--gold-light) !important; color: var(--charcoal) !important; }

        /* ─── HERO ─── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 80% at 70% 50%, rgba(45,74,42,0.25) 0%, transparent 70%),
                radial-gradient(ellipse 40% 60% at 20% 80%, rgba(181,83,60,0.15) 0%, transparent 60%),
                radial-gradient(ellipse 80% 100% at 50% 0%, rgba(201,168,76,0.08) 0%, transparent 50%),
                var(--charcoal);
        }

        /* Motif africain géométrique en arrière-plan */
        .hero-pattern {
            position: absolute;
            right: -5%;
            top: 50%;
            transform: translateY(-50%);
            width: 55%;
            height: 90vh;
            opacity: 0.04;
            background-image:
                repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(201,168,76,1) 39px, rgba(201,168,76,1) 40px),
                repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(201,168,76,1) 39px, rgba(201,168,76,1) 40px);
        }

        .hero-decor {
            position: absolute;
            right: 8%;
            top: 50%;
            transform: translateY(-50%);
            width: 42vw;
            height: 75vh;
            border: 1px solid rgba(201,168,76,0.18);
            pointer-events: none;
        }

        .hero-decor::before {
            content: '';
            position: absolute;
            inset: 20px;
            border: 1px solid rgba(201,168,76,0.1);
        }

        .hero-decor::after {
            content: '';
            position: absolute;
            top: -15px; left: -15px; right: -15px; bottom: -15px;
            border: 1px solid rgba(201,168,76,0.08);
        }

        /* Image placeholder héro */
        .hero-image-frame {
            position: absolute;
            right: 9%;
            top: 50%;
            transform: translateY(-50%);
            width: 40vw;
            height: 70vh;
            overflow: hidden;
        }

        .hero-image-placeholder {
            width: 100%;
            height: 100%;
            background:
                linear-gradient(160deg, rgba(45,74,42,0.6) 0%, rgba(26,23,16,0.3) 40%, rgba(181,83,60,0.4) 100%),
                repeating-conic-gradient(rgba(201,168,76,0.06) 0% 25%, transparent 0% 50%) 0 0 / 40px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image-placeholder svg {
            opacity: 0.15;
            width: 120px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 0 3rem;
            max-width: 700px;
            padding-top: 5rem;
        }

        .hero-label {
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 400;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.8rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .hero-label::before {
            content: '';
            width: 40px;
            height: 1px;
            background: var(--gold);
            opacity: 0.6;
        }

        h1 {
            font-family: var(--font-display);
            font-size: clamp(3.5rem, 7vw, 6.5rem);
            font-weight: 300;
            line-height: 1.0;
            letter-spacing: -0.01em;
            margin-bottom: 1.5rem;
            color: var(--cream);
        }

        h1 em {
            font-style: italic;
            color: var(--gold-light);
        }

        .hero-desc {
            font-size: 0.95rem;
            font-weight: 300;
            line-height: 1.8;
            color: rgba(249,245,236,0.55);
            max-width: 400px;
            margin-bottom: 3rem;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .btn-primary {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--charcoal);
            background: var(--gold);
            padding: 1.1rem 2.8rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
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

        .btn-ghost {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(249,245,236,0.6);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            transition: color 0.3s ease;
        }

        .btn-ghost svg { transition: transform 0.3s ease; }
        .btn-ghost:hover { color: var(--gold); }
        .btn-ghost:hover svg { transform: translateX(4px); }

        /* ─── DIVIDER ─── */
        .divider {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin: 5rem auto;
            max-width: 200px;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(201,168,76,0.3);
        }

        .divider-icon {
            color: var(--gold);
            font-size: 1.2rem;
            opacity: 0.7;
        }

        /* ─── SECTION: HISTOIRE ─── */
        .section-histoire {
            padding: 8rem 3rem;
            background: var(--charcoal-mid);
            position: relative;
            overflow: hidden;
        }

        .section-histoire::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 40%;
            height: 100%;
            background: linear-gradient(to right, rgba(45,74,42,0.12), transparent);
        }

        .histoire-grid {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
        }

        .histoire-media {
            position: relative;
        }

        .histoire-img-main {
            width: 100%;
            aspect-ratio: 4/5;
            background:
                linear-gradient(135deg, rgba(45,74,42,0.7) 0%, rgba(181,83,60,0.5) 100%),
                repeating-linear-gradient(45deg, rgba(201,168,76,0.04) 0px, rgba(201,168,76,0.04) 1px, transparent 1px, transparent 20px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .histoire-img-accent {
            position: absolute;
            bottom: -2rem;
            right: -2rem;
            width: 55%;
            aspect-ratio: 4/3;
            background:
                linear-gradient(135deg, rgba(181,83,60,0.7) 0%, rgba(201,168,76,0.5) 100%);
            border: 4px solid var(--charcoal-mid);
        }

        .section-label {
            font-family: var(--font-body);
            font-size: 0.62rem;
            font-weight: 400;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-label::before {
            content: '';
            width: 30px;
            height: 1px;
            background: var(--gold);
        }

        h2 {
            font-family: var(--font-display);
            font-size: clamp(2.2rem, 4vw, 3.8rem);
            font-weight: 300;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: var(--cream);
        }

        h2 em { font-style: italic; color: var(--gold-light); }

        .histoire-text {
            font-size: 0.9rem;
            line-height: 1.9;
            color: rgba(249,245,236,0.5);
            margin-bottom: 1.5rem;
        }

        .stat-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(201,168,76,0.15);
        }

        .stat-item { text-align: center; }

        .stat-num {
            font-family: var(--font-display);
            font-size: 2.8rem;
            font-weight: 300;
            color: var(--gold);
            display: block;
            line-height: 1;
        }

        .stat-label {
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 400;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(249,245,236,0.35);
            margin-top: 0.5rem;
            display: block;
        }

        /* ─── SECTION: MENU VEDETTE ─── */
        .section-menu {
            padding: 8rem 3rem;
            background: var(--charcoal);
        }

        .section-header {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 5rem;
        }

        .section-header .section-label {
            justify-content: center;
        }

        .section-header .section-label::before { display: none; }

        .section-header p {
            font-size: 0.9rem;
            line-height: 1.8;
            color: rgba(249,245,236,0.45);
            margin-top: 1rem;
        }

        .menu-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .menu-card {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 3/4;
        }

        .menu-card-bg {
            position: absolute;
            inset: 0;
            transition: transform 0.6s ease;
        }

        .menu-card:hover .menu-card-bg { transform: scale(1.05); }

        .menu-card-1 .menu-card-bg { background: linear-gradient(180deg, rgba(45,74,42,0.3) 0%, rgba(45,74,42,0.9) 100%), repeating-conic-gradient(rgba(201,168,76,0.08) 0% 25%, transparent 0% 50%) 0 0 / 30px 30px; }
        .menu-card-2 .menu-card-bg { background: linear-gradient(180deg, rgba(181,83,60,0.3) 0%, rgba(181,83,60,0.9) 100%), repeating-linear-gradient(45deg, rgba(201,168,76,0.06) 0px, rgba(201,168,76,0.06) 1px, transparent 1px, transparent 15px); }
        .menu-card-3 .menu-card-bg { background: linear-gradient(180deg, rgba(26,23,16,0.3) 0%, rgba(201,168,76,0.85) 100%); }

        .menu-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(26,23,16,0.95) 0%, transparent 50%);
        }

        .menu-card-content {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 2.5rem;
        }

        .menu-tag {
            font-family: var(--font-body);
            font-size: 0.58rem;
            font-weight: 400;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.8rem;
        }

        .menu-name {
            font-family: var(--font-display);
            font-size: 1.8rem;
            font-weight: 400;
            line-height: 1.1;
            color: var(--cream);
            margin-bottom: 0.5rem;
        }

        .menu-desc {
            font-size: 0.78rem;
            color: rgba(249,245,236,0.5);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .menu-price {
            font-family: var(--font-display);
            font-size: 1.4rem;
            font-weight: 300;
            color: var(--gold-light);
        }

        /* ─── SECTION: RÉSERVATION ─── */
        .section-reservation {
            padding: 8rem 3rem;
            background: var(--cream);
        }

        .reservation-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: start;
        }

        .reservation-left h2 { color: var(--charcoal); }
        .reservation-left .section-label { color: var(--terracotta); }
        .reservation-left .section-label::before { background: var(--terracotta); }

        .reservation-left p {
            font-size: 0.9rem;
            line-height: 1.9;
            color: rgba(26,23,16,0.55);
            margin-bottom: 2rem;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(26,23,16,0.08);
        }

        .contact-item:last-child { border-bottom: none; }

        .contact-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(201,168,76,0.4);
            flex-shrink: 0;
        }

        .contact-icon svg { width: 16px; stroke: var(--gold); fill: none; }

        .contact-info strong {
            display: block;
            font-family: var(--font-body);
            font-size: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--charcoal);
            margin-bottom: 0.3rem;
        }

        .contact-info span {
            font-size: 0.88rem;
            color: rgba(26,23,16,0.55);
        }

        /* FORMULAIRE */
        .reservation-form { display: flex; flex-direction: column; gap: 1.2rem; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

        .form-group { display: flex; flex-direction: column; gap: 0.5rem; }

        .form-label {
            font-size: 0.62rem;
            font-weight: 400;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(26,23,16,0.5);
        }

        .form-input {
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 300;
            color: var(--charcoal);
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(26,23,16,0.2);
            padding: 0.8rem 0;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .form-input:focus { border-color: var(--gold); }

        .form-input::placeholder { color: rgba(26,23,16,0.25); }

        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%23C9A84C' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0 center;
        }

        .form-submit {
            font-family: var(--font-body);
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--cream);
            background: var(--charcoal);
            border: none;
            padding: 1.2rem 2.5rem;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 0.5rem;
            align-self: flex-start;
            position: relative;
        }

        .form-submit::after {
            content: '';
            position: absolute;
            bottom: -3px; right: -3px;
            width: 100%; height: 100%;
            border: 1px solid rgba(201,168,76,0.4);
        }

        .form-submit:hover { background: var(--charcoal-soft); }

        /* ─── SECTION: AMBIANCE ─── */
        .section-ambiance {
            padding: 0;
            background: var(--charcoal-mid);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            height: 60vh;
        }

        .ambiance-cell {
            position: relative;
            overflow: hidden;
        }

        .ambiance-cell-bg {
            position: absolute;
            inset: 0;
            transition: transform 0.8s ease;
        }

        .ambiance-cell:hover .ambiance-cell-bg { transform: scale(1.08); }

        .ambiance-1 .ambiance-cell-bg { background: linear-gradient(135deg, rgba(45,74,42,0.8) 0%, rgba(26,23,16,0.4) 100%), repeating-linear-gradient(45deg, rgba(201,168,76,0.06) 0px, rgba(201,168,76,0.06) 1px, transparent 1px, transparent 25px); }
        .ambiance-2 .ambiance-cell-bg { background: linear-gradient(135deg, rgba(201,168,76,0.6) 0%, rgba(181,83,60,0.7) 100%); }
        .ambiance-3 .ambiance-cell-bg { background: linear-gradient(135deg, rgba(181,83,60,0.7) 0%, rgba(45,74,42,0.6) 100%), repeating-conic-gradient(rgba(201,168,76,0.05) 0% 25%, transparent 0% 50%) 0 0 / 20px 20px; }
        .ambiance-4 .ambiance-cell-bg { background: linear-gradient(135deg, rgba(26,23,16,0.9) 0%, rgba(201,168,76,0.4) 100%); }

        .ambiance-label {
            position: absolute;
            bottom: 1.5rem; left: 1.5rem;
            font-family: var(--font-display);
            font-size: 1rem;
            font-weight: 300;
            font-style: italic;
            color: rgba(249,245,236,0.7);
        }

        /* ─── FOOTER ─── */
        footer {
            background: var(--charcoal);
            border-top: 1px solid rgba(201,168,76,0.12);
            padding: 5rem 3rem 3rem;
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
            line-height: 1.8;
            color: rgba(249,245,236,0.35);
            max-width: 280px;
        }

        .footer-col h4 {
            font-family: var(--font-body);
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 1.5rem;
        }

        .footer-col ul { list-style: none; }

        .footer-col li {
            margin-bottom: 0.8rem;
        }

        .footer-col a {
            font-size: 0.82rem;
            color: rgba(249,245,236,0.35);
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
        }

        .footer-bottom p {
            font-size: 0.72rem;
            color: rgba(249,245,236,0.2);
            letter-spacing: 0.05em;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(201,168,76,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: border-color 0.3s ease, background 0.3s ease;
        }

        .social-link:hover {
            border-color: var(--gold);
            background: rgba(201,168,76,0.1);
        }

        .social-link svg { width: 14px; stroke: rgba(249,245,236,0.5); fill: none; }

        /* ─── ORNEMENT AFRICAIN SVG ─── */
        .ornament {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            opacity: 0.35;
        }

        /* ─── ANIMATIONS ─── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-label { animation: fadeInUp 0.8s ease 0.2s both; }
        h1 { animation: fadeInUp 0.8s ease 0.4s both; }
        .hero-desc { animation: fadeInUp 0.8s ease 0.6s both; }
        .hero-actions { animation: fadeInUp 0.8s ease 0.8s both; }

        /* ─── HORIZONTAL RULE DÉCO ─── */
        .deco-line {
            display: flex;
            align-items: center;
            gap: 1rem;
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
            opacity: 0.6;
        }

        /* scroll indicator */
        .scroll-hint {
            position: absolute;
            bottom: 2.5rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            animation: fadeInUp 1s ease 1.2s both;
        }

        .scroll-hint span {
            font-size: 0.58rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: rgba(249,245,236,0.3);
        }

        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, rgba(201,168,76,0.6), transparent);
            animation: scrollDown 2s ease-in-out infinite;
        }

        @keyframes scrollDown {
            0% { transform: scaleY(0); transform-origin: top; }
            50% { transform: scaleY(1); transform-origin: top; }
            51% { transform: scaleY(1); transform-origin: bottom; }
            100% { transform: scaleY(0); transform-origin: bottom; }
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
        <div class="hero-bg"></div>
        <div class="hero-pattern"></div>
        <div class="hero-decor"></div>

        <div class="hero-image-frame">
            <div class="hero-image-placeholder">
                <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M40 5 L75 62 L5 62 Z" stroke="#C9A84C" stroke-width="1"/>
                    <circle cx="40" cy="40" r="30" stroke="#C9A84C" stroke-width="0.5"/>
                    <path d="M20 40 Q40 20 60 40 Q40 60 20 40Z" stroke="#C9A84C" stroke-width="0.5"/>
                </svg>
            </div>
        </div>

        <div class="hero-content">
            <div class="hero-label">Restaurant Gastronomique</div>
            <h1>L'Âme de la<br><em>Cuisine Béninoise</em><br>Revisitée</h1>
            <p class="hero-desc">Une expérience culinaire raffinée où les saveurs ancestrales du Bénin rencontrent l'excellence de la gastronomie contemporaine, au cœur de Cotonou.</p>
            <div class="hero-actions">
                <a href="#reservation" class="btn-primary">Réserver une table</a>
                <a href="#carte" class="btn-ghost">
                    Découvrir la carte
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M4 10h12M12 6l4 4-4 4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                    </svg>
                </a>
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
                <div class="histoire-img-main">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" opacity="0.3">
                        <rect x="5" y="5" width="50" height="50" stroke="#C9A84C" stroke-width="0.5"/>
                        <rect x="15" y="15" width="30" height="30" stroke="#C9A84C" stroke-width="0.5"/>
                        <circle cx="30" cy="30" r="10" stroke="#C9A84C" stroke-width="0.5"/>
                    </svg>
                </div>
                <div class="histoire-img-accent"></div>
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
            <div class="menu-card menu-card-1">
                <div class="menu-card-bg"></div>
                <div class="menu-card-overlay"></div>
                <div class="menu-card-content">
                    <div class="menu-tag">Entrée Signature</div>
                    <div class="menu-name">Amiwo de<br>Crevettes Royales</div>
                    <div class="menu-desc">Pâte de maïs ancestrale, crevettes sauvages du lac Nokoué, huile de palme première pression</div>
                    <div class="menu-price">4 500 FCFA</div>
                </div>
            </div>

            <div class="menu-card menu-card-2">
                <div class="menu-card-bg"></div>
                <div class="menu-card-overlay"></div>
                <div class="menu-card-content">
                    <div class="menu-tag">Plat Principal</div>
                    <div class="menu-name">Poulet Bicyclette<br>en Sauce Gboma</div>
                    <div class="menu-desc">Volaille fermière de Glazoué, feuilles d'épinards sauvages, épices du marché de Parakou</div>
                    <div class="menu-price">9 800 FCFA</div>
                </div>
            </div>

            <div class="menu-card menu-card-3">
                <div class="menu-card-bg"></div>
                <div class="menu-card-overlay"></div>
                <div class="menu-card-content">
                    <div class="menu-tag">Dessert</div>
                    <div class="menu-name">Parfait à la<br>Noix de Coco</div>
                    <div class="menu-desc">Coco de Ouidah, caramel de canne à sucre locale, biscuit fondant au gingembre</div>
                    <div class="menu-price">3 200 FCFA</div>
                </div>
            </div>
        </div>

        <div style="text-align:center; margin-top: 4rem;">
            <a href="#" class="btn-primary" style="display:inline-block">Voir toute la carte</a>
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
                        <svg viewBox="0 0 16 16"><path d="M14 10.5c-1.5 0-3-.5-4-1l-1 1.5C7.5 11.5 6 11 5 10L3 9c-1-1-1.5-2.5-1-4l1.5-1c-.5-1-1-2.5-1-4H1C0 8 8 16 14.5 16v-1.5c-1.5 0-3-.5-4-1z" stroke="#C9A84C" stroke-width="1" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>Téléphone</strong>
                        <span>+229 21 30 XX XX</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><path d="M2 3h12v10H2z" stroke="#C9A84C" stroke-width="1" fill="none" rx="1"/><path d="M2 3l6 6 6-6" stroke="#C9A84C" stroke-width="1" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>E-mail</strong>
                        <span>reservation@saveursdubénin.bj</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><circle cx="8" cy="7" r="3" stroke="#C9A84C" stroke-width="1" fill="none"/><path d="M8 1C5.2 1 3 3.2 3 6c0 4 5 9 5 9s5-5 5-9c0-2.8-2.2-5-5-5z" stroke="#C9A84C" stroke-width="1" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>Adresse</strong>
                        <span>Avenue Jean-Paul II, Cotonou · Bénin</span>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6" stroke="#C9A84C" stroke-width="1" fill="none"/><path d="M8 4v4l3 2" stroke="#C9A84C" stroke-width="1" stroke-linecap="round" fill="none"/></svg>
                    </div>
                    <div class="contact-info">
                        <strong>Horaires</strong>
                        <span>Lun–Sam · 12h–15h · 19h–23h</span>
                    </div>
                </div>
            </div>

            <div>
                <form class="reservation-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Prénom</label>
                            <input type="text" class="form-input" placeholder="Jean" name="prenom">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-input" placeholder="Adansi" name="nom">
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
                            <input type="date" class="form-input" name="date">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Heure</label>
                            <select class="form-input" name="heure">
                                <option value="">Choisir...</option>
                                <optgroup label="Déjeuner">
                                    <option>12h00</option>
                                    <option>12h30</option>
                                    <option>13h00</option>
                                    <option>13h30</option>
                                </optgroup>
                                <optgroup label="Dîner">
                                    <option>19h00</option>
                                    <option>19h30</option>
                                    <option>20h00</option>
                                    <option>20h30</option>
                                    <option>21h00</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nombre de couverts</label>
                            <select class="form-input" name="couverts">
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
                        <textarea class="form-input" rows="3" name="notes" placeholder="Allergies, préférences, aménagement spécial..." style="resize:none; line-height:1.6"></textarea>
                    </div>

                    <button type="submit" class="form-submit">Confirmer la réservation</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ─── AMBIANCE ─── -->
    <section class="section-ambiance" id="ambiance">
        <div class="ambiance-cell ambiance-1">
            <div class="ambiance-cell-bg"></div>
            <div class="ambiance-label">La Terrasse</div>
        </div>
        <div class="ambiance-cell ambiance-2">
            <div class="ambiance-cell-bg"></div>
            <div class="ambiance-label">La Cave</div>
        </div>
        <div class="ambiance-cell ambiance-3">
            <div class="ambiance-cell-bg"></div>
            <div class="ambiance-label">Le Salon Privé</div>
        </div>
        <div class="ambiance-cell ambiance-4">
            <div class="ambiance-cell-bg"></div>
            <div class="ambiance-label">La Cuisine</div>
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
                    <li><a href="#">Menu déjeuner</a></li>
                    <li><a href="#">Menu dîner</a></li>
                    <li><a href="#">Menu dégustation</a></li>
                    <li><a href="#">Événements privés</a></li>
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
                    <svg viewBox="0 0 16 16"><path d="M9 1H7C5.3 1 5 2.3 5 3v2H3v3h2v7h3V8h2.5L11 5H8V3.5C8 3 8.3 3 9 3V1z" stroke="rgba(249,245,236,0.5)" fill="none"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg viewBox="0 0 16 16"><rect x="2" y="2" width="12" height="12" rx="3" stroke="rgba(249,245,236,0.5)" fill="none"/><circle cx="8" cy="8" r="3" stroke="rgba(249,245,236,0.5)" fill="none"/><circle cx="12" cy="4" r="0.8" fill="rgba(249,245,236,0.5)"/></svg>
                </a>
                <a href="#" class="social-link" aria-label="WhatsApp">
                    <svg viewBox="0 0 16 16"><circle cx="8" cy="8" r="6" stroke="rgba(249,245,236,0.5)" fill="none"/><path d="M5 8c0 1.7 1.3 3 3 3 .6 0 1.1-.2 1.5-.5L11 11l-.5-1.5C11.2 9 11.5 8.5 11.5 8c0-1.7-1.3-3-3-3S5 6.3 5 8z" stroke="rgba(249,245,236,0.5)" fill="none"/></svg>
                </a>
            </div>
        </div>
    </footer>

    <script>
        // Scroll nav effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 80);
        });

        // Smooth reveal on scroll (IntersectionObserver léger)
        const reveals = document.querySelectorAll('.histoire-grid, .menu-card, .stat-item, .contact-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        entry.target.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        reveals.forEach(el => observer.observe(el));
    </script>
</body>
</html>