<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletter';

    protected $fillable = [
        'name',
        'email',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    /* ************************ ACCESSOR ************************* */


}
