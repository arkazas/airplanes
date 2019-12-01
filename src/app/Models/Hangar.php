<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hangar extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function airplanes() {
        return $this->hasMany('App\Models\Airplane', 'hangar_id', 'id');
    }
}
