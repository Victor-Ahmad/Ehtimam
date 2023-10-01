<?php $__env->startSection('sub-header'); ?>
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-2">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo e(route('dashboard.home')); ?>"><?php echo e(__('dash.home')); ?></a></li>
                                <li class="breadcrumb-item"><a
                                        href="<?php echo e(route('dashboard.core.customer.index')); ?>"><?php echo e(__('dash.Customers')); ?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dash.create')); ?></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form  method="post"
                           action="<?php echo e(route('dashboard.core.customer.update',$user->id)); ?>"
                           enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>

                        <?php echo csrf_field(); ?>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"><?php echo e(__('dash.first name')); ?></label>
                                <input type="text" name="first_name" class="form-control"
                                       id="inputEmail4" value="<?php echo e($user->first_name); ?>"
                                       placeholder="<?php echo e(__('dash.first name')); ?>">
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4"><?php echo e(__('dash.last name')); ?></label>
                                <input type="text" name="last_name" class="form-control"
                                       id="inputEmail4" value="<?php echo e($user->last_name); ?>"
                                       placeholder="<?php echo e(__('dash.last name')); ?>">
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>


                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"><?php echo e(__('dash.phone')); ?></label>
                                <input type="text" name="phone" class="form-control"
                                       id="inputEmail4" value="<?php echo e($user->phone); ?>"
                                       placeholder="<?php echo e(__('dash.phone')); ?>">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4"><?php echo e(__('dash.email')); ?></label>
                                <input type="email" name="email" class="form-control"
                                       id="inputEmail4"
                                       placeholder="<?php echo e(__('dash.email')); ?>"
                                       value="<?php echo e($user->email); ?>">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>

                        <div class="form-group col-md-6">

                            <label for="inputEmail4"><?php echo e(__('dash.city')); ?></label>
                            <select id="inputState" class="select2 form-control pt-1"
                                    name="city_id">
                                <option disabled><?php echo e(__('dash.choose')); ?></option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php if($key == $user->city_id): ?> selected <?php endif; ?>><?php echo e($city); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit"
                                    class="btn btn-primary col-md-3"><?php echo e(__('dash.submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>

        $('.select2').select2({
            tags: true,
            dir: '<?php echo e(app()->getLocale() == "ar"? "rtl" : "ltr"); ?>'
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/core/customers/edit.blade.php ENDPATH**/ ?>