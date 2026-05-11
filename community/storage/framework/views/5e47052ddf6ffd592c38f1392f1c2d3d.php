<?php $__env->startSection('content'); ?>

<style>

.community-container {
    width: 90%;
    margin: 15px auto;
}

.community-title {
    text-align: center;
    margin-bottom: 25px;
}

.community-title h1 {
    color: #173b32;
    font-size: 35px;
    margin-bottom: 8px;
}

.community-title p {
    color: #666;
    font-size: 15px;
}

.cards {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.card {
    height: 330px;
    position: relative;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.overlay {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 25px;
    color: white;
    background: linear-gradient(
        transparent,
        rgba(0,0,0,0.9)
    );
}

.overlay h2 {
    font-size: 26px;
    margin-bottom: 8px;
}

.overlay p {
    font-size: 13px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.btnExplore {
    display: inline-block;
    background: #39785d;
    color: white;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 25px;
    font-size: 13px;
    font-weight: bold;
}

.btnExplore:hover {
    background: #173b32;
    color: white;
}

@media (max-width: 768px) {

    .community-container {
        margin: 12px auto;
    }

    .cards {
        grid-template-columns: 1fr;
    }

    .card {
        height: 380px;
    }

    .community-title h1 {
        font-size: 30px;
    }

}

@media (max-width: 500px) {

    .community-container {
        width: 92%;
        margin: 10px auto;
    }

    .card {
        height: 350px;
    }

    .overlay {
        padding: 20px;
    }

    .overlay h2 {
        font-size: 23px;
    }

}

</style>

<div class="community-container">

<div class="community-title">

    <h1><?php echo e(t('Community Forum')); ?></h1>

    <p>
        <?php echo e(t('Ask questions and get useful advice from agricultural experts.')); ?>

    </p>

</div>

<div class="cards">

    <div class="card">

        <img src="<?php echo e(asset('images/community/crops.jpg')); ?>" alt="Crops">

        <div class="overlay">

            <h2>🌾 <?php echo e(t('Crops')); ?></h2>

            <p>
                <?php echo e(t('Ask questions about wheat, rice, cotton, sugarcane and other crops.')); ?>

            </p>

            <a href="<?php echo e(route('community.crop')); ?>" class="btnExplore">
                <?php echo e(t('Explore →')); ?>

            </a>

        </div>

    </div>

    <div class="card">

        <img src="<?php echo e(asset('images/community/fruits.jpg')); ?>" alt="Fruits">

        <div class="overlay">

            <h2>🍎 <?php echo e(t('Fruits')); ?></h2>

            <p>
                <?php echo e(t('Ask questions about mango, apple, orange, banana and other fruits.')); ?>

            </p>

            <a href="<?php echo e(route('community.fruit')); ?>" class="btnExplore">
                <?php echo e(t('Explore →')); ?>

            </a>

        </div>

    </div>

    <div class="card">

        <img src="<?php echo e(asset('images/community/vegetables.jpg')); ?>" alt="Vegetables">

        <div class="overlay">

            <h2>🥕 <?php echo e(t('Vegetables')); ?></h2>

            <p>
                <?php echo e(t('Get help about tomato, potato, onion, carrot and other vegetables.')); ?>

            </p>

            <a href="<?php echo e(route('community.vegetable')); ?>" class="btnExplore">
                <?php echo e(t('Explore →')); ?>

            </a>

        </div>

    </div>

    <div class="card">

        <img src="<?php echo e(asset('images/community/questions.webp')); ?>" alt="My Questions">

        <div class="overlay">

            <h2>📋 <?php echo e(t('My Questions')); ?></h2>

            <p>
                <?php echo e(t('See your questions, their status and replies from agricultural experts.')); ?>

            </p>

            <a href="<?php echo e(route('my.questions')); ?>" class="btnExplore">
                <?php echo e(t('View →')); ?>

            </a>

        </div>

    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/user/community.blade.php ENDPATH**/ ?>