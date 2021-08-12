<?php

/**
 * @apiGroup           City
 * @apiName            getAllCities
 *
 * @api                {GET} /v1/cities Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

use App\Containers\AppSection\City\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('cities', [Controller::class, 'getAllCities'])
    ->name('api_city_get_all_cities')
    ->middleware(['auth:api']);

