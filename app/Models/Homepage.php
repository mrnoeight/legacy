<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Homepage extends Model implements HasMedia 
{
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use HasTranslations;

    protected $table = 'homepage';

    protected $fillable = [
        'head_tag1',
        'head_title1',
        'head_desc1',
        'mid_tag1',
        'mid_title1',
        'mid_desc1',
        'info1',
        'info2',
        'info3',
        'info4',
        'info5',
        'page_name',
        'seo_title',
        'seo_description',
        'seo_author',
        'enabled',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    public $translatable = ['head_tag1', 'head_title1', 'head_desc1', 'mid_tag1', 'mid_title1', 'mid_desc1', 'info1', 'info2','info3','info4','info5','seo_title','seo_description','seo_author'];
    
    protected $appends = ['resource_url', 'banner_url', 'banner_mb_url' , 'banner_en_url', 'banner_mb_en_url', 'middle_banner_url', 'middle_banner_mb_url', 'map_url', 'map_mb_url', 'map_en_url', 'map_en_mb_url'];
    

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/homepages/'.$this->getKey());
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('banner')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('banner_en')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('banner_mb')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('banner_mb_en')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('middle_banner')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('middle_banner_mb')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('map')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);
            
        $this->addMediaCollection('map_mb')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);

        $this->addMediaCollection('map_en')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);
        
        $this->addMediaCollection('map_en_mb')
            ->accepts('image/*')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->maxNumberOfFiles(1);
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

        // $this->addMediaConversion('thumb_small')
        //     ->width(215)
        //     ->height(318)
        //     ->fit('crop', 215, 318)
        //     ->optimize()
        //     ->performOnCollections('thumbnail')
        //     ->nonQueued();

    }

    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(200)
                ->height(200)
                ->fit('crop', 200, 200)
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
    public function getBannerUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('banner') ? : "";
    }

    public function getBannerEnUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('banner_en') ? : "";
    }

    public function getBannerMbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('banner_mb') ? : "";
    }

    public function getBannerMbEnUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('banner_mb_en') ? : "";
    }

    public function getMiddleBannerUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('middle_banner') ? : "";
    }

    public function getMiddleBannerMbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('middle_banner_mb') ? : "";
    }

    public function getMapUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('map') ? : "";
    }

    public function getMapMbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('map_mb') ? : "";
    }

    public function getMapEnUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('map_en') ? : "";
    }

    public function getMapEnMbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('map_en_mb') ? : "";
    }
}
