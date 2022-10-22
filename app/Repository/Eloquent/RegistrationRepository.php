<?php

namespace App\Repository\Eloquent;

use App\Models\Registration;
use App\Models\Tag;
use App\Models\City;
use App\Repository\RegistrationRepositoryInterface;

class RegistrationRepository extends BaseRepository implements RegistrationRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Registration $model)
    {
        $this->model = $model;
    }

    public function getByEmail($email='')
    {
        return $this->model->where('email', '=', $email)->first();
    }

    public function getListTalents($numRecord, $gender='', $strRole='')
    {
        if ($strRole != '' ) {
            return $this->model->where('status', '=', Registration::APPROVED)
                            ->when($gender, function ($query, $gender) {
                                return $query->where('gender', $gender);
                            })
                            ->whereHas('looking_roles', function($query) use($strRole) {
                                return $query->whereIn('tag_id', [$strRole]);
                            })
                           ->paginate($numRecord);
        }
        else {
            return $this->model->where('status', '=', Registration::APPROVED)
                        ->when($gender, function ($query, $gender) {
                            return $query->where('gender', $gender);
                        })
                    ->paginate($numRecord); 
        }
        
    }

    public function getRegistrationInfo()
    {
        $arrInfo = array();
        foreach (Tag::all() as $tag) 
        {
            if ($tag->tag_name == 'Other')
                continue;
                
            $arrInfo[$tag->tag_type][$tag->id] = $tag->tag_name;
        }

        return $arrInfo;
    }

    public function getCity($numRecord=0)
    {
        if ($numRecord > 0)
            return City::orderBy('weight')->take($numRecord)->get();
        else
            return City::orderBy('weight')->get();
    }

    public function getGallery()
    {
        return $this->model->getListGalleryImage();
    }
}