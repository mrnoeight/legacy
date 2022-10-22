

<?php $__env->startSection('title', 'Lancaster by Trung Thuy'); ?>

<?php $__env->startSection('hidden_page', 'Lancaster by Trung Thuy'); ?>

<?php $__env->startSection('content'); ?>

<!-- MAIN PAGE -->
<main id="pMaster">
    <div class="bannerSubPage go-up">
        <img class="lazyload pc" data-src="<?php echo e($oPage->banner_url); ?>" alt="">
        <img class="lazyload mb" data-src="<?php echo e($oPage->banner_mb_url); ?>" alt="">
        <div class="container stagger-down">
            <h2 class="mainTt"><?php echo nl2br($oPage->head_title1); ?></h2>
            <div class="copy">
                <p><?php echo e($oPage->head_desc1); ?>

                </p>
            </div>
        </div>
    </div>
    <section class="masterWrap">
        <div class="top" data-image-src="<?php echo e($oPage->middle_banner_url); ?>" data-parallax="scroll" data-bleed="0"
            data-speed="0.4">
            <div class="container animate">
                <img data-src="<?php echo e(asset('assets/images/logo-big.png')); ?>" alt="" class="lazyload">
                <p><?php echo e($oPage->mid_desc1); ?></p>
            </div>
        </div>
        <div class="container">
            <div class="listImg">
                <?php $__currentLoopData = $oMaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="imgPage">
                    <div style="background: url(<?php echo e($master->banner_url); ?>) center no-repeat"></div>
                    <img data-src="<?php echo e(asset('assets/images/thumb3.gif')); ?>" class="lazyload" />
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <div class="spaceH"></div>
    <section id="LancasterTheMaster" class="serviceWrap pd1" data-image-src="<?php echo e(asset('assets/images/demo/bg-service.jpg')); ?>"
        data-parallax="scroll" data-bleed="0" data-speed="0.4">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">LANCASTER THE MASTER</h2>
            </div>
            <div class="serviceSectionList">
                <div class="itemSer ser1">
                    <h3>dịch vụ <br />
                        cơ bản</h3>
                    <?php $__currentLoopData = $oBasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img data-src="<?php echo e($ser->banner_url); ?>" class="lazyload">
                        <p><?php echo e($ser->head_title1); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
                <div class="itemSer ser2">
                    <h3>dịch vụ <br />
                        nâng cao</h3>
                    <?php $__currentLoopData = $oEnhance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img data-src="<?php echo e($ser->banner_url); ?>" class="lazyload">
                        <p><?php echo e($ser->head_title1); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
                <div class="itemSer ser3">
                    <h3>dịch vụ <br />
                        quản gia cao cấp</h3>
                    <?php $__currentLoopData = $oButler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img data-src="<?php echo e($ser->banner_url); ?>" class="lazyload">
                        <p><?php echo e($ser->head_title1); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <section id="LancasterClub" class="lancasterClubWrap pd1">
        <img class="lazyload bgClubMb" data-src="<?php echo e(asset('assets/images/demo/bg-club-mb.jpg')); ?>" alt="">
        <div class="container">
            <div class="ttPage animate">
                <h2 class="mainTt">Lancaster the club</h2>
                <p>Lancaster Club kiến tạo nên cộng đồng tinh hoa ưu việt, nơi những tâm hồn đồng điệu về chất sống giao
                    lưu và chia sẻ các giá trị thành công; mở ra cánh cửa trải nghiệm không giới hạn và mang đến nhiều
                    ưu đãi vô cùng hấp dẫn cho chủ nhân sở hữu. </p>
            </div>
        </div>
        <div class="linkCard left">
            <div class="card"></div>
            <div class="clickCardDesktop jsOpenCard"></div>
            <div index="0" class="clickCardMobile"></div>
            <div class="tooltipCard right">
                <div class="closeTooltip">
                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                    </svg>
                </div>
                <div class="copyCard">
                    <h2><?php echo e($platinumCard->head_title1); ?></h2>
                    <div class="text">
                        <p><?php echo e($platinumCard->head_tag1); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="linkCard center ">
            <div class="card"></div>
            <div class="clickCardDesktop jsOpenCard"></div>
            <div index="1" class="clickCardMobile"></div>
            <div class="tooltipCard right">
                <div class="closeTooltip">
                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                    </svg>
                </div>
                <div class="copyCard">
                    <h2><?php echo e($diamondCard->head_title1); ?></h2>
                    <div class="text">
                        <p><?php echo e($diamondCard->head_tag1); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="linkCard right">
            <div class="card"></div>
            <div class="clickCardDesktop jsOpenCard"></div>
            <div index="2" class="clickCardMobile"></div>
            <div class="tooltipCard left">
                <div class="closeTooltip">
                    <svg width="1em" height="1em" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0.120014V19.5" stroke="currentcolor" />
                        <path d="M0.879883 10L20.2599 10" stroke="currentcolor" />
                    </svg>
                </div>
                <div class="copyCard">
                    <h2><?php echo e($goldCard->head_title1); ?></h2>
                    <div class="text">
                        <p><?php echo e($goldCard->head_tag1); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ovlCard"></div>
    </section>
    <section class="captionCardWrap">
        <div class="caption">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi, adipiscing convallis ut ut diam ut
                praesent. Est pellentesque nulla ullamcorper nibh malesuada.Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Nisi, adipiscing convallis ut ut diam ut praesent. Est pellentesque</p>
        </div>
        <div class="sliderCard">
            <div class="item">
                <h2><?php echo e($platinumCard->head_title1); ?></h2>
                <div class="text">
                    <p><?php echo e($platinumCard->head_tag1); ?>

                    </p>
                </div>
            </div>
            <div class="item">
                <h2><?php echo e($diamondCard->head_title1); ?>d</h2>
                <div class="text">
                    <p><?php echo e($diamondCard->head_tag1); ?>

                    </p>
                </div>
            </div>
            <div class="item">
                <h2><?php echo e($goldCard->head_title1); ?></h2>
                <div class="text">
                    <p><?php echo e($goldCard->head_tag1); ?>

                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="ConsultingTeam" class="teamPageWrap pd1" data-image-src="<?php echo e(asset('assets/images/demo/bg-team.jpg')); ?>"
        data-parallax="scroll" data-bleed="0" data-speed="0.4">
        <img class="lazyload bgClubMb" data-src="<?php echo e(asset('assets/images/demo/bg-team.jpg')); ?>" alt="">
        <div class="container">
            <div class="copy">
                <h2 class="mainTt">đội ngũ tư vấn</h2>
                <p>Lancaster Club kiến tạo nên cộng đồng tinh hoa ưu việt, nơi những tâm hồn đồng điệu về chất sống giao
                    lưu và chia sẻ các giá trị thành công; mở ra cánh cửa trải nghiệm không giới hạn và mang đến nhiều
                    ưu đãi vô cùng hấp dẫn cho chủ nhân sở hữu. </p>
                <div class="btnWrap">
                    <div class="btn openPopupTeam">
                        <span>SEE MORE</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>

<div class="popup PopupTeam">

    <div class="container">
        <div class="btnClose jsClosePopupTeam"></div>
        <div class="slideTeamPopup">
            <?php $__currentLoopData = $arrConsultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $arr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="teamSmall">
                    <div class="imgPage">
                        <div style="background: url(<?php echo e($c->banner_url); ?>) center no-repeat"></div>
                        <img data-src="<?php echo e(asset('assets/images/thumb4.gif')); ?>" class="lazyload" />
                    </div>
                    <div class="copy">
                        <h2><?php echo e($c->head_title1); ?></h2>
                        <p><?php echo e($c->head_tag1); ?></p>
                        <div class="text">
                            <p><?php echo e($c->head_desc1); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
            
            
            
            
            
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\legacy\resources\views/web/lancaster.blade.php ENDPATH**/ ?>