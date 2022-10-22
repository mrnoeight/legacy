<?php

namespace Database\Factories;

use App\Models\Prole;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class ProleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrGender = ['Male', 'Female', 'Male, Female'];
        $arrRole = ['Leading', 'Supporting', 'Cameo', 'Day Player', '5 and Under', 'Background', 'Other'];

        $name = $this->faker->name;

        return [
            //
            'name' => $name,
            'slug' => str_replace(' ', '-', $name),
            'post_id' => Post::all()->random()->id,    
            'company_id' => Company::all()->random()->id,
            'role_type' => Arr::random($arrRole),
            'gender' => Arr::random($arrGender),
            'age_range' => rand(14, 18).' - '.rand(19, 40),
            'age' => rand(15, 48),
            'role_fee_min' => rand(5, 10),
            'role_fee_max' => rand(20, 30),
            'description'=> $this->faker->paragraph(),
            'note'=> $this->faker->paragraph(),
        ];
    }
}
