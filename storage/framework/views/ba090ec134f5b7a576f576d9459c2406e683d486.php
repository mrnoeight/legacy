<?php $__env->startSection('title', trans('admin.post.actions.index')); ?>

<?php $__env->startSection('body'); ?>

    <post-listing
        :data="<?php echo e($data->toJson()); ?>"
        :url="'<?php echo e(url('admin/posts')); ?>'"
        :trans="<?php echo e(json_encode(trans('brackets/admin-ui::admin.dialogs'))); ?>"
        inline-template>


        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> <?php echo e(trans('admin.post.actions.index')); ?>

                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="<?php echo e(url('admin/posts/create')); ?>" role="button"><i class="fa fa-plus"></i>&nbsp; <?php echo e(trans('admin.post.actions.create')); ?></a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="<?php echo e(trans('brackets/admin-ui::admin.placeholder.search')); ?>" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; <?php echo e(trans('brackets/admin-ui::admin.btn.search')); ?></button>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col form-group deadline-checkbox-col">
                                        <div class="switch-filter-wrap">
                                            <label class="switch switch-3d switch-primary">
                                                <input type="checkbox" class="switch-input" v-model="showCompanyFilter" >
                                                <span class="switch-slider"></span>
                                            </label>
                                            <span class="company-filter">&nbsp;<?php echo e(__('Company filter')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" v-if="showCompanyFilter">
                                    <div class="col-sm-auto form-group">
                                        <p><?php echo e(__('Select company/s')); ?></p>
                                    </div>
                                    <div class="col col-lg-12 col-xl-12 form-group">
                                        <multiselect v-model="companyMultiselect"
                                            :options="<?php echo e($company->map(function($company) { return ['key' => $company->id, 'label' =>  $company->name]; })->toJson()); ?>"
                                            label="label"
                                            track-by="key"
                                            placeholder="<?php echo e(__('Type to search a company/s')); ?>"
                                            :limit="2"
                                            :multiple="true">
                                        </multiselect>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        
                                        <th is='sortable' :column="'name'"><?php echo e(trans('admin.post.columns.name')); ?></th>                                        
                                        <th is='sortable' :column="'city'"><?php echo e(trans('admin.post.columns.city')); ?></th>
                                        <th is='sortable' :column="'gender'"><?php echo e(trans('admin.post.columns.gender')); ?></th>
                                        <th is='sortable' :column="'age'"><?php echo e(trans('admin.post.columns.age')); ?></th>
                                        <th is='sortable' :column="'company_id'"><?php echo e(trans('admin.post.columns.company_id')); ?></th>
                                        <th is='sortable' :column="'expired_date'"><?php echo e(trans('admin.post.columns.expired_date')); ?></th>
                                        
                                        <!-- <th is='sortable' :column="'enabled'"><?php echo e(trans('admin.post.columns.enabled')); ?></th> -->

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="12">
                                            <span class="align-middle font-weight-light text-dark"><?php echo e(trans('brackets/admin-ui::admin.listing.selected_items')); ?> {{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/posts')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> <?php echo e(trans('brackets/admin-ui::admin.listing.check_all_items')); ?> {{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()"><?php echo e(trans('brackets/admin-ui::admin.listing.uncheck_all_items')); ?></a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/posts/bulk-destroy')"><?php echo e(trans('brackets/admin-ui::admin.btn.delete')); ?></button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                  
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.city_name }}</td>
                                        <td>{{ item.gender }}</td>
                                        <td>{{ item.age }}</td>
                                        <td>{{ item.company.name  }}</td>
                                        <td>{{ item.expired_date | date }}</td>
                                        
                                        
                                        <!-- <td>
                                            <label class="switch switch-3d switch-success">
                                                <input type="checkbox" class="switch-input" v-model="collection[index].enabled" @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                                <span class="switch-slider"></span>
                                            </label>
                                        </td> -->

                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="<?php echo e(trans('brackets/admin-ui::admin.btn.edit')); ?>" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="<?php echo e(trans('brackets/admin-ui::admin.btn.delete')); ?>"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption"><?php echo e(trans('brackets/admin-ui::admin.pagination.overview')); ?></span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3><?php echo e(trans('brackets/admin-ui::admin.index.no_items')); ?></h3>
                                <p><?php echo e(trans('brackets/admin-ui::admin.index.try_changing_items')); ?></p>
                                <a class="btn btn-primary btn-spinner" href="<?php echo e(url('admin/posts/create')); ?>" role="button"><i class="fa fa-plus"></i>&nbsp; <?php echo e(trans('admin.post.actions.create')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </post-listing>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/admin/post/index.blade.php ENDPATH**/ ?>