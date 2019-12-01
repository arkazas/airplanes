<?php


use Illuminate\Database\Seeder;
use App\Models\AirplaneModel;
use App\Models\Airplane;
use App\Models\Hangar;
use App\TaskOne\FlyTimes\DayTime;
use App\TaskOne\FlyTimes\NightFlyTime;
use App\TaskOne\Weathers\SunnyWeather;
use App\TaskOne\Weathers\RainyWeather;
use App\TaskOne\Surfaces\WaterSurface;
use App\TaskOne\Surfaces\RunRoadSurface;

class AirplaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            5 => [
                'name' => 'Aeroprakt',
                'model' => 'A-24',
                'settings' => json_encode([
                    'fly_time' => [(new DayTime())->getFlyTime()],
                    'fly_weather' => [(new SunnyWeather())->getWeather()],
                    'surface' => [
                        (new WaterSurface)->getSurfaceType(),
                        (new RunRoadSurface())->getSurfaceType()
                    ]
                ])
            ],
            3 => [
                'name' => 'Curtiss',
                'model' => 'NC-4',
                'settings' => json_encode([
                    'fly_time' => [(new DayTime())->getFlyTime()],
                    'fly_weather' => [(new SunnyWeather())->getWeather()],
                    'surface' => [(new WaterSurface)->getSurfaceType()]
                ])
            ],
            2 => [
                'name' => 'Boeing',
                'model' => '747',
                'settings' => json_encode([
                    'fly_time' => [
                        (new DayTime())->getFlyTime(),
                        (new NightFlyTime())->getFlyTime()
                    ],
                    'fly_weather' => [
                        (new SunnyWeather())->getWeather(),
                        (new RainyWeather())->getWeather()
                    ],
                    'surface' => [(new RunRoadSurface())->getSurfaceType()]
                ])
            ],
        ];

        $hangar = factory(Hangar::class)->create(['name' => 'Aeroprakt']);

        foreach ($models as $key => $data) {
            $model = factory(AirplaneModel::class)
                ->create($data);

            for ($i = 0; $i < $key; $i++) {
                $plane = factory(Airplane::class)
                    ->make();

                $plane->hangar_id = $hangar->id;

                $model
                    ->airplanes()
                    ->save($plane);
            }

        }
    }
}
