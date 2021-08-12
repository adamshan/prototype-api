<?php

namespace App\Containers\AppSection\Country\UI\API\Controllers;

use App\Containers\AppSection\Country\UI\API\Requests\CreateCountryRequest;
use App\Containers\AppSection\Country\UI\API\Requests\DeleteCountryRequest;
use App\Containers\AppSection\Country\UI\API\Requests\GetAllCountriesRequest;
use App\Containers\AppSection\Country\UI\API\Requests\FindCountryByIdRequest;
use App\Containers\AppSection\Country\UI\API\Requests\UpdateCountryRequest;
use App\Containers\AppSection\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\AppSection\Country\Actions\CreateCountryAction;
use App\Containers\AppSection\Country\Actions\FindCountryByIdAction;
use App\Containers\AppSection\Country\Actions\GetAllCountriesAction;
use App\Containers\AppSection\Country\Actions\UpdateCountryAction;
use App\Containers\AppSection\Country\Actions\DeleteCountryAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createCountry(CreateCountryRequest $request): JsonResponse
    {
        $country = app(CreateCountryAction::class)->run($request);
        return $this->created($this->transform($country, CountryTransformer::class));
    }

    public function findCountryById(FindCountryByIdRequest $request): array
    {
        $country = app(FindCountryByIdAction::class)->run($request);
        return $this->transform($country, CountryTransformer::class);
    }

    public function getAllCountries(GetAllCountriesRequest $request): array
    {
        $countries = app(GetAllCountriesAction::class)->run($request);
        return $this->transform($countries, CountryTransformer::class);
    }

    public function updateCountry(UpdateCountryRequest $request): array
    {
        $country = app(UpdateCountryAction::class)->run($request);
        return $this->transform($country, CountryTransformer::class);
    }

    public function deleteCountry(DeleteCountryRequest $request): JsonResponse
    {
        app(DeleteCountryAction::class)->run($request);
        return $this->noContent();
    }
}
