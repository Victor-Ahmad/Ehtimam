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
                                        href="<?php echo e(route('dashboard.core.address.index','id='.$address->user_id)); ?>"><?php echo e(__('dash.user addresses')); ?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dash.edit')); ?></li>
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
                           action="<?php echo e(route('dashboard.core.address.update',$address->id)); ?>"
                           enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>

                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="<?php echo e($address->user_id); ?>">
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">

                                <label for="inputEmail4"><?php echo e(__('dash.country')); ?></label>
                                <select id="inputState"  class="select2 country_id form-control pt-1"
                                        name="country_id">
                                    <option disabled><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if($key == $address->country_id): ?> selected <?php endif; ?>><?php echo e($country); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['country_id'];
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

                                <label for="inputEmail4"><?php echo e(__('dash.city')); ?></label>
                                <select id="inputState" class="select2 city_id form-control pt-1"
                                        name="city_id">
                                    <option disabled><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if($key == $address->city_id): ?> selected <?php endif; ?>><?php echo e($city); ?></option>
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

                        </div>


                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">

                                <label for="inputEmail4"><?php echo e(__('dash.region')); ?></label>
                                <select id="inputState"  class="select2 region_id form-control pt-1"
                                        name="region_id">
                                    <option disabled><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if($key == $address->region_id): ?> selected <?php endif; ?>><?php echo e($region); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['region_id'];
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
                                <label for="inputEmail4"><?php echo e(__('dash.address')); ?></label>
                                <input type="text" name="address" class="form-control"
                                       id="inputEmail4"
                                       placeholder="<?php echo e(__('dash.address')); ?>" value="<?php echo e($address->address); ?>">
                                <?php $__errorArgs = ['address'];
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

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/core/addresses/edit.blade.php ENDPATH**/ ?>