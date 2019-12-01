<?php

namespace App\Http\Transformers;

use App\Models\Hangar;

class HangarTransformer implements TransformerInterface
{
    /**
     * @var Hangar
     */
    protected $hangar;

    /**
     * Create a new transformer instance.
     *
     * @param Hangar $hangar
     */
    public function __construct(Hangar $hangar)
    {
        $this->hangar = $hangar;
    }

    /**
     * Transformation data to json
     *
     * @return array
     */
    public function transform()
    {
        return [
            "id" => $this->hangar->id,
            "name" => $this->hangar->name . ' hangar',
            "lastUpdated"  => date_format($this->hangar->updated_at, 'Y-m-d H:i:s')
        ];
    }
}
