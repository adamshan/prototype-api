<?php

/**
 * @apiGroup           Country
 * @apiName            updateCountry
 *
 * @api                {PATCH} /v1/countries/:id Endpoint title here..
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

use App\Containers\AppSection\Country\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('countries/{id}', [Controller::class, 'updateCountry'])
    ->name('api_country_update_country')
    ->middleware(['auth:api']);

