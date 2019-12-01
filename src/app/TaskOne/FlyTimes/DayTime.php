<?php

namespace App\TaskOne\FlyTimes;

use App\TaskOne\Interfaces\FlyTimeInterface;

class DayTime implements FlyTimeInterface
{
    /**
     * Get weather value
     *
     * @return int
     */
    public function getFlyTime(): int
    {
        return static::DAY_TIME;
    }
}
