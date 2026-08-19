@extends('layouts.app')

@section('title', trans(':crop Pest Management | GrowSmart', ['crop' => local_text($crop, 'name')]))

@push('styles')

<style>
    .pest-detail-page {
        padding-bottom: 28px;
    }

    .pest-detail-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--dark-green), var(--green));
        border-radius: 18px;
        padding: 23px 25px;
        margin-bottom: 22px;
        box-shadow: 0 9px 24px rgba(23, 59, 50, 0.14);
    }

    .pest-detail-hero::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        top: -95px;
        right: -40px;
    }

    .pest-detail-hero::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(176, 138, 75, 0.12);
        bottom: -65px;
        left: 30%;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 17px;
    }

    .crop-image {
        width: 78px;
        height: 78px;
        flex-shrink: 0;
        border-radius: 14px;
        object-fit: cover;
        border: 2px solid rgba(255,255,255,0.35);
        box-shadow: 0 6px 16px rgba(0,0,0,0.18);
    }

    .hero-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.16);
        color: white;
        font-size: 21px;
        margin-bottom: 8px;
    }

    .hero-text h1 {
        color: white;
        font-size: 25px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .hero-text p {
        color: #c8d9d1;
        font-size: 12px;
        margin: 0;
        line-height: 1.5;
        max-width: 650px;
    }

    .pest-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
        padding: 5px 10px;
        border-radius: 18px;
        background: rgba(255,255,255,0.12);
        color: white;
        border: 1px solid rgba(255,255,255,0.15);
        font-size: 10px;
        font-weight: 700;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 13px;
    }

    .section-icon {
        width: 39px;
        height: 39px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: var(--very-light-green);
        color: var(--green);
        font-size: 18px;
    }

    .section-heading h2 {
        color: var(--dark-green);
        font-size: 18px;
        font-weight: 700;
        margin: 0;
    }

    .section-heading p {
        color: var(--gray);
        font-size: 10px;
        margin: 2px 0 0;
    }

    .pest-card {
        height: 100%;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .pest-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--hover-shadow);
        border-color: #9db5a8;
    }

    .pest-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 14px 16px;
        background: linear-gradient(
            135deg,
            var(--soft-green),
            var(--very-light-green)
        );
        border-bottom: 1px solid var(--border);
    }

    .pest-name {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--dark-green);
        font-size: 15px;
        font-weight: 750;
    }

    .pest-name-icon {
        width: 32px;
        height: 32px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: var(--green);
        color: white;
        font-size: 14px;
    }

    .pest-type {
        padding: 5px 8px;
        border-radius: 18px;
        background: white;
        color: var(--green);
        border: 1px solid var(--border);
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        white-space: nowrap;
    }

    .pest-card-body {
        padding: 16px;
    }

    .info-item {
        margin-bottom: 15px;
    }

    .info-item:last-child {
        margin-bottom: 0;
    }

    .info-title {
        display: flex;
        align-items: center;
        gap: 7px;
        color: var(--dark-green);
        font-size: 11px;
        font-weight: 750;
        margin-bottom: 5px;
    }

    .info-title i {
        color: var(--green);
        font-size: 14px;
    }

    .info-text {
        color: #5d6963;
        font-size: 12px;
        line-height: 1.6;
        margin: 0;
    }

    .control-box {
        margin-top: 16px;
        padding: 12px;
        border-radius: 11px;
        background: #f1f8e9;
        border-left: 4px solid var(--green);
    }

    .control-box .info-title {
        margin-bottom: 5px;
    }

    .empty-state {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 15px;
        box-shadow: var(--card-shadow);
        text-align: center;
        padding: 50px 20px;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        background: var(--soft-green);
        color: var(--green);
        font-size: 26px;
    }

    .empty-state h4 {
        color: var(--dark-green);
        font-size: 17px;
        font-weight: 700;
        margin: 14px 0 6px;
    }

    .empty-state p {
        color: var(--gray);
        font-size: 12px;
        margin: 0;
    }

    @media (max-width: 768px) {
        .pest-detail-hero {
            padding: 20px 17px;
            border-radius: 16px;
        }

        .hero-content {
            align-items: flex-start;
            gap: 13px;
        }

        .crop-image {
            width: 68px;
            height: 68px;
            border-radius: 12px;
        }

        .hero-icon {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .hero-text h1 {
            font-size: 21px;
        }

        .hero-text p {
            font-size: 11px;
        }

        .section-heading h2 {
            font-size: 17px;
        }

        .pest-card-header {
            padding: 13px;
        }

        .pest-card-body {
            padding: 14px;
        }

        .pest-name {
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .pest-detail-hero {
            padding: 18px 14px;
        }

        .hero-content {
            display: block;
        }

        .crop-image {
            width: 72px;
            height: 72px;
            margin-bottom: 10px;
        }

        .hero-text h1 {
            font-size: 19px;
        }

        .hero-text p {
            font-size: 10px;
        }

        .pest-count {
            font-size: 9px;
        }

        .section-heading {
            align-items: flex-start;
        }

        .section-icon {
            width: 35px;
            height: 35px;
            font-size: 16px;
        }

        .section-heading h2 {
            font-size: 15px;
        }

        .section-heading p {
            font-size: 9px;
        }

        .pest-card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .pest-type {
            font-size: 8px;
        }

        .info-text {
            font-size: 11px;
        }
    }
</style>

@endpush

@section('content')

<div>

<div class="pest-detail-page">

<div class="pest-detail-hero">

    <div class="hero-content">

        <img
            src="{{ asset('images/' . $crop->image) }}"
            alt="{{ local_text($crop, 'name') }}"
            class="crop-image"
        >

        <div class="hero-text">

            <div class="hero-icon">
                <i class="bi bi-bug-fill"></i>
            </div>

            <h1>
                {{ local_text($crop, 'name') }} {{ t('Pest Management') }}
            </h1>

            <p>
                {{ trans('Learn about common pests affecting :crop, their symptoms, prevention methods and recommended control measures.', ['crop' => local_text($crop, 'name')]) }}
            </p>

            <div class="pest-count">
                <i class="bi bi-bug"></i>
                {{ $crop->pestManagements->count() }} {{ t('Pest Information') }}
            </div>

        </div>

    </div>

</div>

<div class="section-heading">

    <div class="section-icon">
        <i class="bi bi-shield-check"></i>
    </div>

    <div>
        <h2>
            {{ t('Pest Information') }}
        </h2>

        <p>
            {{ trans('Identification, prevention and recommended control methods for :crop.', ['crop' => local_text($crop, 'name')]) }}
        </p>
    </div>

</div>

@forelse($crop->pestManagements as $pest)

    <div class="pest-card mb-3">

        <div class="pest-card-header">

            <div class="pest-name">

                <div class="pest-name-icon">
                    <i class="bi bi-bug-fill"></i>
                </div>

                <span>
                    {{ local_text($pest, 'name') }}
                </span>

            </div>

            @if($pest->type)

                <div class="pest-type">
                    {{ local_text($pest, 'type') }}
                </div>

            @endif

        </div>

        <div class="pest-card-body">

            <div class="row g-3">

                <div class="col-lg-6">

                    <div class="info-item">

                        <div class="info-title">
                            <i class="bi bi-arrow-repeat"></i>
                            {{ t('How It Occurs') }}
                        </div>

                        <p class="info-text">
                            {{ local_text($pest, 'how_it_occurs') }}
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="info-item">

                        <div class="info-title">
                            <i class="bi bi-exclamation-triangle"></i>
                            {{ t('Symptoms') }}
                        </div>

                        <p class="info-text">
                            {{ local_text($pest, 'symptoms') }}
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="info-item">

                        <div class="info-title">
                            <i class="bi bi-shield-check"></i>
                            {{ t('Protection') }}
                        </div>

                        <p class="info-text">
                            {{ local_text($pest, 'protection') }}
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="control-box">

                        <div class="info-title">
                            <i class="bi bi-check-circle-fill"></i>
                            {{ t('Recommended Control') }}
                        </div>

                        <p class="info-text">
                            {{ local_text($pest, 'recommended_control') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@empty

    <div class="empty-state">

        <div class="empty-icon">
            <i class="bi bi-shield-check"></i>
        </div>

        <h4>
            {{ t('No Pest Information Available') }}
        </h4>

        <p>
            {{ trans('There is currently no pest management information available for :crop.', ['crop' => local_text($crop, 'name')]) }}
        </p>

    </div>

@endforelse

</div>

</div>
@endsection
