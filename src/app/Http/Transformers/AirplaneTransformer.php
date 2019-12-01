<?php

namespace App\Http\Transformers;

use App\Models\Airplane;

class AirplaneTransformer implements TransformerInterface
{
    /**
     * @var Airplane
     */
    protected $airplane;

    /**
     * Create a new transformer instance.
     *
     * @param Airplane $airplane
     */
    public function __construct(Airplane $airplane)
    {
        $this->airplane = $airplane;
    }

    /**
     * Transformation data to json
     *
     * @return array
     */
    public function transform()
    {
        return [
            "id" => $this->airplane->id,
            "name" => $this->airplane->model->name . ' ' . $this->airplane->model->model,
            "serial_number" => $this->airplane->serial_number,
            "departure" => $this->airplane->departure,
            "arrival" => $this->airplane->arrival,
            "status" => "Hangar's store",
            "lastUpdated"  => date_format($this->airplane->updated_at, 'Y-m-d H:i:s')
        ];
    }
}
