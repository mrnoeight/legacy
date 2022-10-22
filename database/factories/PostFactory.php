<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Company;
use App\Models\City;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'slug' => str_replace(' ', '-', $this->faker->title()),
            'type' => 'Music',         
            'city_id' => City::all()->random()->id,
            'gender' => 'Male, Female',
            'age' => '18 - 35',
            'company_id'=> Company::all()->random()->id,
            'expired_date' => '2021-09-01 00:00:00',
            'short_desc' => $this->faker->paragraph(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
