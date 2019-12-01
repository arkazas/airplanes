<?php

namespace App\Http\Controllers;

use App\Http\Transformers\AirplaneTransformer;
use App\Http\Transformers\HangarTransformer;
use App\Models\Airplane;
use App\Models\Hangar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class HangarsController extends BaseController
{
    use ValidatesRequests;

    public function list(Request $request)
    {
        $hangars = Hangar::all();

        return ResponseBuilder::success(
            $hangars->transform(function($hangar) {
                return (new HangarTransformer($hangar))->transform();
            })
        );
    }

    /**
     * @param Request $request
     * @param Hangar  $hangar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAirplanesInfo(Request $request, Hangar $hangar)
    {
        return ResponseBuilder::success(
            $hangar
                ->airplanes()
                ->get()
                ->transform(function($hangar) {
                    return (new AirplaneTransformer($hangar))->transform();
                })
        );
    }
}
