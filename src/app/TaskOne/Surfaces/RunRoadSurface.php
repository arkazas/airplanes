<?php

namespace App\TaskOne\Surfaces;

use App\TaskOne\Interfaces\SurfaceInterface;

class RunRoadSurface implements SurfaceInterface
{
    public function getSurfaceType(): int
    {
        return SurfaceInterface::RUN_ROAD;
    }
}
