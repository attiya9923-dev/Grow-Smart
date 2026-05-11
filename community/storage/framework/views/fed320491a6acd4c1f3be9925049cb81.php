<!DOCTYPE html>
<html lang="<?php echo e(current_language()); ?>" dir="<?php echo e(is_urdu() ? 'rtl' : 'ltr'); ?>" class="<?php echo e(is_urdu() ? 'urdu-mode' : ''); ?>">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?php echo e(t('GrowSmart | Login')); ?></title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow-x: hidden;
            background:
                linear-gradient(
                    rgba(10, 48, 37, 0.62),
                    rgba(10, 48, 37, 0.62)
                ),
                url("<?php echo e(asset('images/agriculture.jpg')); ?>")
                center center / cover no-repeat;
        }

        body::before {
            content: "";
            position: fixed;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            top: -250px;
            left: -200px;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            right: -200px;
            bottom: -200px;
            pointer-events: none;
        }

        .container {
            width: 780px;
            max-width: 100%;
            min-height: 430px;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            position: relative;
            z-index: 2;
            box-shadow:
                0 20px 55px rgba(0,0,0,0.30),
                0 6px 20px rgba(0,0,0,0.13);
            animation: boxAppear 0.7s ease;
        }

        @keyframes boxAppear {
            from {
                opacity: 0;
                transform:
                    translateY(25px)
                    scale(0.98);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }
        }

        .left {
            width: 55%;
            padding: 30px 36px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 16px;
            text-decoration: none;
        }

        .brand-logo {
            width: 36px;
            height: 36px;
            object-fit: cover;
            border-radius: 9px;
            border: 2px solid #e4eee8;
            box-shadow:
                0 3px 9px rgba(0,0,0,0.09);
        }

        .brand-name {
            color: #183a35;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        h2 {
            color: #183a35;
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #7a8881;
            font-size: 11px;
            margin-bottom: 17px;
            line-height: 1.55;
        }

        .input-group {
            position: relative;
            margin-bottom: 11px;
        }

        .input-group input {
            width: 100%;
            height: 42px;
            padding: 0 40px;
            border: 1px solid #d9e0dc;
            border-radius: 9px;
            background: #f8faf9;
            color: #263832;
            font-size: 11px;
            outline: none;
            transition: 0.25s;
        }

        .input-group input::placeholder {
            color: #9ba6a1;
        }

        .input-group input:focus {
            background: #ffffff;
            border-color: #2e8b57;
            box-shadow:
                0 0 0 3px rgba(46,139,87,0.10);
        }

        .input-group > i.fa-envelope,
        .input-group > i.fa-lock {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #7e8d86;
            font-size: 12px;
            z-index: 2;
        }

        .eye {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #89958f;
            cursor: pointer;
            z-index: 3;
            transition: 0.2s;
            font-size: 12px;
        }

        .eye:hover {
            color: #2e8b57;
        }

        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none;
        }

        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-contacts-auto-fill-button {
            display: none !important;
            visibility: hidden;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: -2px;
            margin-bottom: 13px;
            color: #2e6b57;
            font-size: 10px;
            font-weight: 500;
            text-decoration: none;
        }

        .forgot-password:hover {
            color: #183a35;
            text-decoration: underline;
        }

        button {
            width: 100%;
            height: 42px;
            border: none;
            border-radius: 9px;
            background:
                linear-gradient(
                    135deg,
                    #2e8b57,
                    #245f49
                );
            color: white;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            box-shadow:
                0 7px 17px rgba(46,139,87,0.20);
            transition: 0.25s;
        }

        button:hover {
            transform: translateY(-2px);
            background:
                linear-gradient(
                    135deg,
                    #246f46,
                    #183a35
                );
            box-shadow:
                0 10px 22px rgba(46,139,87,0.27);
        }

        button i {
            font-size: 11px;
        }

        .register-text {
            margin-top: 13px;
            text-align: center;
            color: #7a8881;
            font-size: 10px;
        }

        .register-text a {
            color: #2e6b57;
            font-weight: 600;
            text-decoration: none;
            margin-left: 3px;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .right {
            width: 45%;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background:
                url("<?php echo e(asset('images/forum.jpg')); ?>")
                center center / cover no-repeat;
        }

        .right::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    180deg,
                    rgba(16,58,45,0.18),
                    rgba(9,35,29,0.38)
                );
            z-index: 1;
        }

        .right::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.22);
            right: -150px;
            top: -135px;
            z-index: 2;
        }

        .right-content {
            position: relative;
            z-index: 4;
            text-align: center;
            color: white;
            width: 82%;
            padding: 15px;
            text-shadow:
                0 2px 10px rgba(0,0,0,0.30);
        }

        .leaf {
            width: 58px;
            height: 58px;
            margin: 0 auto 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.30);
            backdrop-filter: blur(5px);
            font-size: 25px;
            color: #ffffff;
        }

        .right-content h3 {
            font-size: 24px;
            line-height: 1.25;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .right-content p {
            color: #ffffff;
            font-size: 10px;
            line-height: 1.7;
            max-width: 280px;
            margin: auto;
        }

        .error {
            background: #fff0f0;
            color: #b42318;
            border: 1px solid #ffd0d0;
            padding: 8px 11px;
            border-radius: 8px;
            margin-bottom: 11px;
            font-size: 10px;
            line-height: 1.45;
        }

        .success {
            background: #edf9f0;
            color: #217a3a;
            border: 1px solid #c9ead2;
            padding: 8px 11px;
            border-radius: 8px;
            margin-bottom: 11px;
            font-size: 10px;
            line-height: 1.45;
        }

        @media (max-width: 850px) {

            body {
                padding: 18px;
            }

            .container {
                width: 100%;
                max-width: 720px;
            }

            .left {
                padding: 28px 30px;
            }

            .right-content h3 {
                font-size: 22px;
            }
        }

        @media (max-width: 650px) {

            body {
                min-height: 100svh;
                padding: 15px;
                background:
                    linear-gradient(
                        rgba(9,43,34,0.62),
                        rgba(9,43,34,0.62)
                    ),
                    url("<?php echo e(asset('images/agriculture.jpg')); ?>")
                    center center / cover no-repeat;
            }

            .container {
                width: 100%;
                max-width: 420px;
                min-height: auto;
                display: block;
                border-radius: 18px;
            }

            .left {
                width: 100%;
                padding: 28px 22px;
            }

            .right {
                display: none;
            }

            .brand {
                margin-bottom: 17px;
            }

            .brand-logo {
                width: 38px;
                height: 38px;
            }

            .brand-name {
                font-size: 17px;
            }

            h2 {
                font-size: 24px;
            }

            .subtitle {
                font-size: 11px;
                margin-bottom: 19px;
            }

            .input-group input {
                height: 45px;
                font-size: 11px;
            }

            button {
                height: 45px;
            }
        }

        @media (max-width: 400px) {

            body {
                padding: 10px;
            }

            .container {
                border-radius: 16px;
            }

            .left {
                padding: 25px 18px;
            }

            .brand-logo {
                width: 36px;
                height: 36px;
            }

            .brand-name {
                font-size: 16px;
            }

            h2 {
                font-size: 22px;
            }

            .input-group input {
                height: 44px;
                font-size: 11px;
                padding-left: 40px;
            }

            button {
                height: 44px;
                font-size: 12px;
            }
        }

    </style>

    <style id="growsmart-urdu-design">

        html.urdu-mode,
        html.urdu-mode body {
            direction: rtl;
        }

        html.urdu-mode body {
            text-align: right;
        }

        html.urdu-mode .container,
        html.urdu-mode .container-fluid,
        html.urdu-mode .row,
        html.urdu-mode .d-flex,
        html.urdu-mode .navbar,
        html.urdu-mode .navbar-nav,
        html.urdu-mode footer,
        html.urdu-mode header {
            direction: rtl;
        }

        html.urdu-mode .row > *,
        html.urdu-mode .card,
        html.urdu-mode section,
        html.urdu-mode article,
        html.urdu-mode form,
        html.urdu-mode p,
        html.urdu-mode h1,
        html.urdu-mode h2,
        html.urdu-mode h3,
        html.urdu-mode h4,
        html.urdu-mode h5,
        html.urdu-mode h6,
        html.urdu-mode label,
        html.urdu-mode input,
        html.urdu-mode textarea,
        html.urdu-mode select,
        html.urdu-mode table,
        html.urdu-mode td,
        html.urdu-mode th {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode input,
        html.urdu-mode textarea,
        html.urdu-mode select {
            direction: rtl;
            text-align: right;
        }

        html.urdu-mode .text-start {
            text-align: right !important;
        }

        html.urdu-mode .text-end {
            text-align: left !important;
        }

        html.urdu-mode .brand {
            justify-content: flex-start;
        }

        html.urdu-mode .input-group > i.fa-envelope,
        html.urdu-mode .input-group > i.fa-lock {
            left: auto;
            right: 14px;
        }

        html.urdu-mode .input-group input {
            padding-left: 40px;
            padding-right: 40px;
        }

        html.urdu-mode .eye {
            right: auto;
            left: 13px;
        }

        html.urdu-mode .forgot-password {
            text-align: left;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="left">

        <div class="brand">

            <img
                src="<?php echo e(asset('images/logo1.jpg')); ?>"
                alt="GrowSmart Logo"
                class="brand-logo"
            >

            <span class="brand-name">
                <?php echo e(t('GrowSmart')); ?>

            </span>

        </div>

        <h2>
            <?php echo e(t('Welcome Back')); ?>

        </h2>

        <p class="subtitle">
            <?php echo e(t('Log in to your account to continue your smart agriculture journey.')); ?>

        </p>

        <?php if(session('error')): ?>

            <div class="error">

                <i class="fa-solid fa-circle-exclamation"></i>

                <?php echo e(auth_text(session('error'))); ?>


            </div>

        <?php endif; ?>

        <?php if($errors->any()): ?>

            <div class="error">

                <i class="fa-solid fa-circle-exclamation"></i>

                <?php echo e(auth_text($errors->first())); ?>


            </div>

        <?php endif; ?>

        <?php if(session('success')): ?>

            <div class="success">

                <i class="fa-solid fa-circle-check"></i>

                <?php echo e(auth_text(session('success'))); ?>


            </div>

        <?php endif; ?>

        <form
            method="POST"
            action="<?php echo e(route('login')); ?>"
        >

            <?php echo csrf_field(); ?>

            <div class="input-group">

                <i class="fa fa-envelope"></i>

                <input
                    type="email"
                    name="email"
                    placeholder="<?php echo e(t('Email Address')); ?>"
                    value="<?php echo e(old('email')); ?>"
                    required
                    autocomplete="email"
                >

            </div>

            <div class="input-group">

                <i class="fa fa-lock"></i>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="<?php echo e(t('Password')); ?>"
                    required
                    autocomplete="current-password"
                >

                <i
                    class="fa fa-eye eye"
                    id="eye"
                ></i>

            </div>

            <a
                href="<?php echo e(route('password.request')); ?>"
                class="forgot-password"
            >
                <?php echo e(t('Forgot Password?')); ?>

            </a>

            <button type="submit">

                <?php echo e(t('Login')); ?>


                <i class="fa-solid fa-arrow-right"></i>

            </button>

        </form>

        <p class="register-text">

            <?php echo e(t("Don't have an account?")); ?>


            <a href="<?php echo e(route('register')); ?>">
                <?php echo e(t('Register')); ?>

            </a>

        </p>

    </div>

    <div class="right">

        <div class="right-content">

            <div class="leaf">

                <i class="fa-solid fa-leaf"></i>

            </div>

            <h3>

                Grow Smarter.<br>

                <?php echo e(t('Farm Better.')); ?>


            </h3>

            <p>

                <?php echo e(t('Discover smarter agricultural knowledge, better farming decisions and a connected farming community with GrowSmart.')); ?>


            </p>

        </div>

    </div>

</div>

<script>

    const password =
        document.getElementById("password");

    const eye =
        document.getElementById("eye");

    eye.addEventListener("click", function () {

        if (password.type === "password") {

            password.type = "text";

            eye.classList.remove("fa-eye");

            eye.classList.add("fa-eye-slash");

        }

        else {

            password.type = "password";

            eye.classList.remove("fa-eye-slash");

            eye.classList.add("fa-eye");

        }

    });

</script>

</body>

</html><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/auth/login.blade.php ENDPATH**/ ?>