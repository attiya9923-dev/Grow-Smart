<!DOCTYPE html>
<html lang="<?php echo e($language); ?>" dir="<?php echo e($language === 'ur' ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(trans('GrowSmart OTP', [], $language)); ?></title>
</head>
<body style="font-family:Arial;background:#f5f5f5;padding:30px;">
<div style="background:white;padding:30px;border-radius:10px;width:500px;margin:auto;">
    <h2><?php echo e(trans('Hello :name', ['name' => $name], $language)); ?></h2>
    <p><?php echo e(trans('Thank you for registering on GrowSmart.', [], $language)); ?></p>
    <p><?php echo e(trans('Your verification code is', [], $language)); ?></p>
    <h1 style="color:green;direction:ltr;text-align:center;"><?php echo e($otp); ?></h1>
    <p><?php echo e(trans('This OTP will expire in 10 minutes.', [], $language)); ?></p>
    <p><?php echo e(trans('If you did not register this account, please ignore this email.', [], $language)); ?></p>
    <br>
    <p><?php echo e(trans('Regards', [], $language)); ?></p>
    <h3><?php echo e(trans('GrowSmart Team', [], $language)); ?></h3>
</div>
</body>
</html>
<?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/emails/otp.blade.php ENDPATH**/ ?>