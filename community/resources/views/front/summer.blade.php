@extends('layouts.app')

@section('title', (t('Summer Crops')) . ' | GrowSmart')

@push('styles')

<style>
    .summer-page {
        width: 100%;
    }

    .crop-page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 18px;
        margin-bottom: 22px;
        padding: 18px 22px;
        border-radius: 16px;
        background: linear-gradient(135deg, #edf8f0 0%, #ffffff 100%);
        border: 1px solid #dce9df;
        box-shadow: 0 5px 16px rgba(23, 59, 50, 0.06);
    }

    .header-content {
        max-width: 700px;
    }

    .crop-page-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        margin-bottom: 7px;
        border-radius: 30px;
        background: #dff2e3;
        color: #2e7d32;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .crop-page-title {
        color: #173b32;
        font-size: 28px;
        font-weight: 750;
        margin: 0 0 6px;
        line-height: 1.2;
    }

    .crop-page-subtitle {
        color: #687870;
        font-size: 14px;
        line-height: 1.5;
        margin: 0;
    }

    .season-icon {
        width: 62px;
        height: 62px;
        flex-shrink: 0;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #66bb6a, #2e7d32);
        color: #ffffff;
        font-size: 28px;
        box-shadow: 0 7px 17px rgba(46, 125, 50, 0.22);
    }

    .crop-data-wrapper {
        border: 1px solid #dce5df;
        border-radius: 18px;
        background: #ffffff;
        padding: 18px;
        box-shadow: 0 7px 23px rgba(23, 59, 50, 0.07);
    }

    .crop-card-link {
        display: block;
        height: 100%;
        text-decoration: none;
        color: inherit;
    }

    .crop-card {
        width: 100%;
        height: 100%;
        min-height: 295px;
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border: 1px solid #e3eae5;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .crop-card:hover {
        transform: translateY(-6px);
        border-color: #91b99a;
        box-shadow: 0 15px 34px rgba(23, 59, 50, 0.14);
    }

    .crop-image-wrapper {
        height: 200px;
        overflow: hidden;
        position: relative;
        background: #edf3ee;
    }

    .crop-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.5s ease;
    }

    .crop-card:hover img {
        transform: scale(1.07);
    }

    .image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0) 50%,
            rgba(0, 0, 0, 0.22) 100%
        );
        pointer-events: none;
    }

    .crop-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.94);
        color: #2e7d32;
        font-size: 10px;
        font-weight: 700;
        box-shadow: 0 4px 11px rgba(0, 0, 0, 0.12);
        backdrop-filter: blur(5px);
    }

    .crop-card-arrow {
        position: absolute;
        right: 10px;
        bottom: 10px;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.95);
        color: #2e7d32;
        font-size: 16px;
        box-shadow: 0 5px 13px rgba(0, 0, 0, 0.15);
        opacity: 0;
        transform: translateX(8px);
        transition: all 0.3s ease;
    }

    .crop-card:hover .crop-card-arrow {
        opacity: 1;
        transform: translateX(0);
    }

    .card-info {
        padding: 14px 14px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background: #ffffff;
    }

    .crop-title {
        font-weight: 700;
        font-size: 16px;
        color: #173b32;
        line-height: 1.3;
    }

    .crop-type {
        display: inline-block;
        margin-top: 6px;
        padding: 4px 9px;
        border-radius: 20px;
        background: #f0f6f1;
        color: #718078;
        font-size: 10px;
        font-weight: 600;
    }

    .empty-state {
        padding: 50px 20px;
        text-align: center;
        border-radius: 15px;
        background: #f8fbf9;
        border: 1px dashed #cbdacf;
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 14px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e7f3e9;
        color: #4b8b55;
        font-size: 28px;
    }

    .empty-state h5 {
        color: #263d32;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .empty-state p {
        color: #7a8881;
        margin: 0;
        font-size: 13px;
    }

    @media (max-width: 992px) {
        .crop-page-header {
            padding: 18px 20px;
        }

        .crop-page-title {
            font-size: 26px;
        }

        .crop-image-wrapper {
            height: 180px;
        }

        .crop-card {
            min-height: 270px;
        }
    }

    @media (max-width: 768px) {
        .crop-page-header {
            align-items: center;
            padding: 17px;
        }

        .crop-page-title {
            font-size: 23px;
        }

        .crop-page-subtitle {
            font-size: 13px;
        }

        .season-icon {
            width: 54px;
            height: 54px;
            font-size: 24px;
            border-radius: 14px;
        }

        .crop-data-wrapper {
            padding: 11px;
            border-radius: 15px;
        }

        .crop-image-wrapper {
            height: 155px;
        }

        .crop-card {
            min-height: 235px;
            border-radius: 14px;
        }

        .card-info {
            padding: 12px 9px;
        }

        .crop-title {
            font-size: 14px;
        }

        .crop-card-arrow {
            width: 33px;
            height: 33px;
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .crop-page-header {
            padding: 15px;
            margin-bottom: 18px;
        }

        .crop-page-label {
            font-size: 9px;
            padding: 4px 8px;
        }

        .crop-page-title {
            font-size: 21px;
        }

        .crop-page-subtitle {
            font-size: 12px;
            line-height: 1.45;
        }

        .season-icon {
            width: 46px;
            height: 46px;
            font-size: 20px;
            border-radius: 12px;
        }

        .crop-data-wrapper {
            padding: 8px;
        }

        .crop-image-wrapper {
            height: 135px;
        }

        .crop-card {
            min-height: 205px;
            border-radius: 12px;
        }

        .card-info {
            padding: 9px 6px;
        }

        .crop-title {
            font-size: 12px;
        }

        .crop-type {
            font-size: 9px;
            padding: 3px 7px;
        }

        .crop-badge {
            top: 7px;
            left: 7px;
            font-size: 8px;
            padding: 4px 7px;
        }

        .crop-card-arrow {
            display: none;
        }
    }
</style>

@endpush

@section('content')

<div class="summer-page">

<div class="crop-page-header">

    <div class="header-content">

        <div class="crop-page-label">
            <i class="bi bi-sun-fill"></i>
            {{ t('Summer Season') }}
        </div>

        <h1 class="crop-page-title">
            {{ t('Summer Crops') }}
        </h1>

        <p class="crop-page-subtitle">
            {{ t('Discover crops suitable for the summer season and explore detailed information about their cultivation and management.') }}
        </p>

    </div>

    <div class="season-icon">
        <i class="bi bi-brightness-high-fill"></i>
    </div>

</div>

<div class="crop-data-wrapper">

    <div class="row g-3">

        @forelse($summerCrops as $crop)

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6">

                <a
                    href="{{ route('crop.show', $crop->id) }}"
                    class="crop-card-link"
                >

                    <div class="crop-card">

                        <div class="crop-image-wrapper">

                            <img
                                src="{{ asset('images/' . $crop->image) }}"
                                alt="{{ local_text($crop, 'name') }}"
                                loading="lazy"
                            >

                            <div class="image-overlay"></div>

                            <div class="crop-badge">
                                <i class="bi bi-sun me-1"></i>
                                {{ t('Summer') }}
                            </div>

                            <div class="crop-card-arrow">
                                <i class="bi bi-arrow-up-right"></i>
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
                        <i class="bi bi-flower1"></i>
                    </div>

                    <h5>
                        No {{ t('Summer Crops') }} Available
                    </h5>

                    <p>
                        {{ t('There are currently no summer crops available. Please check back later.') }}
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

</div>

@endsection
