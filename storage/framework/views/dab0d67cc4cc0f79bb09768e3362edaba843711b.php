<?php $__env->startSection('title', 'Talent Detail'); ?>

<?php $__env->startSection('hidden_page', 'Talent Detail'); ?>

<?php $__env->startSection('content'); ?>

<main id="page-talent-submitted">
    <input type="hidden" id="page-id" value="page-talent-submitted"/>
    <section class="details-banner wrap-1200">
      <header class="top-ctr">
        <ul class="breadcrumb">
          <li><a href="1-home.html">Home</a></li>
          <li><a href="14-talent-ctr.html">Profile</a></li>
          <li><a href="#">Submission history</a></li>
        </ul>
        <time datetime="20/04/2021"><span class="mb-hide">Updated on:&nbsp;</span>20/04/2021</time>
      </header>
    </section>

    <article class="main-article">
      <div class="wrap-1200 article-wrap">
        <div class="content-wrap type-2">
          <header>
            <h4 class="main-heading type-2">Submitted Roles</h4>
            <form class="form-filter">
              <strong>Filter:</strong>
              <div class="input-wrap input-sel-box">
                <div class="holder">
                  <input type="text" class="input static" readonly/>
                  <label class="txt-label">By project type&nbsp;<span></span></label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                  <li class="item"><label><input type="checkbox" name="project[0]" value="Film OTT"/><b>Film OTT</b></label></li>
                  <li class="item"><label><input type="checkbox" name="project[1]" value="Short Film"/><b>Short Film</b></label></li>
                  <li class="item"><label><input type="checkbox" name="project[2]" value="TV OTT"/><b>TV OTT</b></label></li>
                  <li class="item"><label><input type="checkbox" name="project[3]" value="TV Broadcast"/><b>TV Broadcast</b></label></li>
                  <li class="item"><label><input type="checkbox" name="project[4]" value="Webdrama"/><b>Webdrama</b></label></li>
                  <li class="item"><label><input type="checkbox" name="project[5]" value="Music Video"/><b>Music Video</b></label></li>
                  <li class="item"><label><input type="checkbox" name="project[6]" value="Commercial"/><b>Commercial</b></label></li>
                </ul>
              </div>
              <div class="input-wrap input-sel-box">
                <div class="holder">
                  <input type="text" class="input static" readonly/>
                  <label class="txt-label">By role type&nbsp;<span></span></label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                  <li class="item"><label><input type="checkbox" name="role[0]" value="Leading"/><b>Leading</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[1]" value="Supporting"/><b>Supporting</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[2]" value="Cameo"/><b>Cameo</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[3]" value="Dayplayer"/><b>Dayplayer</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[4]" value="5 & Under"/><b>5 & Under</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[5]" value="Background"/><b>Background</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[6]" value="Speciality"/><b>Speciality</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[7]" value="Model"/><b>Model</b></label></li>
                  <li class="item"><label><input type="checkbox" name="role[8]" value="Other"/><b>Other</b></label></li>
                </ul>
              </div>
              <div class="input-wrap input-sel-box">
                <div class="holder">
                  <input type="text" class="input static" readonly/>
                  <label class="txt-label">By status&nbsp;<span></span></label>
                </div>
                <p class="warning"></p>
                <ul class="opt-list">
                  <li class="item"><label><input type="checkbox" name="status[0]" value="Invited"/><b>Invited</b></label></li>
                  <li class="item"><label><input type="checkbox" name="status[1]" value="Pending"/><b>Pending</b></label></li>
                  <li class="item"><label><input type="checkbox" name="status[2]" value="Declined"/><b>Declined</b></label></li>
                </ul>
              </div>
              <button class="btn-gold type-btn type-2" type="submit">Apply</button>
            </form>
            <form class="form-search">
              <div class="input-wrap">
                <div class="holder">
                  <input name="search" id="search" type="text" class="input" autocomplete="off"/>
                  <label class="txt-label" for="search">search for project/roles</label>
                </div>
                <p class="warning"></p>
              </div>
            </form>
          </header>

          <section class="casting-board">
            <ul class="list-post dgrid col-2">
              <li class="item casting-card">
                <div class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/our-talent/submit-1.jpg')); ?>" alt="The Gardener"/></div>
                <div class="content">
                  <b class="tag commercial">COMMERCIAL</b>
                  <h5 class="heading">The Gardener</h5>
                  <h6 class="sub-heading">Dalat Milk Commercial</h6>
                  <p class="info">
                    <span><b>Role:&nbsp;</b>Leading</span>
                    <span><b>Gender:&nbsp;</b>Female</span>
                    <span><b>Age:&nbsp;</b>20-40</span>
                  </p>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                  <i class="status green">accepted</i>
                </div>
              </li>
              <li class="item casting-card">
                <div class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/our-talent/submit-2.jpg')); ?>" alt="The Husband"/></div>
                <div class="content">
                  <b class="tag tvc">TVC</b>
                  <h5 class="heading">The Husband</h5>
                  <h6 class="sub-heading">Next Trailer Video</h6>
                  <p class="info">
                    <span><b>Role:&nbsp;</b>Supporting</span>
                    <span><b>Gender:&nbsp;</b>Female</span>
                    <span><b>Age:&nbsp;</b>20-40</span>
                  </p>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                  <i class="status yellow">pending</i>
                </div>
              </li>
              <li class="item casting-card">
                <div class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/our-talent/submit-3.jpg')); ?>" alt="Dr.Alexander"/></div>
                <div class="content">
                  <b class="tag film">FEATURE FILM</b>
                  <h5 class="heading">Dr.Alexander</h5>
                  <h6 class="sub-heading">The Good Doctor Movie</h6>
                  <p class="info">
                    <span><b>Role:&nbsp;</b>Cameo</span>
                    <span><b>Gender:&nbsp;</b>Female</span>
                    <span><b>Age:&nbsp;</b>20-40</span>
                  </p>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                  <i class="status red">declined</i>
                </div>
              </li>
              <li class="item casting-card">
                <div class="img-wrap"><img class="main-img" src="<?php echo e(asset('assets/img/our-talent/submit-4.jpg')); ?>" alt="The Boyfriend"/></div>
                <div class="content">
                  <b class="tag music">music video</b>
                  <h5 class="heading">The Boyfriend</h5>
                  <h6 class="sub-heading">Don’t Start Now Music Video</h6>
                  <p class="info">
                    <span><b>Role:&nbsp;</b>Background</span>
                    <span><b>Gender:&nbsp;</b>Female</span>
                    <span><b>Age:&nbsp;</b>20-40</span>
                  </p>
                  <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                  <i class="status green">accepted</i>
                </div>
              </li>
            </ul>
          </section>
        </div>
      </div>
    </article>


  </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/profile_submit.blade.php ENDPATH**/ ?>