<?php $__env->startSection('content'); ?>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="text-center">
                    <?php if(\App\Models\Setting::first()->logo != null): ?>
                        <img src="<?php echo e(asset(\App\Models\Setting::first()->logo)); ?>" class="flag-width" alt="flag" style="width: 150px;margin-top: 33px"/>
                    <?php endif; ?>
                </div>

                <div class="form-container">
                    <div class="form-content">

                        <h1 class=""><?php echo e(__('dash.login')); ?></h1>
                        <p class=""><?php echo e(__('dash.login_to_your_account')); ?></p>

                        <form class="text-left" method="post" action="<?php echo e(route('dashboard.login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username"><?php echo e(__('dash.email')); ?></label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="ohn_Doe@any.com">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password"><?php echo e(__('dash.password')); ?></label>
                                        <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link"><?php echo e(__('dash.forgot_password')); ?></a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary text-left py-2">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" name="remember_me" class="new-control-input">
                                            <span class="new-control-indicator"></span><?php echo e(__('dash.remember_me')); ?>

                                        </label>
                                    </div>
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value=""><?php echo e(__('dash.login')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tcavw\Desktop\Sahmtech\Ultra\public_html\resources\views/dashboard/auth/login.blade.php ENDPATH**/ ?>