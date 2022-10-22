<?php

namespace Database\Seeders;

use App\Models\Prole;
use Illuminate\Database\Seeder;

class ProleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //$roles = factory(Prole::class, 5)->make();
        $roles =  Prole::factory()->count(15)->create();
        //print_r($roles);
    }
}
