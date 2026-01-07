<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Login</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Bebas+Neue&family=Roboto:wght@400;500;700&family=Instrument+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --auth-bg: #f8f9fb;
                --auth-bg-deep: #cfe6fb;
                --auth-card: rgba(255, 255, 255, 0.92);
                --auth-border: rgba(199, 219, 241, 0.9);
                --auth-text: #0f172a;
                --auth-muted: #5b6b7d;
                --auth-shadow: 0 35px 80px rgba(15, 23, 42, 0.18);
                --auth-field: rgba(241, 246, 252, 0.9);
                --fixmi-accent: #f26a21;
                --fixmi-muted: #7c889b;
                --fixmi-text: #2f3b52;
            }

            body.auth-body {
                font-family: 'Figtree', 'Roboto', sans-serif;
                background: var(--auth-bg);
                color: var(--auth-text);
            }

            .auth-shell {
                background: var(--auth-bg);
            }

            .auth-aurora {
                position: absolute;
                width: min(760px, 90vw);
                height: 360px;
                left: 50%;
                transform: translateX(-50%);
                background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.9) 0%, rgba(154, 207, 255, 0.7) 40%, rgba(139, 197, 255, 0.1) 70%, transparent 80%);
                filter: blur(8px);
                opacity: 0;
            }

            .auth-aurora--top {
                top: -160px;
            }

            .auth-aurora--bottom {
                bottom: -220px;
                opacity: 0;
            }

            .auth-dots {
                background-image: radial-gradient(rgba(255, 255, 255, 0.65) 1px, transparent 1px);
                background-size: 18px 18px;
                opacity: 0;
            }

            .auth-wave {
                position: absolute;
                inset: 0;
                background: linear-gradient(120deg, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0) 45%, rgba(255, 255, 255, 0.45) 100%);
                opacity: 0;
            }

            .auth-card {
                background: var(--auth-card);
                border: 1px solid var(--auth-border);
                box-shadow: var(--auth-shadow);
            }

            .auth-input {
                background: var(--auth-field);
                border: 1px solid rgba(255, 255, 255, 0.9);
                box-shadow: inset 0 1px 2px rgba(15, 23, 42, 0.05);
            }

            .auth-title {
                font-family: 'Space Grotesk', 'Figtree', sans-serif;
                letter-spacing: 0.02em;
            }

            .auth-subtitle {
                font-family: 'Instrument Sans', 'Figtree', sans-serif;
            }

            .auth-eye-toggle {
                width: 36px;
                height: 36px;
                border-radius: 999px;
                border: 1px solid transparent;
                background: transparent;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: all 0.2s ease;
            }

            .auth-eye-toggle:hover {
                background: rgba(255, 255, 255, 0.75);
                border-color: rgba(148, 163, 184, 0.35);
                box-shadow: 0 10px 20px rgba(15, 23, 42, 0.08);
            }

            .auth-eye-toggle:focus-visible {
                outline: none;
                box-shadow: 0 0 0 3px rgba(125, 211, 252, 0.55);
            }

            .auth-eye-toggle svg {
                transition: opacity 0.18s ease, transform 0.18s ease;
            }

            .auth-eye-toggle .eye-open {
                opacity: 0;
                transform: scale(0.9);
            }

            .auth-eye-toggle .eye-closed {
                opacity: 1;
                transform: scale(1);
            }

            .auth-eye-toggle.is-visible .eye-open {
                opacity: 1;
                transform: scale(1);
            }

            .auth-eye-toggle.is-visible .eye-closed {
                opacity: 0;
                transform: scale(0.85);
            }

            .auth-divider {
                background: linear-gradient(90deg, transparent, rgba(148, 163, 184, 0.55), transparent);
            }

            .auth-home-link {
                color: var(--fixmi-accent);
                font-weight: 600;
                font-family: 'Space Grotesk', 'Figtree', sans-serif;
                transition: opacity 0.2s ease, transform 0.2s ease;
            }

            .auth-home-link:hover {
                opacity: 0.85;
                transform: translateY(-1px);
            }

            .auth-credit {
                color: var(--fixmi-muted);
                font-family: 'Space Grotesk', 'Figtree', sans-serif;
            }

            .auth-credit a {
                color: var(--fixmi-accent);
                text-decoration: none;
                font-weight: 700;
                display: inline-block;
                transition: opacity 0.2s ease, transform 0.2s ease;
            }

            .auth-credit a:hover {
                opacity: 0.85;
                transform: translateY(-1px);
            }

            .auth-submit {
                background: linear-gradient(180deg, #f58a3c 0%, var(--fixmi-accent) 100%);
                color: #ffffff;
                border: 1px solid rgba(242, 106, 33, 0.65);
                box-shadow: 0 14px 28px rgba(242, 106, 33, 0.28);
                position: relative;
                overflow: hidden;
                background-size: 180% 180%;
                background-position: 0% 50%;
                transition: transform 0.2s ease, box-shadow 0.25s ease, filter 0.25s ease, background-position 0.6s ease;
            }

            .auth-submit::before {
                content: "";
                position: absolute;
                top: -60%;
                left: -40%;
                width: 60%;
                height: 220%;
                background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, 0.65) 50%, transparent 100%);
                transform: translateX(-140%);
                transition: transform 0.6s ease;
            }

            .auth-submit > span {
                position: relative;
                z-index: 1;
            }

            .auth-submit:hover {
                transform: translateY(-2px) scale(1.01);
                box-shadow: 0 18px 32px rgba(242, 106, 33, 0.35);
                filter: brightness(1.03);
                background-position: 100% 50%;
            }

            .auth-submit:hover::before {
                transform: translateX(220%);
            }

            .auth-submit:active {
                transform: translateY(0) scale(0.99);
                box-shadow: 0 10px 18px rgba(242, 106, 33, 0.25);
                filter: brightness(0.98);
            }

            .auth-submit:focus-visible {
                outline: none;
                box-shadow: 0 0 0 3px rgba(242, 106, 33, 0.3), 0 14px 28px rgba(242, 106, 33, 0.28);
            }

            .auth-social {
                border: 1px solid rgba(203, 213, 225, 0.7);
                background: rgba(255, 255, 255, 0.85);
                box-shadow: 0 8px 18px rgba(15, 23, 42, 0.06);
            }

            .auth-social-icon {
                font-weight: 700;
                font-size: 0.95rem;
            }

            .auth-google {
                background: conic-gradient(#4285f4, #34a853, #fbbc05, #ea4335, #4285f4);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .auth-facebook {
                color: #1877f2;
            }

            .auth-apple {
                color: #0f172a;
            }

            @keyframes authFadeUp {
                from {
                    opacity: 0;
                    transform: translateY(16px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .auth-fade-up {
                opacity: 0;
                transform: translateY(16px);
                animation: authFadeUp 0.8s ease-out forwards;
            }

            .auth-delay-1 {
                animation-delay: 0.05s;
            }

            .auth-delay-2 {
                animation-delay: 0.12s;
            }

            .auth-delay-3 {
                animation-delay: 0.2s;
            }

            .auth-delay-4 {
                animation-delay: 0.28s;
            }

            .auth-delay-5 {
                animation-delay: 0.36s;
            }

            @keyframes authFloat {
                0%,
                100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-6px);
                }
            }

            .auth-float {
                animation: authFloat 4s ease-in-out infinite;
            }

            @keyframes authCard {
                from {
                    opacity: 0;
                    transform: translateY(24px) scale(0.98);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            .auth-card-anim {
                animation: authCard 0.8s ease-out both;
            }
        </style>
    </head>
    <body class="auth-body antialiased">
        <div class="auth-shell relative min-h-screen overflow-hidden">
            <div class="pointer-events-none absolute inset-0">
                <div class="auth-aurora auth-aurora--top"></div>
                <div class="auth-aurora auth-aurora--bottom"></div>
                <div class="auth-wave"></div>
                <div class="auth-dots absolute inset-0"></div>
            </div>
            <main class="relative flex min-h-screen items-center justify-center px-4 py-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
