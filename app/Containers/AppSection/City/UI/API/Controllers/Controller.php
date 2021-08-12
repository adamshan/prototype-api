<?php

namespace App\Containers\AppSection\City\UI\API\Controllers;

use App\Containers\AppSection\City\UI\API\Requests\CreateCityRequest;
use App\Containers\AppSection\City\UI\API\Requests\DeleteCityRequest;
use App\Containers\AppSection\City\UI\API\Requests\GetAllCitiesRequest;
use App\Containers\AppSection\City\UI\API\Requests\FindCityByIdRequest;
use App\Containers\AppSection\City\UI\API\Requests\UpdateCityRequest;
use App\Containers\AppSection\City\UI\API\Transformers\CityTransformer;
use App\Containers\AppSection\City\Actions\CreateCityAction;
use App\Containers\AppSection\City\Actions\FindCityByIdAction;
use App\Containers\AppSection\City\Actions\GetAllCitiesAction;
use App\Containers\AppSection\City\Actions\UpdateCityAction;
use App\Containers\AppSection\City\Actions\DeleteCityAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createCity(CreateCityRequest $request): JsonResponse
    {
        $city = app(CreateCityAction::class)->run($request);
        return $this->created($this->transform($city, CityTransformer::class));
    }

    public function findCityById(FindCityByIdRequest $request): array
    {
        $city = app(FindCityByIdAction::class)->run($request);
        return $this->transform($city, CityTransformer::class);
    }

    public function getAllCities(GetAllCitiesRequest $request): array
    {
        $cities = app(GetAllCitiesAction::class)->run($request);
        return $this->transform($cities, CityTransformer::class);
    }

    public function updateCity(UpdateCityRequest $request): array
    {
        $city = app(UpdateCityAction::class)->run($request);
        return $this->transform($city, CityTransformer::class);
    }

    public function deleteCity(DeleteCityRequest $request): JsonResponse
    {
        app(DeleteCityAction::class)->run($request);
        return $this->noContent();
    }
}
