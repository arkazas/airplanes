<?php

namespace App\TaskOne;

use App\Exceptions\FlyTimeException;
use App\Exceptions\SurfaceException;
use App\Exceptions\WeatherException;
use App\TaskOne\Interfaces\AirplaneInterface;
use App\TaskOne\Interfaces\FlyTimeInterface;
use App\TaskOne\Interfaces\SurfaceInterface;
use App\TaskOne\Interfaces\WeatherInterface;
use App\Models\Airplane;
use App\Models\AirplaneModel;

class Plain implements AirplaneInterface
{
    /**
     * @var FlyTimeInterface
     */
    protected $flyTime;

    /**
     * @var WeatherInterface
     */
    protected $flyWeather;

    /**
     * @var AirplaneModel
     */
    protected $model;

    /**
     * Plain constructor.
     *
     * @param \App\Models\Airplane $airplane
     */
    public function __construct(Airplane $airplane)
    {
        $this->model = $airplane->model()->first();
        $this->model->settings = json_decode($this->model->settings);
    }

    /**
     * @param FlyTimeInterface $flyTime
     */
    public function setFlyTime(FlyTimeInterface $flyTime): void
    {
        $this->flyTime = $flyTime;
    }

    /**
     * @param WeatherInterface $flyWeather
     */
    public function setFlyWeather(WeatherInterface $flyWeather): void
    {
        $this->flyWeather = $flyWeather;
    }

    /**
     * @param SurfaceInterface $surface
     *
     * @return bool
     * @throws SurfaceException
     */
    public function takeOff(SurfaceInterface $surface): bool
    {
        $this->checkChassis($surface);

        // TODO: Implement takeOff() method.

        return true;
    }

    /**
     * @param SurfaceInterface $surface
     *
     * @throws SurfaceException
     */
    protected function checkChassis(SurfaceInterface $surface)
    {
        if (!in_array($surface->getSurfaceType(), $this->model->settings->surface)) {
            throw new SurfaceException('Not accessible surface for get take off or land !!');
        }
    }

    /**
     * @return mixed|void
     * @throws FlyTimeException
     * @throws WeatherException
     */
    public function fly(): bool
    {
        $this->checkWeather();
        $this->checkFlyTime();

        //TODO: next fly logic

        return true;
    }

    /**
     * @param SurfaceInterface $surface
     *
     * @return bool
     * @throws SurfaceException
     */
    public function land(SurfaceInterface $surface): bool
    {
        $this->checkChassis($surface);

        // TODO: Implement land() method.

        return true;
    }

    /**
     * Check if an airplane fly in a accessible weather
     *
     * @return bool
     * @throws WeatherException
     */
    protected function checkWeather():bool
    {
        if (!in_array($this->flyWeather->getWeather(), $this->model->settings->fly_weather)) {
            throw new WeatherException('Not accessible weather !!!');
        }

        return true;
    }

    /**
     * Check if an airplane fly in a accessible time
     *
     * @return bool
     * @throws FlyTimeException
     */
    protected function checkFlyTime():bool
    {
        if (!in_array($this->flyTime->getFlyTime(), $this->model->settings->fly_time)) {
            throw new FlyTimeException('Not accessible fly time !!!');
        }

        return true;
    }
}
