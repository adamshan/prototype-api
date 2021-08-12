<?php

namespace App\Containers\AppSection\City\Models;

use App\Ship\Parents\Models\Model;

class City extends Model
{
    protected $fillable = [
        'country_id',
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
    protected string $resourceKey = 'City';
}
