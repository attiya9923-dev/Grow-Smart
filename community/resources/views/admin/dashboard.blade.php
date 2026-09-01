@extends('layouts.app')

@section('content')

<style>
    .admin-users-wrap { max-width:1250px; margin:25px auto; }
    .admin-users-header { display:flex; justify-content:space-between; align-items:center; gap:15px; margin-bottom:20px; }
    .admin-users-header h2 { margin:0; color:#173b32; font-size:28px; }
    .add-expert-btn { border:0; border-radius:9px; padding:9px 15px; background:#2e7d32; color:#fff; font-weight:700; cursor:pointer; font-size:14px; }
    .add-expert-btn:hover { background:#1b5e20; }
    .add-expert-modal { display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,.55); align-items:center; justify-content:center; padding:15px; }
    .add-expert-modal.show { display:flex; }
    .add-expert-box { width:100%; max-width:500px; background:#fff; border-radius:16px; padding:22px; box-shadow:0 20px 60px rgba(0,0,0,.25); }
    .add-expert-box h4 { color:#173b32; margin-bottom:17px; font-size:20px; }
    .add-expert-actions { display:flex; justify-content:flex-end; gap:8px; margin-top:17px; }
    .password-field-wrap { position:relative; }
    .password-field-wrap .form-control { padding-right:45px; }
    .password-eye { position:absolute; right:8px; top:50%; transform:translateY(-50%); border:0; background:transparent; color:#5f6b66; cursor:pointer; font-size:17px; padding:4px; }
    .password-eye:hover { color:#2e7d32; }
    .add-expert-actions button { border:0; border-radius:7px; padding:8px 15px; cursor:pointer; font-size:14px; }
    .cancel-add { background:#e9ecef; color:#333; }
    .save-add { background:#2e7d32; color:white; }
    .role-badge { min-width:58px; display:inline-block; text-align:center; }
    .actions-cell { width:1%; min-width:0; white-space:nowrap; }
    .users-table th, .users-table td { white-space:nowrap; }
    .users-table .btn { font-size:12px; padding:5px 8px; margin:2px 1px; }
    @media(max-width:700px) {
        .admin-users-wrap { margin:15px auto; padding:0 8px; }
        .admin-users-header { flex-direction:row; align-items:center; gap:8px; margin-bottom:14px; }
        .admin-users-header h2 { font-size:19px; line-height:1.25; }
        .add-expert-btn { padding:7px 10px; font-size:12px; white-space:nowrap; border-radius:7px; }
        .table-responsive { overflow-x:auto; -webkit-overflow-scrolling:touch; border-radius:8px; }
        .users-table { min-width:700px; margin-bottom:0; font-size:12px; }
        .users-table th, .users-table td { padding:7px 8px; vertical-align:middle; }
        .users-table .btn { display:inline-block; width:auto; min-width:0; font-size:10px; padding:5px 7px; margin:1px; line-height:1.2; }
        .actions-cell { width:auto; min-width:0; white-space:nowrap !important; }
        .role-badge { min-width:50px; font-size:10px; padding:4px 6px; }
        .add-expert-modal { padding:10px; }
        .add-expert-box { max-width:100%; padding:18px 15px; border-radius:13px; max-height:92vh; overflow-y:auto; }
        .add-expert-box h4 { font-size:18px; margin-bottom:14px; }
        .add-expert-box .mb-3 { margin-bottom:12px !important; }
        .add-expert-box .form-control, .add-expert-box .form-select { min-height:38px; font-size:14px; padding-top:7px; padding-bottom:7px; }
        .add-expert-actions { margin-top:14px; }
        .add-expert-actions button { padding:7px 13px; font-size:13px; }
    }
    @media(max-width:400px) {
        .admin-users-wrap { padding:0 5px; }
        .admin-users-header h2 { font-size:17px; }
        .add-expert-btn { padding:6px 8px; font-size:11px; }
        .users-table { min-width:680px; }
    }
</style>

<div class="container admin-users-wrap">

    <div class="admin-users-header">
        <h2>{{ t('All Registered Users') }}</h2>
        <button type="button" class="add-expert-btn" id="openAddExpert">
            ➕ {{ t('Add Expert') }}
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle users-table">
            <thead>
                <tr>
                    <th>{{ t('ID') }}</th>
                    <th>{{ t('Name') }}</th>
                    <th>{{ t('Email') }}</th>
                    <th>{{ t('Role') }}</th>
                    <th>{{ t('Status') }}</th>
                    <th>{{ t('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="badge bg-primary role-badge">{{ t('Admin') }}</span>
                        @elseif($user->is_expert)
                            <span class="badge bg-success role-badge">{{ t('Expert') }}</span>
                        @else
                            <span class="badge bg-secondary role-badge">{{ t('User') }}</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_active)
                            <span class="text-success">{{ t('Active') }}</span>
                        @else
                            <span class="text-danger">{{ t('Inactive') }}</span>
                        @endif
                    </td>
                    <td class="actions-cell">
                        @if(!$user->is_admin)
                            <form action="{{ route('admin.makeAdmin') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button class="btn btn-primary btn-sm">{{ t('Make Admin') }}</button>
                            </form>
                        @endif

                        @if(!$user->is_expert)
                            <form action="{{ route('admin.makeExpert') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button class="btn btn-success btn-sm">{{ t('Make Expert') }}</button>
                            </form>
                        @endif

                        @if($user->is_admin || $user->is_expert)
                            <form action="{{ route('admin.makeUser') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button class="btn btn-secondary btn-sm">{{ t('Make User') }}</button>
                            </form>
                        @endif

                        <form action="{{ route('admin.toggleActive') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button class="btn btn-warning btn-sm">
                                {{ $user->is_active ? (t('Deactivate')) : (t('Activate')) }}
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">{{ t('No Users Found') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="add-expert-modal" id="addExpertModal">
    <div class="add-expert-box">
        <h4>➕ {{ t('Add Expert / Account') }}</h4>

        <form action="{{ route('admin.addExpert') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">{{ t('Name') }}</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ t('Email') }}</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ t('Password') }}</label>
                <div class="password-field-wrap">
                    <input type="password" name="password" id="adminAddPassword" class="form-control" required>
                    <button type="button" class="password-eye" onclick="toggleAdminPassword('adminAddPassword', this)" aria-label="Show password"><i class="bi bi-eye"></i></button>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ t('Confirm Password') }}</label>
                <div class="password-field-wrap">
                    <input type="password" name="password_confirmation" id="adminAddPasswordConfirmation" class="form-control" required>
                    <button type="button" class="password-eye" onclick="toggleAdminPassword('adminAddPasswordConfirmation', this)" aria-label="Show password"><i class="bi bi-eye"></i></button>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">{{ t('Select Role') }}</label>
                <select name="role" class="form-select" required>
                    <option value="expert" {{ old('role','expert') === 'expert' ? 'selected' : '' }}>
                        {{ t('Expert') }}
                    </option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                        {{ t('Admin') }}
                    </option>
                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>
                        {{ t('User') }}
                    </option>
                </select>
            </div>

            <div class="add-expert-actions">
                <button type="button" class="cancel-add" id="closeAddExpert">
                    {{ t('Cancel') }}
                </button>
                <button type="submit" class="save-add">
                    {{ t('Add') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function toggleAdminPassword(id, button) {
    const input = document.getElementById(id);
    const icon = button.querySelector('i');
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
        button.setAttribute('aria-label', 'Hide password');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
        button.setAttribute('aria-label', 'Show password');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addExpertModal');
    const open = document.getElementById('openAddExpert');
    const close = document.getElementById('closeAddExpert');

    open.addEventListener('click', () => modal.classList.add('show'));
    close.addEventListener('click', () => modal.classList.remove('show'));

    modal.addEventListener('click', (event) => {
        if (event.target === modal) modal.classList.remove('show');
    });

    @if($errors->any())
        modal.classList.add('show');
    @endif
});
</script>

@endsection
