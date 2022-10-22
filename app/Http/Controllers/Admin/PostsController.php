<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\BulkDestroyPost;
use App\Http\Requests\Admin\Post\DestroyPost;
use App\Http\Requests\Admin\Post\IndexPost;
use App\Http\Requests\Admin\Post\StorePost;
use App\Http\Requests\Admin\Post\UpdatePost;
use App\Models\Post;
use App\Models\Company;
use App\Models\City;
use App\Models\Tag;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View; 

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPost $request
     * @return array|Factory|View
     */
    public function index(IndexPost $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Post::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'type', 'city_name', 'gender', 'age', 'company_id', 'expired_date', 'published_at', 'enabled'],

            // set columns to searchIn
            ['name->en', 'name->vi', 'slug', 'city_name', 'gender', 'age', 'description'],

            function ($query) use ($request) {
                $query->with(['company']);
                
                
                if($request->has('company')){
                    $query->whereIn('company_id', $request->get('company'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.post.index', [
                'data' => $data,
                'company' => Company::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.post.create');

        //return view('admin.post.create');

        return view('admin.post.create', [
            'company' => Company::all(),
            'city' => City::all(),
            'tags' => Tag::where('tag_type', 'post_type')->get(),
            'post_type' => Tag::where('tag_type', 'experience')->get(),
            'genders' => Post::getListGenders(),
            'project_budget' => Post::getListBudgets(),
            'mode' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePost $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePost $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['company_id'] = $request->getCompanyId();
        $sanitized['city_name'] = $request->getCity();
        $sanitized['city_id'] = $request->getCityId();
        $sanitized['gender'] = $request->getGender();
        //$sanitized['tags'] = $request->getTags();
        $sanitized['types'] = $request->getPostTypes();
        $sanitized['project_budget'] = $request->getProjectBudget();

        if ($sanitized['slug'] == '' || !isset($sanitized['slug']))
            $sanitized['slug'] = str_slug($sanitized['name']['vi'], '-');
        else
            $sanitized['slug'] = str_slug($sanitized['slug'], '-');

        // Store the Post
        //$post = Post::create($sanitized);

        DB::transaction(function () use ($sanitized) {
            // Store the Post
            $post = Post::create($sanitized);

            // Store the Post_Tag_Relationship
            //$post->tags()->attach($sanitized['tags']);
            $post->types()->attach($sanitized['types']);
        });

        if ($request->ajax()) {
            return ['redirect' => url('admin/posts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @throws AuthorizationException
     * @return void
     */
    public function show(Post $post)
    {
        $this->authorize('admin.post.show', $post);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Post $post)
    {
        $this->authorize('admin.post.edit', $post);
        $post->load('tags');
        $post->load('types');
        $post->loadGender();
        $post->loadBudget();

        //print_r($post);


        return view('admin.post.edit', [
            'post' => $post,
            'company' => Company::all(),
            'city' => City::orderBy('weight')->get(),
            'tags' => Tag::where('tag_type', 'post_type')->get(),
            'post_type' => Tag::where('tag_type', 'experience')->get(),
            'genders' => Post::getListGenders(),
            'project_budget' => Post::getListBudgets(),
            'mode' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePost $request
     * @param Post $post
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePost $request, Post $post)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['company_id'] = $request->getCompanyId();
        $sanitized['city_name'] = $request->getCity();
        $sanitized['city_id'] = $request->getCityId();
        $sanitized['gender'] = $request->getGender();
        //$sanitized['tags'] = $request->getTags();
        $sanitized['types'] = $request->getPostTypes();
        $sanitized['project_budget'] = $request->getProjectBudget();

        if ($sanitized['slug'] == '' || !isset($sanitized['slug']))
            $sanitized['slug'] = str_slug($sanitized['name']['vi'], '-');
        else
            $sanitized['slug'] = str_slug($sanitized['slug'], '-');

        //print_r($request->thumbnail);exit;

        // Update changed values Post
        //$post->update($sanitized);

        DB::transaction(function () use ($post, $sanitized) {
            // Update changed values Post_tag_Relationship
            $post->update($sanitized);
            $post->types()->detach();
            //$post->tags()->attach($sanitized['tags']);
            $post->types()->attach($sanitized['types']);
            //$post->tags()->sync($sanitized['tags']);
            //$post->types()->sync($sanitized['types']);
        });

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/posts'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'object' => $post
            ];
        }

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPost $request
     * @param Post $post
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPost $request, Post $post)
    {
        $post->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPost $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPost $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Post::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
