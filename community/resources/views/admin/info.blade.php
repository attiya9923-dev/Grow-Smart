@extends('layouts.app')

@section('content')

<style>

body {
    background: #f4f8f4;
    font-family: Arial, sans-serif;
}

.admin-dashboard {
    width: 90%;
    max-width: 950px;
    margin: 10px auto 35px;
}

.header {
    text-align: center;
    margin-bottom: 25px;
}

.header h1 {
    color: #1b5e20;
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 5px;
}

.header p {
    color: #66736b;
    font-size: 15px;
    margin-bottom: 0;
}

.menu {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
    align-items: stretch;
}

.card {
    background: #ffffff;
    text-decoration: none;
    padding: 35px 28px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 4px 18px rgba(23, 59, 50, 0.07);
    border: 1px solid #e1ebe3;
    transition: all 0.25s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 270px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 26px rgba(23, 59, 50, 0.13);
    border-color: #2e7d32;
    background: #fbfffb;
}

.icon {
    width: 72px;
    height: 72px;
    border-radius: 16px;
    background: #eaf4ec;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 39px;
    margin-bottom: 17px;
}

.card h2 {
    color: #1b5e20;
    font-size: 23px;
    font-weight: 700;
    margin-bottom: 10px;
}

.card p {
    color: #737d77;
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
    max-width: 360px;
}

.success {
    background: #d4edda;
    color: #155724;
    padding: 11px 14px;
    border-radius: 8px;
    margin-bottom: 18px;
    text-align: center;
    font-size: 14px;
}

@media (max-width: 700px) {

    .admin-dashboard {
        width: 94%;
        margin: 6px auto 25px;
    }

    .header {
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 30px;
    }

    .header p {
        font-size: 14px;
    }

    .menu {
        grid-template-columns: repeat(2, 1fr);
        gap: 17px;
    }

    .card {
        min-height: 245px;
        padding: 30px 18px;
    }

    .icon {
        width: 64px;
        height: 64px;
        font-size: 34px;
        margin-bottom: 14px;
    }

    .card h2 {
        font-size: 20px;
    }

    .card p {
        font-size: 13px;
        line-height: 1.5;
    }

}

@media (max-width: 480px) {

    .menu {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .card {
        min-height: 225px;
        padding: 30px 20px;
    }

    .icon {
        width: 62px;
        height: 62px;
        font-size: 33px;
        margin-bottom: 13px;
    }

    .card h2 {
        font-size: 20px;
    }

    .card p {
        font-size: 13px;
        line-height: 1.55;
    }

}

</style>

<div class="admin-dashboard">

    <div class="header">

        <h1>{{ t('Admin Dashboard') }}</h1>

        <p>
            {{ t('Manage users, questions and crop information') }}
        </p>

    </div>

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <div class="menu">

        <a
            href="{{ route('admin.dashboard') }}"
            class="card"
        >

            <div class="icon">
                👥
            </div>

            <h2>
                {{ t('All Users') }}
            </h2>

            <p>
                {{ t('View and manage all registered users.') }}
            </p>

        </a>

        <a
            href="{{ route('admin.questions') }}"
            class="card"
        >

            <div class="icon">
                📋
            </div>

            <h2>
                {{ t('User Questions') }}
            </h2>

            <p>
                {{ t('View, review and manage questions submitted by users.') }}
            </p>

        </a>

        <a
            href="{{ route('admin.crops') }}"
            class="card"
        >

            <div class="icon">
                🌱
            </div>

            <h2>
                {{ t('Manage Crops') }}
            </h2>

            <p>
                {{ t('Add crops, crop information, pest information and delete crops.') }}
            </p>

        </a>

        <a
            href="{{ route('expert.users') }}"
            class="card"
        >

            <div class="icon">
                👨‍🌾
            </div>

            <h2>
                {{ t('Expert Panel') }}
            </h2>

            <p>
                {{ t('View and manage the expert panel and expert information.') }}
            </p>

        </a>

    </div>

</div>

@endsection