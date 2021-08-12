<?php

/**
 * @apiGroup           City
 * @apiName            createCity
 *
 * @api                {POST} /v1/cities Endpoint title here..
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

Route::post('cities', [Controller::class, 'createCity'])
    ->name('api_city_create_city')
    ->middleware(['auth:api']);

