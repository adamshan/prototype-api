<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\FindCategoryByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindCategoryByIdAction extends Action
{
    public function run(Request $request): Category
    {
        return app(FindCategoryByIdTask::class)->run($request->id);
    }
}
