<?php $__env->startSection('title', 'Weather Info - GrowSmart'); ?>

<?php $__env->startPush('styles'); ?>

<style>
.weather-page {
    padding-bottom: 25px;
}

.weather-header {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--dark-green), var(--green));
    border-radius: 17px;
    padding: 22px 24px;
    margin-bottom: 20px;
    box-shadow: 0 9px 24px rgba(23, 59, 50, 0.14);
}

.weather-header::before {
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    border-radius: 50%;
    background: rgba(255,255,255,0.06);
    top: -100px;
    right: -40px;
}

.weather-header::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(176,138,75,0.12);
    bottom: -65px;
    left: 25%;
}

.weather-header-content {
    position: relative;
    z-index: 2;
}

.weather-header-icon {
    width: 43px;
    height: 43px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: rgba(255,255,255,0.12);
    color: white;
    font-size: 20px;
    margin-bottom: 9px;
}

.weather-header h1 {
    color: white;
    font-size: 25px;
    font-weight: 800;
    margin: 0 0 5px;
}

.weather-header p {
    color: #c8d9d1;
    font-size: 12px;
    margin: 0;
    max-width: 650px;
    line-height: 1.5;
}

.location-box {
    background: white;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 35px 22px;
    text-align: center;
    box-shadow: var(--card-shadow);
}

.location-icon {
    width: 65px;
    height: 65px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--soft-green);
    color: var(--green);
    border-radius: 18px;
    font-size: 28px;
}

.location-box h4 {
    color: var(--dark-green);
    font-weight: 700;
    font-size: 17px;
    margin-top: 15px;
}

.location-box p {
    color: var(--gray);
    font-size: 12px;
    margin-bottom: 18px;
}

.location-btn {
    display: block;
    width: fit-content;
    margin: 0 auto;
    border: none;
    background: var(--green);
    color: white;
    padding: 10px 19px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
}

.location-btn:hover {
    background: var(--dark-green);
    transform: translateY(-2px);
}

.weather-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #173b32, #39785d);
    border-radius: 17px;
    color: white;
    padding: 24px;
    margin-bottom: 20px;
    box-shadow: 0 9px 24px rgba(23,59,50,0.16);
}

.weather-location {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 10px;
}

.temperature {
    font-size: 56px;
    font-weight: 300;
    line-height: 1;
}

.weather-description {
    font-size: 13px;
    color: #d7e5df;
    margin-top: 4px;
}

.weather-main-icon {
    width: 75px;
    height: 75px;
    object-fit: contain;
}

.weather-details {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.weather-stat {
    background: rgba(255,255,255,0.10);
    border: 1px solid rgba(255,255,255,0.10);
    border-radius: 12px;
    padding: 12px;
}

.weather-stat-label {
    color: #c8d9d1;
    font-size: 10px;
    margin-bottom: 4px;
}

.weather-stat-value {
    color: white;
    font-size: 15px;
    font-weight: 700;
}

.section-heading {
    display: flex;
    align-items: center;
    gap: 9px;
    margin: 20px 0 12px;
}

.section-heading-icon {
    width: 37px;
    height: 37px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: var(--very-light-green);
    color: var(--green);
}

.section-heading h3 {
    margin: 0;
    color: var(--dark-green);
    font-size: 18px;
    font-weight: 700;
}

.section-heading p {
    margin: 2px 0 0;
    color: var(--gray);
    font-size: 10px;
}

.forecast-card {
    height: 100%;
    background: white;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 15px 9px;
    text-align: center;
    box-shadow: var(--card-shadow);
    transition: 0.25s;
}

.forecast-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--hover-shadow);
}

.forecast-day {
    color: var(--dark-green);
    font-size: 12px;
    font-weight: 700;
}

.forecast-icon img {
    width: 48px;
    height: 48px;
    margin: 6px 0;
}

.forecast-temp {
    color: var(--dark-green);
    font-size: 15px;
    font-weight: 700;
}

.forecast-temp span {
    color: var(--gray);
    font-size: 12px;
    font-weight: 400;
}

.forecast-desc {
    color: var(--gray);
    font-size: 10px;
    margin-top: 4px;
    min-height: 28px;
}

.forecast-info {
    color: var(--gray);
    font-size: 10px;
    margin-top: 8px;
}

.tips-section {
    background: linear-gradient(135deg, #f1f8e9, #f8fcf5);
    border: 1px solid #d8e8d7;
    border-radius: 16px;
    padding: 18px;
    margin-top: 20px;
}

.tips-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--dark-green);
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 12px;
}

.tip-item {
    background: white;
    border-radius: 10px;
    padding: 11px 14px;
    margin-bottom: 8px;
    color: #444;
    font-size: 12px;
    border-left: 4px solid var(--green);
    box-shadow: 0 2px 7px rgba(0,0,0,0.04);
}

.tip-item:last-child {
    margin-bottom: 0;
}

.refresh-wrapper {
    text-align: center;
    margin-top: 18px;
}

#locationError {
    display: none;
    color: #dc3545;
    font-size: 12px;
    margin-top: 12px;
}

.loading-box {
    text-align: center;
    padding: 35px 18px;
}

.loading-box .spinner-border {
    color: var(--green);
}

@media (max-width: 768px) {
    .weather-header {
        padding: 20px 18px;
        border-radius: 16px;
    }

    .weather-header h1 {
        font-size: 22px;
    }

    .weather-header p {
        font-size: 11px;
    }

    .weather-hero {
        padding: 20px;
    }

    .temperature {
        font-size: 48px;
    }

    .weather-details {
        margin-top: 17px;
    }

    .section-heading h3 {
        font-size: 17px;
    }
}

@media (max-width: 576px) {
    .weather-header {
        padding: 18px 14px;
    }

    .weather-header h1 {
        font-size: 20px;
    }

    .weather-header-icon {
        width: 40px;
        height: 40px;
        font-size: 18px;
    }

    .location-box {
        padding: 30px 16px;
    }

    .weather-hero {
        padding: 18px;
    }

    .temperature {
        font-size: 42px;
    }

    .weather-main-icon {
        width: 60px;
        height: 60px;
    }

    .weather-stat {
        padding: 10px;
    }

    .weather-stat-value {
        font-size: 14px;
    }

    .forecast-card {
        padding: 12px 6px;
    }
}
</style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="weather-page">

<div class="weather-header">
    <div class="weather-header-content">

        <div class="weather-header-icon">
            <i class="bi bi-cloud-sun-fill"></i>
        </div>

        <h1><?php echo e(t('Weather Info')); ?></h1>

        <p>
            <?php echo e(t('Check the current weather and forecast for your area. Use this information to plan your farming activities.')); ?>

        </p>

    </div>
</div>

<div id="loadingSection">

    <div class="location-box">

        <div class="location-icon">
            <i class="bi bi-geo-alt-fill"></i>
        </div>

        <h4><?php echo e(t('Weather Permission Required')); ?></h4>

        <p>
            <?php echo e(t('Allow your location to see the current weather in your area.')); ?>

        </p>

        <button class="location-btn" onclick="getLocation()">
            <i class="bi bi-geo-alt me-2"></i>
            <?php echo e(t('Show Weather Using Location')); ?>

        </button>

        <div id="locationError"></div>

    </div>

</div>

<div id="weatherSection" style="display:none;">

    <div class="weather-hero">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="weather-location">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span id="cityName">—</span>
                </div>

                <div class="d-flex align-items-center gap-3">

                    <div>
                        <div class="temperature" id="currentTemp">
                            —
                        </div>

                        <div class="weather-description" id="currentDesc">
                            —
                        </div>
                    </div>

                    <img
                        id="currentIcon"
                        class="weather-main-icon"
                        src=""
                        alt="Weather"
                    >

                </div>

                <div class="mt-3" style="font-size:12px;color:#c8d9d1;">
                    <i class="bi bi-thermometer-half me-1"></i>
                    <?php echo e(t('Feels Like:')); ?>

                    <span id="feelsLike">—</span>°C
                </div>

            </div>

            <div class="col-lg-6 mt-3 mt-lg-0">

                <div class="weather-details">

                    <div class="weather-stat">
                        <div class="weather-stat-label">
                            <i class="bi bi-droplet me-1"></i>
                            <?php echo e(t('Humidity')); ?>

                        </div>

                        <div class="weather-stat-value" id="humidityVal">
                            —
                        </div>
                    </div>

                    <div class="weather-stat">
                        <div class="weather-stat-label">
                            <i class="bi bi-wind me-1"></i>
                            <?php echo e(t('Wind')); ?>

                        </div>

                        <div class="weather-stat-value" id="windVal">
                            —
                        </div>
                    </div>

                    <div class="weather-stat">
                        <div class="weather-stat-label">
                            <i class="bi bi-eye me-1"></i>
                            <?php echo e(t('Visibility')); ?>

                        </div>

                        <div class="weather-stat-value" id="visibilityVal">
                            —
                        </div>
                    </div>

                    <div class="weather-stat">
                        <div class="weather-stat-label">
                            <i class="bi bi-calendar3 me-1"></i>
                            <?php echo e(t('Today')); ?>

                        </div>

                        <div class="weather-stat-value" id="todayDate">
                            —
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="section-heading">

        <div class="section-heading-icon">
            <i class="bi bi-calendar-week"></i>
        </div>

        <div>
            <h3><?php echo e(t('Five Day Forecast')); ?></h3>

            <p>
                <?php echo e(t('Weather conditions for the coming days')); ?>

            </p>
        </div>

    </div>

    <div class="row g-3" id="forecastContainer"></div>

    <div class="tips-section">

        <div class="tips-title">
            <i class="bi bi-lightbulb-fill"></i>
            <?php echo e(t('Farmer Tips')); ?>

        </div>

        <div id="tipsContainer"></div>

    </div>

    <div class="refresh-wrapper">

    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
const weatherUrdu = <?php echo json_encode(is_urdu(), 15, 512) ?>;

function getLocation() {

    const errorBox = document.getElementById('locationError');

    if (errorBox) {
        errorBox.style.display = 'none';
    }

    if (!navigator.geolocation) {
        showError(<?php echo json_encode(t('Your browser does not support location services.'), 15, 512) ?>);
        return;
    }

    document.getElementById('loadingSection').innerHTML = `
        <div class="location-box loading-box">
            <div class="spinner-border" role="status"></div>
            <p class="mt-3 mb-0"><?php echo e(t('Finding your location...')); ?></p>
        </div>
    `;

    navigator.geolocation.getCurrentPosition(
        function(position) {

            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            fetchWeather(lat, lon);
        },
        function() {

            document.getElementById('loadingSection').innerHTML = `
                <div class="location-box">

                    <div class="location-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <h4><?php echo e(t('Location Permission Required')); ?></h4>

                    <p>
                        <?php echo e(t('Please allow location access from your browser to see your local weather.')); ?>

                    </p>

                    <button class="location-btn" onclick="getLocation()">
                        <i class="bi bi-arrow-clockwise me-2"></i>
                        <?php echo e(t('Try Again')); ?>

                    </button>

                    <div id="locationError"></div>

                </div>
            `;

            showError(<?php echo json_encode(t('Location access was not allowed. Please allow location access in your browser.'), 15, 512) ?>);
        }
    );
}

function fetchWeather(lat, lon) {

    fetch('/weather/data', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            lat: lat,
            lon: lon
        })
    })
    .then(response => response.json())
    .then(data => {

        if (data.error) {
            showError(data.error);
            return;
        }

        displayWeather(data);
    })
    .catch(() => {
        showError(<?php echo json_encode(t('Weather data could not be loaded. Please check your internet connection and try again.'), 15, 512) ?>);
    });
}

function displayWeather(data) {

    document.getElementById('loadingSection').style.display = 'none';
    document.getElementById('weatherSection').style.display = 'block';

    const current = data.current;

    document.getElementById('cityName').textContent =
        current.city + ', ' + current.country;

    document.getElementById('currentTemp').textContent =
        current.temp + '°C';

    document.getElementById('currentDesc').textContent =
        current.description;

    document.getElementById('currentIcon').src =
        `https://openweathermap.org/img/wn/${current.icon}@2x.png`;

    document.getElementById('feelsLike').textContent =
        current.feels_like;

    document.getElementById('humidityVal').textContent =
        current.humidity + '%';

    document.getElementById('windVal').textContent =
        current.wind + ' m/s';

    document.getElementById('visibilityVal').textContent =
        current.visibility + ' km';

    document.getElementById('todayDate').textContent =
        new Date().toLocaleDateString('en-PK', {
            day: 'numeric',
            month: 'short'
        });

    const forecastContainer =
        document.getElementById('forecastContainer');

    forecastContainer.innerHTML = '';

    data.forecast.forEach(day => {

        forecastContainer.innerHTML += `
            <div class="col-6 col-md-4 col-lg">

                <div class="forecast-card">

                    <div class="forecast-day">
                        ${day.date}
                    </div>

                    <div class="forecast-icon">
                        <img
                            src="https://openweathermap.org/img/wn/${day.icon}@2x.png"
                            alt="${day.description}"
                        >
                    </div>

                    <div class="forecast-temp">
                        ${day.temp_max}°
                        <span>/ ${day.temp_min}°</span>
                    </div>

                    <div class="forecast-desc">
                        ${day.description}
                    </div>

                    <div class="forecast-info">
                        <i class="bi bi-droplet"></i>
                        ${day.humidity}%
                        &nbsp;&nbsp;
                        <i class="bi bi-wind"></i>
                        ${day.wind} m/s
                    </div>

                </div>

            </div>
        `;
    });

    const tipsContainer =
        document.getElementById('tipsContainer');

    tipsContainer.innerHTML = '';

    data.tips.forEach(tip => {

        tipsContainer.innerHTML += `
            <div class="tip-item">
                <i class="bi bi-check-circle-fill me-2"></i>
                ${tip}
            </div>
        `;
    });
}

function showError(message) {

    const errorBox = document.getElementById('locationError');

    if (errorBox) {
        errorBox.style.display = 'block';
        errorBox.textContent = message;
    }
}
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mg\Downloads\GrowSmart_urdu_rtl_sidebar_fixed_final\resources\views/weather.blade.php ENDPATH**/ ?>