<?php

use Illuminate\Database\Seeder;

class carSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\CarBrand::class, 10)->create()->each(function ($cBrand) {
            $cModel = $cBrand->carModels()->save(factory(App\Model\CarModel::class)->make());
            factory(App\Model\CarBody::class, 1)->create()->each(function ($cBody) {
                $cBody->cars()->save(factory(App\Model\Car::class)->make(['car_model_id' => 19]));
            });
            //factory(App\Model\Car::class, 1)->create(['car_model_id' => $cModel->id, 'car_body_id' => $cBody->id]);
        });
    }
}
