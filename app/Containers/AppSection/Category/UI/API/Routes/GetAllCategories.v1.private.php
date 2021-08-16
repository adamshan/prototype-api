<?php

/**
 * @apiGroup           Category
 * @apiName            getAllCategories
 *
 * @api                {GET} /v1/categories Endpoint title here..
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

Route::get('categories', [Controller::class, 'getAllCategories'])
    ->name('api_category_get_all_categories')
    ->middleware(['auth:api']);

