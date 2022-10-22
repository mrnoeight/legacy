<?php

namespace Database\Factories;

use App\Models\Registration;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Registration::class, function ($faker) {
            return [
                'name' => $faker->name,
                'email' => $faker->email,
                'bio' => $faker->paragraph,
                'city_id' => factory(City::class),
                'type' => Registration::TALENT,
                'status' => Registration::APPROVED,
            ];
        });
    }
}
