<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Page extends Model
{
    protected $fillable = [
        'name',
        'web_title',
        'web_description',
        'content',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    public $translatable = ['web_title', 'web_description', 'content'];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pages/'.$this->getKey());
    }
}
