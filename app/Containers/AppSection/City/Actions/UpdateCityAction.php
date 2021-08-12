<?php

namespace App\Containers\AppSection\City\Actions;

use App\Containers\AppSection\City\Models\City;
use App\Containers\AppSection\City\Tasks\UpdateCityTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateCityAction extends Action
{
    public function run(Request $request): City
    {
        $data = [
            'country_id' => $request->country_id,
            'name' => $request->name
        ];

        $data = array_filter($data);
        return app(UpdateCityTask::class)->run($request->id, $data);
    }
}
