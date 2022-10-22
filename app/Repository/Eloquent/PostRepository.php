<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use App\Repository\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
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
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getListPosts($numRecord)
    {
        return $this->model->take($numRecord)->get();
    }

    public function getListClientPosts($client_id)
    {
        return $this->model->where('company_id', $client_id)->get();
    }

    public function getListGenders()
    {
        return $this->model->getListGenders();
    }

    public function getPostBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->firstOrFail();
    }
}