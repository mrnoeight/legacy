<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Company;
use App\Models\City;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 5)->make();
    }
}
