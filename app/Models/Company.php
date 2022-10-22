<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia 
{
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;

    protected $table = 'company';

    protected $fillable = [
        'name',
        'representative',
        'tel',
        'address',
        'city',
        'registration_id',
        'company_email',
        'website',
        'establish_date',
        'number_pj_monthly',
        'number_pj_annually',
        'feature_film_pj',
        'broadcast_pj',
        'music_video_pj',
        'film_ott_pj',
        'tv_ott_pj',
        'web_dramma_pj',
        'tvc_pj',
        'excutive_producer_name',
        'director_name',
        'producer_name',
        'cast_name',
        'cast_email',
        'cast_phone',
        'cast_time',
        'know_us',
        'know_us_friend',
        'know_us_other',
        'todo',
        'facebook',
        'youtube',
        'twitter',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url', 'thumb_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/companies/'.$this->getKey());
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function prole()
    {
        return $this->hasMany(Prole::class);
    }

    public function registration()
    {
        return $this->belongsTo(Registraion::class);
    }

    public function messages() 
    {
        return $this->hasMany(Message::class, 'registration_id')->orderBy('id', 'DESC');
    }

    public function looking()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'looking_for');
    }

    public function registerMediaCollections(): void {

        $this->addMediaCollection('thumbnail')
            ->accepts('image/*');
    }

    /**
     * Register media conversions
     *
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();

    }

    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(237)
                ->height(42)
                ->fit('crop', 237, 42)
                ->optimize()
                ->performOnCollections($mediaCollection->getName())
                ->nonQueued();
        });
    }

     /**
     * Get url of thumbnail image
     *
     * @return string|null
     */
    public function getThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('thumbnail') ? : "";
    }
}
