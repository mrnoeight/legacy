<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TalentUser::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'hometown' => $faker->sentence,
        'birthday' => $faker->date(),
        'current_career' => $faker->sentence,
        'has_agency' => $faker->boolean(),
        'agency_name' => $faker->sentence,
        'want_agency' => $faker->boolean(),
        'your_experience' => $faker->sentence,
        'socials' => $faker->sentence,
        'searching_for' => $faker->sentence,
        'profile_picture' => $faker->sentence,
        'file_cv' => $faker->sentence,
        'weight' => $faker->boolean(),
        'height' => $faker->boolean(),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tag::class, static function (Faker\Generator $faker) {
    return [
        'tag_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Film::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Company::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'representative' => $faker->sentence,
        'tel' => $faker->sentence,
        'address' => $faker->sentence,
        'city' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'slug' => $faker->unique()->slug,
        'type' => $faker->sentence,
        'city' => $faker->sentence,
        'gender' => $faker->sentence,
        'age' => $faker->sentence,
        'company_id' => $faker->randomNumber(5),
        'expired_date' => $faker->date(),
        'description' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Event::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'short_desc' => $faker->text(),
        'description' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\City::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'weight' => $faker->randomNumber(5),
        'country_id' => $faker->randomNumber(5),
        'country_code' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Film::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'title' => $faker->text(),
        'description' => $faker->text(),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Page::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Page::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'web_title' => $faker->text(),
        'web_description' => $faker->text(),
        'content' => $faker->text(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Registration::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'hometown' => $faker->sentence,
        'birthday' => $faker->date(),
        'current_career' => $faker->sentence,
        'has_agency' => $faker->boolean(),
        'agency_name' => $faker->sentence,
        'want_agency' => $faker->boolean(),
        'your_experience' => $faker->sentence,
        'searching_for' => $faker->sentence,
        'youtube_link' => $faker->sentence,
        'facebook_link' => $faker->sentence,
        'instagram_link' => $faker->sentence,
        'tiktok_link' => $faker->sentence,
        'weight' => $faker->randomNumber(5),
        'height' => $faker->randomNumber(5),
        'type' => $faker->randomNumber(5),
        'status' => $faker->randomNumber(5),
        'enabled' => $faker->boolean(),
        'bio' => $faker->text(),
        'published_at' => $faker->date(),
        'username' => $faker->sentence,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Block::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'title' => $faker->text(),
        'content' => $faker->text(),
        'url' => $faker->sentence,
        'page' => $faker->sentence,
        'section' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Prole::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'slug' => $faker->unique()->slug,
        'post_id' => $faker->sentence,
        'company_id' => $faker->sentence,
        'role_type' => $faker->sentence,
        'role_requirement' => $faker->sentence,
        'gender' => $faker->sentence,
        'age' => $faker->sentence,
        'age_range' => $faker->sentence,
        'role_fee_min' => $faker->randomNumber(5),
        'role_fee_max' => $faker->randomNumber(5),
        'description' => $faker->sentence,
        'note' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Experience::class, static function (Faker\Generator $faker) {
    return [
        'registration_id' => $faker->sentence,
        'movie_name' => $faker->sentence,
        'role_name' => $faker->sentence,
        'exp_year' => $faker->randomNumber(5),
        'role_type' => $faker->sentence,
        'project_type' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Homepage::class, static function (Faker\Generator $faker) {
    return [
        'head_tag1' => $faker->sentence,
        'head_title1' => $faker->sentence,
        'head_desc1' => $faker->sentence,
        'mid_tag1' => $faker->sentence,
        'mid_title1' => $faker->sentence,
        'mid_desc1' => $faker->sentence,
        'info1' => $faker->sentence,
        'info2' => $faker->sentence,
        'info3' => $faker->sentence,
        'info4' => $faker->sentence,
        'info5' => $faker->sentence,
        'page_name' => $faker->sentence,
        'seo_title' => $faker->sentence,
        'seo_description' => $faker->sentence,
        'seo_author' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\BlockInfo::class, static function (Faker\Generator $faker) {
    return [
        'head_tag1' => $faker->text(),
        'head_title1' => $faker->text(),
        'head_desc1' => $faker->text(),
        'info1' => $faker->text(),
        'block_name' => $faker->sentence,
        'block_type' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
