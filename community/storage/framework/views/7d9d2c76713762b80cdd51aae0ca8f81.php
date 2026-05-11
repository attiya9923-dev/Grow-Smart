<!DOCTYPE html>
<html lang="<?php echo e(current_language()); ?>" dir="<?php echo e(is_urdu() ? 'rtl' : 'ltr'); ?>" class="<?php echo e(is_urdu() ? 'urdu-mode' : ''); ?>">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?php echo e(t('GrowSmart | Forgot Password')); ?></title>

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
            padding: 15px;
            overflow-x: hidden;
            position: relative;
            background:
                linear-gradient(
                    rgba(9, 43, 34, 0.68),
                    rgba(9, 43, 34, 0.68)
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
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            right: -220px;
            bottom: -220px;
            pointer-events: none;
        }

        .container {
            width: 430px;
            max-width: 100%;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            z-index: 2;
            box-shadow:
                0 20px 55px rgba(0,0,0,0.28),
                0 5px 18px rgba(0,0,0,0.11);
            animation: cardAppear 0.7s ease;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform:
                    translateY(20px)
                    scale(0.98);
            }

            to {
                opacity: 1;
                transform:
                    translateY(0)
                    scale(1);
            }
        }

        .forgot-box {
            width: 100%;
            padding: 30px 34px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 20px;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            background: #e7f2eb;
            box-shadow:
                0 4px 12px rgba(46,139,87,0.13);
            overflow: hidden;
            flex-shrink: 0;
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 3px;
            display: block;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-name {
            color: #183a35;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-tagline {
            color: #7a8881;
            font-size: 7px;
            font-weight: 500;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .lock-icon {
            width: 58px;
            height: 58px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 13px;
            border-radius: 50%;
            background:
                linear-gradient(
                    135deg,
                    #e8f4ec,
                    #dcefe2
                );
            color: #2e8b57;
            font-size: 22px;
            box-shadow:
                0 6px 18px rgba(46,139,87,0.11);
        }

        .forgot-box h2 {
            color: #183a35;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 6px;
            text-align: center;
        }

        .subtitle {
            color: #7a8881;
            font-size: 10px;
            line-height: 1.6;
            margin-bottom: 18px;
            text-align: center;
        }

        .message.success {
            background: #edf9f0;
            color: #217a3a;
            border: 1px solid #c9ead2;
            padding: 8px 10px;
            border-radius: 8px;
            margin-bottom: 12px;
            font-size: 10px;
            line-height: 1.4;
        }

        .message.error {
            background: #fff0f0;
            color: #b42318;
            border: 1px solid #ffd0d0;
            padding: 8px 10px;
            border-radius: 8px;
            margin-bottom: 12px;
            font-size: 10px;
            line-height: 1.4;
        }

        .form-label {
            display: block;
            color: #183a35;
            font-size: 10px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
            margin-bottom: 13px;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #7a8881;
            font-size: 12px;
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            height: 42px;
            padding:
                0
                12px
                0
                38px;
            border: 1px solid #d9e0dc;
            border-radius: 9px;
            background: #f8faf9;
            color: #183a35;
            font-size: 11px;
            outline: none;
            transition: 0.25s;
        }

        .form-control::placeholder {
            color: #a3ada8;
            font-size: 10px;
        }

        .form-control:focus {
            background: white;
            border-color: #2e8b57;
            box-shadow:
                0 0 0 3px
                rgba(46,139,87,0.10);
        }

        .reset-btn {
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
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            box-shadow:
                0 7px 17px
                rgba(46,139,87,0.20);
            transition: 0.25s;
        }

        .reset-btn:hover {
            transform: translateY(-2px);
            background:
                linear-gradient(
                    135deg,
                    #246f46,
                    #183a35
                );
            box-shadow:
                0 10px 22px
                rgba(46,139,87,0.27);
        }

        .reset-btn i {
            font-size: 10px;
        }

        .back-login {
            display: block;
            text-align: center;
            margin-top: 14px;
            color: #2e6b57;
            font-size: 10px;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s;
        }

        .back-login:hover {
            color: #183a35;
            text-decoration: underline;
        }

        @media (max-width: 600px) {

            body {
                min-height: 100svh;
                padding: 12px;
                overflow-y: auto;
            }

            .container {
                width: 100%;
                max-width: 400px;
                border-radius: 17px;
            }

            .forgot-box {
                padding: 27px 22px;
            }

            .brand {
                margin-bottom: 18px;
            }

            .brand-logo {
                width: 38px;
                height: 38px;
            }

            .brand-name {
                font-size: 16px;
            }

            .brand-tagline {
                font-size: 7px;
            }

            .lock-icon {
                width: 55px;
                height: 55px;
                font-size: 21px;
                margin-bottom: 12px;
            }

            .forgot-box h2 {
                font-size: 22px;
            }

            .subtitle {
                font-size: 10px;
                margin-bottom: 17px;
            }

            .form-control {
                height: 41px;
            }

            .reset-btn {
                height: 41px;
            }

        }

        @media (max-width: 400px) {

            body {
                padding: 9px;
            }

            .container {
                border-radius: 16px;
            }

            .forgot-box {
                padding: 24px 17px;
            }

            .brand-logo {
                width: 36px;
                height: 36px;
            }

            .brand-name {
                font-size: 15px;
            }

            .brand-tagline {
                font-size: 6px;
                letter-spacing: 0.4px;
            }

            .lock-icon {
                width: 52px;
                height: 52px;
                font-size: 20px;
            }

            .forgot-box h2 {
                font-size: 21px;
            }

            .subtitle {
                font-size: 9px;
            }

            .form-control {
                height: 40px;
                font-size: 10px;
            }

            .reset-btn {
                height: 40px;
                font-size: 11px;
            }

            .back-login {
                font-size: 10px;
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

        html.urdu-mode .input-icon {
            left: auto;
            right: 13px;
        }

        html.urdu-mode .form-control {
            padding-left: 12px;
            padding-right: 38px;
        }

        html.urdu-mode .back-login {
            text-align: center;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="forgot-box">

        <div class="brand">

            <div class="brand-logo">

                <img
                    src="<?php echo e(asset('images/logo1.jpg')); ?>"
                    alt="GrowSmart Logo"
                >

            </div>

            <div class="brand-text">

                <span class="brand-name">
                    <?php echo e(t('GrowSmart')); ?>

                </span>

                <span class="brand-tagline">
                    <?php echo e(t('Smart Agriculture')); ?>

                </span>

            </div>

        </div>

        <div class="lock-icon">

            <i class="fa-solid fa-lock"></i>

        </div>

        <h2>

            <?php echo e(t('Forgot Password?')); ?>


        </h2>

        <p class="subtitle">

            <?php echo e(t("Don't worry. We'll help you reset your password and get back to your GrowSmart account.")); ?>


        </p>

        <?php if(session('success')): ?>

            <div class="message success">

                <i class="fa-solid fa-circle-check"></i>

                <?php echo e(auth_text(session('success'))); ?>


            </div>

        <?php endif; ?>

        <?php if($errors->any()): ?>

            <div class="message error">

                <i class="fa-solid fa-circle-exclamation"></i>

                <?php echo e(auth_text($errors->first())); ?>


            </div>

        <?php endif; ?>

        <form
            method="POST"
            action="<?php echo e(route('password.email')); ?>"
        >

            <?php echo csrf_field(); ?>

            <label
                class="form-label"
                for="email"
            >

                <?php echo e(t('Email Address')); ?>


            </label>

            <div class="input-wrapper">

                <i class="fa-solid fa-envelope input-icon"></i>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="<?php echo e(old('email')); ?>"
                    placeholder="<?php echo e(t('Enter your registered email')); ?>"
                    autocomplete="email"
                    required
                >

            </div>

            <button
                type="submit"
                class="reset-btn"
            >

                <i class="fa-solid fa-paper-plane"></i>

                <?php echo e(t('Send Reset Link')); ?>


            </button>

        </form>

        <a
            href="<?php echo e(route('login')); ?>"
            class="back-login"
        >

            <i class="fa-solid fa-arrow-left"></i>

            <?php echo e(t('Back to Login')); ?>


        </a>

    </div>

</div>

</body>

</html><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>