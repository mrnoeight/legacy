<?php

namespace App\Models;

use Brackets\Translatable\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia 
{
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'city_name',
        'city_id',
        'gender',
        'age',
        'company_id',
        'expired_date',
        'short_desc',
        'description',
        'other_location',
        'project_budget',
        'start_casting_date',
        'end_casting_date',
        'start_rehearsal_date',
        'end_rehearsal_date',
        'start_photo_date',
        'end_photo_date',
        'genre',
        'producer',
        'director',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_time',
        'published_at',
        'enabled',
        'status',
    ];
    
    
    protected $dates = [
        'expired_date',
        'published_at',
        'created_at',
        'updated_at',
    
    ];

    protected $with = ['company', 'city'];

    public $translatable = ['name', 'short_desc', 'description'];
    
    protected $appends = ['resource_url', 'thumb_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/'.$this->getKey());
    }

    public function prole()
    {
        return $this->hasMany(Prole::class);
    }

    public function submissions()
    {
        return $this->hasManyThrough(Submission::class, Prole::class);
    }

    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    public function city() 
    {
        return $this->belongsTo(City::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'post_type');
    }

    public function types()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'experience');
    }

    public static function getListGenders()
    {
        $arr = array(
            array(
                "name" => "Male",
                "id" => "1"
            ),
            array(
                "name" => "Female",
                "id" => "2"
            ),
            array(
                "name" => "Male, Female",
                "id" => "3"
            )
        );

        return $arr;
    }

    public function loadGender() 
    {
        $arr = $this->getListGenders();
        foreach ($arr as $k=>$v) {
            if ($this->gender == $v['name'])
                $this->genders = $v;
        }
    }

    public static function getListBudgets()
    {
        $arr = array(
            array(
                "name" => "High Budget",
                "id" => "1"
            ),
            array(
                "name" => "Moderate",
                "id" => "2"
            ),
            array(
                "name" => "Low",
                "id" => "3"
            ),
            array(
                "name" => "Extreme High",
                "id" => "4"
            ),
        );

        return $arr;
    }

    public function loadBudget() 
    {
        $arr = $this->getListBudgets();
        foreach ($arr as $k=>$v) {
            if ($this->project_budget == $v['name'])
                $this->project_budgets = $v;
        }
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery')
            //->accepts('image/*')
            ->maxNumberOfFiles(20);

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

        // $this->addMediaConversion('thumb_small')
        //     ->width(215)
        //     ->height(318)
        //     ->fit('crop', 215, 318)
        //     ->optimize()
        //     ->performOnCollections('thumbnail')
        //     ->nonQueued();

        $this->addMediaConversion('thumb_main')
            ->width(336)
            ->height(497)
            ->fit('crop', 336, 497)
            ->optimize()
            ->performOnCollections('thumbnail')
            ->nonQueued();
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
    public function getThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('thumbnail', 'thumb_main') ? : "";
    }
}
