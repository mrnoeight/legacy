

<?php $__env->startSection('title', 'Casting Services'); ?>

<?php $__env->startSection('hidden_page', 'Castng Services'); ?>

<?php $__env->startSection('content'); ?>
<!-- MAIN PAGE -->
<main id="page-casting-services">
    <input type="hidden" id="page-id" value="page-casting-services" />
    <section class="heading-banner">
        <h2 class="heading"><span class="gold-underline">Casting</span> Services</h2>
        <p>Need a helping hand ?  The Take1 casting services team consists of experienced individuals to service your needs.</p>
    </section>

    <section class="carousel-holder service-board pd-ctr pt-0">
        <header class="wrap-1200">
            <h5 class="hidden">Casting Services</h5>
        </header>
        <div class="carousel col-3 wrap-1200">
            <ul class="item-wrap">
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/service-1.jpg')); ?>" alt="Coaching" /></div>
                        <div class="content">
                            <h6 class="heading">Talent Management</h6>
                            <p class="desc">Our experienced team of Talent managers will take a load off your back.    Allow them to manage your talent bookings, scheduling, contract negotiations, and other management duties that you don’t have the time for.  Our team will also manage, guide, and support your talent’s on set as well. </p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/service-2.jpg')); ?>" alt="Facility" /></div>
                        <div class="content">
                            <h6 class="heading">The Take1 Studio</h6>
                            <p class="desc">We offer a professional daylight studio featuring full camera & lighting equipment with an experienced crew to help you operate.  You will also be able to run multiple auditions & castings at the same time.  Our crew will also support to edit your audition videos for you as well.</p>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="content-card">
                        <div class="img-wrap"><img src="<?php echo e(asset('assets/img/our-talent/service-3.jpg')); ?>" alt="Talent" /></div>
                        <div class="content">
                            <h6 class="heading">Take1 Resources</h6>
                            <p class="desc">If you are lacking an experienced Casting Director to recommend you high potential rising talents or need acting coaches for performance coaching on auditions and callbacks, let us know and we’ll manage that for you.</p>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="paging">
                <li role="button" data-index="0"></li>
                <li role="button" data-index="1"></li>
                <li role="button" data-index="2"></li>
            </ul>
            <a href="#" role="button" class="btn-prev" title="prev item"><span></span></a>
            <a href="#" role="button" class="btn-next" title="next item"><span></span></a>
        </div>
    </section>

    <section class="vid-section">
        <div class="wrap-1200">
            <h2 class="heading">How Take1 Casting Services Work?</h2>
            <p class="desc">Watch the video to learn more about Take1’s casting services.</p>
            <div class="vid-wrap">
                
                <img class="place-holder" src="<?php echo e(asset('assets/img/video/place-holder.png')); ?>" alt="place holder" />
                <iframe src="https://www.youtube.com/embed/6ege2DNZla4" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>
</main>
<!-- END MAIN PAGE -->

<!-- FOOTER -->
<section class="how-it-works">
    <div class="wrap wrap-1200">
        <header>
            <h4 class="heading">How to Create an Account</h4>
            <p>It’s quick and easy.  A few mandatory pieces of information we need at first but after that, you are free to search talents from across the country.</p>
        </header>
        <ul class="step">
            <li class="deco">
                <h5 class="number">1</h5>
                <p>Fill out some basic information that we’ll need from you.</p>
            </li>
            <li class="deco flip">
                <h5 class="number">2</h5>
                <p>Submit your Project details and casting roles that you are looking for to Post on our Casting Board.</p>
            </li>
            <li>
                <h5 class="number">1</h5>
                <p>Sit back and let Take1 send you candidates for you to look at and invite them for auditions online or offline.</p>
            </li>
        </ul>
        <footer>
            <h4 class="heading">Action!</h4>
        </footer>
    </div>
</section>


<section class="join-us-footer">
    <div class="wrap-1200">
        <div class="wrap">
            <h4 class="heading">Create your account now <br class="mb-hide" />and begin looking for talents</h4>
            <div class="content">
                <!-- <p>Sollicitudin tempor id eu nisl. Amet commodo nulla facilisi nullam vehicula. </p> -->
                <div class="btn-wrap">
                    <a href="<?php echo e(route('signup')); ?>" class="btn-gold-arrow cta" role="button">
                        <h5>sign up as Client</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/casting_service.blade.php ENDPATH**/ ?>