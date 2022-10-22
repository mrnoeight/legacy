

<?php $__env->startSection('title', 'Client New Role'); ?>

<?php $__env->startSection('hidden_page', 'Client New Role'); ?>

<?php $__env->startSection('content'); ?>


<!-- START MAIN PAGE -->
<main id="page-p2-client-add-role">
    <input type="hidden" id="page-id" value="page-p2-client-add-role" />
    <article class="main-article pd-ctr pt-0">
        <div class="wrap-1200 article-wrap">
            <div class="content-wrap type-2">
                <header>
                    <ul class="breadcrumb full-w ">
                        <li><a href="<?php echo e(route('client_casting_board')); ?>">Manage Project</a></li>
                        <li><a href="<?php echo e(route('client_project_detail', ['id'=>$post->id])); ?>">Project</a></li>
                        <li><a href="#">Add Role</a></li>
                    </ul>
                    <h4 class="main-heading type-4">Add new role</h4>
                </header>
                <form autocomplete="off" id="form-role" class="form-ctr" data-url="<?php echo e(route('client_create_role', ['id' => $post->id])); ?>">
                    <div class="row-content type-2">
                        <div class="row-header full-w"><strong>Role Information</strong></div>

                        <div class="dgrid col-2">
                            <div class="input-wrap redo-input full-w">
                                <label>Role Name *</label>
                                <div class="holder">
                                    <input name="name" type="text" class="input js-required" autocomplete="off"
                                        required-txt="Enter the Role Name" placeholder="Role Name" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap input-sel redo-input">
                                <label>Role Type *</label>
                                <div class="holder">
                                    <input type="hidden" name="type" />
                                    <input type="text" class="input js-required" autocomplete="off"
                                        required-txt="Please Select the Role Type" placeholder="Role Type" readonly />
                                </div>
                                <p class="warning"></p>
                                <ul class="opt-list">
                                    <li data-value="Leading">Leading</li>
                                    <li data-value="Supporting">Supporting</li>
                                    <li data-value="DayPlayer">DayPlayer</li>
                                    <li data-value="Stand In">Stand In</li>
                                    <li data-value="VoiceOver">VoiceOver</li>
                                    <li data-value="Extra / Background">Extra / Background</li>
                                </ul>
                            </div>

                            <div class="input-wrap input-sel redo-input">
                                <label>Gender *</label>
                                <div class="holder">
                                    <input type="hidden" name="gender" />
                                    <input type="text" class="input js-required" autocomplete="off"
                                        required-txt="Please Select the Role Gender" placeholder="Role Gender"
                                        readonly />
                                </div>
                                <p class="warning"></p>
                                <ul class="opt-list">
                                    <li data-value="Male">Male</li>
                                    <li data-value="Female">Female</li>
                                </ul>
                            </div>

                            <div class="input-wrap input-sel-box redo-input">
                                <label>Age Range *</label>
                                <div class="holder">
                                    <input type="text" class="input static" placeholder="Please Select the Age Range"
                                        readonly />
                                </div>
                                <p class="warning"></p>
                                <ul class="opt-list">
                                    <li><label><input type="checkbox" name="age" value="Under 18"><b>Under
                                                18</b></label></li>
                                    <li><label><input type="checkbox" name="age" value="18 - 25"><b>18 -
                                                25</b></label></li>
                                    <li><label><input type="checkbox" name="age" value="25 - 30"><b>25 -
                                                30</b></label></li>
                                    <li><label><input type="checkbox" name="age" value="Above 30"><b>Above
                                                30</b></label></li>
                                </ul>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Salary</label>
                                <div class="holder">
                                    <input name="salary" type="text" class="input js-num" autocomplete="off"
                                        placeholder="$XXXX.XXX" />
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Role Summary</strong></div>
                        <div class="dgrid">
                            <div class="input-wrap redo-input">
                                <label>Role Descriptions</label>
                                <div class="holder">
                                    <div class="input"><textarea name="role-desc"
                                            autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="file-wrap single-file redo-input">
                                <div class="holder">
                                    <strong>Or</strong>
                                    <input type="file" name="desc-file" accept="image/*,application/pdf" />
                                    <p class="input">Please Select a File to Upload</p>
                                    <a href="#" role="button" class="btn-upload"><b>upload</b></a>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Role Submissions</strong></div>
                        <div class="dgrid col-2">
                            <div class="input-wrap redo-input input-date full-w">
                                <label>Deadline for Talent Submissions *</label>
                                <div class="holder">
                                    <input type="text" name="deadline-talent-sub" class="input js-required js-date"
                                        maxlength="10" autocomplete="off"
                                        required-txt="Enter Deadline for Talent Submissions"
                                        date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>Start Day of Casting</label>
                                <div class="holder">
                                    <input type="text" name="start-day-casting" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>End Day of Casting</label>
                                <div class="holder">
                                    <input type="text" name="end-day-casting" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>Start Day of Rehearsal</label>
                                <div class="holder">
                                    <input type="text" name="start-day-rehearsal" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>End Day of Rehearsal</label>
                                <div class="holder">
                                    <input type="text" name="end-day-rehearsal" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>Start Day of Principle Photography</label>
                                <div class="holder">
                                    <input type="text" name="start-day-photo" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />

                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input input-date">
                                <label>End Day of Principle Photography (DD/MM/YYYY)</label>
                                <div class="holder">
                                    <input type="text" name="end-day-photo" class="input js-date" maxlength="10"
                                        autocomplete="off" date-txt="Enter a valid date" placeholder="dd / mm / yyyy" />
                                </div>
                                <p class="warning"></p>
                            </div>

                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header">
                            <strong>Role Summary</strong>
                            <div class="s-note">Only selected Actors for Auditions will be allowed to see Role Sides and
                                Audition notes. These Role Sides and Audition notes will not be publicly released.</div>
                        </div>
                        <div class="dgrid col-2">

                            <div class="input-wrap input-sel redo-input">
                                <label>Specific Requirements</label>
                                <div class="holder">
                                    <input type="hidden" name="spec-req" />
                                    <input type="text" class="input" autocomplete="off" placeholder="Please Choose"
                                        readonly />
                                </div>
                                <p class="warning"></p>
                                <ul class="opt-list">
                                    <li data-value="Option 1">Option 1</li>
                                    <li data-value="Option 2">Option 2</li>
                                    <li data-value="Option 3">Option 3</li>
                                </ul>
                            </div>

                            <div class="file-wrap single-file redo-input">
                                <label>Role Sides</label>
                                <div class="holder">
                                    <input type="file" name="sides-file" accept="image/*,application/pdf" />
                                    <p class="input">Please Select a File to Upload</p>
                                    <a href="#" role="button" class="btn-upload"><b>upload</b></a>
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input full-w">
                                <label>Audition Note</label>
                                <div class="holder">
                                    <div class="input"><textarea name="audit-note"
                                            autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row-content type-2">
                        <div class="row-header"><strong>Casting Contact</strong></div>
                        <div class="dgrid">
                            <div class="input-wrap redo-input">
                                <label>Director’s name *</label>
                                <div class="holder">
                                    <input name="director-name" type="text" class="input js-required" autocomplete="off"
                                        required-txt="Please enter Director’s Name" placeholder="Director’s name" value="<?php echo e($post->director); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Producer’s Name</label>
                                <div class="holder">
                                    <input name="producer-name" type="text" class="input" autocomplete="off"
                                        placeholder="Producer’s name"  value="<?php echo e($post->producer); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Phone</label>
                                <div class="holder">
                                    <input name="phone" type="text" class="input js-num" maxlength="10"
                                        autocomplete="off" required-txt="Please enter Director’s Name"
                                        placeholder="+84 xxx xxx xxx"  value="<?php echo e($post->contact_phone); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>

                            <div class="input-wrap redo-input">
                                <label>Email</label>
                                <div class="holder">
                                    <input name="email" type="text" class="input js-required js-email"
                                        autocomplete="off" data-min="2"
                                        required-txt="Please enter contact email address"
                                        email-txt="Please enter a valid email address" placeholder="Your Email"  value="<?php echo e($post->contact_email); ?>" />
                                </div>
                                <p class="warning"></p>
                            </div>
                        </div>
                    </div>


                    <div class="row-content">
                        <p class="warning-server">Submission Failed show here!</p>
                        <div class="btn-flex-wrap">
                            <a href="44-p2-client-project-details.html" class="btn-gray type-2">Cancel</a>
                            <a href="#" role="button" class="btn-gold type-2 btn-submit">Create Role</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>


</main>
<!-- END MAIN PAGE -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\take1\resources\views/web/client_new_role.blade.php ENDPATH**/ ?>