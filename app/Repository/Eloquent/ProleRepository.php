<?php

namespace App\Repository\Eloquent;

use App\Models\Prole;
use App\Repository\ProleRepositoryInterface;

class ProleRepository extends BaseRepository implements ProleRepositoryInterface
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
    public function __construct(Prole $model)
    {
        $this->model = $model;
    }

    public function getRecommendedRoles($numRecord, $search='')
    {
        return $this->model
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })
        ->paginate($numRecord);
    }

    public function getRoles($numRecord, $search='', $city='')
    {
        return $this->model->when($search, function ($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })
        ->when($city, function ($query, $city) {
            return $query->whereHas('post', function ($query) use($city) {
                    $query->whereIn('city_id', $city);
                });
        })
        // ->whereHas('post', function ($query) {
        //     return $query->where('city_id', 27);
        // })
        ->paginate($numRecord);
    }

    public function getListRoleType()
    {
        return $this->model->getListRoleType();
    }

}