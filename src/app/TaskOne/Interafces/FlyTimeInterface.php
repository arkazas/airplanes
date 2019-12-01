<?php

namespace App\TaskOne\Interfaces;

interface FlyTimeInterface
{
    /**
     * Only day time value
     */
    const DAY_TIME = 1;

    /**
     * Only night time value
     */
    const NIGHT_TIME = 2;

    /**
     * Get weather type
     *
     * @return integer
     */
    public function getFlyTime(): int ;
}
