<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Homepage\BulkDestroyHomepage;
use App\Http\Requests\Admin\Homepage\DestroyHomepage;
use App\Http\Requests\Admin\Homepage\IndexHomepage;
use App\Http\Requests\Admin\Homepage\StoreHomepage;
use App\Http\Requests\Admin\Homepage\UpdateHomepage;
use App\Models\Homepage;
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
use Session;

class HomepageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexHomepage $request
     * @return array|Factory|View
     */
    public function index(IndexHomepage $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Homepage::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'head_tag1', 'head_title1', ],

            // set columns to searchIn
            ['id', 'head_tag1', 'head_title1', 'head_desc1', 'mid_tag1', 'mid_title1', 'mid_desc1', 'info1', 'info2', 'info3', 'info4', 'info5', 'page_name', 'seo_title', 'seo_description', 'seo_author']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.homepage.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.homepage.create');

        return view('admin.homepage.create', [
            'mode' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHomepage $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreHomepage $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        //print_r($sanitized);exit;

        // Store the Homepage
        $homepage = Homepage::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/homepages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/homepages');
    }

    /**
     * Display the specified resource.
     *
     * @param Homepage $homepage
     * @throws AuthorizationException
     * @return void
     */
    public function show(Homepage $homepage)
    {
        $this->authorize('admin.homepage.show', $homepage);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Homepage $homepage
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Homepage $homepage)
    {
        $this->authorize('admin.homepage.edit', $homepage);


        return view('admin.homepage.edit', [
            'homepage' => $homepage,
            'mode' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateHomepage $request
     * @param Homepage $homepage
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateHomepage $request, Homepage $homepage)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        //print_r($sanitized);exit;

        // Update changed values Homepage
        $homepage->update($sanitized);

        Session::flash('success', "Data is saved successfully!");

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/homepages/'.$homepage->id.'/edit?pg='.$_GET['pg']),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return [
            'redirect' => url('admin/homepages/'.$homepage->id.'/edit?pg='.$_GET['pg']),
            'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyHomepage $request
     * @param Homepage $homepage
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyHomepage $request, Homepage $homepage)
    {
        $homepage->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyHomepage $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyHomepage $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Homepage::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
