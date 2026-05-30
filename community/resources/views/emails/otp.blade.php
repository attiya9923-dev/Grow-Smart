<!DOCTYPE html>
<html lang="{{ $language }}" dir="{{ $language === 'ur' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ trans('GrowSmart OTP', [], $language) }}</title>
</head>
<body style="font-family:Arial;background:#f5f5f5;padding:30px;">
<div style="background:white;padding:30px;border-radius:10px;width:500px;margin:auto;">
    <h2>{{ trans('Hello :name', ['name' => $name], $language) }}</h2>
    <p>{{ trans('Thank you for registering on GrowSmart.', [], $language) }}</p>
    <p>{{ trans('Your verification code is', [], $language) }}</p>
    <h1 style="color:green;direction:ltr;text-align:center;">{{ $otp }}</h1>
    <p>{{ trans('This OTP will expire in 10 minutes.', [], $language) }}</p>
    <p>{{ trans('If you did not register this account, please ignore this email.', [], $language) }}</p>
    <br>
    <p>{{ trans('Regards', [], $language) }}</p>
    <h3>{{ trans('GrowSmart Team', [], $language) }}</h3>
</div>
</body>
</html>
