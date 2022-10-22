            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="item casting-card type-3">
                    <div class="content">
                        <b class="tag <?php echo e(tk1DisplayTags($role->post->types)); ?>"><?php echo e(tk1DisplayTypes($role->post->types)); ?></b>
                        <h5><a href="<?php echo e(route('role_detail', ['id'=>$role->id, 'slug'=>$role->slug])); ?>" class="heading"><?php echo e($role->name); ?></a></h5>
                        <h6><a href="<?php echo e(route('project_detail', ['id'=>$role->post_id, 'slug'=>$role->post->slug])); ?>" class="gold-txt"><?php echo e($role->post->name); ?></a></h6>
                        <p class="info">
                            <span><b class="city">Type:</b>&nbsp;<?php echo e($role->role_type); ?></span>
                            <span><b class="age">Age:</b>&nbsp;<?php echo e($role->age_range); ?></span>
                            <span><b class="gender">Gender:</b>&nbsp;<?php echo e($role->gender); ?></span>
                        </p>
                        <p class="desc"><?php echo e(Str::words($role->description, 7, '...')); ?></p>
                        <footer>
                            <time datetime="<?php echo e($role->post->expired_date); ?>"><span class="mb-480-hide">Submissions Due&nbsp;</span> <?php echo e(tk1FormatDate($role->post->expired_date)); ?></time>
                            <span><?php echo e($role->post->city_name); ?></span>
                        </footer>
                    </div>
                </li>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/casting_board_pagination.blade.php ENDPATH**/ ?>