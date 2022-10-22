<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Support\Facades\Password;
use App\Notifications\NewTalentRegister;

class Registration extends Authenticatable implements HasMedia,\Illuminate\Contracts\Auth\CanResetPassword
{
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use Notifiable;
    use CanResetPassword;
    
    const TALENT = 1;
    const CLIENT = 2;
    const REGISTERED = 0;
    const APPROVED = 1;
    const UNAPPROVED = 2;     

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'stage_name',
        'email',
        'hometown',
        'birthday',
        'current_career',
        'has_agency',
        'agency_name',
        'want_agency',
        'your_experience',
        'searching_for',
        'youtube_link',
        'facebook_link',
        'instagram_link',
        'tiktok_link',
        'weight',
        'height',
        'type',
        'status',
        'enabled',
        'bio',
        'published_at',
        'username',
        'password',
        'city_id',
        'gender',
        'chest',
        'waist',
        'hip',
        'shoes',
        'address',
        'parent_name',
        'phone_number',
        'country_code',
        'age_from',
        'age_to',
        'current-occupation-other',
        'work-considered-other',
        'role-considered-other',
        'type-role-other',
        'past-exp-other',
        'speak-language-other',
        'ethnicity-other',
        'citizenship-other',
        'vocal-other',
        'instruments-other',
        'tattoos-other',
        'sports-other',
        'dancing-other',
        'martial-other',
    ];

    protected $with = ['city'];
    
    protected $hidden = [
        'password',
        'remember_token',
    
    ];
    
    protected $dates = [
        'birthday',
        'published_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url', 'cover_url', 'CV_url', 'cover_headshot_url', 'cover_fullbody_url', 'cover_anglebody_url', 'cover_face_fullbody_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/registrations/'.$this->getKey());
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function city() 
    {
        return $this->belongsTo(City::class);
    }

    public function request_roles() 
    {
        return $this->hasMany(RequestRole::class);
    }

    public function messages() 
    {
        return $this->hasMany(Message::class)->orderBy('id', 'DESC');
    }

    public function career_experience() 
    {
        return $this->hasMany(Experience::class);
    }

    public function proles()
    {
        return $this->belongsToMany(Prole::class)->withPivot('status'); //, 'prole_registration', 'registration_id', 'prole_id'
    }

    public function careers()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'occupation');
    }

    public function experience()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'experience');
    }

    public function looking()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'looking_for');
    }

    public function looking_roles()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'looking_for_role');
    }

    public function accept_roles()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'accept_role');
    }

    public function speaking_languages()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'language');
    }

    public function ethnicities()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'ethnicity');
    }

    public function nationalities()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'nationality');
    }

    public function voice_vocals()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'voice_vocal');
    }

    public function instruments()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'instrument');
    }

    public function tattoos()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'tattoo');
    }

    public function sports()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'sport');
    }

    public function dances()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'dance');
    }

    public function martial_arts()
    {
        return $this->belongsToMany(Tag::class)->where('tag_type', '=', 'material_art');
    }

    public function latestPayment()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc')->first();
    }

    public static function getListStatus()
    {
        $arr = array(
            array(
                "name" => "New",
                "id" => "0"
            ),
            array(
                "name" => "Approved",
                "id" => "1"
            ),
            array(
                "name" => "UnApproved",
                "id" => "2"
            )
        );

        return $arr;
    }

    public function loadStatus() 
    {
        $arr = $this->getListStatus();
        foreach ($arr as $k=>$v) {
            if ($this->status == $v['id'])
                $this->statuses = $v;
        }
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
                "name" => "LGBT",
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

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery')
            //->accepts('image/*')
            ->maxNumberOfFiles(20);

        $this->addMediaCollection('cover')
            ->accepts('image/*');

        $this->addMediaCollection('cover_headshot')
            ->accepts('image/*');

        $this->addMediaCollection('cover_fullbody')
            ->accepts('image/*');

        $this->addMediaCollection('cover_anglebody')
            ->accepts('image/*');

        $this->addMediaCollection('cover_face_fullbody')
            ->accepts('image/*');

        $this->addMediaCollection('resume_file')
            ->maxNumberOfFiles(10);
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

        $this->addMediaConversion('thumb_440')
            ->width(440)
            ->height(528)
            ->fit('crop', 440, 528)
            ->optimize()
            ->performOnCollections('cover')
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
    public function getCoverUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('cover', 'thumb_440') ? : "";
    }

    /**
     * Get url of CV
     *
     * @return string|null
     */
    public function getCVUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('resume_file') ? : "";
    }

    /**
     * Get url of thumbnail image
     *
     * @return string|null
     */
    public function getCoverHeadshotUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('cover_headshot') ? : "";
    }

    /**
     * Get url of thumbnail image
     *
     * @return string|null
     */
    public function getCoverFullbodyUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('cover_fullbody') ? : "";
    }

    /**
     * Get url of thumbnail image
     *
     * @return string|null
     */
    public function getCoverAnglebodyUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('cover_anglebody') ? : "";
    }

    /**
     * Get url of thumbnail image
     *
     * @return string|null
     */
    public function getCoverFaceFullbodyUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('cover_face_fullbody') ? : "";
    }


    /**
     * Get list url of gallery image
     *
     * @return array
     */
    public function getListGalleryImage() : ? array
    {
        $arrGallery = array();
        $gallery = $this->getMedia('gallery');
        
        foreach ($gallery as $k=>$v)
             $arrGallery[$k] = $v->getUrl();

        return $arrGallery;
    }

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new NewTalentRegister($token));
    }

    public function getCareerList($char)
    {
        $types = $this->careers;
        $arr = array();
        foreach ($types as $k=>$v) {
            $arr[] = $v->tag_name;
        }
        $str_type = implode($char, $arr);

        return $str_type;
    }
}
