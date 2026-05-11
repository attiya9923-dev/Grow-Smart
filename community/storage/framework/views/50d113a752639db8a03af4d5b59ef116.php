<?php $__env->startSection('title', (t('Fruits')) . ' | GrowSmart'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .crop-page {
        padding-bottom: 30px;
    }

    .crop-hero {
        position: relative;
        padding: 23px 28px;
        margin-bottom: 23px;
        border-radius: 18px;
        background: linear-gradient(135deg, #edf7f1 0%, #ffffff 65%, #f5faf7 100%);
        border: 1px solid #dce9e1;
        overflow: hidden;
    }

    .crop-hero::after {
        content: "";
        position: absolute;
        width: 165px;
        height: 165px;
        right: -55px;
        top: -65px;
        border-radius: 50%;
        background: rgba(86, 135, 104, 0.08);
    }

    .crop-page-title {
        position: relative;
        z-index: 1;
        color: var(--dark-green);
        font-size: 28px;
        font-weight: 800;
        margin: 0 0 6px;
        letter-spacing: -0.4px;
    }

    .crop-page-subtitle {
        position: relative;
        z-index: 1;
        color: var(--gray);
        font-size: 13px;
        margin: 0;
        max-width: 620px;
        line-height: 1.6;
    }

    .crop-section {
        border: 1px solid var(--border);
        border-radius: 18px;
        background: var(--white);
        padding: 20px;
        box-shadow: 0 7px 26px rgba(23, 59, 50, 0.07);
    }

    .crop-section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 17px;
    }

    .crop-section-title {
        margin: 0;
        color: var(--dark-green);
        font-size: 17px;
        font-weight: 700;
    }

    .crop-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 28px;
        padding: 0 9px;
        border-radius: 20px;
        background: #edf6f0;
        color: var(--dark-green);
        font-size: 12px;
        font-weight: 700;
    }

    .crop-card-link {
        display: block;
        height: 100%;
        text-decoration: none;
        color: inherit;
    }

    .crop-card {
        width: 100%;
        height: 315px;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border: 1px solid #e4ebe7;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .crop-card:hover {
        transform: translateY(-7px);
        border-color: #b8d0c1;
        box-shadow: 0 16px 34px rgba(23, 59, 50, 0.15);
    }

    .crop-image-wrapper {
        position: relative;
        width: 100%;
        height: 210px;
        overflow: hidden;
        background: #f2f6f3;
    }

    .crop-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.5s ease;
    }

    .crop-card:hover img {
        transform: scale(1.07);
    }

    .crop-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0, 0, 0, 0.28),
            transparent 45%
        );
        pointer-events: none;
    }

    .view-badge {
        position: absolute;
        right: 12px;
        bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.94);
        color: var(--dark-green);
        font-size: 10px;
        font-weight: 700;
        opacity: 0;
        transform: translateY(8px);
        transition: all 0.3s ease;
    }

    .crop-card:hover .view-badge {
        opacity: 1;
        transform: translateY(0);
    }

    .card-info {
        flex: 1;
        padding: 14px 14px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background: #ffffff;
    }

    .crop-title {
        font-weight: 700;
        font-size: 16px;
        color: var(--dark-green);
        line-height: 1.35;
    }

    .crop-type {
        color: var(--gray);
        font-size: 11px;
        margin-top: 6px;
        padding: 4px 9px;
        border-radius: 15px;
        background: #f1f5f2;
    }

    .empty-state {
        padding: 50px 20px;
        text-align: center;
        border: 1px dashed #cbd9d0;
        border-radius: 16px;
        background: #fafcfb;
    }

    .empty-state-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #edf6f0;
        color: var(--dark-green);
        font-size: 24px;
    }

    .empty-state h5 {
        color: var(--dark-green);
        font-weight: 700;
        margin-bottom: 6px;
    }

    .empty-state p {
        color: var(--gray);
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 992px) {

        .crop-hero {
            padding: 21px 24px;
        }

        .crop-page-title {
            font-size: 26px;
        }

        .crop-section {
            padding: 17px;
        }

        .crop-card {
            height: 300px;
        }

        .crop-image-wrapper {
            height: 200px;
        }
    }

    @media (max-width: 768px) {

        .crop-hero {
            padding: 19px;
            border-radius: 15px;
        }

        .crop-page-title {
            font-size: 24px;
        }

        .crop-page-subtitle {
            font-size: 12px;
        }

        .crop-section {
            padding: 13px;
            border-radius: 15px;
        }

        .crop-section-title {
            font-size: 16px;
        }

        .crop-card {
            height: 275px;
            border-radius: 14px;
        }

        .crop-image-wrapper {
            height: 180px;
        }

        .crop-title {
            font-size: 14px;
        }

        .view-badge {
            display: none;
        }
    }

    @media (max-width: 576px) {

        .crop-hero {
            padding: 17px;
            margin-bottom: 18px;
        }

        .crop-page-title {
            font-size: 22px;
        }

        .crop-section {
            padding: 9px;
        }

        .crop-section-header {
            margin-bottom: 13px;
        }

        .crop-section-title {
            font-size: 15px;
        }

        .crop-count {
            min-width: 31px;
            height: 25px;
            font-size: 10px;
        }

        .crop-card {
            height: 245px;
            border-radius: 12px;
        }

        .crop-image-wrapper {
            height: 158px;
        }

        .card-info {
            padding: 9px;
        }

        .crop-title {
            font-size: 12px;
        }

        .crop-type {
            font-size: 9px;
            margin-top: 5px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="crop-page">

    <div class="crop-hero">

        <h1 class="crop-page-title">
            <?php echo e(t('Fruits')); ?>

        </h1>

        <p class="crop-page-subtitle">
            <?php echo e(t('Discover a variety of fruits and explore detailed agricultural information, growing guidance, and useful crop details.')); ?>

        </p>

    </div>

    <div class="crop-section">

        <div class="crop-section-header">

            <h2 class="crop-section-title">
                <?php echo e(t('Available Fruits')); ?>

            </h2>

            <span class="crop-count">
                <?php echo e($crops->count()); ?>

            </span>

        </div>

        <div class="row g-4">

            <?php $__empty_1 = true; $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">

                    <a
                        href="<?php echo e(route('crop.show', $crop->id)); ?>"
                        class="crop-card-link"
                    >

                        <div class="crop-card">

                            <div class="crop-image-wrapper">

                                <img
                                    src="<?php echo e(asset('images/' . $crop->image)); ?>"
                                    alt="<?php echo e(local_text($crop, 'name')); ?>"
                                    loading="lazy"
                                    onerror="this.src='<?php echo e(asset('images/default-crop.jpg')); ?>'"
                                >

                                <div class="crop-image-overlay"></div>

                                <div class="view-badge">

                                    <i class="bi bi-arrow-right"></i>

                                    <?php echo e(t('View Details')); ?>


                                </div>

                            </div>

                            <div class="card-info">

                                <div class="crop-title">
                                    <?php echo e(local_text($crop, 'name')); ?>

                                </div>

                                <?php if($crop->type): ?>

                                    <div class="crop-type">
                                        <?php echo e(local_text($crop, 'type')); ?>

                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    </a>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="col-12">

                    <div class="empty-state">

                        <div class="empty-state-icon">

                            <i class="bi bi-flower1"></i>

                        </div>

                        <h5>
                            <?php echo e(t('No Fruits Available')); ?>

                        </h5>

                        <p>
                            <?php echo e(t('There are currently no fruits available to display.')); ?>

                        </p>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/front/fruit.blade.php ENDPATH**/ ?>