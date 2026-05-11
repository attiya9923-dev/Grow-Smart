<?php $__env->startSection('content'); ?>
<style>
.form-container{width:92%;max-width:850px;margin:10px auto 30px;background:#fff;padding:24px;border-radius:14px;box-shadow:0 4px 18px rgba(0,0,0,.08)}
.form-container h1{text-align:center;color:#1b5e20;margin:0 0 7px;font-size:26px}.note{text-align:center;color:#666;font-size:13px;margin-bottom:20px}
.form-group{margin-bottom:13px}.form-container{direction:rtl}.form-group label{display:block;font-weight:700;color:#333;font-size:14px;margin-bottom:6px}.form-group input,.form-group select,.form-group textarea{width:100%;padding:10px 11px;border:1px solid #ccc;border-radius:7px;box-sizing:border-box;font-family:inherit;font-size:14px}.form-group textarea{min-height:105px;resize:vertical;line-height:1.7}.urdu{direction:rtl;text-align:right;font-family:"Noto Nastaliq Urdu",Tahoma,Arial,sans-serif}.btn{padding:10px 17px;border:0;border-radius:7px;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}.save{background:#2e7d32;color:#fff}.back{background:#777;color:#fff;margin-left:7px}.error{background:#f8d7da;color:#721c24;padding:10px;border-radius:7px;margin-bottom:15px}.error ul{margin:0;padding-left:20px}.section-title{margin:20px 0 12px;padding:10px 12px;border-radius:8px;background:#e8f5e9;color:#1b5e20;font-weight:800}.help{font-size:11px;color:#777;margin-top:3px}
</style>

<div class="form-container" dir="rtl">
    <h1>🇵🇰 <?php echo e(trans('Add or Update Urdu Crop Data', [], 'ur')); ?></h1>
    <div class="note"><?php echo e(trans('English crop data is stored separately. Urdu content is shown on the Urdu website only after all Urdu fields are saved.', [], 'ur')); ?></div>

    <?php if($errors->any()): ?><div class="error"><ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div><?php endif; ?>

    <form action="<?php echo e(route('admin.crop.urdu.data.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label><?php echo e(trans('Select Crop', [], 'ur')); ?></label>
            <select dir="rtl" name="crop_id" id="crop_id" required onchange="loadCropUrdu(this.value)">
                <option value=""><?php echo e(trans('Select Crop', [], 'ur')); ?></option>
                <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($crop->id); ?>" <?php echo e(old('crop_id', $selectedCropId) == $crop->id ? 'selected' : ''); ?>><?php echo e($crop->name_ur ?: trans('Urdu name not added', [], 'ur')); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div id="urdu-fields">
            <?php
                $fields = [
                    'introduction_ur' => trans('Introduction', [], 'ur'),
                    'basic_information_ur' => trans('Basic Information', [], 'ur'),
                    'sowing_season_ur' => trans('Sowing Season', [], 'ur'),
                    'harvesting_season_ur' => trans('Harvesting Season', [], 'ur'),
                    'climate_requirements_ur' => trans('Climate Requirements', [], 'ur'),
                    'soil_requirements_ur' => trans('Soil Requirements', [], 'ur'),
                    'land_preparation_ur' => trans('Land Preparation', [], 'ur'),
                    'seed_selection_ur' => trans('Seed Selection', [], 'ur'),
                    'seed_rate_ur' => trans('Seed Rate', [], 'ur'),
                    'irrigation_requirements_ur' => trans('Irrigation Requirements', [], 'ur'),
                    'fertilizer_requirements_ur' => trans('Fertilizer Requirements', [], 'ur'),
                    'growing_stages_ur' => trans('Growing Stages', [], 'ur'),
                    'types_of_crop_ur' => trans('Types of Crop', [], 'ur'),
                    'crop_varieties_ur' => trans('Crop Varieties', [], 'ur'),
                    'nutritional_value_ur' => trans('Nutritional Value', [], 'ur'),
                    'importance_of_crop_ur' => trans('Importance of Crop', [], 'ur'),
                ];
                $selected = $crops->firstWhere('id', old('crop_id', $selectedCropId));
            ?>

            <div class="form-group">
                <label><?php echo e(trans('Urdu Crop Name', [], 'ur')); ?></label>
                <input class="urdu" type="text" name="name_ur" value="<?php echo e(old('name_ur', $selected?->name_ur)); ?>" placeholder="<?php echo e(trans('Example: Mango', [], 'ur')); ?>" required>
            </div>

            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <label><?php echo e($label); ?></label>
                    <textarea class="urdu" name="<?php echo e($field); ?>" required><?php echo e(old($field, $selected?->cropDetail?->{$field})); ?></textarea>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <button type="submit" class="btn save">💾 <?php echo e(trans('Save Urdu Crop Data', [], 'ur')); ?></button>
        <a href="<?php echo e(route('admin.crops')); ?>" class="btn back"><?php echo e(trans('Go Back', [], 'ur')); ?></a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
const cropUrduData = <?php echo json_encode($crops->map(function($crop) use ($fields) {
    $data = ['name_ur' => $crop->name_ur];
    foreach (array_keys($fields) as $field) $data[$field] = $crop->cropDetail?->{$field};
    return ['id' => $crop->id, 'data' => $data];
})->values(), 512) ?>;

function loadCropUrdu(id) {
    const item = cropUrduData.find(x => String(x.id) === String(id));
    if (!item) return;
    Object.entries(item.data).forEach(([field, value]) => {
        const el = document.querySelector(`[name="${field}"]`);
        if (el) el.value = value || '';
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/admin/add_urdu_crop_data.blade.php ENDPATH**/ ?>