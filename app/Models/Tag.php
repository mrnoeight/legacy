<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_name',
        'tag_type',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tags/'.$this->getKey());
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function getOptionList() 
    {
        $arr = array(
            array(
                "name" => "post_type",
                "id" => "1"
            ),
            array(
                "name" => "experience",
                "id" => "2"
            ),
            array(
                "name" => "occupation",
                "id" => "3"
            ),
            array(
                "name" => "looking_for",
                "id" => "4"
            ),
            array(
                "name" => "looking_for_role",
                "id" => "14"
            ),
            array(
                "name" => "accept_role",
                "id" => "5"
            ),
            array(
                "name" => "language",
                "id" => "6"
            ),
            array(
                "name" => "ethnicity",
                "id" => "7"
            ),
            array(
                "name" => "nationality",
                "id" => "8"
            ),
            array(
                "name" => "voice_vocal",
                "id" => "9"
            ),
            array(
                "name" => "instrument",
                "id" => "10"
            ),
            array(
                "name" => "tattoo",
                "id" => "15"
            ),
            array(
                "name" => "sport",
                "id" => "11"
            ),
            array(
                "name" => "dance",
                "id" => "12"
            ),
            array(
                "name" => "material_art",
                "id" => "13"
            ),
        );
        
        // $arr =  "[
        //     { name: 'post_type', value: 'post_type' },
        //     { name: 'experience', value: 'experience' },
        //     { name: 'work_looking_for', value: 'work_looking_for' },
        // ]";

        return json_encode($arr);
    }
}
