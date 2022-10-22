<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title"><?php echo e(trans('Talent Registrations')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/registrations?stat=0')); ?>"><i class="nav-icon icon-drop"></i> <?php echo e(trans('New Registrations')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/registrations?stat=1')); ?>"><i class="nav-icon icon-book-open"></i> <?php echo e(trans('Talent Users')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/registrations?stat=2')); ?>"><i class="nav-icon icon-drop"></i> <?php echo e(trans('UnApproved Users')); ?></a></li>
            
            <li class="nav-title"><?php echo e(trans('Client Registrations')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/companies')); ?>"><i class="nav-icon icon-energy"></i> <?php echo e(trans('admin.company.title')); ?></a></li>           

            <li class="nav-title"><?php echo e(trans('Job Posts')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/posts')); ?>"><i class="nav-icon icon-compass"></i> <?php echo e(trans('admin.post.title')); ?></a></li>

            <li class="nav-title"><?php echo e(trans('News / Events')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/events')); ?>"><i class="nav-icon icon-magnet"></i> <?php echo e(trans('admin.event.title')); ?></a></li>


            <li class="nav-title"><?php echo e(trans('brackets/admin-ui::admin.sidebar.content')); ?></li>
            <!-- <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/tags')); ?>"><i class="nav-icon icon-globe"></i> <?php echo e(trans('admin.tag.title')); ?></a></li> -->
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/cities')); ?>"><i class="nav-icon icon-graduation"></i> <?php echo e(trans('admin.city.title')); ?></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/pages')); ?>"><i class="nav-icon icon-ghost"></i> <?php echo e(trans('admin.page.title')); ?></a></li>
           
           <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/blocks')); ?>"><i class="nav-icon icon-energy"></i> <?php echo e(trans('admin.block.title')); ?></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/proles')); ?>"><i class="nav-icon icon-compass"></i> <?php echo e(trans('admin.prole.title')); ?></a></li>
           <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/experiences')); ?>"><i class="nav-icon icon-globe"></i> <?php echo e(trans('admin.experience.title')); ?></a></li>
           

            <li class="nav-title"><?php echo e(trans('brackets/admin-ui::admin.sidebar.settings')); ?></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/admin-users')); ?>"><i class="nav-icon icon-user"></i> <?php echo e(__('Manage access')); ?></a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="<?php echo e(url('admin/translations')); ?>"><i class="nav-icon icon-location-pin"></i> <?php echo e(__('Translations')); ?></a></li> -->
            
            
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<?php /**PATH C:\xampp2\htdocs\take1\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>