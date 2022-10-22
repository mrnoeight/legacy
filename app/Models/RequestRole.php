<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RequestRole extends Model implements HasMedia
{
    use HasFactory;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;

    protected $table = 'request_role';

    protected $fillable = [
        'prole_id',
        'registration_id',
        'request_type',
        'request_round',
        'request_like',
        'request_date_take1',
        'request_date_self',
        'request_date_audition',
        'request_status_take1',
        'request_status_self',
        'request_status_audition',
        'request_expired_date',
        'note',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    protected $appends = ['self_url', 'audition_url'];

    /* ************************ ACCESSOR ************************* */

    public function registration() 
    {
        return $this->belongsTo(Registration::class);
    }

    public function prole() 
    {
        return $this->belongsTo(Prole::class);
    }

    public function registerMediaCollections(): void {
        
        $this->addMediaCollection('self_tape')
            ->maxNumberOfFiles(10);

        $this->addMediaCollection('audition')
            ->maxNumberOfFiles(10);
    }

    public function getSelfUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('self_tape') ? : "";
    }

    public function getAuditionUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('audition') ? : "";
    }
}
