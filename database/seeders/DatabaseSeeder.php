<?php

namespace Database\Seeders;

use Apiato\Core\Loaders\SeederLoaderTrait;
use App\Containers\AppSection\Authorization\Data\Seeders\AuthorizationDefaultUsersSeeder_3;
use App\Containers\AppSection\Country\Data\Seeders\CountrySeeder;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class DatabaseSeeder extends Seeder
{
    use SeederLoaderTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // $this->call(CountrySeeder::class);
        $this->call(AuthorizationDefaultUsersSeeder_3::class);
        // $this->runLoadingSeeders();
    }
}
