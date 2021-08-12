<?php

namespace App\Containers\AppSection\Country\Models;

use App\Ship\Parents\Models\Model;

class Country extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Country';
}
