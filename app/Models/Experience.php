<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';

    protected $fillable = [
        'registration_id',
        'movie_name',
        'role_name',
        'exp_year',
        'role_type',
        'project_type',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/experiences/'.$this->getKey());
    }

    public function registration() 
    {
        return $this->belongsTo(Registration::class);
    }
}
