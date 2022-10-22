<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model 
{

    protected $table = 'prole_registration';

    protected $fillable = [
        
        'status',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    

    /* ************************ ACCESSOR ************************* */

    public function registration() 
    {
        return $this->belongsTo(Registration::class);
    }
    
}
