<?php $__env->startSection('title', trans('admin.admin-user.actions.index')); ?>

<?php $__env->startSection('body'); ?>

    <admin-user-listing
        :data="<?php echo e($data->toJson()); ?>"
        :activation="!!'<?php echo e($activation); ?>'"
        :url="'<?php echo e(url('admin/admin-users')); ?>'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> <?php echo e(trans('admin.admin-user.actions.index')); ?>

                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="<?php echo e(url('admin/admin-users/create')); ?>" role="button"><i class="fa fa-plus"></i>&nbsp; <?php echo e(trans('admin.admin-user.actions.create')); ?></a>
                    </div>
                    <div class="card-body" v-cloak>
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

                                <div class="col-sm-auto form-group ">
                                    <select class="form-control" v-model="pagination.state.per_page">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                            </div>
                        </form>

                        <table class="table table-hover table-listing">
                            <thead>
                                <tr>
                                    <th is='sortable' :column="'id'"><?php echo e(trans('admin.admin-user.columns.id')); ?></th>
                                    <th is='sortable' :column="'first_name'"><?php echo e(trans('admin.admin-user.columns.first_name')); ?></th>
                                    <th is='sortable' :column="'last_name'"><?php echo e(trans('admin.admin-user.columns.last_name')); ?></th>
                                    <th is='sortable' :column="'email'"><?php echo e(trans('admin.admin-user.columns.email')); ?></th>
                                    <th is='sortable' :column="'activated'" v-if="activation"><?php echo e(trans('admin.admin-user.columns.activated')); ?></th>
                                    <th is='sortable' :column="'forbidden'"><?php echo e(trans('admin.admin-user.columns.forbidden')); ?></th>
                                    <th is='sortable' :column="'language'"><?php echo e(trans('admin.admin-user.columns.language')); ?></th>
                                    <th is='sortable' :column="'last_login_at'"><?php echo e(trans('admin.admin-user.columns.last_login_at')); ?></th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">
                                    <td >{{ item.id }}</td>
                                    <td >{{ item.first_name }}</td>
                                    <td >{{ item.last_name }}</td>
                                    <td >{{ item.email }}</td>
                                    <td v-if="activation">
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].activated" @change="toggleSwitch(item.resource_url, 'activated', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td >
                                        <label class="switch switch-3d switch-danger">
                                            <input type="checkbox" class="switch-input" v-model="collection[index].forbidden" @change="toggleSwitch(item.resource_url, 'forbidden', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>
                                    <td >{{ item.language }}</td>
                                    <td >{{ item.last_login_at | datetime }}</td>
                                    
                                    <td>
                                        <div class="row no-gutters">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.admin-user.impersonal-login')): ?>
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-success" v-show="item.activated" @click="impersonalLogin(item.resource_url + '/impersonal-login', item)" title="Impersonal login" role="button"><i class="fa fa-user-o"></i></button>
                                            </div>
                                            <?php endif; ?>
                                            <div class="col-auto">
                                                <button class="btn btn-sm btn-warning" v-show="!item.activated" @click="resendActivation(item.resource_url + '/resend-activation')" title="Resend activation" role="button"><i class="fa fa-envelope-o"></i></button>
                                            </div>
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
                            <a class="btn btn-primary btn-spinner" href="<?php echo e(url('admin/admin-users/create')); ?>" role="button"><i class="fa fa-plus"></i>&nbsp; <?php echo e(trans('brackets/admin-ui::admin.btn.new')); ?> AdminUser</a>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-user-listing>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('brackets/admin-ui::admin.layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/admin-user/index.blade.php ENDPATH**/ ?>