@extends('layouts.app')

@section('title', (t('Vegetables')) . ' | GrowSmart')

@push('styles')
<style>
    .vegetable-page {
        padding-bottom: 35px;
    }

    .crop-hero {
        position: relative;
        padding: 19px 25px;
        margin-bottom: 20px;
        border-radius: 17px;
        background: linear-gradient(
            135deg,
            #eef8f1 0%,
            #f8fcf9 55%,
            #ffffff 100%
        );
        border: 1px solid #dce9df;
        overflow: hidden;
    }

    .crop-hero::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        right: -50px;
        top: -60px;
        border-radius: 50%;
        background: rgba(74, 125, 91, 0.08);
    }

    .crop-hero-content {
        position: relative;
        z-index: 2;
    }

    .crop-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 5px 11px;
        margin-bottom: 8px;
        border-radius: 30px;
        background: #ffffff;
        color: #477653;
        border: 1px solid #d6e6da;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.2px;
    }

    .crop-page-title {
        color: var(--dark-green);
        font-size: 26px;
        font-weight: 800;
        margin: 0 0 5px;
        letter-spacing: -0.5px;
    }

    .crop-page-subtitle {
        color: var(--gray);
        font-size: 12px;
        margin: 0;
        max-width: 600px;
        line-height: 1.6;
    }

    .crop-data-wrapper {
        border: 1px solid var(--border);
        border-radius: 17px;
        background: var(--white);
        padding: 17px;
        box-shadow: 0 6px 24px rgba(23, 59, 50, 0.07);
    }

    .crop-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf1ee;
    }

    .crop-section-title {
        margin: 0;
        color: var(--dark-green);
        font-size: 16px;
        font-weight: 700;
    }

    .crop-section-text {
        margin: 3px 0 0;
        color: var(--gray);
        font-size: 10px;
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
        min-height: 305px;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border: 1px solid #e5ebe7;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .crop-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 32px rgba(23, 59, 50, 0.14);
        border-color: #a9c3af;
    }

    .crop-image-wrapper {
        height: 205px;
        overflow: hidden;
        position: relative;
        background: #eef4ef;
    }

    .crop-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.45s ease;
    }

    .crop-card:hover img {
        transform: scale(1.07);
    }

    .crop-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0) 55%,
            rgba(0, 0, 0, 0.22) 100%
        );
        pointer-events: none;
    }

    .crop-view-badge {
        position: absolute;
        right: 11px;
        bottom: 11px;
        padding: 5px 9px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.94);
        color: #356044;
        font-size: 10px;
        font-weight: 700;
        opacity: 0;
        transform: translateY(8px);
        transition: all 0.3s ease;
    }

    .crop-card:hover .crop-view-badge {
        opacity: 1;
        transform: translateY(0);
    }

    .card-info {
        padding: 12px 14px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 92px;
        background: #ffffff;
    }

    .crop-title {
        font-weight: 700;
        font-size: 15px;
        color: var(--dark-green);
        line-height: 1.35;
    }

    .crop-type {
        display: inline-block;
        color: #64806f;
        background: #f0f6f2;
        border: 1px solid #dfebe2;
        font-size: 9px;
        font-weight: 600;
        margin-top: 6px;
        padding: 4px 8px;
        border-radius: 20px;
    }

    .empty-state {
        padding: 50px 20px;
        border-radius: 15px;
        background: #f8fbf9;
        border: 1px dashed #cbdacf;
    }

    .empty-state-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #e9f3ec;
        color: #568264;
        font-size: 27px;
    }

    .empty-state h5 {
        color: var(--dark-green);
        font-weight: 700;
        margin-bottom: 7px;
    }

    .empty-state p {
        color: var(--gray);
        font-size: 12px;
        margin: 0;
    }

    .vegetable-crop-row {
        display: flex;
        flex-wrap: wrap;
    }

    .vegetable-crop-row > [class*="col-"] {
        display: flex;
    }

    .vegetable-page[dir="rtl"] .vegetable-crop-row {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1.3rem;
        direction: rtl;
    }

    .vegetable-page[dir="rtl"] .vegetable-crop-row > [class*="col-"] {
        width: 100%;
        max-width: 100%;
        padding: 0;
        display: flex;
    }

    .vegetable-page[dir="rtl"] .crop-card-link {
        width: 100%;
    }

    .vegetable-page[dir="rtl"] .crop-view-badge {
        right: auto;
        left: 11px;
    }

    @media (max-width: 1199px) {
        .vegetable-page[dir="rtl"] .vegetable-crop-row {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 992px) {
        .crop-hero {
            padding: 19px 23px;
        }

        .crop-page-title {
            font-size: 25px;
        }

        .crop-card {
            min-height: 290px;
        }

        .crop-image-wrapper {
            height: 195px;
        }

        .vegetable-page[dir="rtl"] .vegetable-crop-row {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .vegetable-page {
            padding-bottom: 25px;
        }

        .crop-hero {
            padding: 18px;
            margin-bottom: 17px;
            border-radius: 15px;
        }

        .crop-page-title {
            font-size: 23px;
        }

        .crop-page-subtitle {
            font-size: 11px;
        }

        .crop-data-wrapper {
            padding: 12px;
            border-radius: 15px;
        }

        .crop-section-header {
            margin-bottom: 12px;
        }

        .crop-section-title {
            font-size: 15px;
        }

        .crop-card {
            min-height: 260px;
            border-radius: 13px;
        }

        .crop-image-wrapper {
            height: 172px;
        }

        .card-info {
            min-height: 88px;
            padding: 10px;
        }

        .crop-title {
            font-size: 13px;
        }

        .vegetable-page[dir="rtl"] .vegetable-crop-row {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .crop-hero {
            padding: 16px;
        }

        .crop-badge {
            font-size: 9px;
            padding: 5px 8px;
        }

        .crop-page-title {
            font-size: 20px;
        }

        .crop-page-subtitle {
            font-size: 10px;
            line-height: 1.5;
        }

        .crop-data-wrapper {
            padding: 8px;
        }

        .crop-section-header {
            display: block;
        }

        .crop-section-title {
            font-size: 13px;
        }

        .crop-section-text {
            font-size: 9px;
        }

        .crop-card {
            min-height: 220px;
            border-radius: 12px;
        }

        .crop-image-wrapper {
            height: 145px;
        }

        .card-info {
            min-height: 75px;
            padding: 7px;
        }

        .crop-title {
            font-size: 11px;
        }

        .crop-type {
            font-size: 8px;
            padding: 3px 7px;
            margin-top: 4px;
        }

        .crop-view-badge {
            display: none;
        }

        .empty-state {
            padding: 38px 15px;
        }

        .vegetable-page[dir="rtl"] .vegetable-crop-row {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.65rem;
        }
    }
</style>
@endpush

@section('content')

<div class="vegetable-page" dir="{{ is_urdu() ? 'rtl' : 'ltr' }}">

    <div class="crop-hero">

        <div class="crop-hero-content">

            <div class="crop-badge">
                <i class="bi bi-flower1"></i>
                {{ t('Vegetable Collection') }}
            </div>

            <h1 class="crop-page-title">
                {{ t('Vegetables') }}
            </h1>

            <p class="crop-page-subtitle">
                {{ t('Explore a variety of vegetables and discover useful agricultural information, growing details, and expert guidance for each crop.') }}
            </p>

        </div>

    </div>


        <div class="row g-4 vegetable-crop-row">

            @forelse($crops as $crop)

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

                                <div class="crop-image-overlay"></div>

                                <span class="crop-view-badge">
                                    {{ t('View Details') }}
                                </span>

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

                    <div class="empty-state text-center">

                        <div class="empty-state-icon">
                            <i class="bi bi-flower1"></i>
                        </div>

                        <h5>
                            {{ t('No Vegetables Available') }}
                        </h5>

                        <p>
                            {{ t('There are currently no vegetables available to display.') }}
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection
