<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //



    public function getWeather($city)
{
    $apiKey = '7f3191a3587322bc0e4835c9d0701d99';
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', $url);

    $statusCode = $response->getStatusCode();
    if ($statusCode == 200) {
        $body = json_decode($response->getBody(), true);

        $weather = [
            'description' => $body['weather'][0]['description'],
            'temp' => $body['main']['temp'],
            'humidity' => $body['main']['humidity'],
            'wind_speed' => $body['wind']['speed'],
        ];

        return view('weather', ['weather' => $weather]);
    } else {
        return view('error', ['message' => 'Failed to retrieve weather data']);
    }
}

}
