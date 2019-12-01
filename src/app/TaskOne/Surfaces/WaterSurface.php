<?php

namespace App\TaskOne\Surfaces;

use App\TaskOne\Interfaces\SurfaceInterface;

class WaterSurface implements SurfaceInterface
{
    public function getSurfaceType(): int
    {
        return SurfaceInterface::WATER;
    }
}
