<?php $__env->startSection('content'); ?>

<style>

body {
    background: #f4f8f4;
    font-family: Arial, sans-serif;
}

.admin-dashboard {
    width: 90%;
    max-width: 900px;
    margin: 10px auto 35px;
}

.header {
    text-align: center;
    margin-bottom: 25px;
}

.header h1 {
    color: #1b5e20;
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 5px;
}

.header p {
    color: #66736b;
    font-size: 15px;
    margin-bottom: 0;
}

.menu {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    align-items: stretch;
}

.card {
    background: #ffffff;
    text-decoration: none;
    padding: 28px 24px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 18px rgba(23, 59, 50, 0.07);
    border: 1px solid #e1ebe3;
    transition: all 0.25s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 220px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 26px rgba(23, 59, 50, 0.13);
    border-color: #2e7d32;
    background: #fbfffb;
}

.icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: #eaf4ec;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
    margin-bottom: 15px;
}

.card h2 {
    color: #1b5e20;
    font-size: 21px;
    font-weight: 700;
    margin-bottom: 9px;
}

.card p {
    color: #737d77;
    font-size: 14px;
    line-height: 1.6;
    margin: 0;
    max-width: 330px;
}

.success {
    background: #d4edda;
    color: #155724;
    padding: 11px 14px;
    border-radius: 8px;
    margin-bottom: 18px;
    text-align: center;
    font-size: 14px;
}

@media (max-width: 700px) {

    .admin-dashboard {
        width: 94%;
        margin: 6px auto 25px;
    }

    .header {
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 30px;
    }

    .header p {
        font-size: 14px;
    }

    .menu {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .card {
        min-height: 200px;
        padding: 23px 16px;
    }

    .icon {
        width: 58px;
        height: 58px;
        font-size: 31px;
        margin-bottom: 12px;
    }

    .card h2 {
        font-size: 19px;
    }

    .card p {
        font-size: 13px;
        line-height: 1.5;
    }

}

@media (max-width: 480px) {

    .menu {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .card {
        min-height: 175px;
        padding: 22px 17px;
    }

    .icon {
        width: 56px;
        height: 56px;
        font-size: 30px;
        margin-bottom: 11px;
    }

    .card h2 {
        font-size: 19px;
    }

    .card p {
        font-size: 13px;
    }

}

</style>

<div class="admin-dashboard">
<div class="header">

    <h1><?php echo e(t('Admin Dashboard')); ?></h1>

    <p>
        <?php echo e(t('Manage users, questions and crop information')); ?>

    </p>

</div>

<?php if(session('success')): ?>

    <div class="success">
        <?php echo e(session('success')); ?>

    </div>

<?php endif; ?>

<div class="menu">

    <a
        href="<?php echo e(route('admin.dashboard')); ?>"
        class="card"
    >

        <div class="icon">
            👥
        </div>

        <h2>
            <?php echo e(t('All Users')); ?>

        </h2>

        <p>
            <?php echo e(t('View and manage all registered users.')); ?>

        </p>

    </a>

    <a
        href="<?php echo e(route('admin.questions')); ?>"
        class="card"
    >

        <div class="icon">
            📋
        </div>

        <h2>
            <?php echo e(t('User Questions')); ?>

        </h2>

        <p>
            <?php echo e(t('View, review and manage questions submitted by users.')); ?>

        </p>

    </a>

    <a
        href="<?php echo e(route('admin.crops')); ?>"
        class="card"
    >

        <div class="icon">
            🌱
        </div>

        <h2>
            <?php echo e(t('Manage Crops')); ?>

        </h2>

        <p>
            <?php echo e(t('Add crops, crop information, pest information and delete crops.')); ?>

        </p>

    </a>

    <a
        href="<?php echo e(route('expert.users')); ?>"
        class="card"
    >

        <div class="icon">
            👨‍🌾
        </div>

        <h2>
            <?php echo e(t('Expert Panel')); ?>

        </h2>

        <p>
            <?php echo e(t('View and manage the expert panel and expert information.')); ?>

        </p>

    </a>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/admin/info.blade.php ENDPATH**/ ?>