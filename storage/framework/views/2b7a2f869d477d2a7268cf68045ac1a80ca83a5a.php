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
                                <li class="breadcrumb-item">
                                    <a
                                                                        href="<?php echo e(route('dashboard.home')); ?>"><?php echo e(__('dash.home')); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">الاشعارات</li>
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
                <div class="widget-content widget-content-area br-6" style="min-height: 500px;">
                    <div class="col-md-12 text-left mb-3">
                        <h3>ارسال اشعارات</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(route('dashboard.notification.sendNotification')); ?>" method="post" class="form-horizontal"

                              enctype="multipart/form-data" id="create_order_status_form" data-parsley-validate="">
                            <?php echo csrf_field(); ?>
                            <div class="box-body">

                                <div class="form-row mb-2">


                                    <div class="form-group col-md-6">
                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-primary">
                                                <input type="radio" class="new-control-input type" value="customer" checked name="type">
                                                <span class="new-control-indicator"></span>العملاء
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['type'];
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

                                        <div class="n-chk">
                                            <label class="new-control new-radio radio-classic-primary">
                                                <input type="radio" class="new-control-input type" value="technician" name="type">
                                                <span class="new-control-indicator"></span>الفنيين
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['type'];
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


                                    <div class="form-group col-md-6 div-customer">
                                        <label for="customer">العملاء</label>
                                        <select  class="form-control customer_id"  style="width: 100%; padding: 8px"
                                                name="customer_id">
                                            <option value="all" selected>الكل</option>
                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->first_name); ?> - <?php echo e($customer->phone); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['customer_id'];
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

                                    <div class="form-group col-md-6 div-technician" style="display:none;">
                                        <label for="customer">الفنيين</label>
                                        <select  class="form-control technician_id" disabled style="width: 100%; padding: 8px"
                                                name="technician_id">
                                            <option value="all" selected>الكل</option>
                                            <?php $__currentLoopData = $technicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $technician): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>"><?php echo e($technician); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['customer_id'];
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
                                        <label for="title">العنوان</label>
                                        <input type="text" name="title" class="form-control"
                                               id="title"
                                               placeholder="أدخل العنوان"
                                               required
                                        >
                                        <?php $__errorArgs = ['title'];
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

                                    <div class="form-group col-md-12">

                                        <label for="message">الرساله</label>
                                        <textarea name="message" id="message" class="ckeditor" cols="30"
                                                  rows="10"></textarea>
                                        <?php $__errorArgs = ['message'];
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


                            </div>
                            <div class="box-body">
                                <div class="form-row mb-3">
                                    <div class="col-md-6">

                                    </div>

                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('dash.save')); ?></button>
                                        <button class="btn" data-dismiss="modal"><i
                                                class="flaticon-cancel-12"></i> <?php echo e(__('dash.close')); ?>

                                        </button>
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

<?php $__env->startPush('script'); ?>

    <script type="text/javascript">
        $("body").on('change', '.type', function () {

            if ($(this).val() == 'technician') {
                $('.div-customer').hide();
                $('.customer_id').attr('disabled',true);
                $('.technician_id').attr('disabled',false);
                $('.div-technician').show();


            } else {
                $('.div-technician').hide();
                $('.customer_id').attr('disabled',false);
                $('.technician_id').attr('disabled',true);
                $('.div-customer').show();

            }

        })


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/notification/notification.blade.php ENDPATH**/ ?>