            <?php $__currentLoopData = $talents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $talent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $types = $talent->careers;
                    $arr = array();
                    foreach ($types as $k=>$v) {
                        $arr[] = '#'.$v->tag_name;
                    }
                    $str_type = implode(' ', $arr);

                    switch ($str_type) {
                        case '#Actor' :
                            $color = '#FFBB00';
                            break;
                        case '#Actress' :
                            $color = '#FFBB00';
                            break;
                        case '#Model' :
                            $color = '#779A15';
                            break;
                        case '#KOL' :
                            $color = '#F39F00';
                            break;
                        case '#Dancer' :
                            $color = '#F39F00';
                            break;
                        default :
                            $color = '#958A86';
                    }
                ?>
                
                <li class="item">
                    <a href="<?php echo e(route('talent_detail', $talent->id)); ?>" class="casting-card type-2">
                        <div class="img-wrap"><img class="main-img"
                                src="<?php echo e($talent->cover_url); ?>" alt="<?php echo e($talent->name); ?>" /></div>
                        <div class="content">
                            <b class="tag" style="background-color:<?php echo e($color); ?>"><?php echo e($str_type); ?></b>
                            <h5 class="heading"><?php echo e($talent->name); ?></h5>
                            <p class="info">
                                <span><i class="gender">Gender:&nbsp;</i><?php echo e($talent->gender); ?></span>
                                <span><i class="age">Age:&nbsp;</i><?php echo e($talent->age); ?></span>
                            </p>
                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/talent_pagination.blade.php ENDPATH**/ ?>