<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Saveurs du Bénin') }} - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,700;1,400;1,500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #C9873C;
            --gold-light: #E5A85E;
            --charcoal: #0F0D09;
            --cream: #FAF6EF;
            --cream-soft: #F5E3C8;
            --text: #FAF6EF;
            --border: rgba(250,246,239,0.12);
            --shadow: 0 20px 50px rgba(0,0,0,0.3);
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'DM Sans', system-ui, sans-serif;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: var(--font-body);
            color: var(--text);
            background: linear-gradient(180deg, rgba(15,13,9,0.92) 0%, rgba(15,13,9,0.78) 40%, rgba(15,13,9,0.94) 100%),
                        url('https://plus.unsplash.com/premium_photo-1769810469108-09122e41ffa0?q=80&w=1028&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center/cover no-repeat;
            background-attachment: fixed;
        }
        a { color: inherit; text-decoration: none; }
        .page-shell {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .page-header {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            font-family: var(--font-display);
            font-size: 1.5rem;
            letter-spacing: 0.02em;
            color: var(--gold);
        }
        .brand span {
            display: block;
            font-size: 0.75rem;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: rgba(250,246,239,0.75);
            margin-top: 0.5rem;
        }
        .top-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .top-links a {
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: rgba(250,246,239,0.72);
            transition: color 0.2s ease;
        }
        .top-links a:hover { color: var(--gold); }
        .auth-main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .auth-card {
            width: min(640px, 100%);
            background: rgba(15,13,9,0.95);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            border-radius: 28px;
            padding: 3rem;
            backdrop-filter: blur(12px);
        }
        .auth-card h1 {
            margin: 0 0 0.75rem;
            font-family: var(--font-display);
            font-size: clamp(2rem, 2.5vw, 2.6rem);
            letter-spacing: 0.02em;
        }
        .auth-card p {
            margin: 0 0 2rem;
            color: rgba(250,246,239,0.75);
            line-height: 1.8;
        }
        .form-field {
            display: grid;
            gap: 0.5rem;
            margin-bottom: 1.15rem;
        }
        label {
            font-size: 0.9rem;
            color: rgba(250,246,239,0.8);
        }
        input {
            width: 100%;
            border: 1px solid rgba(250,246,239,0.13);
            background: rgba(255,255,255,0.04);
            color: var(--text);
            border-radius: 14px;
            padding: 0.95rem 1rem;
            font-size: 0.95rem;
        }
        input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(201,135,60,0.14);
        }
        button {
            width: 100%;
            border: none;
            border-radius: 14px;
            padding: 1rem 1.1rem;
            font-size: 1rem;
            font-weight: 600;
            background: var(--gold);
            color: var(--charcoal);
            cursor: pointer;
            transition: transform 0.2s ease, background 0.2s ease;
        }
        button:hover { transform: translateY(-1px); background: var(--gold-light); }
        .small-text {
            margin-top: 1.4rem;
            font-size: 0.92rem;
            color: rgba(250,246,239,0.72);
            text-align: center;
        }
        .small-text a { color: var(--gold); }
        .alert {
            margin-bottom: 1rem;
            padding: 1rem 1rem;
            border-radius: 14px;
            background: rgba(201,135,60,0.1);
            color: var(--gold);
            border: 1px solid rgba(201,135,60,0.24);
        }
        .footer-note {
            text-align: center;
            padding: 1.5rem 2rem;
            color: rgba(250,246,239,0.55);
            font-size: 0.82rem;
        }

        @media (max-width: 720px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1.25rem 1.25rem 0.75rem;
            }

            .top-links {
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .auth-main {
                padding: 1.25rem;
            }

            .auth-card {
                padding: 2rem;
                border-radius: 22px;
            }

            .auth-card h1 {
                font-size: 2.2rem;
            }

            .form-field {
                gap: 0.75rem;
            }

            .footer-note {
                padding: 1rem 1.25rem 1.5rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <header class="page-header">
            <a href="{{ route('home') }}" class="brand">
                Saveurs du Bénin
                <span>Restaurant Gastronomique</span>
            </a>
            <nav class="top-links">
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('menu.index') }}">Menu</a>
            </nav>
        </header>

        <main class="auth-main">
            <div class="auth-card">
                @yield('content')
            </div>
        </main>

        <footer class="footer-note">
            © {{ date('Y') }} Saveurs du Bénin · Un compte client est nécessaire pour commander.
        </footer>
    </div>
</body>
</html>
