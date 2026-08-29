@extends('layouts.app') 
 
@section('content') 
 
<style> 
.form-container{width:90%;
    max-width:700px;
    margin:10px auto 30px;
    background:#fff;padding:24px;border-radius:14px;box-shadow:0 4px 18px rgba(0,0,0,.08)} 
.form-container h1{text-align:center;color:#1b5e20;margin:0 0 18px;font-size:25px}
.note{text-align:center;color:#777;font-size:13px;margin-bottom:18px} 
.form-group{margin-bottom:12px}
.form-group label{display:block;font-weight:700;color:#333;font-size:14px;margin-bottom:6px}
.form-group select,.form-group input,.form-group textarea{width:100%;padding:9px 11px;border:1px solid #ccc;border-radius:7px;box-sizing:border-box;font-family:inherit;font-size:14px;background:#fff}
.form-group select,.form-group input{height:40px}
.form-group textarea{min-height:90px;resize:vertical;line-height:1.5}
.form-group select:focus,.form-group input:focus,.form-group textarea:focus{outline:none;border-color:#ef6c00;box-shadow:0 0 4px rgba(239,108,0,.18)} 
.buttons{display:flex;gap:8px;flex-wrap:wrap}
.btn{padding:9px 17px;border:0;border-radius:7px;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}
.save{background:#ef6c00;color:#fff}
.back{background:#777;color:#fff}
.delete{background:#c62828;color:#fff}
.error{background:#f8d7da;color:#721c24;padding:10px;border-radius:7px;margin-bottom:15px}
.error ul{margin:0;padding-left:20px}.empty{padding:10px;background:#f5f5f5;border-radius:7px;color:#777;font-size:13px;margin-bottom:12px}

.delete-modal{display:none;position:fixed;z-index:9999;inset:0;background:rgba(0,0,0,.45);align-items:center;justify-content:center;padding:20px}
.delete-modal-box{width:100%;max-width:380px;background:#fff;border-radius:14px;padding:24px;text-align:center;box-shadow:0 8px 30px rgba(0,0,0,.2)}
.delete-modal-box h3{margin:0 0 10px;color:#333;font-size:20px}
.delete-modal-box p{margin:0 0 20px;color:#666;font-size:14px;line-height:1.5}
.delete-modal-buttons{display:flex;justify-content:center;gap:10px}
.modal-btn{border:0;border-radius:7px;padding:9px 22px;font-size:14px;cursor:pointer}
.yes-delete{background:#c62828;color:#fff}
.no-delete{background:#777;color:#fff}

@media(max-width:700px){.form-container{width:94%;padding:18px}
.form-container h1{font-size:22px}} 
</style> 
 
@php 
$selectedCropId = old('crop_id', $selectedCropId); 
$selectedPestId = old('pest_id', $selectedPestId); 
@endphp 
 
<div class="form-container"> 
    <h1>🐛 {{ t('Add / Update Pest Data') }}</h1> 
    <div class="note">{{ t('Select a crop. You can add a new pest or select an existing pest to update it.') }}</div> 
 
    @if($errors->any()) 
        <div class="error"> 
            <ul> 
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
    @endif 
 
    <form action="{{ route('admin.pest.data.store') }}" method="POST" id="pestForm"> 
        @csrf 
        <input type="hidden" name="pest_id" id="pest_id" value="{{ $selectedPestId }}"> 
 
        <div class="form-group"> 
            <label>{{ t('Select Crop') }}</label> 
            <select name="crop_id" id="crop_id" required onchange="changeCrop(this.value)"> 
                <option value="">{{ t('Select Crop') }}</option> 
                @foreach($crops as $crop) 
                    <option value="{{ $crop->id }}" {{ $selectedCropId == $crop->id ? 'selected' : '' }}> 
                        {{ $crop->name }} - {{ ucfirst($crop->category) }} 
                    </option> 
                @endforeach 
            </select> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('Select Existing Pest') }}</label> 
            <select id="pest_select" onchange="selectPest(this.value)"> 
                <option value="">{{ t('Add New Pest') }}</option> 
            </select> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('Pest / Disease Name') }}</label> 
            <input type="text" name="name" id="name" value="{{ old('name') }}" required> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('Pest Type') }}</label> 
            <input type="text" name="type" id="type" value="{{ old('type') }}" required> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('How It Occurs') }}</label> 
            <textarea name="how_it_occurs" id="how_it_occurs" required>{{ old('how_it_occurs') }}</textarea> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('Symptoms') }}</label> 
            <textarea name="symptoms" id="symptoms" required>{{ old('symptoms') }}</textarea> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('Protection') }}</label> 
            <textarea name="protection" id="protection" required>{{ old('protection') }}</textarea> 
        </div> 
 
        <div class="form-group"> 
            <label>{{ t('Recommended Control') }}</label> 
            <textarea name="recommended_control" id="recommended_control" required>{{ old('recommended_control') }}</textarea> 
        </div> 
 
        <div class="buttons"> 
            <button type="submit" class="btn save" id="saveButton">💾 {{ t('Save Pest Data') }}</button> 
 
            <button type="button" class="btn delete" id="deleteButton" onclick="deletePest()" style="display:none;"> 
                🗑 {{ t('Delete Pest') }} 
            </button> 
 
            <a href="{{ route('admin.crops') }}" class="btn back">{{ t('Back') }}</a> 
        </div> 
    </form> 
 
    <form id="deleteForm" method="POST" style="display:none;"> 
        @csrf 
        @method('DELETE') 
    </form> 
</div>

<div class="delete-modal" id="deleteModal">
    <div class="delete-modal-box">
        <h3>{{ t('Delete Pest') }}</h3>
        <p>{{ t('Are you sure you want to delete this pest?') }}</p>
        <div class="delete-modal-buttons">
            <button type="button" class="modal-btn no-delete" onclick="closeDeleteModal()">
                {{ t('No') }}
            </button>
            <button type="button" class="modal-btn yes-delete" onclick="confirmDeletePest()">
                {{ t('Yes') }}
            </button>
        </div>
    </div>
</div>
 
@endsection 
 
@push('scripts') 
<script> 
const pests = @json($pests->values()); 
const addNewText = @json(t('Add New Pest')); 
const saveText = @json(t('Save Pest Data')); 
const updateText = @json(t('Update Pest Data')); 
const deleteConfirmText = @json(t('Are you sure you want to delete this pest?')); 
 
const oldPestId = @json($selectedPestId); 
 
function changeCrop(cropId) { 
    const select = document.getElementById('pest_select'); 
    select.innerHTML = '<option value="">' + addNewText + '</option>'; 
 
    pests.forEach(function (pest) { 
        if (String(pest.crop_id) === String(cropId)) { 
            const option = document.createElement('option'); 
            option.value = pest.id; 
            option.textContent = pest.name; 
            select.appendChild(option); 
        } 
    }); 
 
    clearFields(); 
 
    if (oldPestId) { 
        select.value = oldPestId; 
        selectPest(oldPestId); 
    } 
} 
 
function selectPest(id) { 
    const hidden = document.getElementById('pest_id'); 
    const deleteButton = document.getElementById('deleteButton'); 
    const saveButton = document.getElementById('saveButton'); 
    const pest = pests.find(function (item) { 
        return String(item.id) === String(id); 
    }); 
 
    hidden.value = id || ''; 
 
    if (!pest) { 
        clearFields(); 
        deleteButton.style.display = 'none'; 
        saveButton.innerHTML = '💾 ' + saveText; 
        return; 
    } 
 
    document.getElementById('name').value = pest.name || ''; 
    document.getElementById('type').value = pest.type || ''; 
    document.getElementById('how_it_occurs').value = pest.how_it_occurs || ''; 
    document.getElementById('symptoms').value = pest.symptoms || ''; 
    document.getElementById('protection').value = pest.protection || ''; 
    document.getElementById('recommended_control').value = pest.recommended_control || ''; 
    deleteButton.style.display = 'inline-block'; 
    saveButton.innerHTML = '💾 ' + updateText; 
} 
 
function clearFields() { 
    document.getElementById('pest_id').value = ''; 
    document.getElementById('name').value = ''; 
    document.getElementById('type').value = ''; 
    document.getElementById('how_it_occurs').value = ''; 
    document.getElementById('symptoms').value = ''; 
    document.getElementById('protection').value = ''; 
    document.getElementById('recommended_control').value = ''; 
    document.getElementById('deleteButton').style.display = 'none'; 
    document.getElementById('saveButton').innerHTML = '💾 {{ t('Save Pest Data') }}'; 
} 
 
function deletePest() { 
    const id = document.getElementById('pest_id').value; 
 
    if (!id) { 
        return; 
    } 
 
    document.getElementById('deleteModal').style.display = 'flex';
} 
 
function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function confirmDeletePest() {
    const id = document.getElementById('pest_id').value;

    if (!id) {
        closeDeleteModal();
        return;
    }

    const form = document.getElementById('deleteForm'); 
    form.action = '{{ url('/admin/crops/pest') }}/' + id; 
    form.submit(); 
}
 
document.getElementById('deleteModal').addEventListener('click', function (event) {
    if (event.target === this) {
        closeDeleteModal();
    }
});

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeDeleteModal();
    }
});

document.addEventListener('DOMContentLoaded', function () { 
    const crop = document.getElementById('crop_id'); 
 
    if (crop.value) { 
        changeCrop(crop.value); 
    } 
}); 
</script> 
@endpush