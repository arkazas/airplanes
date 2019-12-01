<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirplaneModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'model'
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $table = 'airplanes_model';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function airplanes() {
        return $this->hasMany('App\Models\Airplane', 'model_id', 'id');
    }
}
