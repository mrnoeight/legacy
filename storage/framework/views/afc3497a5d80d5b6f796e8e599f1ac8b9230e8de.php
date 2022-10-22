

<?php $__env->startSection('title', 'News Events'); ?>

<?php $__env->startSection('hidden_page', 'News Events'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-news-event">
    <input type="hidden" id="page-id" value="page-news-event"/>
    <section class="heading-banner">
        <h2 class="heading"><span class="gold-underline">News</span> &amp; Event</h2>
        <p>Stay up to date with the latest information from Take1 and the industry.</p>
    </section>

    <div class="wrap wrap-1200">
        <div id="curator-feed-default-feed-layout"></div>
    </div>

    
</main>
<!-- END MAIN PAGE -->

<?php echo $__env->make('web.partials.how_it_works', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Join Us</h4>
            <div class="content">
                <p>Sign up in just minutes and take your acting career to the next level.</p>
                <div class="btn-wrap">
                    <a href="<?php echo e(route('signup')); ?>" class="btn-gold-arrow cta" role="button">
                        <h5>Sign up as a talent</h5>
                    </a>
                    <span>Or</span>
                    <a href="<?php echo e(route('signup')); ?>" class="btn-black-arrow cta" role="button">
                        <h5>Sign up as client</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<script type="text/javascript">
  /* curator-feed-default-feed-layout */
  (function(){
  var i,e,d=document,s="script";i=d.createElement("script");i.async=1;i.charset="UTF-8";
  i.src="https://cdn.curator.io/published/508b9349-b198-4598-ac78-19912d1ccf84.js";
  e=d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
  })();
</script>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/newsevent.blade.php ENDPATH**/ ?>