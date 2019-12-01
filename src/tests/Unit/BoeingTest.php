<?php

namespace Tests\Unit;

use App\Exceptions\SurfaceException;
use App\Exceptions\FlyTimeException;
use App\Exceptions\WeatherException;
use App\Models\Airplane;
use App\Models\AirplaneModel;
use App\TaskOne\FlyTimes\DayTime;
use App\TaskOne\FlyTimes\NightFlyTime;
use App\TaskOne\Plain;
use App\TaskOne\Surfaces\RunRoadSurface;
use App\TaskOne\Surfaces\WaterSurface;
use App\TaskOne\Weathers\RainyWeather;
use App\TaskOne\Weathers\SunnyWeather;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoeingTest extends TestCase
{
    /**
     * @return mixed
     */
    public function testSetupData()
    {
        $boeing = AirplaneModel::where(['name' => 'Boeing'])->first();

        $this->assertIsObject($boeing);
        $this->assertTrue($boeing instanceof AirplaneModel);

        return $boeing;
    }

    /**
     * @depends testSetupData
     *
     * @param AirplaneModel $boeing
     */
    public function testAirplaneModelData(AirplaneModel $boeing)
    {
        $this->assertGreaterThan(0, $boeing->airplanes->count());
    }

    /**
     * @depends testSetupData
     *
     * @param AirplaneModel $boeing
     *
     * @return
     */
    public function testSetupAirplaneData(AirplaneModel $boeing)
    {
        $this->assertTrue($boeing->airplanes->first() instanceof Airplane);

        return $boeing->airplanes->first();
    }

    /**
     * @depends testSetupAirplaneData
     *
     * @param Airplane $boeing
     *
     * @return mixed
     */
    public function testSetupPlain(Airplane $boeing)
    {
        $plain = new Plain($boeing);

        $this->assertTrue($plain instanceof Plain);

        return $plain;
    }

    /**
     * @depends testSetupPlain
     *
     * @param Plain $plain
     *
     * @throws SurfaceException
     */
    public function testTakeOffOnWrongSurface(Plain $plain)
    {
        $this->expectException(SurfaceException::class);
        $plain->takeOff(new WaterSurface());
    }

    /**
     * @depends testSetupPlain
     *
     * @param Plain $plain
     *
     * @throws SurfaceException
     */
    public function testTakeOffAcceptedSurface(Plain $plain)
    {
        $this->assertTrue($plain->takeOff(new RunRoadSurface()));
    }

    /**
     * @depends testSetupPlain
     *
     * @param Plain $plain
     *
     * @throws FlyTimeException
     * @throws WeatherException
     */
    public function testFlyAnyTimeAnyWeather(Plain $plain)
    {
        $plain->setFlyWeather(new SunnyWeather());
        $plain->setFlyTime(new NightFlyTime());
        $this->assertTrue($plain->fly());

        $plain->setFlyWeather(new RainyWeather());
        $plain->setFlyTime(new DayTime());
        $this->assertTrue($plain->fly());
    }

    /**
     * @depends testSetupPlain
     *
     * @param Plain $plain
     *
     * @throws SurfaceException
     */
    public function testLandOnWrongSurface(Plain $plain)
    {
        $this->expectException(SurfaceException::class);
        $plain->land(new WaterSurface());
    }

    /**
     * @depends testSetupPlain
     *
     * @param Plain $plain
     *
     * @throws SurfaceException
     */
    public function testLandAcceptedSurface(Plain $plain)
    {
        $this->assertTrue($plain->land(new RunRoadSurface()));
    }
}
