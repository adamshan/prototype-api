<?php

namespace App\Containers\AppSection\City\Actions;

use App\Containers\AppSection\City\Models\City;
use App\Containers\AppSection\City\Tasks\FindCityByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindCityByIdAction extends Action
{
    public function run(Request $request): City
    {
        return app(FindCityByIdTask::class)->run($request->id);
    }
}
