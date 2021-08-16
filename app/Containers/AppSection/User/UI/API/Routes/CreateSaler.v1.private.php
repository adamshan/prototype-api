<?php

/**
 * @apiGroup           User
 * @apiName            createSaler
 *
 * @api                {post} /v1/salers Create Saler type Users
 * @apiDescription     Create non client users for the Dashboard.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  email
 * @apiParam           {String}  password
 * @apiParam           {String}  last_name
 * @apiParam           {String}  [first_name]
 * @apiParam           {integer}  country_id
 * @apiParam           {integer}  city_id
 * @apiParam           {string}  [phone_number]
 * @apiParam           {string}  [adresse]
 * @apiParam           {string}  [gender] in:M,F
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\User\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('salers', [Controller::class, 'createSaler'])
    ->name('api_user_create_saler')
    ->middleware(['auth:api']);

