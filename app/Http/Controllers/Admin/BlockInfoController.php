<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlockInfo\BulkDestroyBlockInfo;
use App\Http\Requests\Admin\BlockInfo\DestroyBlockInfo;
use App\Http\Requests\Admin\BlockInfo\IndexBlockInfo;
use App\Http\Requests\Admin\BlockInfo\StoreBlockInfo;
use App\Http\Requests\Admin\BlockInfo\UpdateBlockInfo;
use App\Models\BlockInfo;
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

class BlockInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBlockInfo $request
     * @return array|Factory|View
     */
    public function index(IndexBlockInfo $request)
    {
        if ($request->ajax()) {
            $request->request->add(['block_type' => session('block_type', 0)]);
        }

        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(BlockInfo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'head_tag1', 'head_title1', 'head_desc1', 'info1', 'block_name', 'block_type', 'block_date'],

            // set columns to searchIn
            ['id', 'head_tag1', 'head_title1', 'head_desc1', 'info1', 'block_name', 'block_type'],

            function ($query) use ($request) {

                if ($request->has('block_type') || $request->ajax()) {
                    $query->where('block_type', $request->get('block_type'));
                    session(['block_type' => $request->get('block_type')]);
                }

                if ($request->has('block_type') && \in_array($request->block_type, array('health_utilities', 'entertainment', 'business', 'slider_home', 'gallery_home', 'partner', 'slider_facilities', 'slider_facilities2', 'gallery_photo', 'video', 'master_gallery', 'basic_service', 'enhance_service', 'butler_service', 'consultant'))) {
                    $query->orderBy('order_id');
                }

                if (substr($_GET['block_type'], 0, 2 ) == 'f_') {
                    $query->orderBy('order_id');
                }
            },
        );


        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }
        if ($_GET['block_type'] == 'progress')
            return view('admin.block-info.progress', ['data' => $data]);
        else if (in_array($_GET['block_type'], array('health_utilities', 'entertainment', 'business')))
            return view('admin.block-info.health_utilities', ['data' => $data]);
        else if (in_array($_GET['block_type'], array('slider_home', 'gallery_home', 'partner', 'slider_facilities', 'slider_facilities2', 'gallery_photo', 'video', 'master_gallery', 'basic_service', 'enhance_service', 'butler_service', 'consultant')))
            return view('admin.block-info.index_gallery', ['data' => $data]);
        else if (substr($_GET['block_type'], 0, 2 ) == 'f_') {
            return view('admin.block-info.index_gallery', ['data' => $data]);
        }
        else
            return view('admin.block-info.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.block-info.create');

        return view('admin.block-info.create', ['mode' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlockInfo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBlockInfo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['block_type'] = $_GET['block_type'];
        

        // Store the BlockInfo
        $blockInfo = BlockInfo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/block-infos?block_type='.$_GET['block_type']), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/block-infos?block_type='.$_GET['block_type']);
    }

    /**
     * Display the specified resource.
     *
     * @param BlockInfo $blockInfo
     * @throws AuthorizationException
     * @return void
     */
    public function show(BlockInfo $blockInfo)
    {
        $this->authorize('admin.block-info.show', $blockInfo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlockInfo $blockInfo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(BlockInfo $blockInfo)
    {
        $this->authorize('admin.block-info.edit', $blockInfo);


        return view('admin.block-info.edit', [
            'blockInfo' => $blockInfo,
            'mode' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBlockInfo $request
     * @param BlockInfo $blockInfo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBlockInfo $request, BlockInfo $blockInfo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['block_type'] = $_GET['block_type'];

        //print_r($sanitized);exit;

        // Update changed values BlockInfo
        $blockInfo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/block-infos?block_type='.$_GET['block_type']),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/block-infos?block_type='.$_GET['block_type']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBlockInfo $request
     * @param BlockInfo $blockInfo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBlockInfo $request, BlockInfo $blockInfo)
    {
        $blockInfo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBlockInfo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBlockInfo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    BlockInfo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function updateOrder(IndexBlockInfo $request) : Response
    {
        //print_r($request->arrID);exit;
        DB::transaction(static function () use ($request) {
            foreach ($request->arrID as $i=>$id)
                BlockInfo::where('id', $id)->update(['order_id' => $i]);
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
