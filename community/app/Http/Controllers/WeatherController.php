<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\UrduTranslationService;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function getWeather(
        Request $request,
        UrduTranslationService $translator
    ) {
        $lat = $request->input('lat');
        $lon = $request->input('lon');

        if (!$lat || !$lon) {
            return response()->json([
                'error' => $this->weatherText(
                    'Location coordinates are missing.',
                    $translator
                )
            ], 400);
        }

        $apiKey = env('OPENWEATHER_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'error' => $this->weatherText(
                    'OpenWeather API key is missing.',
                    $translator
                )
            ], 500);
        }

        try {
            $currentUrl =
                "https://api.openweathermap.org/data/2.5/weather" .
                "?lat={$lat}" .
                "&lon={$lon}" .
                "&appid={$apiKey}" .
                "&units=metric";

            $currentResponse =
                Http::timeout(10)->get($currentUrl);

            $forecastUrl =
                "https://api.openweathermap.org/data/2.5/forecast" .
                "?lat={$lat}" .
                "&lon={$lon}" .
                "&appid={$apiKey}" .
                "&units=metric";

            $forecastResponse =
                Http::timeout(10)->get($forecastUrl);

            if (
                $currentResponse->failed() ||
                $forecastResponse->failed()
            ) {
                return response()->json([
                    'error' => $this->weatherText(
                        'Unable to fetch weather data.',
                        $translator
                    )
                ], 500);
            }

            $current = $currentResponse->json();
            $forecastData = $forecastResponse->json();

            $dailyForecast = [];
            $usedDates = [];

            foreach ($forecastData['list'] as $item) {
                $date = gmdate(
                    'Y-m-d',
                    $item['dt']
                );

                $today = gmdate('Y-m-d');

                if ($date == $today) {
                    continue;
                }

                if (in_array($date, $usedDates)) {
                    continue;
                }

                $usedDates[] = $date;

                $weatherDate = gmdate(
                    'l, d F',
                    $item['dt']
                );

                $weatherDescription =
                    ucfirst(
                        $item['weather'][0]['description']
                    );

                $dailyForecast[] = [
                    'date' => $this->weatherText(
                        $weatherDate,
                        $translator
                    ),

                    'temp_max' => round(
                        $item['main']['temp_max']
                    ),

                    'temp_min' => round(
                        $item['main']['temp_min']
                    ),

                    'description' => $this->weatherText(
                        $weatherDescription,
                        $translator
                    ),

                    'icon' =>
                        $item['weather'][0]['icon'],

                    'humidity' =>
                        $item['main']['humidity'],

                    'wind' =>
                        $item['wind']['speed'],
                ];

                if (count($dailyForecast) >= 7) {
                    break;
                }
            }

            $city =
                $current['name'] ?? '';

            $country =
                $current['sys']['country'] ?? '';

            $description =
                ucfirst(
                    $current['weather'][0]['description']
                );

            $visibility = 'N/A';

            if (isset($current['visibility'])) {
                $visibility =
                    round(
                        $current['visibility'] / 1000,
                        1
                    ) . ' km';
            }

            if (is_urdu()) {
                $city =
                    $translator->translate($city);

                $country =
                    $translator->translate($country);

                $description =
                    $this->weatherText(
                        $description,
                        $translator
                    );

                $visibility =
                    str_replace(
                        ' km',
                        ' کلومیٹر',
                        $visibility
                    );
            }

            return response()->json([
                'current' => [
                    'city' => $city,
                    'country' => $country,
                    'temp' => round(
                        $current['main']['temp']
                    ),
                    'feels_like' => round(
                        $current['main']['feels_like']
                    ),
                    'humidity' =>
                        $current['main']['humidity'],
                    'wind' =>
                        $current['wind']['speed'],
                    'pressure' =>
                        $current['main']['pressure'],
                    'description' =>
                        $description,
                    'icon' =>
                        $current['weather'][0]['icon'],
                    'visibility' =>
                        $visibility,
                ],

                'forecast' =>
                    $dailyForecast,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $this->weatherText(
                    'Something went wrong.',
                    $translator
                ),
                'message' => $this->weatherText(
                    $e->getMessage(),
                    $translator
                )
            ], 500);
        }
    }

    private function weatherText(
        string $text,
        UrduTranslationService $translator
    ): string {
        if (!is_urdu()) {
            return $text;
        }

        return $translator->translate($text);
    }
}