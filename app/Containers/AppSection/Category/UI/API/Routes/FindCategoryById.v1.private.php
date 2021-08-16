<?php

/**
 * @apiGroup           Category
 * @apiName            findCategoryById
 *
 * @api                {GET} /v1/categories/:id Endpoint title here..
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

use App\Containers\AppSection\Category\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('categories/{id}', [Controller::class, 'findCategoryById'])
    ->name('api_category_find_category_by_id')
    ->middleware(['auth:api']);

