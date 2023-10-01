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
                           action="<?php echo e(route('dashboard.car_client.update',$car_client->id)); ?>"
                           enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">

                                <label for="inputEmail4"><?php echo e(__('dash.user')); ?></label>
                                <select id="inputState"  class="select2 user_id form-control pt-1"
                                        name="user_id">
                                    <option disabled selected><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($user->id == $car_client->user_id): ?> selected <?php endif; ?>><?php echo e($user->first_name .' '.$user->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['user_id'];
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

                            <div class="form-group col-md-4">

                                <label for="inputEmail4">نوع السياره</label>
                                <select id="inputState" class="select2 type_id form-control pt-1"
                                        name="type_id">
                                    <option selected disabled><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>" <?php if($type->id == $car_client->type_id): ?> selected <?php endif; ?>><?php echo e($type->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['type_id'];
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

                            <div class="form-group col-md-4">

                                <label for="inputEmail4">موديل السياره</label>
                                <select id="inputState" class="select2 model_id form-control pt-1"
                                        name="model_id">
                                    <option  disabled><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($model->id); ?>" <?php if($model->id == $car_client->model_id): ?> selected <?php endif; ?>><?php echo e($model->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['model_id'];
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
                                <label for="inputEmail4">اللون</label>
                                <input type="text" name="color" value="<?php echo e($car_client->color); ?>" class="form-control"
                                       id="inputEmail4"
                                       placeholder="اللون">
                                <?php $__errorArgs = ['color'];
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
                                <label for="inputEmail4">رقم اللوحه</label>
                                <input type="text" name="Plate_number" value="<?php echo e($car_client->Plate_number); ?>" class="form-control"
                                       id="inputEmail4"
                                       placeholder="رقم اللوحه">
                                <?php $__errorArgs = ['Plate_number'];
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

        $(document).ready(function (){
            $('.type_id').on('change',function (){
                var type_id=$(this).val();
                $.ajax({
                    url: '<?php echo e(route('dashboard.car.getModel')); ?>',
                    data:{type_id:type_id},
                    success: function(response) {
                        $('.model_id').empty()
                        $('.model_id').append('<option disabled selected><?php echo e(__('dash.choose')); ?></option>')
                        $.each(response, function (i, item) {

                            $('.model_id').append($('<option>', {
                                value: i,
                                text : item
                            }));
                        });

                    }
                });

            });

        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\sahmTech\Altra\resources\views/dashboard/car_client/edit.blade.php ENDPATH**/ ?>