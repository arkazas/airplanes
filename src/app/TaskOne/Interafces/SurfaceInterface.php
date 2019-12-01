<?php

namespace App\TaskOne\Interfaces;

interface SurfaceInterface
{
    /**
     * Water surface values
     */
    const WATER = 1;

    /**
     * Run road surface values
     */
    const RUN_ROAD = 2;

    /**
     * @return int
     */
    public function getSurfaceType(): int ;
}
