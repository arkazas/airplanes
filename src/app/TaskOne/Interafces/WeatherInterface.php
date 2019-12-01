<?php

namespace App\TaskOne\Interfaces;

interface WeatherInterface
{
    /**
     * Rainy weather value
     */
    const RAINY = 1;

    /**
     * Sunny weather value
     */
    const SUNNY = 2;

    /**
     * Get weather type
     *
     * @return integer
     */
    public function getWeather(): int ;
}
