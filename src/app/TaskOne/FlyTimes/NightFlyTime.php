<?php

namespace App\TaskOne\FlyTimes;

use App\TaskOne\Interfaces\FlyTimeInterface;

class NightFlyTime implements FlyTimeInterface
{
    /**
     * Get weather value
     *
     * @return int
     */
    public function getFlyTime(): int
    {
        return static::NIGHT_TIME;
    }
}
