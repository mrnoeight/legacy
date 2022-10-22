<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'from_id',
        'registration_id',
        'request_id',
        'prole_id',
        'is_read',
        'message',
        'type',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    public function company() 
    {
        return $this->belongsTo(Company::class, 'from_id');
    }

    public function registration() 
    {
        return $this->belongsTo(Registration::class, 'from_id');
    }
}
