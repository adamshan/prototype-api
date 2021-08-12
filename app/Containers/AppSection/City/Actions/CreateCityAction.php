<?php

namespace App\Containers\AppSection\City\Actions;

use App\Containers\AppSection\City\Models\City;
use App\Containers\AppSection\City\Tasks\CreateCityTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateCityAction extends Action
{
    public function run(Request $request): City
    {
        $data = [
            'country_id' => $request->country_id,
            'name' => $request->name
        ];

        return app(CreateCityTask::class)->run($data);
    }
}
