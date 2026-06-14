@extends('layouts.app')

@section('title', 'Pest Management | GrowSmart')

@push('styles')
<style>
    .pest-page {
        padding-bottom: 25px;
    }

    .pest-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--dark-green), var(--green));
        border-radius: 17px;
        padding: 24px 28px;
        margin-bottom: 24px;
        box-shadow: 0 10px 26px rgba(23, 59, 50, 0.13);
    }

    .pest-hero::before {
        content: "";
        position: absolute;
        width: 195px;
        height: 195px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -98px;
        right: -40px;
    }

    .pest-hero::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(176,138,75,0.12);
        bottom: -65px;
        left: 25%;
    }

    .pest-hero-content {
        position: relative;
        z-index: 2;
    }

    .pest-hero-icon {
        width: 46px;
        height: 46px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.16);
        color: white;
        font-size: 21px;
        margin-bottom: 11px;
    }

    .pest-hero h1 {
        color: white;
        font-size: 27px;
        font-weight: 800;
        margin: 0 0 6px;
    }

    .pest-hero p {
        color: #c8d9d1;
        font-size: 13px;
        line-height: 1.55;
        margin: 0;
        max-width: 650px;
    }

    .crop-section {
        margin-bottom: 27px;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 13px;
    }

    .section-title-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-icon {
        width: 39px;
        height: 39px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: var(--very-light-green);
        color: var(--green);
        font-size: 18px;
    }

    .section-title {
        color: var(--dark-green);
        font-size: 19px;
        font-weight: 700;
        margin: 0;
    }

    .section-description {
        color: var(--gray);
        font-size: 11px;
        margin: 3px 0 0;
    }

    .crop-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 11px;
        border-radius: 20px;
        background: var(--soft-green);
        border: 1px solid var(--border);
        color: var(--green);
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .crop-data-wrapper {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 17px;
        padding: 17px;
        box-shadow: var(--card-shadow);
    }

    .crop-card-link {
        display: block;
        height: 100%;
        text-decoration: none;
        color: inherit;
    }

    .crop-card {
        position: relative;
        width: 100%;
        height: 295px;
        overflow: hidden;
        border-radius: 15px;
        background: var(--white);
        border: 1px solid #e3e9e5;
        display: flex;
        flex-direction: column;
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .crop-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--hover-shadow);
        border-color: #9db5a8;
    }

    .crop-image-wrapper {
        position: relative;
        width: 100%;
        height: 185px;
        overflow: hidden;
        background: var(--soft-green);
    }

    .crop-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.45s ease;
    }

    .crop-card:hover .crop-image-wrapper img {
        transform: scale(1.07);
    }

    .crop-image-wrapper::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(0,0,0,0.22),
            transparent 55%
        );
        pointer-events: none;
    }

    .crop-type-badge {
        position: absolute;
        top: 11px;
        left: 11px;
        z-index: 2;
        padding: 5px 9px;
        border-radius: 20px;
        background: rgba(255,255,255,0.93);
        color: var(--dark-green);
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        box-shadow: 0 3px 9px rgba(0,0,0,0.10);
        backdrop-filter: blur(5px);
    }

    .card-arrow {
        position: absolute;
        right: 11px;
        bottom: 11px;
        z-index: 2;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(23,59,50,0.92);
        color: white;
        font-size: 14px;
        opacity: 0;
        transform: translateY(5px);
        transition: all 0.3s ease;
    }

    .crop-card:hover .card-arrow {
        opacity: 1;
        transform: translateY(0);
    }

    .card-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 12px 14px;
    }

    .crop-title {
        width: 100%;
        color: var(--dark-green);
        font-size: 15px;
        font-weight: 700;
        line-height: 1.35;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .crop-type {
        color: var(--gray);
        font-size: 11px;
        margin-top: 4px;
    }

    .empty-state {
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
        font-size: 27px;
    }

    .empty-state h5 {
        color: var(--dark-green);
        font-size: 17px;
        font-weight: 700;
        margin: 15px 0 6px;
    }

    .empty-state p {
        color: var(--gray);
        font-size: 12px;
        margin: 0;
    }

    @media (max-width: 992px) {
        .pest-hero {
            padding: 22px 24px;
        }

        .pest-hero h1 {
            font-size: 25px;
        }

        .crop-card {
            height: 280px;
        }

        .crop-image-wrapper {
            height: 178px;
        }
    }

    @media (max-width: 768px) {
        .pest-hero {
            border-radius: 16px;
            padding: 21px 18px;
            margin-bottom: 20px;
        }

        .pest-hero-icon {
            width: 43px;
            height: 43px;
            font-size: 20px;
        }

        .pest-hero h1 {
            font-size: 23px;
        }

        .pest-hero p {
            font-size: 11px;
        }

        .crop-data-wrapper {
            padding: 11px;
        }

        .section-header {
            align-items: flex-start;
        }

        .section-title {
            font-size: 17px;
        }

        .section-description {
            font-size: 10px;
        }

        .crop-count {
            font-size: 9px;
            padding: 5px 8px;
        }

        .crop-card {
            height: 265px;
        }

        .crop-image-wrapper {
            height: 165px;
        }

        .crop-title {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .pest-hero {
            padding: 19px 14px;
        }

        .pest-hero h1 {
            font-size: 21px;
        }

        .pest-hero p {
            font-size: 10px;
        }

        .crop-data-wrapper {
            padding: 8px;
        }

        .section-icon {
            width: 36px;
            height: 36px;
            font-size: 16px;
        }

        .section-title {
            font-size: 15px;
        }

        .crop-count {
            display: none;
        }

        .crop-card {
            height: 235px;
            border-radius: 13px;
        }

        .crop-image-wrapper {
            height: 142px;
        }

        .crop-title {
            font-size: 12px;
        }

        .crop-type {
            font-size: 9px;
        }

        .card-info {
            padding: 9px;
        }
    }

    @media (max-width: 400px) {
        .crop-card {
            height: 220px;
        }

        .crop-image-wrapper {
            height: 132px;
        }

        .crop-title {
            font-size: 11px;
        }

        .crop-type {
            font-size: 8px;
        }
    }
</style>
@endpush

@section('content')

<div class="pest-page">

    <div class="pest-hero">
        <div class="pest-hero-content">

            <div class="pest-hero-icon">
                <i class="bi bi-bug-fill"></i>
            </div>

            <h1>
                {{ t('Pest Management') }}
            </h1>

            <p>
                {{ t('Explore pest management information for seasonal crops, including common crop pests and agricultural protection guidance.') }}
            </p>

        </div>
    </div>

    <div class="crop-section">

        <div class="section-header">

            <div class="section-title-wrapper">

                <div class="section-icon">
                    <i class="bi bi-sun-fill"></i>
                </div>

                <div>
                    <h2 class="section-title">
                        {{ t('Summer Crops') }}
                    </h2>

                    <p class="section-description">
                        {{ t('Pest management information for warm-season crops.') }}
                    </p>
                </div>

            </div>

            <div class="crop-count">
                <i class="bi bi-flower1"></i>
                {{ $summerCrops->count() }} {{ t('Crops') }}
            </div>

        </div>

        <div class="crop-data-wrapper">

            <div class="row g-3">

                @forelse($summerCrops as $crop)

                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">

                        <a href="{{ route('crop.pest', $crop->id) }}" class="crop-card-link">

                            <div class="crop-card">

                                <div class="crop-image-wrapper">

                                    @if($crop->type)
                                        <div class="crop-type-badge">
                                            {{ local_text($crop, 'type') }}
                                        </div>
                                    @endif

                                    <img
                                        src="{{ asset('images/' . $crop->image) }}"
                                        alt="{{ local_text($crop, 'name') }}"
                                    >

                                    <div class="card-arrow">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>

                                </div>

                                <div class="card-info">

                                    <div class="crop-title">
                                        {{ local_text($crop, 'name') }}
                                    </div>

                                    @if($crop->type)
                                        <div class="crop-type">
                                            {{ local_text($crop, 'type') }}
                                        </div>
                                    @endif

                                </div>

                            </div>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-sun"></i>
                            </div>

                            <h5>
                                {{ t('No Summer Crops Found') }}
                            </h5>

                            <p>
                                {{ t('There are currently no summer crops available.') }}
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

    <div class="crop-section">

        <div class="section-header">

            <div class="section-title-wrapper">

                <div class="section-icon">
                    <i class="bi bi-snow"></i>
                </div>

                <div>
                    <h2 class="section-title">
                        {{ t('Winter Crops') }}
                    </h2>

                    <p class="section-description">
                        {{ t('Pest management information for cool-season crops.') }}
                    </p>
                </div>

            </div>

            <div class="crop-count">
                <i class="bi bi-flower1"></i>
                {{ $winterCrops->count() }} {{ t('Crops') }}
            </div>

        </div>

        <div class="crop-data-wrapper">

            <div class="row g-3">

                @forelse($winterCrops as $crop)

                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">

                        <a href="{{ route('crop.pest', $crop->id) }}" class="crop-card-link">

                            <div class="crop-card">

                                <div class="crop-image-wrapper">

                                    @if($crop->type)
                                        <div class="crop-type-badge">
                                            {{ local_text($crop, 'type') }}
                                        </div>
                                    @endif

                                    <img
                                        src="{{ asset('images/' . $crop->image) }}"
                                        alt="{{ local_text($crop, 'name') }}"
                                    >

                                    <div class="card-arrow">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>

                                </div>

                                <div class="card-info">

                                    <div class="crop-title">
                                        {{ local_text($crop, 'name') }}
                                    </div>

                                    @if($crop->type)
                                        <div class="crop-type">
                                            {{ local_text($crop, 'type') }}
                                        </div>
                                    @endif

                                </div>

                            </div>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty-state">

                            <div class="empty-icon">
                                <i class="bi bi-snow"></i>
                            </div>

                            <h5>
                                {{ t('No Winter Crops Found') }}
                            </h5>

                            <p>
                                {{ t('There are currently no winter crops available.') }}
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection