<!DOCTYPE html>
<html lang="{{ current_language() }}" dir="ltr" class="{{ is_urdu() ? 'urdu-mode' : '' }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ t('GrowSmart | Smart Agriculture') }}</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        body {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;
            background: #F7F6F1;
            color: #263832;
        }

        img {
            max-width: 100%;
        }

        a {
            text-decoration: none;
        }

        :root {
            --forest-dark: #102C27;
            --forest: #183A35;
            --primary: #2E6B57;
            --primary-light: #6F9581;
            --sage: #DDE9E2;
            --sage-light: #EEF4F0;
            --cream: #F7F6F1;
            --white: #FFFFFF;
            --text: #263832;
            --muted: #718079;
            --gold: #B9955A;
            --gold-light: #F1E8D7;
        }

        .navbar-main {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            max-width: 100%;
            z-index: 1000;
            padding: 18px 5%;
            background: transparent;
        }

        .navbar-inner {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: white;
            font-size: 21px;
            font-weight: 700;
            letter-spacing: 0.2px;
            min-width: 0;
        }

        .brand:hover {
            color: white;
        }

        .brand img {
            width: 44px;
            height: 44px;
            flex: 0 0 44px;
            object-fit: cover;
            border-radius: 11px;
            border: 2px solid rgba(255,255,255,0.25);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .nav-link-custom {
            color: #E4EEE9;
            font-size: 14px;
            padding: 10px 15px;
            transition: 0.25s;
        }

        .nav-link-custom:hover {
            color: white;
        }

        .nav-login {
            color: white;
            border: 1px solid rgba(255,255,255,0.30);
            background: rgba(255,255,255,0.08);
            padding: 10px 19px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.25s;
            backdrop-filter: blur(8px);
        }

        .nav-login:hover {
            background: rgba(255,255,255,0.16);
            color: white;
        }

        .nav-register {
            color: var(--forest-dark);
            background: #F3ECDF;
            padding: 10px 19px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 650;
            transition: 0.25s;
        }

        .nav-register:hover {
            background: white;
            color: var(--forest-dark);
            transform: translateY(-1px);
        }

        .home-language-switcher {
            position: relative;
            flex-shrink: 0;
        }

        .home-language-btn {
            border: 1px solid rgba(255,255,255,0.30);
            background: rgba(255,255,255,0.08);
            color: white;
            padding: 10px 16px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            backdrop-filter: blur(8px);
            white-space: nowrap;
        }

        .home-language-btn:hover {
            background: rgba(255,255,255,0.16);
        }

        .home-language-menu {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            min-width: 130px;
            background: white;
            border-radius: 9px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            overflow: hidden;
            z-index: 1100;
        }

        .home-language-menu.show {
            display: block;
        }

        .home-language-menu a {
            display: block;
            padding: 10px 14px;
            color: var(--forest-dark);
            font-size: 13px;
        }

        .home-language-menu a:hover {
            background: var(--sage-light);
        }

        .hero {
            position: relative;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            min-height: 100vh;
            height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                linear-gradient(
                    90deg,
                    rgba(9,35,29,0.96) 0%,
                    rgba(15,54,43,0.88) 38%,
                    rgba(20,62,49,0.54) 68%,
                    rgba(20,62,49,0.18) 100%
                ),
                url("{{ asset('images/agriculture.jpg') }}")
                center center / cover no-repeat;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(
                    circle at 80% 30%,
                    rgba(255,255,255,0.08),
                    transparent 30%
                );
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            right: -200px;
            bottom: -250px;
            border: 1px solid rgba(255,255,255,0.10);
            background: rgba(255,255,255,0.025);
            pointer-events: none;
        }

        .hero-container {
            width: 100%;
            max-width: 1400px;
            min-width: 0;
            margin: 0 auto;
            padding: 90px 5% 45px;
            position: relative;
            z-index: 5;
        }

        .hero-content {
            width: 100%;
            max-width: 700px;
            min-width: 0;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            margin-bottom: 18px;
            border-radius: 30px;
            color: #E8F0EB;
            background: rgba(255,255,255,0.09);
            border: 1px solid rgba(255,255,255,0.16);
            backdrop-filter: blur(10px);
            font-size: 12px;
            font-weight: 500;
            max-width: 100%;
        }

        .hero-badge i {
            color: #D6B16E;
            flex-shrink: 0;
        }

        .hero h1 {
            width: 100%;
            max-width: 100%;
            margin: 0;
            color: white;
            font-size: clamp(42px, 5vw, 68px);
            line-height: 1.03;
            letter-spacing: -2px;
            font-weight: 750;
            overflow-wrap: break-word;
            word-break: normal;
        }

        .hero h1 span {
            color: #D6E5DB;
        }

        .hero-description {
            width: 100%;
            max-width: 610px;
            margin-top: 20px;
            margin-bottom: 25px;
            color: #D6E4DE;
            font-size: 15px;
            line-height: 1.7;
            overflow-wrap: break-word;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 13px;
            flex-wrap: wrap;
            width: 100%;
            min-width: 0;
        }

        .btn-register {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 22px;
            background: #F3ECDF;
            color: var(--forest-dark);
            border-radius: 10px;
            font-size: 14px;
            font-weight: 650;
            transition: 0.25s;
        }

        .btn-register:hover {
            background: white;
            color: var(--forest-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
        }

        .btn-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 21px;
            color: white;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.24);
            border-radius: 10px;
            font-size: 14px;
            font-weight: 550;
            backdrop-filter: blur(8px);
            transition: 0.25s;
        }

        .btn-login:hover {
            background: rgba(255,255,255,0.15);
            color: white;
            transform: translateY(-3px);
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 22px;
            color: #AFC3BA;
            font-size: 12px;
            max-width: 100%;
        }

        .hero-note i {
            color: #A9C6B5;
            font-size: 15px;
            flex-shrink: 0;
        }

        .about {
            width: 100%;
            max-width: 100%;
            padding: 90px 5%;
            background: var(--cream);
        }

        .about-container {
            width: 100%;
            max-width: 1100px;
            margin: auto;
            text-align: center;
        }

        .about-label {
            color: var(--primary);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.8px;
            margin-bottom: 12px;
        }

        .about h2 {
            margin: 0 auto 18px;
            max-width: 750px;
            color: var(--forest-dark);
            font-size: clamp(30px, 4vw, 44px);
            line-height: 1.15;
            font-weight: 700;
        }

        .about p {
            max-width: 750px;
            margin: auto;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.85;
        }

        .cta-section {
            width: 100%;
            max-width: 100%;
            padding: 25px 5% 90px;
            background: var(--cream);
        }

        .cta-box {
            width: 100%;
            max-width: 1200px;
            min-height: 300px;
            margin: auto;
            padding: 55px;
            border-radius: 22px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background:
                linear-gradient(
                    120deg,
                    #183A35,
                    #285D4D
                );
            box-shadow:
                0 18px 45px rgba(18,46,42,0.12);
        }

        .cta-box::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            left: -130px;
            top: -140px;
            border: 1px solid rgba(255,255,255,0.10);
            background: rgba(255,255,255,0.025);
        }

        .cta-box::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            right: -100px;
            bottom: -150px;
            background: rgba(185,149,90,0.10);
        }

        .cta-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 800px;
        }

        .cta-content h2 {
            color: white;
            font-size: clamp(28px, 4vw, 40px);
            margin-bottom: 12px;
            font-weight: 700;
        }

        .cta-content p {
            max-width: 600px;
            margin: 0 auto 25px;
            color: #C8D9D1;
            font-size: 14px;
            line-height: 1.7;
        }

        footer {
            width: 100%;
            max-width: 100%;
            background: var(--forest-dark);
            padding: 35px 5% 22px;
            color: white;
        }

        .footer-container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 17px;
            font-weight: 650;
        }

        .footer-brand img {
            width: 34px;
            height: 34px;
            object-fit: cover;
            border-radius: 8px;
        }

        .footer-text {
            margin: 6px 0 0;
            color: #829A91;
            font-size: 11px;
        }

        .footer-copy {
            color: #718A80;
            font-size: 11px;
            text-align: right;
        }

        .fade-up {
            animation: fadeUp 0.9s ease forwards;
        }

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        html.urdu-mode body {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .navbar-main {
            direction: rtl;
        }

        html.urdu-mode .navbar-inner {
            direction: rtl;
        }

        html.urdu-mode .nav-right {
            direction: rtl;
        }

        html.urdu-mode .hero {
            direction: rtl;
        }

        html.urdu-mode .hero-container {
            direction: rtl;
        }

        html.urdu-mode .hero-content {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .hero-badge {
            direction: rtl;
        }

        html.urdu-mode .hero-description {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .hero-buttons {
            direction: rtl;
        }

        html.urdu-mode .hero-note {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .about {
            direction: rtl;
        }

        html.urdu-mode .about-container {
            direction: rtl;
        }

        html.urdu-mode .cta-section {
            direction: rtl;
        }

        html.urdu-mode .cta-box {
            direction: rtl;
        }

        html.urdu-mode footer {
            direction: rtl;
        }

        html.urdu-mode .footer-container {
            direction: rtl;
        }

        html.urdu-mode .footer-copy {
            text-align: left;
        }

        html.urdu-mode .home-language-menu {
            right: auto;
            left: 0;
        }

        @media (max-width: 992px) {

            .navbar-main {
                padding: 16px 25px;
            }

            .hero-container {
                padding-left: 6%;
                padding-right: 6%;
            }

            .hero-content {
                max-width: 650px;
            }

            .hero h1 {
                font-size: 56px;
            }

        }

        @media (max-width: 768px) {

            html,
            body {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                overflow-x: hidden;
            }

            .navbar-main {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                width: 100%;
                max-width: 100%;
                padding: 16px 20px;
            }

            .navbar-inner {
                width: 100%;
                max-width: 100%;
                min-width: 0;
            }

            .nav-link-custom {
                display: none;
            }

            .brand {
                font-size: 18px;
                min-width: 0;
            }

            .brand img {
                width: 39px;
                height: 39px;
                flex-basis: 39px;
            }

            .nav-right {
                flex-shrink: 0;
            }

            .home-language-btn {
                padding: 9px 12px;
                font-size: 12px;
            }

            .hero {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                min-height: 100svh;
                height: auto;
                overflow: hidden;
                background-position: 62% center;
            }

            .hero-container {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                margin: 0;
                padding: 115px 25px 45px;
            }

            .hero-content {
                width: 100%;
                max-width: 620px;
                min-width: 0;
            }

            .hero h1 {
                width: 100%;
                max-width: 100%;
                font-size: 48px;
                letter-spacing: -1.5px;
            }

            .hero-description {
                width: 100%;
                max-width: 560px;
                font-size: 14px;
                line-height: 1.7;
            }

            .hero-buttons {
                width: 100%;
                max-width: 100%;
            }

            .hero-note {
                width: 100%;
                max-width: 100%;
            }

            .about {
                width: 100%;
                max-width: 100%;
                padding: 70px 25px;
            }

            .cta-section {
                width: 100%;
                max-width: 100%;
                padding: 15px 20px 70px;
            }

            .cta-box {
                width: 100%;
                max-width: 100%;
                padding: 45px 25px;
            }

            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-copy {
                text-align: center;
            }

            html.urdu-mode .hero-container {
                direction: rtl;
            }

            html.urdu-mode .hero-content {
                direction: rtl;
                text-align: right;
            }

            html.urdu-mode .hero h1 {
                direction: rtl;
                text-align: right;
                width: 100%;
                max-width: 100%;
            }

            html.urdu-mode .hero-description {
                direction: rtl;
                text-align: right;
                width: 100%;
                max-width: 100%;
            }

            html.urdu-mode .hero-buttons {
                direction: rtl;
                width: 100%;
            }

            html.urdu-mode .btn-register,
            html.urdu-mode .btn-login {
                width: 100%;
                max-width: 100%;
            }

            html.urdu-mode .hero-note {
                direction: rtl;
                width: 100%;
                max-width: 100%;
            }

        }

        @media (max-width: 480px) {

            html,
            body {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                overflow-x: hidden;
            }

            .navbar-main {
                width: 100%;
                max-width: 100%;
                padding: 14px 15px;
            }

            .navbar-inner {
                width: 100%;
                max-width: 100%;
                min-width: 0;
            }

            .brand span {
                display: none;
            }

            .brand {
                flex-shrink: 1;
            }

            .brand img {
                width: 38px;
                height: 38px;
                flex-basis: 38px;
            }

            .nav-right {
                gap: 6px;
                flex-shrink: 0;
            }

            .home-language-btn {
                padding: 8px 10px;
                font-size: 11px;
                gap: 5px;
            }

            .home-language-btn i {
                font-size: 11px;
            }

            .hero {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                min-height: 100svh;
                height: auto;
                overflow: hidden;
                background-position: 62% center;
            }

            .hero-container {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                margin: 0;
                padding: 105px 20px 40px;
            }

            .hero-content {
                width: 100%;
                max-width: 100%;
                min-width: 0;
            }

            .hero-badge {
                max-width: 100%;
                font-size: 10px;
                padding: 7px 12px;
                margin-bottom: 17px;
            }

            .hero h1 {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                font-size: 40px;
                line-height: 1.12;
                letter-spacing: -1px;
                overflow-wrap: anywhere;
            }

            .hero-description {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                font-size: 13px;
                line-height: 1.75;
                margin-top: 17px;
                margin-bottom: 22px;
                overflow-wrap: anywhere;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                width: 100%;
                max-width: 100%;
            }

            .btn-register,
            .btn-login {
                width: 100%;
                max-width: 100%;
                padding: 12px 18px;
            }

            .hero-note {
                width: 100%;
                max-width: 100%;
                align-items: flex-start;
                font-size: 11px;
                line-height: 1.6;
                overflow-wrap: anywhere;
            }

            .home-language-menu {
                min-width: 115px;
            }

            .about {
                width: 100%;
                max-width: 100%;
                padding: 60px 20px;
            }

            .about h2 {
                font-size: 30px;
            }

            .about p {
                font-size: 13px;
                line-height: 1.75;
            }

            .cta-section {
                width: 100%;
                max-width: 100%;
                padding: 10px 15px 60px;
            }

            .cta-box {
                width: 100%;
                max-width: 100%;
                min-height: 260px;
                padding: 40px 20px;
                border-radius: 18px;
            }

            .cta-content h2 {
                font-size: 28px;
            }

            .cta-content p {
                font-size: 13px;
            }

            footer {
                width: 100%;
                max-width: 100%;
                padding: 30px 20px 20px;
            }

            html.urdu-mode .navbar-main {
                direction: rtl;
            }

            html.urdu-mode .navbar-inner {
                direction: rtl;
                width: 100%;
                max-width: 100%;
            }

            html.urdu-mode .nav-right {
                direction: rtl;
            }

            html.urdu-mode .hero {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                min-width: 0;
                margin: 0;
            }

            html.urdu-mode .hero-container {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                min-width: 0;
                margin: 0;
                padding-left: 20px;
                padding-right: 20px;
            }

            html.urdu-mode .hero-content {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                min-width: 0;
                margin: 0;
                text-align: right;
            }

            html.urdu-mode .hero-badge {
                direction: rtl;
                max-width: 100%;
            }

            html.urdu-mode .hero h1 {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                min-width: 0;
                text-align: right;
                font-size: 38px;
                line-height: 1.18;
                letter-spacing: 0;
                overflow-wrap: anywhere;
                word-break: normal;
            }

            html.urdu-mode .hero-description {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                min-width: 0;
                text-align: right;
                font-size: 13px;
                line-height: 1.9;
                overflow-wrap: anywhere;
            }

            html.urdu-mode .hero-buttons {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                flex-direction: column;
                align-items: stretch;
            }

            html.urdu-mode .btn-register,
            html.urdu-mode .btn-login {
                direction: rtl;
                width: 100%;
                max-width: 100%;
            }

            html.urdu-mode .hero-note {
                direction: rtl;
                width: 100%;
                max-width: 100%;
                text-align: right;
            }

            html.urdu-mode .home-language-menu {
                right: auto;
                left: 0;
            }

        }

    </style>

</head>

<body>

    <nav class="navbar-main">

        <div class="navbar-inner">

            <a
                href="{{ route('home') }}"
                class="brand"
            >

                <img
                    src="{{ asset('images/logo1.jpg') }}"
                    alt="{{ t('GrowSmart') }}"
                >

                <span>
                    GrowSmart
                </span>

            </a>

            <div class="nav-right">

                <div class="home-language-switcher">

                    <button
                        type="button"
                        class="home-language-btn"
                        onclick="toggleHomeLanguageMenu()"
                    >

                        <i class="bi bi-translate"></i>

                        {{ t('Language') }}

                        <i class="bi bi-chevron-down"></i>

                    </button>

                    <div
                        class="home-language-menu"
                        id="homeLanguageMenu"
                    >

                        <a href="{{ route('language.change', 'en') }}">
                            {{ t('English') }}
                        </a>

                        <a href="{{ route('language.change', 'ur') }}">
                            {{ t('Urdu') }}
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </nav>

    <section class="hero">

        <div class="hero-container">

            <div class="hero-content fade-up">

                <div class="hero-badge">

                    <i class="bi bi-stars"></i>

                    {{ t('Welcome to GrowSmart') }}

                </div>

                <h1>

                    {{ t('Grow Smarter.') }}<br>

                    <span>
                        {{ t('Farm Better.') }}
                    </span>

                </h1>

                <p class="hero-description">

                    {{ t('GrowSmart is your intelligent agriculture platform designed to make farming knowledge simpler, smarter and more accessible. Create your account and discover a better way to manage your agricultural journey.') }}

                </p>

                <div class="hero-buttons">

                    @auth

                        <a
                            href="{{ route('home') }}"
                            class="btn-register"
                        >

                            {{ t('Go to My Dashboard') }}

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    @else

                        <a
                            href="{{ route('register') }}"
                            class="btn-register"
                        >

                            {{ t('Create Your Account') }}

                            <i class="bi bi-arrow-right"></i>

                        </a>

                        <a
                            href="{{ route('login') }}"
                            class="btn-login"
                        >

                            <i class="bi bi-box-arrow-in-right"></i>

                            {{ t('Login') }}

                        </a>

                    @endauth

                </div>

                <div class="hero-note">

                    <i class="bi bi-shield-check"></i>

                    {{ t('Join GrowSmart and start your smart agriculture journey.') }}

                </div>

            </div>

        </div>

    </section>

    <script>

        function toggleHomeLanguageMenu() {

            const menu = document.getElementById('homeLanguageMenu');

            if (menu) {
                menu.classList.toggle('show');
            }

        }

        document.addEventListener('click', function (event) {

            const switcher =
                document.querySelector('.home-language-switcher');

            const menu =
                document.getElementById('homeLanguageMenu');

            if (
                menu &&
                switcher &&
                !switcher.contains(event.target)
            ) {
                menu.classList.remove('show');
            }

        });

    </script>

</body>

</html>