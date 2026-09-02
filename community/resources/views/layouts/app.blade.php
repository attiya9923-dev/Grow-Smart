<!DOCTYPE html>
<html lang="{{ current_language() }}" dir="{{ is_urdu() ? 'rtl' : 'ltr' }}" class="{{ is_urdu() ? 'urdu-mode' : '' }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'GrowSmart | Smart Agriculture Platform')
    </title>

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
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: #f5f7f2;
            color: #263d32;
            font-family: Arial, Helvetica, sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        :root {
            --dark-green: #173b32;
            --green: #285c48;
            --light-green: #6f927f;
            --very-light-green: #e6efe9;
            --soft-green: #f0f5f1;
            --cream: #f5f7f2;
            --white: #ffffff;
            --text: #263d32;
            --gray: #718078;
            --border: #dce5df;
            --gold: #b08a4b;
            --card-shadow: 0 8px 25px rgba(23, 59, 50, 0.08);
            --hover-shadow: 0 14px 35px rgba(23, 59, 50, 0.14);
        }

        #sidebar {
            position: fixed;
            top: 0;
            left: -285px;
            width: 275px;
            height: 100vh;
            background: var(--dark-green);
            z-index: 3000;
            padding: 12px 12px;
            transition: left 0.3s ease;
            box-shadow: 8px 0 25px rgba(0, 0, 0, 0.18);
            overflow-y: auto;
            overflow-x: hidden;
        }

        #sidebar.show {
            left: 0;
        }

        #sidebar::-webkit-scrollbar {
            width: 5px;
        }

        #sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.18);
            border-radius: 10px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 6px 12px;
            color: white;
        }

        .sidebar-logo img {
            width: 42px;
            height: 42px;
            object-fit: cover;
            border-radius: 9px;
            border: 2px solid rgba(255,255,255,0.12);
            flex-shrink: 0;
        }

        .sidebar-logo-text {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.2;
        }

        .sidebar-logo small {
            display: block;
            margin-top: 2px;
            color: #a9beb4;
            font-size: 9px;
            letter-spacing: 0.5px;
        }

        .close-sidebar {
            margin-left: auto;
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            color: white;
            cursor: pointer;
            transition: 0.2s;
            flex-shrink: 0;
        }

        .close-sidebar:hover {
            background: rgba(255,255,255,0.18);
            transform: rotate(90deg);
        }

        #sidebar hr {
            border-color: rgba(255,255,255,0.10);
            margin: 8px 5px 10px;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #sidebar ul li {
            margin: 0;
            padding: 0;
        }

        #sidebar ul li a,
        .sidebar-dropdown-btn {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            min-height: 42px;
            padding: 9px 11px;
            margin: 2px 0;
            border-radius: 9px;
            color: #d1ddd7;
            font-size: 13px;
            transition: 0.2s;
            background: transparent;
            border: none;
            text-align: left;
            cursor: pointer;
        }

        #sidebar ul li a i,
        .sidebar-dropdown-btn > i:not(.profile-arrow) {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 17px;
        }

        #sidebar ul li a:hover,
        .sidebar-dropdown-btn:hover {
            background: rgba(255,255,255,0.08);
            color: white;
            transform: translateX(2px);
        }

        .desktop-crops-data {
            display: flex !important;
        }

        .mobile-crop-data {
            display: none;
        }

        @media (max-width: 768px) {
            .desktop-crops-data {
                display: none !important;
            }

            .mobile-crop-data {
                display: block;
            }
        }

        #sidebar ul li a.active {
            background: var(--very-light-green);
            color: var(--dark-green);
            font-weight: bold;
        }


        .sidebar-arrow {
            margin-left: auto;
            font-size: 12px !important;
            transition: transform 0.2s ease;
        }

        .crop-data-button.open .sidebar-arrow {
            transform: rotate(180deg);
        }

        .crop-menu {
            display: none;
            margin: 0 0 5px 33px;
            padding-left: 7px;
            border-left: 1px solid rgba(255,255,255,0.12);
        }

        .crop-menu.show {
            display: block;
        }

        .crop-menu a {
            min-height: 35px !important;
            padding: 7px 10px !important;
            font-size: 12px !important;
            margin: 1px 0 !important;
        }

        .separator {
            height: 1px;
            background: rgba(255,255,255,0.10);
            margin: 9px 5px !important;
            padding: 0 !important;
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            margin: 0 0 4px;
            background: rgba(255,255,255,0.06);
            border-radius: 10px;
        }

        .sidebar-profile img,
        .sidebar-profile-placeholder {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .sidebar-profile img {
            border: 2px solid rgba(255,255,255,0.18);
        }

        .sidebar-profile-placeholder {
            background: #e6efe9;
            color: #285c48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .sidebar-profile-name {
            color: white;
            font-size: 12px;
            font-weight: bold;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 155px;
        }

        .sidebar-profile-email {
            color: #a9beb4;
            font-size: 9px;
            margin-top: 2px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 155px;
        }

        .profile-button {
            justify-content: flex-start;
            position: relative;
        }

        .profile-button-photo,
        .profile-button-placeholder {
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .profile-button-photo {
            border: 2px solid rgba(255,255,255,0.25);
        }

        .profile-button-placeholder {
            background: #e6efe9;
            color: #285c48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .profile-arrow {
            margin-left: auto;
            font-size: 12px !important;
            width: auto !important;
            min-width: auto !important;
            transition: transform 0.25s ease;
        }

        .profile-button.open .profile-arrow {
            transform: rotate(180deg);
        }

        .profile-menu {
            display: none;
            position: fixed;
            width: 245px;
            padding: 6px;
            background: #1d463b;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 11px;
            box-shadow:
                0 12px 35px rgba(0,0,0,0.30),
                0 4px 12px rgba(0,0,0,0.15);
            z-index: 5000;
            animation: profileMenuUp 0.18s ease;
            max-height: calc(100vh - 20px);
            overflow-y: auto;
        }

        .profile-menu.show {
            display: block;
        }

        @keyframes profileMenuUp {
            from {
                opacity: 0;
                transform: translateY(7px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-menu::-webkit-scrollbar {
            width: 4px;
        }

        .profile-menu::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.18);
            border-radius: 10px;
        }

        .profile-menu a,
        .profile-menu button {
            display: flex !important;
            align-items: center;
            gap: 10px !important;
            width: 100%;
            padding: 9px 10px !important;
            min-height: 37px;
            margin: 1px 0;
            border-radius: 7px !important;
            color: #cbd8d2 !important;
            font-size: 12px !important;
            background: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            transform: none !important;
        }

        .profile-menu a:hover,
        .profile-menu button:hover {
            background: rgba(255,255,255,0.10) !important;
            color: white !important;
        }

        .profile-menu i {
            width: 19px !important;
            min-width: 19px !important;
            font-size: 14px !important;
            text-align: center;
        }

        .language-menu {
            display: none;
            padding: 2px 0 2px 19px;
            border-left: 1px solid rgba(255,255,255,0.12);
            margin: 2px 0 4px 8px;
        }

        .language-menu.show {
            display: block;
        }

        .language-menu a {
            font-size: 11px !important;
            padding: 7px 9px !important;
            min-height: 32px;
        }

        .nav-profile {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
            flex-shrink: 0;
        }

        .nav-profile img,
        .nav-profile-placeholder {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.25);
        }

        .nav-profile img {
            display: block;
        }

        .nav-profile-placeholder {
            background: #e6efe9;
            color: #285c48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        #sidebar-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10, 30, 25, 0.45);
            backdrop-filter: blur(3px);
            z-index: 2900;
        }

        #sidebar-backdrop.show {
            display: block;
        }

        .navbar-main {
            position: sticky;
            top: 0;
            z-index: 2000;
            background: var(--dark-green);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 4px 18px rgba(23,59,50,0.12);
            padding: 10px 25px;
        }

        .navbar-inner {
            max-width: 1450px;
            margin: auto;
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 46px;
        }

        .menu-button {
            width: 41px;
            height: 41px;
            flex-shrink: 0;
            border: 1px solid rgba(255,255,255,0.14);
            border-radius: 11px;
            background: rgba(255,255,255,0.07);
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .menu-button:hover {
            background: rgba(255,255,255,0.16);
            transform: translateY(-1px);
            border-color: rgba(255,255,255,0.25);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            color: white;
            font-size: 19px;
            font-weight: bold;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .brand:hover {
            color: white;
        }

        .brand img {
            width: 38px;
            height: 38px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid rgba(255,255,255,0.14);
        }

        .category-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            margin-left: auto;
            flex: 1;
            min-width: 0;
            overflow-x: auto;
            padding: 3px 2px;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
        }

        .category-nav::-webkit-scrollbar {
            display: none;
        }

        .category-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 35px;
            padding: 7px 16px;
            border-radius: 30px;
            color: #d6e2dc;
            border: 1px solid rgba(255,255,255,0.13);
            background: rgba(255,255,255,0.055);
            font-size: 12px;
            font-weight: 500;
            white-space: nowrap;
            flex-shrink: 0;
            transition: 0.25s;
        }

        .category-pill:hover {
            background: rgba(255,255,255,0.14);
            color: white;
            border-color: rgba(255,255,255,0.25);
            transform: translateY(-1px);
        }

        .category-pill.active {
            background: var(--very-light-green);
            border-color: var(--very-light-green);
            color: var(--dark-green);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0,0,0,0.10);
        }

        .nav-item-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 8px 4px;
            margin: 0 8px;
            color: #d6e2dc;
            background: transparent;
            border: none;
            border-radius: 0;
            font-size: 13px;
            font-weight: 500;
            white-space: nowrap;
            flex-shrink: 0;
            position: relative;
            transition: color 0.2s ease;
        }

        .nav-item-link::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: white;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.2s ease;
        }

        .nav-item-link:hover {
            color: white;
            background: transparent;
            border: none;
            transform: none;
        }

        .nav-item-link.active {
            color: white;
            background: transparent;
            border: none;
            box-shadow: none;
            font-weight: 700;
        }

        .nav-item-link.active::after {
            transform: scaleX(1);
        }


        html[dir="rtl"] .nav-item-link {
            margin-left: 8px;
            margin-right: 8px;
        }


        @media (min-width: 769px) {
            #sidebar > ul > li:nth-child(1) {
                display: none !important;
            }
        }

        @media (max-width: 1100px) {
            .nav-item-link {
                margin: 0 5px;
                padding-left: 3px;
                padding-right: 3px;
            }
        }

        .main-content {
            max-width: 1450px;
            margin: auto;
            padding: 22px 30px 0;
        }

        #logoutModal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0,0,0,0.55);
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        #logoutModal.show {
            display: flex;
        }

        .logout-box {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 18px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
            animation: logoutBoxAnimation 0.2s ease;
        }

        @keyframes logoutBoxAnimation {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logout-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #e8f5e9;
            color: #285c48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
        }

        .logout-box h3 {
            color: #173b32;
            margin-bottom: 8px;
            font-size: 22px;
        }

        .logout-box p {
            color: #718078;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .logout-actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .logout-cancel,
        .logout-confirm {
            border: none;
            padding: 11px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            min-width: 100px;
        }

        .logout-cancel {
            background: #e9ecef;
            color: #333;
        }

        .logout-cancel:hover {
            background: #dfe3e6;
        }

        .logout-confirm {
            background: #c62828;
            color: white;
        }

        .logout-confirm:hover {
            background: #b71c1c;
        }

        .footer {
            position: relative;
            background: var(--dark-green);
            color: white;
            margin-top: 45px;
            padding: 50px 30px 16px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(
                90deg,
                #285c48,
                #b08a4b,
                #285c48
            );
        }

        .footer h5 {
            color: #e0ebe5;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 17px;
        }

        .footer p {
            color: #afc1b8;
            font-size: 13px;
            line-height: 1.75;
        }

        .footer a {
            color: #afc1b8;
            font-size: 13px;
            transition: 0.2s;
        }

        .footer a:hover {
            color: white;
            padding-left: 3px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 9px;
        }

        .footer-social a {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            margin-right: 6px;
            font-size: 15px;
            padding-left: 0 !important;
            transition: 0.2s;
        }

        .footer-social a:hover {
            background: var(--very-light-green);
            color: var(--dark-green);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.09);
            margin-top: 28px;
            padding-top: 18px;
            text-align: center;
            color: #718a80;
            font-size: 11px;
        }

        @media (max-width: 1100px) {

            .category-nav {
                gap: 6px;
            }

            .category-pill {
                padding: 7px 12px;
                font-size: 11px;
            }

        }

        @media (max-width: 992px) {

            .navbar-main {
                padding: 9px 15px;
            }

            .navbar-inner {
                gap: 9px;
            }

            .category-nav {
                margin-left: 4px;
                justify-content: flex-start;
            }

            .main-content {
                padding: 18px 15px 0;
            }

        }


        @media (max-width: 768px) {
            #sidebar > ul > li:nth-child(1),
            #sidebar > ul > li:nth-child(2) {
                display: block !important;
            }
        }

        @media (max-width: 768px) {

            #sidebar > ul > li:nth-child(1),
            #sidebar > ul > li:nth-child(2) {
                display: block !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            #sidebar {
                width: 270px;
            }

            .navbar-main {
                padding: 8px 12px 7px;
            }

            .navbar-inner {
                display: flex;
                align-items: center;
                gap: 10px;
                min-height: 42px;
            }

            .menu-button {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                font-size: 19px;

            }

            .brand {

                font-size: 17px;
            }

            .brand img {
                width: 38px;
                height: 38px;
            }

            .nav-profile {

                margin-left: 0;
            }

            .category-nav {
                display: none;
            }

            .category-pill {
                flex: 0 0 auto;
                min-height: 34px;
                padding: 7px 14px;
                font-size: 11px;
            }

        }

        @media (max-width: 576px) {

            .footer {
                margin-top: 25px !important;
                padding: 28px 15px 10px !important;
            }

            .footer .col-md-6:nth-child(2),
            .footer .col-md-6:nth-child(3) {
                width: 50% !important;
                flex: 0 0 50% !important;
                max-width: 50% !important;
                padding-left: 6px;
                padding-right: 6px;
            }

            .footer .col-md-6 {
                margin-bottom: 14px !important;
            }

            .footer h5 {
                font-size: 13px !important;
                margin-bottom: 10px !important;
            }

            .footer p,
            .footer a {
                font-size: 11px !important;
            }

            .footer p {
                line-height: 1.5 !important;
                margin-bottom: 8px !important;
            }

            .footer-links li {
                margin-bottom: 5px !important;
            }

            .footer .footer-bottom {
                margin-top: 10px !important;
                padding-top: 10px !important;
                font-size: 10px !important;
                line-height: 1.5 !important;
            }

            .footer .footer-social a {
                width: 32px !important;
                height: 32px !important;
            }

            .footer .col-md-6:nth-child(2) h5,
            .footer .col-md-6:nth-child(3) h5 {
                white-space: nowrap;
            }
        }

        @media (max-width: 400px) {

            #sidebar {
                width: 260px;
            }

            .main-content {
                padding-left: 8px;
                padding-right: 8px;
            }

            .navbar-main {
                padding: 7px 8px 5px;
            }

            .brand {
                font-size: 15px;
            }

            .brand img {
                width: 35px;
                height: 35px;
            }

            .nav-profile img,
            .nav-profile-placeholder {
                width: 34px;
                height: 34px;
            }

            .category-pill {
                padding: 7px 12px;
                min-height: 31px;
                font-size: 10px;
            }

            .profile-menu {
                width: 235px;
            }

        }


        @media (min-width: 769px) {
            html.urdu-mode .navbar-main {
                padding: 10px 28px;
            }

            html.urdu-mode .navbar-inner {
                display: flex;
                flex-direction: row !important;
                direction: rtl !important;
                align-items: center;
                gap: 14px;
                min-height: 68px;
            }

            html.urdu-mode .menu-button {
                order: 1;
                width: 52px;
                height: 52px;
                flex: 0 0 52px;
                margin: 0;
            }

            html.urdu-mode .brand {
                order: 2;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                gap: 10px;
                margin: 0;
                font-size: 20px;
                flex: 0 0 auto;
            }

            html.urdu-mode .brand img {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                object-fit: cover;
            }

            html.urdu-mode .category-nav {
                order: 3;
                display: flex;
                align-items: center;
                justify-content: space-around;
                gap: 8px;
                margin-left: 0 !important;
                margin-right: 10px !important;
                padding: 3px 8px;
                flex: 1 1 auto;
                min-width: 0;
                direction: rtl !important;
            }

            html.urdu-mode .nav-item-link {
                min-height: 52px;
                padding: 8px 10px;
                margin: 0 5px;
                font-size: 14px;
                flex: 0 0 auto;
            }

            html.urdu-mode .nav-profile {
                order: 4;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: 0 !important;
                margin-right: 0 !important;
                flex: 0 0 52px;
            }

            html.urdu-mode .nav-profile img,
            html.urdu-mode .nav-profile-placeholder {
                width: 52px;
                height: 52px;
            }
        }

        @media (max-width: 768px) {
            html.urdu-mode .navbar-inner {
                flex-direction: row !important;
                direction: rtl !important;
            }

            html.urdu-mode .menu-button {
                order: 1;
            }

            html.urdu-mode .brand {
                order: 2;
            }

            html.urdu-mode .category-nav {
                order: 3;
            }

            html.urdu-mode .nav-profile {
                order: 4;
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }

    </style>

    @stack('styles')


    <style id="growsmart-bilingual-style">
        html.urdu-mode,
        html.urdu-mode body {
            direction: rtl;
        }

        html.urdu-mode body {
            text-align: right;
        }

        html.urdu-mode .navbar-inner,
        html.urdu-mode .category-nav,
        html.urdu-mode .main-content,
        html.urdu-mode .main-content .row,
        html.urdu-mode .main-content .d-flex,
        html.urdu-mode .footer,
        html.urdu-mode .footer .container-fluid,
        html.urdu-mode .footer .row {
            direction: rtl;
        }

        html.urdu-mode #sidebar {
            left: auto;
            right: -285px;
            transition: right 0.3s ease;
            direction: rtl;
        }

        html.urdu-mode #sidebar.show {
            left: auto;
            right: 0;
        }

        html.urdu-mode #sidebar ul li a,
        html.urdu-mode #sidebar .sidebar-dropdown-btn,
        html.urdu-mode #sidebar .profile-button,
        html.urdu-mode #sidebar .language-menu,
        html.urdu-mode #sidebar .sidebar-profile,
        html.urdu-mode #sidebar .sidebar-logo {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode #sidebar ul li a,
        html.urdu-mode #sidebar .sidebar-dropdown-btn {
            justify-content: flex-start;
        }

        html.urdu-mode #sidebar ul li a:hover,
        html.urdu-mode #sidebar .sidebar-dropdown-btn:hover {
            transform: translateX(-2px);
        }

        html.urdu-mode #sidebar .close-sidebar {
            margin-left: 0;
            margin-right: auto;
        }

        html.urdu-mode .sidebar-profile-name,
        html.urdu-mode .sidebar-profile-email {
            text-align: right;
        }

        html.urdu-mode .profile-arrow {
            margin-left: 0;
            margin-right: auto;
        }

        html.urdu-mode .navbar-main,
        html.urdu-mode .navbar-inner {
            direction: rtl;
        }

        html.urdu-mode .category-nav {
            direction: rtl;
            justify-content: flex-start;
        }

        html.urdu-mode .brand,
        html.urdu-mode .nav-item-link,
        html.urdu-mode .category-pill,
        html.urdu-mode .nav-profile,
        html.urdu-mode .menu-button {
            direction: rtl;
        }

        html.urdu-mode .nav-profile {
            margin-left: 0;
            margin-right: 10px;
        }


        html.urdu-mode .crop-slider {
            direction: ltr;
        }

        html.urdu-mode .crop-slide,
        html.urdu-mode .crop-slide-info {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .main-content > *,
        html.urdu-mode .main-content .row > *,
        html.urdu-mode .main-content .d-flex > *,
        html.urdu-mode .main-content .card,
        html.urdu-mode .main-content .modal-content,
        html.urdu-mode .main-content form,
        html.urdu-mode .main-content section,
        html.urdu-mode .main-content article,
        html.urdu-mode .main-content p,
        html.urdu-mode .main-content h1,
        html.urdu-mode .main-content h2,
        html.urdu-mode .main-content h3,
        html.urdu-mode .main-content h4,
        html.urdu-mode .main-content h5,
        html.urdu-mode .main-content h6,
        html.urdu-mode .main-content label,
        html.urdu-mode .main-content .form-control,
        html.urdu-mode .main-content .form-select,
        html.urdu-mode .main-content textarea,
        html.urdu-mode .main-content td,
        html.urdu-mode .main-content th,
        html.urdu-mode .main-content table {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .main-content .row,
        html.urdu-mode .main-content .d-flex {
            text-align: initial;
        }

        html.urdu-mode input,
        html.urdu-mode textarea,
        html.urdu-mode select,
        html.urdu-mode .form-control,
        html.urdu-mode .form-select {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .text-start {
            text-align: right !important;
        }

        html.urdu-mode .text-end {
            text-align: left !important;
        }

        html.urdu-mode .form-check {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .form-check .form-check-input {
            float: right;
            margin-left: .5em;
            margin-right: -1.5em;
        }

        html.urdu-mode .footer {
            direction: rtl;
        }

        html.urdu-mode .footer .row {
            direction: rtl;
        }

        html.urdu-mode .footer .col-lg-4,
        html.urdu-mode .footer .col-lg-2,
        html.urdu-mode .footer .col-lg-3 {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .footer h5,
        html.urdu-mode .footer p,
        html.urdu-mode .footer-links,
        html.urdu-mode .footer-links li,
        html.urdu-mode .footer a {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .footer-social {
            direction: rtl;
        }

        .brand-name-protected,
        .contact-value-protected {
            direction: ltr;
            unicode-bidi: isolate;
            display: inline-block;
        }

        html.urdu-mode .footer-bottom {
            direction: rtl;
            text-align: center;
        }

        html.urdu-mode,
        html.urdu-mode body {
            direction: rtl !important;
        }

        html.urdu-mode body,
        html.urdu-mode .main-content,
        html.urdu-mode .main-content * ,
        html.urdu-mode .footer,
        html.urdu-mode .footer * {
            text-align: right;
        }

        html.urdu-mode .navbar-main,
        html.urdu-mode .navbar-inner,
        html.urdu-mode .category-nav,
        html.urdu-mode .main-content,
        html.urdu-mode .main-content .row,
        html.urdu-mode .main-content .d-flex,
        html.urdu-mode .footer,
        html.urdu-mode .footer .container-fluid,
        html.urdu-mode .footer .row {
            direction: rtl !important;
        }

        html.urdu-mode #sidebar {
            left: auto !important;
            right: -285px !important;
            direction: rtl !important;
        }

        html.urdu-mode #sidebar.show {
            left: auto !important;
            right: 0 !important;
        }

        html.urdu-mode #sidebar ul li a,
        html.urdu-mode #sidebar .sidebar-dropdown-btn,
        html.urdu-mode #sidebar .sidebar-profile,
        html.urdu-mode #sidebar .sidebar-logo,
        html.urdu-mode #sidebar .language-menu {
            direction: rtl !important;
            text-align: right !important;
        }

        html.urdu-mode #sidebar .close-sidebar {
            margin-left: 0;
            margin-right: auto;
        }

        html.urdu-mode #sidebar .sidebar-arrow,
        html.urdu-mode #sidebar .profile-arrow {
            margin-left: 0;
            margin-right: auto;
        }

        html.urdu-mode input,
        html.urdu-mode textarea,
        html.urdu-mode select,
        html.urdu-mode .form-control,
        html.urdu-mode .form-select {
            direction: rtl !important;
            text-align: right !important;
        }

        html.urdu-mode .text-start { text-align: right !important; }
        html.urdu-mode .text-end { text-align: left !important; }

        html.urdu-mode .menu-button {
            direction: rtl;
        }

        html.urdu-mode .nav-profile {
            margin-left: 0;
            margin-right: 10px;
        }


        @media (min-width: 769px) {
            html.urdu-mode .navbar-main {
                width: 100% !important;
                height: 86px !important;
                padding: 0 28px !important;
                box-sizing: border-box !important;
            }

            html.urdu-mode .navbar-inner {
                width: 100% !important;
                max-width: none !important;
                height: 86px !important;
                min-height: 86px !important;
                margin: 0 !important;
                padding: 0 !important;
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                gap: 0 !important;
                direction: rtl !important;
            }

            html.urdu-mode .menu-button {
                order: 1 !important;
                width: 53px !important;
                height: 53px !important;
                min-width: 53px !important;
                flex: 0 0 53px !important;
                margin: 0 0 0 0 !important;
                border-radius: 11px !important;
                font-size: 22px !important;
            }

            html.urdu-mode .brand {
                order: 2 !important;
                height: 86px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: flex-start !important;
                gap: 10px !important;
                margin: 0 18px 0 0 !important;
                padding: 0 !important;
                font-size: 20px !important;
                flex: 0 0 auto !important;
                direction: rtl !important;
            }

            html.urdu-mode .brand img {
                width: 48px !important;
                height: 48px !important;
                min-width: 48px !important;
                min-height: 48px !important;
                object-fit: cover !important;
                border-radius: 50% !important;
                border: 2px solid rgba(255,255,255,0.14) !important;
            }

            html.urdu-mode .category-nav {
                order: 3 !important;
                height: 86px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: stretch !important;
                gap: 0 !important;
                margin: 0 !important;
                padding: 0 8px !important;
                flex: 1 1 auto !important;
                min-width: 0 !important;
                overflow: visible !important;
                direction: rtl !important;
            }

            html.urdu-mode .category-nav .nav-item-link {
                height: 86px !important;
                min-height: 86px !important;
                flex: 1 1 0 !important;
                width: auto !important;
                min-width: 0 !important;
                margin: 0 !important;
                padding: 0 8px !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                color: #d6e2dc !important;
                background: transparent !important;
                border: none !important;
                border-radius: 0 !important;
                font-size: 14px !important;
                font-weight: 500 !important;
                white-space: nowrap !important;
                position: relative !important;
            }

            html.urdu-mode .category-nav .nav-item-link::after {
                left: 12% !important;
                right: 12% !important;
                bottom: 17px !important;
                height: 3px !important;
                background: white !important;
                transform: scaleX(0) !important;
            }

            html.urdu-mode .category-nav .nav-item-link.active {
                color: white !important;
                font-weight: 700 !important;
            }

            html.urdu-mode .category-nav .nav-item-link.active::after {
                transform: scaleX(1) !important;
            }

            html.urdu-mode .nav-profile {
                order: 4 !important;
                width: 53px !important;
                height: 86px !important;
                min-width: 53px !important;
                flex: 0 0 53px !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                margin: 0 0 0 20px !important;
                padding: 0 !important;
                direction: rtl !important;
            }

            html.urdu-mode .nav-profile img,
            html.urdu-mode .nav-profile-placeholder {
                width: 53px !important;
                height: 53px !important;
                min-width: 53px !important;
                min-height: 53px !important;
                border-radius: 50% !important;
            }
        }


        @media (min-width: 769px) {
            html.urdu-mode .category-nav .nav-home {
                order: 1 !important;
            }

            html.urdu-mode .category-nav .nav-summer {
                order: 2 !important;
            }

            html.urdu-mode .category-nav .nav-winter {
                order: 3 !important;
            }

            html.urdu-mode .category-nav .nav-grains {
                order: 4 !important;
            }

            html.urdu-mode .category-nav .nav-vegetable {
                order: 5 !important;
            }

            html.urdu-mode .category-nav .nav-fruit {
                order: 6 !important;
            }

            html.urdu-mode .navbar-main {
                height: 70px !important;
                padding: 0 22px !important;
            }

            html.urdu-mode .navbar-inner {
                height: 70px !important;
                min-height: 70px !important;
            }

            html.urdu-mode .menu-button {
                width: 45px !important;
                height: 45px !important;
                min-width: 45px !important;
                flex-basis: 45px !important;
                font-size: 19px !important;
            }

            html.urdu-mode .brand {
                height: 70px !important;
                margin-right: 12px !important;
                font-size: 18px !important;
                gap: 8px !important;
            }

            html.urdu-mode .brand img {
                width: 42px !important;
                height: 42px !important;
                min-width: 42px !important;
                min-height: 42px !important;
            }

            html.urdu-mode .category-nav {
                height: 70px !important;
                padding: 0 5px !important;
            }

            html.urdu-mode .category-nav .nav-item-link {
                height: 70px !important;
                min-height: 70px !important;
                font-size: 13px !important;
                padding: 0 6px !important;
            }

            html.urdu-mode .category-nav .nav-item-link::after {
                bottom: 10px !important;
                height: 2px !important;
                left: 14% !important;
                right: 14% !important;
            }

            html.urdu-mode .nav-profile {
                width: 45px !important;
                height: 70px !important;
                min-width: 45px !important;
                flex-basis: 45px !important;
                margin-left: 12px !important;
            }

            html.urdu-mode .nav-profile img,
            html.urdu-mode .nav-profile-placeholder {
                width: 45px !important;
                height: 45px !important;
                min-width: 45px !important;
                min-height: 45px !important;
            }
        }

        @media (max-width: 768px) {
            html.urdu-mode .navbar-main,
            html.urdu-mode .navbar-inner {
                height: auto !important;
                min-height: 0 !important;
            }

            html.urdu-mode .navbar-inner {
                width: auto !important;
                max-width: 1450px !important;
                margin: auto !important;
                padding: 0 !important;
                display: flex !important;
                flex-direction: row !important;
                gap: 10px !important;
            }

            html.urdu-mode .category-nav {
                display: none !important;
            }

            html.urdu-mode .menu-button {
                width: 40px !important;
                height: 40px !important;
                min-width: 40px !important;
                flex: 0 0 40px !important;
            }

            html.urdu-mode .brand {
                height: auto !important;
                margin: 0 !important;
                font-size: 17px !important;
            }

            html.urdu-mode .brand img {
                width: 38px !important;
                height: 38px !important;
                min-width: 38px !important;
                min-height: 38px !important;
            }

            html.urdu-mode .nav-profile {
                width: auto !important;
                height: auto !important;
                min-width: 0 !important;
                flex: 0 0 auto !important;
                margin: 0 !important;
            }
        }


        @media (max-width: 768px) {
            html.urdu-mode .navbar-inner {
                display: flex !important;
                flex-direction: row !important;
                direction: rtl !important;
                align-items: center !important;
                justify-content: space-between !important;
                gap: 10px !important;
            }

            html.urdu-mode .nav-profile {
                order: 3 !important;
                margin: 0 !important;
                margin-right: 0 !important;
                margin-left: 0 !important;
                flex: 0 0 auto !important;
            }

            html.urdu-mode .brand {
                order: 2 !important;
                margin: 0 auto !important;
                flex: 0 1 auto !important;
            }

            html.urdu-mode .menu-button {
                order: 1 !important;
                margin: 0 !important;
                flex: 0 0 40px !important;
            }

            html:not(.urdu-mode) .navbar-inner {
                display: flex !important;
                flex-direction: row !important;
                direction: ltr !important;
                align-items: center !important;
                gap: 10px !important;
            }

            html:not(.urdu-mode) .menu-button {
                order: 1 !important;
                margin: 0 !important;
                flex: 0 0 40px !important;
            }

            html:not(.urdu-mode) .brand {
                order: 2 !important;
                margin: 0 !important;
                flex: 0 1 auto !important;
            }

            html:not(.urdu-mode) .nav-profile {
                order: 3 !important;
                margin-left: auto !important;
                margin-right: 0 !important;
                flex: 0 0 auto !important;
            }
        }


        @media (max-width: 768px) {
            .navbar-main {
                width: 100% !important;
                box-sizing: border-box !important;
                padding: 7px 8px !important;
            }

            .navbar-inner,
            html.urdu-mode .navbar-inner,
            html:not(.urdu-mode) .navbar-inner {
                position: relative !important;
                width: 100% !important;
                height: 42px !important;
                min-height: 42px !important;
                margin: 0 !important;
                padding: 0 !important;
                display: block !important;
                direction: ltr !important;
            }

            .category-nav,
            html.urdu-mode .category-nav {
                display: none !important;
            }

            .nav-profile,
            html.urdu-mode .nav-profile,
            html:not(.urdu-mode) .nav-profile {
                position: absolute !important;
                left: 0 !important;
                right: auto !important;
                top: 50% !important;
                bottom: auto !important;
                width: 40px !important;
                height: 40px !important;
                min-width: 40px !important;
                margin: 0 !important;
                padding: 0 !important;
                transform: translateY(-50%) !important;
                display: flex !important;
                align-items: center !important;
                justify-content: flex-start !important;
                flex: none !important;
                z-index: 5 !important;
            }

            .nav-profile img,
            .nav-profile-placeholder,
            html.urdu-mode .nav-profile img,
            html.urdu-mode .nav-profile-placeholder {
                width: 36px !important;
                height: 36px !important;
                min-width: 36px !important;
                min-height: 36px !important;
                margin: 0 !important;
            }

            .menu-button,
            html.urdu-mode .menu-button,
            html:not(.urdu-mode) .menu-button {
                position: absolute !important;
                right: 0 !important;
                left: auto !important;
                top: 50% !important;
                width: 40px !important;
                height: 40px !important;
                min-width: 40px !important;
                margin: 0 !important;
                padding: 0 !important;
                transform: translateY(-50%) !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                flex: none !important;
                z-index: 6 !important;
            }

            .brand,
            html.urdu-mode .brand,
            html:not(.urdu-mode) .brand {
                position: absolute !important;
                right: 48px !important;
                left: auto !important;
                top: 50% !important;
                width: auto !important;
                height: 40px !important;
                min-width: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                transform: translateY(-50%) !important;
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                justify-content: flex-end !important;
                gap: 6px !important;
                font-size: 15px !important;
                white-space: nowrap !important;
                flex: none !important;
                z-index: 5 !important;
                direction: ltr !important;
            }

            .brand img,
            html.urdu-mode .brand img {
                width: 35px !important;
                height: 35px !important;
                min-width: 35px !important;
                min-height: 35px !important;
                object-fit: cover !important;
                margin: 0 !important;
            }

            .brand span {
                display: inline-block !important;
                white-space: nowrap !important;
            }

            .main-content {
                width: 100% !important;
                max-width: 100% !important;
                box-sizing: border-box !important;
                overflow-x: hidden !important;
            }

            .main-content img,
            .main-content video,
            .main-content iframe,
            .main-content canvas,
            .main-content table {
                max-width: 100% !important;
            }
        }

    </style>


<style id="mobile-navbar-final-fix">
@media screen and (max-width: 768px) {
    html body .navbar-main {
        position: sticky !important;
        top: 0 !important;
        width: 100% !important;
        height: 56px !important;
        min-height: 56px !important;
        padding: 7px 8px !important;
        box-sizing: border-box !important;
        overflow: visible !important;
    }

    html body .navbar-inner {
        position: relative !important;
        display: block !important;
        width: 100% !important;
        max-width: none !important;
        height: 42px !important;
        min-height: 42px !important;
        margin: 0 !important;
        padding: 0 !important;
        gap: 0 !important;
        direction: ltr !important;
    }

    html body .navbar-inner .category-nav {
        display: none !important;
    }

    html body .navbar-inner .nav-profile {
        position: absolute !important;
        left: 0 !important;
        right: auto !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-start !important;
        z-index: 10 !important;
    }

    html body .navbar-inner .nav-profile img,
    html body .navbar-inner .nav-profile .nav-profile-placeholder {
        width: 36px !important;
        height: 36px !important;
        min-width: 36px !important;
        min-height: 36px !important;
        margin: 0 !important;
    }

    html body .navbar-inner .menu-button {
        position: absolute !important;
        right: 0 !important;
        left: auto !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        z-index: 12 !important;
    }

    html body .navbar-inner .brand {
        position: absolute !important;
        right: 47px !important;
        left: auto !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: auto !important;
        max-width: calc(100% - 95px) !important;
        height: 40px !important;
        min-width: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        flex: none !important;
        align-items: center !important;
        justify-content: flex-end !important;
        gap: 6px !important;
        font-size: 15px !important;
        line-height: 1 !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        z-index: 11 !important;
        direction: rtl !important;
    }

    html body .navbar-inner .brand img {
        width: 35px !important;
        height: 35px !important;
        min-width: 35px !important;
        min-height: 35px !important;
        margin: 0 !important;
        flex: 0 0 35px !important;
        object-fit: cover !important;
    }

    html body .navbar-inner .brand span {
        display: inline-block !important;
        margin: 0 !important;
        padding: 0 !important;
        white-space: nowrap !important;
    }
}
</style>
<style id="mobile-english-direction-fix">
@media screen and (max-width: 768px) {
    html:not(.urdu-mode) body .navbar-main {
        width: 100% !important;
        padding: 7px 8px !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) body .navbar-inner {
        position: relative !important;
        width: 100% !important;
        height: 42px !important;
        min-height: 42px !important;
        display: block !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) body .navbar-inner .menu-button {
        position: absolute !important;
        left: 0 !important;
        right: auto !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        z-index: 12 !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) body .navbar-inner .brand {
        position: absolute !important;
        left: 47px !important;
        right: auto !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: auto !important;
        max-width: calc(100% - 95px) !important;
        height: 40px !important;
        min-width: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        justify-content: flex-start !important;
        gap: 6px !important;
        font-size: 15px !important;
        line-height: 1 !important;
        white-space: nowrap !important;
        overflow: hidden !important;
        z-index: 11 !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) body .navbar-inner .brand img {
        width: 35px !important;
        height: 35px !important;
        min-width: 35px !important;
        min-height: 35px !important;
        margin: 0 !important;
        flex: 0 0 35px !important;
        object-fit: cover !important;
    }

    html:not(.urdu-mode) body .navbar-inner .brand span {
        display: inline-block !important;
        margin: 0 !important;
        padding: 0 !important;
        white-space: nowrap !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) body .navbar-inner .nav-profile {
        position: absolute !important;
        right: 0 !important;
        left: auto !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 40px !important;
        height: 40px !important;
        min-width: 40px !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
        z-index: 10 !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) body .navbar-inner .nav-profile img,
    html:not(.urdu-mode) body .navbar-inner .nav-profile .nav-profile-placeholder {
        width: 36px !important;
        height: 36px !important;
        min-width: 36px !important;
        min-height: 36px !important;
        margin: 0 !important;
    }

    html.urdu-mode body .navbar-inner .menu-button {
        right: 0 !important;
        left: auto !important;
    }

    html.urdu-mode body .navbar-inner .brand {
        right: 47px !important;
        left: auto !important;
        justify-content: flex-end !important;
        direction: rtl !important;
    }

    html.urdu-mode body .navbar-inner .nav-profile {
        left: 0 !important;
        right: auto !important;
        justify-content: flex-start !important;
        direction: rtl !important;
    }
}
</style>

<style id="navbar-consistent-final">
@media (min-width: 769px) {
    .navbar-main {
        width: 100% !important;
        padding: 0 22px !important;
        height: 70px !important;
    }

    .navbar-inner {
        width: 100% !important;
        max-width: 1450px !important;
        height: 70px !important;
        min-height: 70px !important;
        margin: 0 auto !important;
        display: flex !important;
        align-items: center !important;
        gap: 0 !important;
    }

    .menu-button {
        width: 45px !important;
        height: 45px !important;
        min-width: 45px !important;
        flex: 0 0 45px !important;
        font-size: 19px !important;
    }

    .brand {
        height: 70px !important;
        margin: 0 16px !important;
        gap: 8px !important;
        font-size: 18px !important;
        flex: 0 0 auto !important;
    }

    .brand img {
        width: 42px !important;
        height: 42px !important;
        min-width: 42px !important;
        min-height: 42px !important;
        border-radius: 50% !important;
    }

    .category-nav {
        height: 70px !important;
        display: flex !important;
        align-items: stretch !important;
        justify-content: stretch !important;
        gap: 0 !important;
        margin: 0 !important;
        padding: 0 5px !important;
        flex: 1 1 auto !important;
        min-width: 0 !important;
        overflow: visible !important;
    }

    .category-nav .nav-item-link {
        height: 70px !important;
        min-height: 70px !important;
        flex: 1 1 0 !important;
        width: auto !important;
        min-width: 0 !important;
        margin: 0 !important;
        padding: 0 8px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: #d6e2dc !important;
        background: transparent !important;
        border: none !important;
        border-radius: 0 !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        white-space: nowrap !important;
        position: relative !important;
    }

    .category-nav .nav-item-link::after {
        left: 14% !important;
        right: 14% !important;
        bottom: 10px !important;
        height: 2px !important;
        background: white !important;
        transform: scaleX(0) !important;
    }

    .category-nav .nav-item-link.active {
        color: white !important;
        font-weight: 700 !important;
    }

    .category-nav .nav-item-link.active::after {
        transform: scaleX(1) !important;
    }

    .nav-profile {
        width: 45px !important;
        height: 70px !important;
        min-width: 45px !important;
        flex: 0 0 45px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 0 0 12px !important;
        padding: 0 !important;
    }

    .nav-profile img,
    .nav-profile-placeholder {
        width: 45px !important;
        height: 45px !important;
        min-width: 45px !important;
        min-height: 45px !important;
    }

    html.urdu-mode .navbar-inner {
        direction: rtl !important;
    }

    html.urdu-mode .menu-button {
        order: 1 !important;
    }

    html.urdu-mode .brand {
        order: 2 !important;
        margin-right: 12px !important;
        margin-left: 16px !important;
    }

    html.urdu-mode .category-nav {
        order: 3 !important;
        direction: rtl !important;
    }

    html.urdu-mode .nav-profile {
        order: 4 !important;
        margin-left: 12px !important;
        margin-right: 0 !important;
    }

    html:not(.urdu-mode) .navbar-inner {
        direction: ltr !important;
    }

    html:not(.urdu-mode) .menu-button {
        order: 1 !important;
    }

    html:not(.urdu-mode) .brand {
        order: 2 !important;
        margin-left: 12px !important;
        margin-right: 16px !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) .category-nav {
        order: 3 !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) .nav-profile {
        order: 4 !important;
        margin-left: 12px !important;
        margin-right: 0 !important;
        direction: ltr !important;
    }
}

@media (max-width: 768px) {
    html.urdu-mode .navbar-inner {
        direction: rtl !important;
    }

    html.urdu-mode .menu-button {
        right: 0 !important;
        left: auto !important;
    }

    html.urdu-mode .brand {
        right: 47px !important;
        left: auto !important;
        justify-content: flex-end !important;
        direction: rtl !important;
    }

    html.urdu-mode .nav-profile {
        left: 0 !important;
        right: auto !important;
        justify-content: flex-start !important;
        direction: rtl !important;
    }

    html:not(.urdu-mode) .navbar-inner {
        direction: ltr !important;
    }

    html:not(.urdu-mode) .menu-button {
        left: 0 !important;
        right: auto !important;
    }

    html:not(.urdu-mode) .brand {
        left: 47px !important;
        right: auto !important;
        justify-content: flex-start !important;
        direction: ltr !important;
    }

    html:not(.urdu-mode) .nav-profile {
        right: 0 !important;
        left: auto !important;
        justify-content: flex-end !important;
        direction: ltr !important;
    }
}
</style>
</head>

<body>

<div id="sidebar">

    <div class="sidebar-logo">

        <img
            src="{{ asset('images/logo1.jpg') }}"
            alt="{{ t('GrowSmart') }}"
        >

        <div>

            <div class="sidebar-logo-text">
                {{ t('GrowSmart') }}
            </div>

            <small>
                {{ t('SMART AGRICULTURE') }}
            </small>

        </div>

        <button
            class="close-sidebar"
            onclick="toggleSidebar()"
            type="button"
            aria-label="Close menu"
        >

            <i class="bi bi-x-lg"></i>

        </button>

    </div>

    <hr>

    @auth

    <div class="sidebar-profile">

        @if(Auth::user()->profile_photo)

            <img
                src="{{ asset(Auth::user()->profile_photo) }}"
                alt="Profile"
            >

        @else

            <div class="sidebar-profile-placeholder">
                <i class="bi bi-person"></i>
            </div>

        @endif

        <div>

            <div class="sidebar-profile-name">
                {{ Auth::user()->name }}
            </div>

            <div class="sidebar-profile-email">
                {{ Auth::user()->email }}
            </div>

        </div>

    </div>

    @endauth

    <hr>

    <ul>

        <li>

            <a
                href="/dashboard"
                class="{{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}"
            >

                <i class="bi bi-house"></i>

                <span>
                    {{ t('Home') }}
                </span>

            </a>

        </li>

        <li>

            <a
                href="/grid"
                class="desktop-crops-data {{ request()->is('grid') ? 'active' : '' }}"
            >
                <i class="bi bi-bar-chart"></i>
                <span>
                    {{ t('Crops Data') }}
                </span>
            </a>

            <div class="mobile-crop-data">
                <button
                    type="button"
                    class="sidebar-dropdown-btn crop-data-button {{ request()->is('grid') || request()->is('summer') || request()->is('winter') || request()->is('grains') || request()->is('vegetable') || request()->is('fruit') ? 'open' : '' }}"
                    onclick="toggleCropMenu()"
                >
                    <i class="bi bi-bar-chart"></i>
                    <span>
                        {{ t('Crop Data') }}
                    </span>
                    <i class="bi bi-chevron-down sidebar-arrow"></i>
                </button>

                <div
                    class="crop-menu {{ request()->is('grid') || request()->is('summer') || request()->is('winter') || request()->is('grains') || request()->is('vegetable') || request()->is('fruit') ? 'show' : '' }}"
                    id="cropMenu"
                >
                    <a href="/grid" class="{{ request()->is('grid') ? 'active' : '' }}">{{ t('All Crops') }}</a>
                    <a href="/summer" class="{{ request()->is('summer') ? 'active' : '' }}">{{ t('Summer') }}</a>
                    <a href="/winter" class="{{ request()->is('winter') ? 'active' : '' }}">{{ t('Winter') }}</a>
                    <a href="/fruit" class="{{ request()->is('fruit') ? 'active' : '' }}">{{ t('Fruits') }}</a>
                    <a href="/vegetable" class="{{ request()->is('vegetable') ? 'active' : '' }}">{{ t('Vegetables') }}</a>
                    <a href="/grains" class="{{ request()->is('grains') ? 'active' : '' }}">{{ t('Grains') }}</a>
                </div>
            </div>

        </li>

        <li>

            <a
                href="/garden"
                class="{{ request()->is('garden') ? 'active' : '' }}"
            >

                <i class="bi bi-bug"></i>

                <span>
                    {{ t('Pest Management') }}
                </span>

            </a>

        </li>

        <li>

            <a
                href="/community"
                class="{{ request()->is('community') ? 'active' : '' }}"
            >

                <i class="bi bi-people"></i>

                <span>
                    {{ t('Community') }}
                </span>

            </a>

        </li>

        <li class="separator"></li>

        <li>

            <a
                href="/soil"
                class="{{ request()->is('soil') ? 'active' : '' }}"
            >

                <i class="bi bi-cpu"></i>

                <span>
                    {{ t('AI Soil Analysis') }}
                </span>

            </a>

        </li>

        <li>

            <a
                href="/weather"
                class="{{ request()->is('weather') ? 'active' : '' }}"
            >

                <i class="bi bi-cloud-sun"></i>

                <span>
                    {{ t('Weather Information') }}
                </span>

            </a>

        </li>

        @auth

        <li class="separator"></li>

        <li>

            <button
                type="button"
                class="sidebar-dropdown-btn profile-button"
                id="profileButton"
                onclick="toggleProfileMenu()"
            >

                @if(Auth::user()->profile_photo)

                    <img
                        src="{{ asset(Auth::user()->profile_photo) }}"
                        alt="Profile"
                        class="profile-button-photo"
                    >

                @else

                    <div class="profile-button-placeholder">
                        <i class="bi bi-person"></i>
                    </div>

                @endif

                <span>
                    {{ Auth::user()->name }}
                </span>

                <i
                    class="bi bi-chevron-down profile-arrow"
                    id="profileArrow"
                ></i>

            </button>

            <div
                class="profile-menu"
                id="profileMenu"
            >

                <a href="{{ route('profile') }}">

                    <i class="bi bi-person-bounding-box"></i>

                    <span>
                        {{ t('Add Profile Picture') }}
                    </span>

                </a>

                <a href="{{ route('account.settings') }}">

                    <i class="bi bi-gear"></i>

                    <span>
                        {{ t('Account Settings') }}
                    </span>

                </a>

                <button
                    type="button"
                    onclick="toggleLanguageMenu()"
                >

                    <i class="bi bi-translate"></i>

                    <span>
                        {{ t('Select Language') }}
                    </span>

                    <i
                        class="bi bi-chevron-down"
                        style="margin-left:auto; width:auto !important;"
                    ></i>

                </button>

                <div
                    class="language-menu"
                    id="languageMenu"
                >

                    <a href="{{ route('language.change', 'en') }}">

                        <i class="bi bi-check2"></i>

                        {{ t('English') }}

                    </a>

                    <a href="{{ route('language.change', 'ur') }}">

                        <i class="bi bi-check2"></i>

                        {{ t('Urdu') }}

                    </a>

                </div>

                <a href="{{ route('privacy.policy') }}">

                    <i class="bi bi-shield-lock"></i>

                    <span>
                        {{ t('Privacy Policy') }}
                    </span>

                </a>

                <a href="{{ route('about.us') }}">

                    <i class="bi bi-info-circle"></i>

                    <span>
                        {{ t('About Us') }}
                    </span>

                </a>

                <button
                    type="button"
                    onclick="openLogoutModal()"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    <span>
                        {{ t('Logout') }}
                    </span>

                </button>

            </div>

        </li>

        @endauth

    </ul>

</div>

<div
    id="sidebar-backdrop"
    onclick="toggleSidebar()"
></div>

<nav class="navbar-main">

    <div class="navbar-inner">

        <button
            class="menu-button"
            onclick="toggleSidebar()"
            aria-label="Open menu"
            type="button"
        >

            <i class="bi bi-list"></i>

        </button>

        <a
            href="/"
            class="brand"
        >

            <img
                src="{{ asset('images/logo1.jpg') }}"
                alt="{{ t('GrowSmart') }}"
            >

            <span>
                {{ t('GrowSmart') }}
            </span>

        </a>

        <div class="category-nav">

            <a
                href="/dashboard"
                class="nav-item-link nav-home {{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}"
            >
                @if(is_urdu())
                    صفحۂ اول
                @else
                    {{ t('Home') }}
                @endif
            </a>

            <a
                href="/summer"
                class="nav-item-link nav-summer {{ request()->is('summer') ? 'active' : '' }}"
            >
                {{ t('Summer Crops') }}
            </a>

            <a
                href="/winter"
                class="nav-item-link nav-winter {{ request()->is('winter') ? 'active' : '' }}"
            >
                {{ t('Winter Crops') }}
            </a>

            <a
                href="/grains"
                class="nav-item-link nav-grains {{ request()->is('grains') ? 'active' : '' }}"
            >
                {{ t('Grains') }}
            </a>

            <a
                href="/vegetable"
                class="nav-item-link nav-vegetable {{ request()->is('vegetable') ? 'active' : '' }}"
            >
                {{ t('Vegetables') }}
            </a>

            <a
                href="/fruit"
                class="nav-item-link nav-fruit {{ request()->is('fruit') ? 'active' : '' }}"
            >
                @if(is_urdu())
                    پھل
                @else
                    {{ t('Fruits') }}
                @endif
            </a>

        </div>

        @auth

        <div class="nav-profile">

            @if(Auth::user()->profile_photo)

                <img
                    src="{{ asset(Auth::user()->profile_photo) }}"
                    alt="Profile Picture"
                >

            @else

                <div class="nav-profile-placeholder">

                    <i class="bi bi-person"></i>

                </div>

            @endif

        </div>

        @endauth

    </div>

</nav>

<main class="main-content">

    @yield('content')

</main>

<style>
    @media (max-width: 576px) {
        .main-content .hero {
            height: 460px !important;
            min-height: 460px !important;
        }
    }
</style>

<footer class="footer">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">

                <h5>
                    <i class="bi bi-tree-fill"></i>
                    <span>{{ t('GrowSmart') }}</span>
                </h5>

                <p>
                    {{ t('GrowSmart is an intelligent agriculture platform helping farmers with crop information, pest management, soil analysis, weather forecasting and expert community support.') }}
                </p>

            </div>

            <div class="col-lg-2 col-md-6 mb-4">

                <h5>{{ t('Quick Links') }}</h5>

                <ul class="footer-links">

                    <li>
                        <a href="/">
                            {{ t('Home') }}
                        </a>
                    </li>

                    <li>
                        <a href="/grid">
                            {{ t('Crop Data') }}
                        </a>
                    </li>

                    <li>
                        <a href="/garden">
                            {{ t('Pest Management') }}
                        </a>
                    </li>

                    <li>
                        <a href="/community">
                            {{ t('Community') }}
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <h5>{{ t('Services') }}</h5>

                <ul class="footer-links">

                    <li>
                        <a href="/soil">
                            {{ t('AI Soil Analysis') }}
                        </a>
                    </li>

                    <li>
                        <a href="/weather">
                            {{ t('Weather Forecast') }}
                        </a>
                    </li>

                    <li>
                        <a href="/community">
                            {{ t('Expert Support') }}
                        </a>
                    </li>

                    <li>
                        <a href="/grid">
                            {{ t('Crop Knowledge') }}
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <h5>{{ t('Contact Us') }}</h5>

                <p>
                    <i class="bi bi-envelope-fill"></i>
                    &nbsp;<span class="contact-value-protected" data-no-translate="true">abeehaamanatali01@gmail.com</span>
                </p>

                <p>
                    <i class="bi bi-telephone-fill"></i>
                    &nbsp;<span class="contact-value-protected" data-no-translate="true">+92 321 6480902</span>
                </p>

                <p>
                    <i class="bi bi-geo-alt-fill"></i>
                    &nbsp;{{ t('Pakistan') }}
                </p>


        </div>

        <div class="footer-bottom">

            © {{ date('Y') }} <span>{{ t('GrowSmart') }}</span>. {{ t('All Rights Reserved.') }}

            <br>

            {{ t('Empowering Farmers Through Smart Agriculture.') }}

        </div>

    </div>

</footer>

<div id="logoutModal">

    <div class="logout-box">

        <div class="logout-icon">

            <i class="bi bi-box-arrow-right"></i>

        </div>

        <h3>
            {{ t('Logout') }}
        </h3>

        <p>
            {{ t('Are you sure you want to logout from GrowSmart?') }}
        </p>

        <div class="logout-actions">

            <button
                type="button"
                class="logout-cancel"
                onclick="closeLogoutModal()"
            >
                {{ t('No') }}
            </button>

            <form
                action="{{ route('logout') }}"
                method="POST"
                style="margin:0;"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-confirm"
                >
                    {{ t('Yes, Logout') }}
                </button>

            </form>

        </div>

    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const backdrop = document.getElementById("sidebar-backdrop");

        if (sidebar) {
            sidebar.classList.remove("show");
        }

        if (backdrop) {
            backdrop.classList.remove("show");
        }
    });

    function toggleSidebar()
{
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebar-backdrop');
    const profileMenu = document.getElementById('profileMenu');
    const profileButton = document.getElementById('profileButton');

    if (!sidebar || !backdrop) {
        return;
    }

    sidebar.classList.toggle('show');
    backdrop.classList.toggle('show');

    if (!sidebar.classList.contains('show')) {

        if (profileMenu) {
            profileMenu.classList.remove('show');
        }

        if (profileButton) {
            profileButton.classList.remove('open');
        }

    }
}

    function toggleCropMenu()
    {
        const menu = document.getElementById('cropMenu');
        const button = document.querySelector('.crop-data-button');

        if (!menu || !button) {
            return;
        }

        menu.classList.toggle('show');
        button.classList.toggle('open');
    }

function toggleProfileMenu()
{
    const menu = document.getElementById('profileMenu');
    const button = document.getElementById('profileButton');

    if (!menu || !button) {
        return;
    }

    if (menu.classList.contains('show')) {

        menu.classList.remove('show');
        button.classList.remove('open');

        return;
    }

    menu.classList.add('show');
    button.classList.add('open');

    const buttonRect = button.getBoundingClientRect();

    const menuHeight = menu.offsetHeight;
    const menuWidth = menu.offsetWidth;

    let top = buttonRect.top - menuHeight - 8;
    let left = buttonRect.left;

    if (top < 10) {
        top = 10;
    }

    if (left + menuWidth > window.innerWidth - 10) {
        left = window.innerWidth - menuWidth - 10;
    }

    menu.style.top = top + 'px';
    menu.style.left = left + 'px';
}


function toggleLanguageMenu()
{
    const menu = document.getElementById('languageMenu');

    if (menu) {
        menu.classList.toggle('show');
    }
}

function openLogoutModal()
{
    const modal = document.getElementById('logoutModal');

    if (modal) {
        modal.classList.add('show');
    }
}

function closeLogoutModal()
{
    const modal = document.getElementById('logoutModal');

    if (modal) {
        modal.classList.remove('show');
    }
}

const logoutModal = document.getElementById('logoutModal');

if (logoutModal) {

    logoutModal.addEventListener('click', function(event) {

        if (event.target === this) {
            closeLogoutModal();
        }

    });

}

document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {

        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        const profileMenu = document.getElementById('profileMenu');
        const profileButton = document.getElementById('profileButton');

        if (sidebar) {
            sidebar.classList.remove('show');
        }

        if (backdrop) {
            backdrop.classList.remove('show');
        }

        if (profileMenu) {
            profileMenu.classList.remove('show');
        }

        if (profileButton) {
            profileButton.classList.remove('open');
        }

        closeLogoutModal();

    }

});

window.addEventListener('resize', function() {

    const menu = document.getElementById('profileMenu');
    const button = document.getElementById('profileButton');

    if (
        !menu ||
        !button ||
        !menu.classList.contains('show')
    ) {
        return;
    }

    const buttonRect = button.getBoundingClientRect();

    const menuHeight = menu.offsetHeight;
    const menuWidth = menu.offsetWidth;

    let top = buttonRect.top - menuHeight - 8;
    let left = buttonRect.left;

    if (top < 10) {
        top = 10;
    }

    if (left + menuWidth > window.innerWidth - 10) {
        left = window.innerWidth - menuWidth - 10;
    }

    menu.style.top = top + 'px';
    menu.style.left = left + 'px';

});

</script>

@stack('scripts')

</body>

</html>
