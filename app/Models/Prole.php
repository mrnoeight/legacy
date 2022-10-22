<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prole extends Model implements HasMedia 
{
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use HasFactory;


    protected $fillable = [
        'name',
        'slug',
        'post_id',
        'company_id',
        'role_type',
        'budget',
        'role_requirement',
        'gender',
        'age',
        'age_range',
        'role_fee_min',
        'role_fee_max',
        'description',
        'note',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_time',
        'expired_date',
        'start_casting_date',
        'end_casting_date',
        'start_rehearsal_date',
        'end_rehearsal_date',
        'start_photo_date',
        'end_photo_date',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    protected $with = ['company', 'post'];
    
    protected $appends = ['resource_url', 'thumb_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/proles/'.$this->getKey());
    }

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }

    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    public function submission() 
    {
        return $this->hasMany(Submission::class);
    }

    public function requested_roles() 
    {
        return $this->hasMany(RequestRole::class)->where('status', '=', 'requested')->orWhere('status', '=', 'confirmed')->orWhere('status', '=', 'declined');
    }

    public function selected_roles() 
    {
        return $this->hasMany(RequestRole::class)->where('status', '=', 'selected');
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

    public function registrations()
    {
        return $this->belongsToMany(Registration::class);
    }

    public function loadGender() 
    {
        $arr = $this->getListGenders();
        foreach ($arr as $k=>$v) {
            if ($this->gender == $v['name'])
                $this->genders = $v;
        }
    }

    public static function getListRoleAge()
    {
        $arr = array(
            array(
                "name" => "Adult",
                "id" => "1"
            ),
            array(
                "name" => "Child",
                "id" => "2"
            ),
        );

        return $arr;
    }

    public function loadRoleAge() 
    {
        $arr = $this->getListRoleAge();
        foreach ($arr as $k=>$v) {
            if ($this->age == $v['name'])
                $this->ages = $v;
        }
    }

    public static function getListRoleType()
    {
        $arr = array(
            array(
                "name" => "Leading",
                "id" => "1"
            ),
            array(
                "name" => "Supporting",
                "id" => "2"
            ),
            array(
                "name" => "Cameo",
                "id" => "3"
            ),
            array(
                "name" => "Day Player",
                "id" => "4"
            ),
            array(
                "name" => "5 and Under",
                "id" => "5"
            ),
            array(
                "name" => "Background",
                "id" => "6"
            ),
            array(
                "name" => "Other",
                "id" => "7"
            )
        );

        return $arr;
    }

    public function loadRoleType() 
    {
        $arr = $this->getListRoleType();
        foreach ($arr as $k=>$v) {
            if ($this->role_type == $v['name'])
                $this->role_types = $v;
        }
    }

    public function registerMediaCollections(): void {

        $this->addMediaCollection('gallery')
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

    }

    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(215)
                ->height(318)
                ->fit('crop', 215, 318)
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
        return $this->getFirstMediaUrl('thumbnail') ? : asset('assets/img/casting-board/role-1.jpg');
    }
}
