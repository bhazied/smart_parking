<?php

use Illuminate\Database\Seeder;

class geoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Country::class, 5)->create()->each(function ($country) {
            $region = $country->regions()->save(factory(App\Model\Region::class)->make());
            $country->states()->save(factory(App\Model\State::class)->make(['region_id' => $region->id]));
        });
    }
}
