<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\CreateCategoryTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateCategoryAction extends Action
{
    public function run(Request $request): Category
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateCategoryTask::class)->run($data);
    }
}
