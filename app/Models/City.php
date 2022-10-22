<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'weight',
        'country_id',
        'country_code',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cities/'.$this->getKey());
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function registration()
    {
        return $this->hasMany(Registration::class);
    }
}
