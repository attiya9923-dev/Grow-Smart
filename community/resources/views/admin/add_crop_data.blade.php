@extends('layouts.app')

@section('content')

@php
$fields = [
    'introduction' => 'Introduction',
    'basic_information' => 'Basic Information',
    'sowing_season' => 'Sowing Season',
    'harvesting_season' => 'Harvesting Season',
    'climate_requirements' => 'Climate Requirements',
    'soil_requirements' => 'Soil Requirements',
    'land_preparation' => 'Land Preparation',
    'seed_selection' => 'Seed Selection',
    'seed_rate' => 'Seed Rate',
    'irrigation_requirements' => 'Irrigation Requirements',
    'fertilizer_requirements' => 'Fertilizer Requirements',
    'growing_stages' => 'Growing Stages',
    'types_of_crop' => 'Types of Crop',
    'crop_varieties' => 'Crop Varieties',
    'nutritional_value' => 'Nutritional Value',
    'importance_of_crop' => 'Importance of Crop',
];

$selected = $crops->firstWhere('id', old('crop_id', $selectedCropId));
@endphp

<style>
.form-container{width:90%;max-width:700px;margin:10px auto 30px;background:#fff;padding:24px;border-radius:14px;box-shadow:0 4px 18px rgba(0,0,0,.08)}
.form-container h1{text-align:center;color:#1b5e20;margin:0 0 18px;font-size:25px}
.form-group{margin-bottom:12px}
.form-group label{display:block;font-weight:700;color:#333;font-size:14px;margin-bottom:6px}
.form-group select,.form-group textarea{width:100%;padding:9px 11px;border:1px solid #ccc;border-radius:7px;box-sizing:border-box;font-family:inherit;font-size:14px}
.form-group select{height:40px}
.form-group textarea{min-height:90px;resize:vertical;line-height:1.5}
.form-group select:focus,.form-group textarea:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 4px rgba(46,125,50,.18)}
.btn{padding:9px 17px;border:0;border-radius:7px;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}
.save{background:#2e7d32;color:#fff}
.back{background:#777;color:#fff;margin-left:7px}
.error{background:#f8d7da;color:#721c24;padding:10px;border-radius:7px;margin-bottom:15px}.error ul{margin:0;padding-left:20px}
@media(max-width:700px){.form-container{width:94%;padding:18px}
.form-container h1{font-size:22px}}
</style>

<div class="form-container">
    <h1>📚 {{ t('Add / Update Crop Data') }}</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.crop.data.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>{{ t('Select Crop') }}</label>
            <select name="crop_id" id="crop_id" required onchange="loadCrop(this.value)">
                <option value="">{{ t('Select Crop') }}</option>
                @foreach($crops as $crop)
                    <option value="{{ $crop->id }}" {{ old('crop_id', $selectedCropId) == $crop->id ? 'selected' : '' }}>
                        {{ $crop->name }} - {{ ucfirst($crop->category) }}
                    </option>
                @endforeach
            </select>
        </div>

        @foreach($fields as $field => $label)
            <div class="form-group">
                <label>{{ t($label) }}</label>
                <textarea name="{{ $field }}" required>{{ old($field, $selected?->{$field}) }}</textarea>
            </div>
        @endforeach

        <button type="submit" class="btn save">💾 {{ t('Save Crop Data') }}</button>
        <a href="{{ route('admin.crops') }}" class="btn back">{{ t('Back') }}</a>
    </form>
</div>

@endsection

@push('scripts')
<script>
const cropData = @json($crops->map(function ($crop) use ($fields) {
    $data = [];
    foreach (array_keys($fields) as $field) {
        $data[$field] = $crop->cropDetail?->{$field};
    }
    return ['id' => $crop->id, 'data' => $data];
})->values());

function loadCrop(id) {
    const item = cropData.find(function (crop) {
        return String(crop.id) === String(id);
    });

    if (!item) {
        return;
    }

    Object.entries(item.data).forEach(function ([field, value]) {
        const element = document.querySelector('[name="' + field + '"]');

        if (element) {
            element.value = value || '';
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('crop_id');

    if (select && select.value) {
        loadCrop(select.value);
    }
});
</script>
@endpush
@extends('layouts.app')

@section('content')

@php
$fields = [
    'introduction' => 'Introduction',
    'basic_information' => 'Basic Information',
    'sowing_season' => 'Sowing Season',
    'harvesting_season' => 'Harvesting Season',
    'climate_requirements' => 'Climate Requirements',
    'soil_requirements' => 'Soil Requirements',
    'land_preparation' => 'Land Preparation',
    'seed_selection' => 'Seed Selection',
    'seed_rate' => 'Seed Rate',
    'irrigation_requirements' => 'Irrigation Requirements',
    'fertilizer_requirements' => 'Fertilizer Requirements',
    'growing_stages' => 'Growing Stages',
    'types_of_crop' => 'Types of Crop',
    'crop_varieties' => 'Crop Varieties',
    'nutritional_value' => 'Nutritional Value',
    'importance_of_crop' => 'Importance of Crop',
];

$selected = $crops->firstWhere('id', old('crop_id', $selectedCropId));
@endphp

<style>
.form-container{width:90%;max-width:700px;margin:10px auto 30px;background:#fff;padding:24px;border-radius:14px;box-shadow:0 4px 18px rgba(0,0,0,.08)}
.form-container h1{text-align:center;color:#1b5e20;margin:0 0 18px;font-size:25px}
.form-group{margin-bottom:12px}
.form-group label{display:block;font-weight:700;color:#333;font-size:14px;margin-bottom:6px}
.form-group select,.form-group textarea{width:100%;padding:9px 11px;border:1px solid #ccc;border-radius:7px;box-sizing:border-box;font-family:inherit;font-size:14px}
.form-group select{height:40px}
.form-group textarea{min-height:90px;resize:vertical;line-height:1.5}
.form-group select:focus,.form-group textarea:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 4px rgba(46,125,50,.18)}
.btn{padding:9px 17px;border:0;border-radius:7px;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}
.save{background:#2e7d32;color:#fff}
.back{background:#777;color:#fff;margin-left:7px}
.error{background:#f8d7da;color:#721c24;padding:10px;border-radius:7px;margin-bottom:15px}.error ul{margin:0;padding-left:20px}
@media(max-width:700px){.form-container{width:94%;padding:18px}
.form-container h1{font-size:22px}}
</style>

<div class="form-container">
    <h1>📚 {{ t('Add / Update Crop Data') }}</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.crop.data.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>{{ t('Select Crop') }}</label>
            <select name="crop_id" id="crop_id" required onchange="loadCrop(this.value)">
                <option value="">{{ t('Select Crop') }}</option>
                @foreach($crops as $crop)
                    <option value="{{ $crop->id }}" {{ old('crop_id', $selectedCropId) == $crop->id ? 'selected' : '' }}>
                        {{ $crop->name }} - {{ ucfirst($crop->category) }}
                    </option>
                @endforeach
            </select>
        </div>

        @foreach($fields as $field => $label)
            <div class="form-group">
                <label>{{ t($label) }}</label>
                <textarea name="{{ $field }}" required>{{ old($field, $selected?->{$field}) }}</textarea>
            </div>
        @endforeach

        <button type="submit" class="btn save">💾 {{ t('Save Crop Data') }}</button>
        <a href="{{ route('admin.crops') }}" class="btn back">{{ t('Back') }}</a>
    </form>
</div>

@endsection

@push('scripts')
<script>
const cropData = @json($crops->map(function ($crop) use ($fields) {
    $data = [];
    foreach (array_keys($fields) as $field) {
        $data[$field] = $crop->cropDetail?->{$field};
    }
    return ['id' => $crop->id, 'data' => $data];
})->values());

function loadCrop(id) {
    const item = cropData.find(function (crop) {
        return String(crop.id) === String(id);
    });

    if (!item) {
        return;
    }

    Object.entries(item.data).forEach(function ([field, value]) {
        const element = document.querySelector('[name="' + field + '"]');

        if (element) {
            element.value = value || '';
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('crop_id');

    if (select && select.value) {
        loadCrop(select.value);
    }
});
</script>
@endpush
