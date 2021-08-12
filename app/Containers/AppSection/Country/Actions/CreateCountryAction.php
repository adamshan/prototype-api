<?php

namespace App\Containers\AppSection\Country\Actions;

use App\Containers\AppSection\Country\Models\Country;
use App\Containers\AppSection\Country\Tasks\CreateCountryTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateCountryAction extends Action
{
    public function run(Request $request): Country
    {
        $data = [
            'name' => $request->name
        ];

        return app(CreateCountryTask::class)->run($data);
    }
}
