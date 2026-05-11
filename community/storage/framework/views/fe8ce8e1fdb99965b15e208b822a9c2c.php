<?php $__env->startSection('content'); ?>

<style>

body {
    background: #f4f8f4;
}

.form-container {
    width: 90%;
    max-width: 600px;
    margin: 5px auto 25px auto;
    background: white;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,.08);
    box-sizing: border-box;
}

.form-container h1 {
    text-align: center;
    color: #1b5e20;
    margin: 0 0 20px 0;
    font-size: 26px;
}

.form-group {
    margin-bottom: 14px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
    font-size: 14px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 9px 11px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    font-size: 14px;
    background: white;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: #2e7d32;
    box-shadow: 0 0 4px rgba(46,125,50,.2);
}

.form-group input[type="file"] {
    padding: 7px;
}

.btn {
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    display: inline-block;
}

.save {
    background: #2e7d32;
    color: white;
}

.save:hover {
    background: #1b5e20;
}

.back {
    background: #777;
    color: white;
    text-decoration: none;
    margin-left: 8px;
}

.back:hover {
    background: #555;
}

.error {
    background: #f8d7da;
    color: #721c24;
    padding: 10px 12px;
    border-radius: 6px;
    margin-bottom: 15px;
    font-size: 13px;
}

.error ul {
    margin: 0;
    padding-left: 20px;
}

@media (max-width: 700px) {

    .form-container {
        width: 94%;
        padding: 20px;
        margin: 5px auto 20px auto;
    }

    .form-container h1 {
        font-size: 23px;
    }

    .btn {
        padding: 9px 15px;
    }

}

</style>


<div class="form-container">

    <h1>
        🌱 <?php echo e(t('Add New Crop')); ?>

    </h1>


    <?php if($errors->any()): ?>

        <div class="error">

            <ul>

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li>
                        <?php echo e($error); ?>

                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        </div>

    <?php endif; ?>


    <form
        action="<?php echo e(route('admin.crop.store')); ?>"
        method="POST"
        enctype="multipart/form-data"
    >

        <?php echo csrf_field(); ?>


        <div class="form-group">

            <label>
                <?php echo e(t('Crop Image')); ?>

            </label>

            <input
                type="file"
                name="image"
                accept="image/*"
                required
            >

        </div>


        <div class="form-group">

            <label>
                <?php echo e(t('Crop Name')); ?>

            </label>

            <input
                type="text"
                name="name"
                placeholder="<?php echo e(t('Example: Mango')); ?>"
                value="<?php echo e(old('name')); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>
                <?php echo e(t('Category')); ?>

            </label>

            <select
                name="category"
                required
            >

                <option value="">
                    <?php echo e(t('Select Category')); ?>

                </option>

                <option
                    value="fruit"
                    <?php echo e(old('category') == 'fruit' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Fruit')); ?>

                </option>

                <option
                    value="vegetable"
                    <?php echo e(old('category') == 'vegetable' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Vegetable')); ?>

                </option>

                <option
                    value="grain"
                    <?php echo e(old('category') == 'grain' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Grain')); ?>

                </option>

            </select>

        </div>


        <div class="form-group">

            <label>
                <?php echo e(t('Season')); ?>

            </label>

            <select
                name="season"
                required
            >

                <option value="">
                    <?php echo e(t('Select Season')); ?>

                </option>

                <option
                    value="summer"
                    <?php echo e(old('season') == 'summer' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Summer')); ?>

                </option>

                <option
                    value="winter"
                    <?php echo e(old('season') == 'winter' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Winter')); ?>

                </option>

            </select>

        </div>


        <div class="form-group">

            <label>
                <?php echo e(t('Type')); ?>

            </label>

            <select
                name="type"
            >

                <option value="">
                    <?php echo e(t('Select Type')); ?>

                </option>

                <option
                    value="indoor"
                    <?php echo e(old('type') == 'indoor' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Indoor')); ?>

                </option>

                <option
                    value="outdoor"
                    <?php echo e(old('type') == 'outdoor' ? 'selected' : ''); ?>

                >
                    <?php echo e(t('Outdoor')); ?>

                </option>

            </select>

        </div>


        <div>

            <button
                type="submit"
                class="btn save"
            >
                💾 <?php echo e(t('Save Crop')); ?>

            </button>


            <a
                href="<?php echo e(route('admin.crops')); ?>"
                class="btn back"
            >
                <?php echo e(t('Back')); ?>

            </a>

        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/admin/add_crop.blade.php ENDPATH**/ ?>