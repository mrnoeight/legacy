    <div class="container">
        <div class="left">
            <div class="btnBack js-closefloorplandetail"><span></span></div>
            <div class="top">
                <p><img class="lazyload btnBackAr js-closefloorplandetail"
                        data-src="<?php echo e(asset('assets/images/btn-back.png')); ?>" alt=""> Mặt bằng tòa / tòa <?php echo e(str_replace('building','',$apartment->block_type)); ?> / tầng <?php echo e($apartment->info2); ?></p>
                <h2 class="mainTt"><?php echo e($apartment->head_title1); ?></h2>
            </div>
            <div class="bottom">
                <div class="item">
                    <p>Mã căn hộ: <strong><?php echo e($apartment->block_name); ?></strong></p>
                </div>
                <div class="item">
                    <p>Diện tích thông thủy: <strong><?php echo e($apartment->info4); ?> m<sup>2</sup></strong></p>
                </div>
                <div class="item">
                    <p>Sàn thép: <strong><?php echo e($apartment->info7); ?></strong></p>
                </div>
                <div class="item">
                    <p>Diện tích tim tường: <strong><?php echo e($apartment->info5); ?> m<sup>2</sup></strong></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="mainImgFP">
                <img data-src="<?php echo e($apartment->banner_url); ?>" class="lazyload" />

                <div class="opSlideGallery">
                    <div class="btnSlider style2 btnSliderPrev">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class=" circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>
                    <div class="btnSlider style2 btnSliderNext">
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <circle class="circle" cx="50" cy="50" r="48" stroke="#a3815f" stroke-width="2"
                                fill="none" />
                        </svg>

                    </div>

                </div>
            </div>
            <div class="locaImgFP">
                <p>Vị trí căn hộ <img data-src="<?php echo e(asset('assets/images/lb.png')); ?>" class="lazyload" /></p>
                <img data-src="<?php echo e($apartment->banner_mb_url); ?>" class="lazyload" />
            </div>

        </div>
    </div><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/apartment_info.blade.php ENDPATH**/ ?>