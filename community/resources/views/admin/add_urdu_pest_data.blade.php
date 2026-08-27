@extends('layouts.app')

@section('content')

@php
    $cropList = $pests
        ->pluck('crop')
        ->filter()
        ->unique('id')
        ->sortBy('name')
        ->values();
@endphp

<div class="container pt-1 pb-4" dir="rtl">

    <div class="urdu-pest-form">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h3 class="text-center mb-4">
                    اردو کیڑے کا ڈیٹا شامل کریں / اپ ڈیٹ کریں
                </h3>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('admin.pest.urdu.data.store') }}"
                >
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            فصل منتخب کریں
                        </label>

                        <select
                            id="crop_id"
                            class="form-select"
                            onchange="loadPests(this.value)"
                        >
                            <option value="">
                                فصل منتخب کریں
                            </option>

                            @foreach($cropList as $crop)
                                <option value="{{ $crop->id }}">
                                    {{ $crop->name_ur ?: $crop->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            کیڑا منتخب کریں
                        </label>

                        <select
                            name="pest_id"
                            id="pest_id"
                            class="form-select"
                            onchange="loadPest(this.value)"
                            required
                        >
                            <option value="">
                                پہلے فصل منتخب کریں
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            کیڑے کا نام
                        </label>

                        <input
                            type="text"
                            name="name_ur"
                            id="name_ur"
                            class="form-control"
                            value="{{ old('name_ur', $selected->name_ur ?? '') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            قسم
                        </label>

                        <input
                            type="text"
                            name="type_ur"
                            id="type_ur"
                            class="form-control"
                            value="{{ old('type_ur', $selected->type_ur ?? '') }}"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            یہ کیسے پیدا ہوتا ہے
                        </label>

                        <textarea
                            name="how_it_occurs_ur"
                            id="how_it_occurs_ur"
                            class="form-control"
                            rows="4"
                            required
                        >{{ old('how_it_occurs_ur', $selected->how_it_occurs_ur ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            علامات
                        </label>

                        <textarea
                            name="symptoms_ur"
                            id="symptoms_ur"
                            class="form-control"
                            rows="4"
                            required
                        >{{ old('symptoms_ur', $selected->symptoms_ur ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            بچاؤ
                        </label>

                        <textarea
                            name="protection_ur"
                            id="protection_ur"
                            class="form-control"
                            rows="4"
                            required
                        >{{ old('protection_ur', $selected->protection_ur ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            تجویز کردہ کنٹرول
                        </label>

                        <textarea
                            name="recommended_control_ur"
                            id="recommended_control_ur"
                            class="form-control"
                            rows="4"
                            required
                        >{{ old('recommended_control_ur', $selected->recommended_control_ur ?? '') }}</textarea>
                    </div>

                    <div class="d-flex gap-2 flex-wrap">

                        <button
                            type="submit"
                            id="saveButton"
                            class="btn btn-success"
                        >
                            اردو کیڑے کا ڈیٹا محفوظ کریں
                        </button>

                        <button
                            type="button"
                            id="deleteButton"
                            class="btn btn-danger"
                            style="display:none;"
                            onclick="deletePest()"
                        >
                            کیڑا حذف کریں
                        </button>

                        <a
                            href="{{ route('admin.crops') }}"
                            class="btn btn-secondary"
                        >
                            واپس جائیں
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

<div class="delete-modal" id="deleteModal">
    <div class="delete-modal-box">

        <h3>
            کیڑا حذف کریں
        </h3>

        <p>
            کیا آپ واقعی اس کیڑے کو حذف کرنا چاہتے ہیں؟
        </p>

        <div class="delete-modal-buttons">

            <button
                type="button"
                class="modal-btn no-delete"
                onclick="closeDeleteModal()"
            >
                نہیں
            </button>

            <button
                type="button"
                class="modal-btn yes-delete"
                onclick="confirmDeletePest()"
            >
                ہاں
            </button>

        </div>

    </div>
</div>

<style>

.container[dir="rtl"] {
    direction: rtl;
    text-align: right;
}

.urdu-pest-form {
    width: 70%;
    margin: 0 auto;
}

.urdu-pest-form .form-label {
    display: block;
    text-align: right;
}

.urdu-pest-form .form-control,
.urdu-pest-form .form-select {
    direction: rtl;
    text-align: right;
}

.urdu-pest-form textarea {
    direction: rtl;
    text-align: right;
}

.urdu-pest-form input {
    direction: rtl;
    text-align: right;
}

.urdu-pest-form .text-center {
    text-align: center !important;
}

.urdu-pest-form .alert {
    text-align: right;
}

.delete-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.delete-modal-box {
    width: 400px;
    max-width: 90%;
    background: white;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

.delete-modal-box h3 {
    margin-bottom: 15px;
    color: #dc3545;
}

.delete-modal-box p {
    margin-bottom: 25px;
    font-size: 16px;
}

.delete-modal-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
}

.modal-btn {
    border: none;
    padding: 9px 28px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 15px;
}

.no-delete {
    background: #6c757d;
    color: white;
}

.yes-delete {
    background: #dc3545;
    color: white;
}

.no-delete:hover {
    background: #5a6268;
}

.yes-delete:hover {
    background: #bb2d3b;
}

@media (max-width: 992px) {

    .urdu-pest-form {
        width: 85%;
    }

}

@media (max-width: 768px) {

    .urdu-pest-form {
        width: 100%;
    }

}

</style>

@endsection

@push('scripts')

<script>

const pests = @json($pests->values());

const cropSelect = document.getElementById('crop_id');
const pestSelect = document.getElementById('pest_id');

const nameInput = document.getElementById('name_ur');
const typeInput = document.getElementById('type_ur');
const howInput = document.getElementById('how_it_occurs_ur');
const symptomsInput = document.getElementById('symptoms_ur');
const protectionInput = document.getElementById('protection_ur');
const controlInput = document.getElementById('recommended_control_ur');

const saveButton = document.getElementById('saveButton');
const deleteButton = document.getElementById('deleteButton');
const deleteModal = document.getElementById('deleteModal');

function clearData()
{
    nameInput.value = '';
    typeInput.value = '';
    howInput.value = '';
    symptomsInput.value = '';
    protectionInput.value = '';
    controlInput.value = '';

    saveButton.innerText =
        'اردو کیڑے کا ڈیٹا محفوظ کریں';

    deleteButton.style.display =
        'none';
}

function loadPests(cropId)
{
    pestSelect.innerHTML = '';

    const firstOption =
        document.createElement('option');

    firstOption.value = '';

    firstOption.textContent =
        'کیڑا منتخب کریں';

    pestSelect.appendChild(firstOption);

    clearData();

    if (!cropId) {
        return;
    }

    pests.forEach(function(pest) {

        if (
            String(pest.crop_id) ===
            String(cropId)
        ) {

            const option =
                document.createElement('option');

            option.value =
                pest.id;

            option.textContent =
                pest.name_ur ||
                pest.name ||
                'کیڑا ' + pest.id;

            pestSelect.appendChild(option);
        }

    });
}

function loadPest(pestId)
{
    if (!pestId) {
        clearData();
        return;
    }

    const pest =
        pests.find(function(item) {

            return String(item.id) ===
                String(pestId);

        });

    if (!pest) {
        clearData();
        return;
    }

    nameInput.value =
        pest.name_ur || '';

    typeInput.value =
        pest.type_ur || '';

    howInput.value =
        pest.how_it_occurs_ur || '';

    symptomsInput.value =
        pest.symptoms_ur || '';

    protectionInput.value =
        pest.protection_ur || '';

    controlInput.value =
        pest.recommended_control_ur || '';

    saveButton.innerText =
        'اردو کیڑے کا ڈیٹا اپ ڈیٹ کریں';

    deleteButton.style.display =
        'inline-block';
}

function deletePest()
{
    const pestId =
        pestSelect.value;

    if (!pestId) {
        return;
    }

    deleteModal.style.display =
        'flex';
}

function closeDeleteModal()
{
    deleteModal.style.display =
        'none';
}

function confirmDeletePest()
{
    const pestId =
        pestSelect.value;

    if (!pestId) {
        closeDeleteModal();
        return;
    }

    const form =
        document.createElement('form');

    form.method = 'POST';

    form.action =
        '{{ url('/admin/crops/pest') }}/' +
        pestId;

    const csrf =
        document.createElement('input');

    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';

    form.appendChild(csrf);

    const method =
        document.createElement('input');

    method.type = 'hidden';
    method.name = '_method';
    method.value = 'DELETE';

    form.appendChild(method);

    document.body.appendChild(form);

    form.submit();
}

deleteModal.addEventListener('click', function(event)
{
    if (event.target === deleteModal) {
        closeDeleteModal();
    }
});

document.addEventListener('keydown', function(event)
{
    if (event.key === 'Escape') {
        closeDeleteModal();
    }
});

@if(isset($selected) && $selected)

cropSelect.value =
    '{{ $selected->crop_id }}';

loadPests(
    '{{ $selected->crop_id }}'
);

pestSelect.value =
    '{{ $selected->id }}';

loadPest(
    '{{ $selected->id }}'
);

@endif

</script>

@endpush