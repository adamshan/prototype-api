<?php

/**
 * @apiGroup           City
 * @apiName            findCityById
 *
 * @api                {GET} /v1/cities/:id Endpoint title here..
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

Route::get('cities/{id}', [Controller::class, 'findCityById'])
    ->name('api_city_find_city_by_id')
    ->middleware(['auth:api']);

