@extends('layouts.app')

@section('content')
<style>
.form-container{width:92%;max-width:850px;margin:10px auto 30px;background:#fff;padding:24px;border-radius:14px;box-shadow:0 4px 18px rgba(0,0,0,.08)}
.form-container h1{text-align:center;color:#1b5e20;margin:0 0 7px;font-size:26px}.note{text-align:center;color:#666;font-size:13px;margin-bottom:20px}
.form-group{margin-bottom:13px}.form-container{direction:rtl}.form-group label{display:block;font-weight:700;color:#333;font-size:14px;margin-bottom:6px}.form-group input,.form-group select,.form-group textarea{width:100%;padding:10px 11px;border:1px solid #ccc;border-radius:7px;box-sizing:border-box;font-family:inherit;font-size:14px}.form-group textarea{min-height:105px;resize:vertical;line-height:1.7}.urdu{direction:rtl;text-align:right;font-family:"Noto Nastaliq Urdu",Tahoma,Arial,sans-serif}.btn{padding:10px 17px;border:0;border-radius:7px;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}.save{background:#2e7d32;color:#fff}.back{background:#777;color:#fff;margin-left:7px}.error{background:#f8d7da;color:#721c24;padding:10px;border-radius:7px;margin-bottom:15px}.error ul{margin:0;padding-left:20px}.section-title{margin:20px 0 12px;padding:10px 12px;border-radius:8px;background:#e8f5e9;color:#1b5e20;font-weight:800}.help{font-size:11px;color:#777;margin-top:3px}
</style>

<div class="form-container" dir="rtl">
    <h1>🇵🇰 {{ trans('Add or Update Urdu Crop Data', [], 'ur') }}</h1>
    <div class="note">{{ trans('English crop data is stored separately. Urdu content is shown on the Urdu website only after all Urdu fields are saved.', [], 'ur') }}</div>

    @if($errors->any())<div class="error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

    <form action="{{ route('admin.crop.urdu.data.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>{{ trans('Select Crop', [], 'ur') }}</label>
            <select dir="rtl" name="crop_id" id="crop_id" required onchange="loadCropUrdu(this.value)">
                <option value="">{{ trans('Select Crop', [], 'ur') }}</option>
                @foreach($crops as $crop)
                    <option value="{{ $crop->id }}" {{ old('crop_id', $selectedCropId) == $crop->id ? 'selected' : '' }}>{{ $crop->name_ur ?: trans('Urdu name not added', [], 'ur') }}</option>
                @endforeach
            </select>
        </div>

        <div id="urdu-fields">
            @php
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
            @endphp

            <div class="form-group">
                <label>{{ trans('Urdu Crop Name', [], 'ur') }}</label>
                <input class="urdu" type="text" name="name_ur" value="{{ old('name_ur', $selected?->name_ur) }}" placeholder="{{ trans('Example: Mango', [], 'ur') }}" required>
            </div>

            @foreach($fields as $field => $label)
                <div class="form-group">
                    <label>{{ $label }}</label>
                    <textarea class="urdu" name="{{ $field }}" required>{{ old($field, $selected?->cropDetail?->{$field}) }}</textarea>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn save">💾 {{ trans('Save Urdu Crop Data', [], 'ur') }}</button>
        <a href="{{ route('admin.crops') }}" class="btn back">{{ trans('Go Back', [], 'ur') }}</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
const cropUrduData = @json($crops->map(function($crop) use ($fields) {
    $data = ['name_ur' => $crop->name_ur];
    foreach (array_keys($fields) as $field) $data[$field] = $crop->cropDetail?->{$field};
    return ['id' => $crop->id, 'data' => $data];
})->values());

function loadCropUrdu(id) {
    const item = cropUrduData.find(x => String(x.id) === String(id));
    if (!item) return;
    Object.entries(item.data).forEach(([field, value]) => {
        const el = document.querySelector(`[name="${field}"]`);
        if (el) el.value = value || '';
    });
}
</script>
@endpush
