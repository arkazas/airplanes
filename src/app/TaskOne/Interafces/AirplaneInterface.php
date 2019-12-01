<?php

namespace App\TaskOne\Interfaces;

interface AirplaneInterface
{
    public function takeOff(SurfaceInterface $surface);

    public function fly();

    public function land(SurfaceInterface $surface);
}
