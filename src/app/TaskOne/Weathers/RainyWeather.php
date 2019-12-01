<?php

namespace App\TaskOne\Weathers;

use App\TaskOne\Interfaces\WeatherInterface;

class RainyWeather implements WeatherInterface
{
    /**
     * Get weather value
     *
     * @return int
     */
    public function getWeather(): int
    {
        return static::RAINY;
    }
}
