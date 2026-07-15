@extends('layouts.app')

@section('title', t('My Profile | GrowSmart'))

@section('content')

<div class="container py-2">

<div class="profile-card">

<div class="profile-header">
    <h2>{{ t('My Profile') }}</h2>
    <p>{{ t('Manage your GrowSmart profile picture.') }}</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<div class="profile-picture-area">

    @if(Auth::user()->profile_photo)

        <img
            src="{{ asset(Auth::user()->profile_photo) }}"
            class="profile-big-image"
            id="profilePreview"
            :alt="t('Profile Picture')"
        >

    @else

        <div class="profile-placeholder" id="profilePlaceholder">
            <i class="bi bi-person"></i>
        </div>

        <img
            src=""
            class="profile-big-image d-none"
            id="profilePreview"
            :alt="t('Profile Picture')"
        >

    @endif

</div>

<div class="text-center mt-2">

    <h4>{{ Auth::user()->name }}</h4>

    <p class="text-muted mb-2">
        {{ Auth::user()->email }}
    </p>

</div>

<form
    action="{{ route('profile.update') }}"
    method="POST"
    enctype="multipart/form-data"
    class="profile-form"
>

    @csrf

    <input
        type="file"
        name="profile_photo"
        id="galleryInput"
        accept="image/jpeg,image/png,image/jpg,image/webp"
        hidden
    >

    <input
        type="file"
        id="cameraInput"
        accept="image/jpeg,image/png,image/jpg,image/webp"
        capture="user"
        hidden
    >

    <div class="profile-buttons">

        <button
            type="button"
            class="profile-option"
            onclick="document.getElementById('galleryInput').click()"
        >
            <i class="bi bi-images"></i>
            {{ t('Gallery') }}
        </button>

        <button
            type="button"
            class="profile-option"
            onclick="document.getElementById('cameraInput').click()"
        >
            <i class="bi bi-camera"></i>
            {{ t('Camera') }}
        </button>

    </div>

    <div id="selectedFileName" class="selected-file">
        {{ t('No new image selected') }}
    </div>

    <button
        type="submit"
        class="save-profile"
    >
        <i class="bi bi-check-circle"></i>
        {{ t('Save Profile Picture') }}
    </button>

</form>

@if(Auth::user()->profile_photo)

    <form
        action="{{ route('profile.delete') }}"
        method="POST"
        class="text-center mt-2"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="remove-profile"
        >
            <i class="bi bi-trash"></i>
            {{ t('Remove Profile Picture') }}
        </button>

    </form>

@endif

</div>

</div>

@endsection

@push('styles')

<style>

.profile-card {
    max-width: 520px;
    margin: 5px auto 20px;
    background: white;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 8px 25px rgba(23, 59, 50, 0.10);
}

.profile-header {
    text-align: center;
    margin-bottom: 16px;
}

.profile-header h2 {
    color: #173b32;
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 5px;
}

.profile-header p {
    color: #718078;
    font-size: 13px;
    margin-bottom: 0;
}

.profile-picture-area {
    display: flex;
    justify-content: center;
    align-items: center;
}

.profile-big-image,
.profile-placeholder {
    width: 115px;
    height: 115px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #e6efe9;
}

.profile-placeholder {
    background: #e6efe9;
    color: #285c48;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 50px;
}

.profile-card .text-center h4 {
    font-size: 18px;
    margin-bottom: 3px;
}

.profile-card .text-center p {
    font-size: 13px;
}

.profile-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 16px;
}

.profile-option {
    border: none;
    background: #e6efe9;
    color: #173b32;
    padding: 9px 17px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 13px;
    transition: 0.2s;
}

.profile-option:hover {
    background: #d2e3d9;
    transform: translateY(-1px);
}

.selected-file {
    text-align: center;
    color: #718078;
    font-size: 12px;
    margin-top: 10px;
    min-height: 18px;
}

.save-profile {
    width: 100%;
    border: none;
    background: #285c48;
    color: white;
    padding: 10px;
    border-radius: 8px;
    margin-top: 10px;
    cursor: pointer;
    font-weight: 600;
    font-size: 13px;
    transition: 0.2s;
}

.save-profile:hover {
    background: #173b32;
}

.remove-profile {
    border: none;
    background: #f8d7da;
    color: #842029;
    padding: 8px 15px;
    border-radius: 7px;
    cursor: pointer;
    font-size: 13px;
    transition: 0.2s;
}

.remove-profile:hover {
    background: #f1bfc3;
}

.alert {
    border-radius: 8px;
    font-size: 13px;
    padding: 9px 12px;
}

@media (max-width: 576px) {

    .container.py-2 {
        padding-top: 0.25rem !important;
    }

    .profile-card {
        width: 94%;
        padding: 18px 15px;
        margin: 0 auto 15px;
    }

    .profile-header {
        margin-bottom: 14px;
    }

    .profile-header h2 {
        font-size: 21px;
    }

    .profile-header p {
        font-size: 12px;
    }

    .profile-big-image,
    .profile-placeholder {
        width: 100px;
        height: 100px;
    }

    .profile-placeholder {
        font-size: 43px;
    }

    .profile-buttons {
        gap: 8px;
        margin-top: 14px;
    }

    .profile-option {
        padding: 9px 14px;
        font-size: 12px;
    }

    .save-profile {
        padding: 9px;
        font-size: 12px;
    }

    .remove-profile {
        padding: 7px 13px;
        font-size: 12px;
    }

}

</style>

@endpush

@push('scripts')

<script>

const galleryInput = document.getElementById('galleryInput');
const cameraInput = document.getElementById('cameraInput');
const profilePreview = document.getElementById('profilePreview');
const profilePlaceholder = document.getElementById('profilePlaceholder');
const selectedFileName = document.getElementById('selectedFileName');

function showSelectedImage(file) {

    if (!file) {
        return;
    }

    if (profilePreview) {
        profilePreview.src = URL.createObjectURL(file);
        profilePreview.classList.remove('d-none');
    }

    if (profilePlaceholder) {
        profilePlaceholder.classList.add('d-none');
    }

    if (selectedFileName) {
        selectedFileName.textContent = file.name;
    }

}

if (galleryInput) {

    galleryInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        showSelectedImage(file);

    });

}

if (cameraInput) {

    cameraInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        const dataTransfer = new DataTransfer();

        dataTransfer.items.add(file);

        galleryInput.files = dataTransfer.files;

        showSelectedImage(file);

    });

}

</script>

@endpush
