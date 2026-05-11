<?php $__env->startSection('title', (t('Winter Crops')) . ' | GrowSmart'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .winter-page {
        padding-bottom: 30px;
    }

    .crop-hero {
        position: relative;
        padding: 18px 23px;
        margin-bottom: 20px;
        border-radius: 16px;
        background: linear-gradient(135deg, #eef5f1 0%, #f8fbf9 55%, #ffffff 100%);
        border: 1px solid #dce8e0;
        overflow: hidden;
    }

    .crop-hero::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -50px;
        top: -60px;
        border-radius: 50%;
        background: rgba(65, 105, 85, 0.08);
    }

    .crop-hero-content {
        position: relative;
        z-index: 2;
    }

    .crop-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        margin-bottom: 8px;
        border-radius: 30px;
        background: #ffffff;
        color: #426c54;
        border: 1px solid #d6e4da;
        font-size: 10px;
        font-weight: 600;
    }

    .crop-page-title {
        color: #173b32;
        font-size: 26px;
        font-weight: 800;
        margin: 0 0 5px;
        letter-spacing: -0.3px;
    }

    .crop-page-subtitle {
        color: #718078;
        font-size: 12px;
        margin: 0;
        max-width: 600px;
        line-height: 1.55;
    }

    .crop-data-wrapper {
        border: 1px solid #dce5df;
        border-radius: 17px;
        background: #ffffff;
        padding: 16px;
        box-shadow: 0 6px 22px rgba(23, 59, 50, 0.07);
    }

    .crop-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 13px;
        padding-bottom: 11px;
        border-bottom: 1px solid #edf1ee;
    }

    .crop-section-title {
        margin: 0;
        color: #173b32;
        font-size: 16px;
        font-weight: 700;
    }

    .crop-section-text {
        margin: 2px 0 0;
        color: #718078;
        font-size: 10px;
    }

    .crop-card-link {
        display: block;
        height: 100%;
        text-decoration: none;
        color: inherit;
    }

    .crop-card {
        width: 100%;
        height: 100%;
        min-height: 280px;
        border-radius: 14px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border: 1px solid #e2e9e4;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .crop-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 30px rgba(23, 59, 50, 0.14);
        border-color: #a9c1b0;
    }

    .crop-image-wrapper {
        height: 185px;
        overflow: hidden;
        position: relative;
        background: #eef3ef;
    }

    .crop-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.45s ease;
    }

    .crop-card:hover img {
        transform: scale(1.07);
    }

    .crop-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0) 50%,
            rgba(0, 0, 0, 0.22) 100%
        );
        pointer-events: none;
    }

    .crop-view-badge {
        position: absolute;
        right: 9px;
        bottom: 9px;
        padding: 5px 9px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.95);
        color: #356044;
        font-size: 9px;
        font-weight: 700;
        opacity: 0;
        transform: translateY(7px);
        transition: all 0.3s ease;
    }

    .crop-card:hover .crop-view-badge {
        opacity: 1;
        transform: translateY(0);
    }

    .card-info {
        padding: 11px 12px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 88px;
        background: #ffffff;
    }

    .crop-title {
        font-weight: 700;
        font-size: 15px;
        color: #263d32;
        line-height: 1.3;
    }

    .crop-type {
        display: inline-block;
        font-size: 9px;
        font-weight: 600;
        color: #64806f;
        background: #f0f6f2;
        border: 1px solid #dfebe2;
        margin-top: 6px;
        padding: 4px 8px;
        border-radius: 20px;
    }

    .empty-state {
        padding: 45px 20px;
        border-radius: 14px;
        background: #f8fbf9;
        border: 1px dashed #cbdacf;
    }

    .empty-state-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #e9f3ec;
        color: #568264;
        font-size: 26px;
    }

    .empty-state h5 {
        color: #173b32;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .empty-state p {
        color: #718078;
        font-size: 11px;
        margin: 0;
    }

    @media (max-width: 992px) {
        .crop-hero {
            padding: 17px 21px;
        }

        .crop-page-title {
            font-size: 25px;
        }

        .crop-card {
            min-height: 265px;
        }

        .crop-image-wrapper {
            height: 175px;
        }
    }

    @media (max-width: 768px) {
        .winter-page {
            padding-bottom: 22px;
        }

        .crop-hero {
            padding: 16px 18px;
            margin-bottom: 17px;
            border-radius: 15px;
        }

        .crop-page-title {
            font-size: 22px;
        }

        .crop-page-subtitle {
            font-size: 11px;
        }

        .crop-data-wrapper {
            padding: 11px;
            border-radius: 14px;
        }

        .crop-section-header {
            margin-bottom: 11px;
        }

        .crop-section-title {
            font-size: 14px;
        }

        .crop-card {
            min-height: 240px;
            border-radius: 13px;
        }

        .crop-image-wrapper {
            height: 155px;
        }

        .card-info {
            min-height: 82px;
            padding: 10px;
        }

        .crop-title {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .crop-hero {
            padding: 14px 15px;
        }

        .crop-badge {
            font-size: 9px;
            padding: 4px 8px;
        }

        .crop-page-title {
            font-size: 19px;
        }

        .crop-page-subtitle {
            font-size: 10px;
            line-height: 1.45;
        }

        .crop-data-wrapper {
            padding: 7px;
        }

        .crop-section-header {
            display: block;
            margin-bottom: 9px;
            padding-bottom: 8px;
        }

        .crop-section-title {
            font-size: 13px;
        }

        .crop-section-text {
            font-size: 9px;
        }

        .crop-card {
            min-height: 200px;
            border-radius: 11px;
        }

        .crop-image-wrapper {
            height: 130px;
        }

        .card-info {
            min-height: 70px;
            padding: 7px;
        }

        .crop-title {
            font-size: 11px;
        }

        .crop-type {
            font-size: 8px;
            padding: 3px 6px;
            margin-top: 4px;
        }

        .crop-view-badge {
            display: none;
        }

        .empty-state {
            padding: 35px 15px;
        }
    }
</style>

<div class="winter-page">

<div class="crop-hero">

    <div class="crop-hero-content">

        <div class="crop-badge">
            <i class="bi bi-snow"></i>
            <?php echo e(t('Winter Crop Collection')); ?>

        </div>

        <h1 class="crop-page-title">
            <?php echo e(t('Winter Crops')); ?>

        </h1>

        <p class="crop-page-subtitle">
            <?php echo e(t('Explore crops that thrive during the winter season and discover useful agricultural information and growing guidance for each crop.')); ?>

        </p>

    </div>

</div>

    </div>

    <div class="row g-3">

        <?php $__empty_1 = true; $__currentLoopData = $winterCrops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

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
                            >

                            <div class="crop-image-overlay"></div>

                            <span class="crop-view-badge">
                                <?php echo e(t('View Details')); ?>

                            </span>

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

                <div class="empty-state text-center">

                    <div class="empty-state-icon">
                        <i class="bi bi-flower1"></i>
                    </div>

                    <h5>
                        <?php echo e(t('No winter crops available')); ?>

                    </h5>

                    <p>
                        <?php echo e(t('There are currently no winter crops available to display.')); ?>

                    </p>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/front/winter.blade.php ENDPATH**/ ?>