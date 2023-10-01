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
                                        href="<?php echo e(route('dashboard.booking_setting.index')); ?>">المواعيد</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تعديل المواعيد</li>
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
                        <h3>تعديل المواعيد</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(route('dashboard.booking_setting.update', $bookingSetting->id)); ?>" method="post" class="form-horizontal"

                              enctype="multipart/form-data" id="" data-parsley-validate="">
                            <?php echo method_field('PUT'); ?>

                            <?php echo csrf_field(); ?>
                            <div class="box-body">

                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">

                                        <label for="service">الخدمة</label>
                                        <select required class="select2 form-control pt-1"
                                                name="service_id">
                                            <option selected disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($service->id); ?>" <?php if($bookingSetting->service_id == $service->id): ?> selected <?php endif; ?>><?php echo e($service->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['service_id'];
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

                                        <label for="service">تاريخ بدايه الخدمه</label>
                                        <select required class="select2 form-control pt-1"
                                                name="service_start_date">
                                            <option <?php if($bookingSetting->service_start_date == null): ?> selected <?php endif; ?> disabled><?php echo e(__('dash.choose')); ?></option>
                                            <option value="Saturday" <?php if($bookingSetting->service_start_date == 'Saturday'): ?> selected <?php endif; ?> >السبت</option>
                                            <option value="Sunday" <?php if($bookingSetting->service_start_date == 'Sunday'): ?> selected <?php endif; ?>>الأحد</option>
                                            <option value="Monday" <?php if($bookingSetting->service_start_date == 'Monday'): ?> selected <?php endif; ?>>الإثنين</option>
                                            <option value="Tuesday" <?php if($bookingSetting->service_start_date == 'Tuesday'): ?> selected <?php endif; ?>>الثلاثاء</option>
                                            <option value="Wednesday" <?php if($bookingSetting->service_start_date == 'Wednesday'): ?> selected <?php endif; ?>>الأربعاء</option>
                                            <option value="Thursday" <?php if($bookingSetting->service_start_date == 'Thursday'): ?> selected <?php endif; ?>>الخميس</option>
                                            <option value="Friday" <?php if($bookingSetting->service_start_date == 'Friday'): ?> selected <?php endif; ?>>الجمعه</option>
                                        </select>
                                        <?php $__errorArgs = ['service_start_date'];
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

                                        <label for="service">تاريخ انتهاء الخدمه</label>
                                        <select required class="select2 form-control pt-1"
                                                name="service_end_date">
                                            <option <?php if($bookingSetting->service_end_date == null): ?> selected <?php endif; ?> disabled><?php echo e(__('dash.choose')); ?></option>
                                            <option value="Saturday" <?php if($bookingSetting->service_end_date == 'Saturday'): ?> selected <?php endif; ?> >السبت</option>
                                            <option value="Sunday" <?php if($bookingSetting->service_end_date == 'Sunday'): ?> selected <?php endif; ?>>الأحد</option>
                                            <option value="Monday" <?php if($bookingSetting->service_end_date == 'Monday'): ?> selected <?php endif; ?>>الإثنين</option>
                                            <option value="Tuesday" <?php if($bookingSetting->service_end_date == 'Tuesday'): ?> selected <?php endif; ?>>الثلاثاء</option>
                                            <option value="Wednesday" <?php if($bookingSetting->service_end_date == 'Wednesday'): ?> selected <?php endif; ?>>الأربعاء</option>
                                            <option value="Thursday" <?php if($bookingSetting->service_end_date == 'Thursday'): ?> selected <?php endif; ?>>الخميس</option>
                                            <option value="Friday" <?php if($bookingSetting->service_end_date == 'Friday'): ?> selected <?php endif; ?>>الجمعه</option>
                                        </select>
                                        <?php $__errorArgs = ['service_end_date'];
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











                                    <div class="form-group col-md-4">

                                        <label for="inputEmail4"><?php echo e(__('dash.city')); ?></label>
                                        <select id="inputState" class="select2 city_id form-control pt-1"
                                                name="city_id">
                                            <option disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php if($key == $bookingSetting->city_id): ?> selected <?php endif; ?>><?php echo e($city); ?></option>
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


                                    <div class="form-group col-md-4">

                                        <label for="region_id">المناطق</label>
                                        <select required multiple class="region_id select2 form-control pt-1"
                                                name="region_id[]">
                                            <option disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($region->id); ?>" <?php if(in_array($region->id, $bookingSetting->regions->pluck('region_id')->toArray())): ?> selected <?php endif; ?>><?php echo e($region->title); ?></option>
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


                                    <div class="form-group col-md-4">

                                        <label for="birth">وقت بدء الخدمة</label>
                                        <input required name="service_start_time" type="time" value="<?php echo e($bookingSetting->service_start_time); ?>" class="form-control "
                                               data-date-format="h:i">
                                        <?php $__errorArgs = ['service_start_time'];
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
                                    <div class="form-group col-md-4">

                                        <label for="birth">وقت انتهاء الخدمة</label>
                                        <input required name="service_end_time" type="time" value="<?php echo e($bookingSetting->service_end_time); ?>" class="form-control "
                                               data-date-format="h:i">
                                        <?php $__errorArgs = ['service_end_time'];
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

                                        <label for="birth">مدة الخدمة</label>
                                        <input required name="service_duration" value="<?php echo e($bookingSetting->service_duration); ?>" type="text" class="form-control">
                                        <?php $__errorArgs = ['service_duration'];
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

                                        <label for="service">فاصل زمني</label>
                                        <select required class="select2 form-control pt-1"
                                                name="buffering_time">
                                            <option <?php if($bookingSetting->buffering_time == null): ?> selected <?php endif; ?> disabled><?php echo e(__('dash.choose')); ?></option>
                                            <option value="10" <?php if($bookingSetting->buffering_time == 0): ?> selected <?php endif; ?>>0 minutes</option>
                                            <option value="10" <?php if($bookingSetting->buffering_time == 10): ?> selected <?php endif; ?>>10 minutes</option>
                                            <option value="20" <?php if($bookingSetting->buffering_time == 20): ?> selected <?php endif; ?>>20 minutes</option>
                                            <option value="30" <?php if($bookingSetting->buffering_time == 30): ?> selected <?php endif; ?>>30 minutes</option>
                                            <option value="40" <?php if($bookingSetting->buffering_time == 40): ?> selected <?php endif; ?>>40 minutes</option>
                                            <option value="50" <?php if($bookingSetting->buffering_time == 50): ?> selected <?php endif; ?>>50 minutes</option>
                                            <option value="60" <?php if($bookingSetting->buffering_time == 60): ?> selected <?php endif; ?>>60 minutes</option>
                                        </select>
                                        <?php $__errorArgs = ['buffering_time'];
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
    <script>

        $('.select2').select2({
            tags: true,
            dir: '<?php echo e(app()->getLocale() == "ar"? "rtl" : "ltr"); ?>'
        })

        $(document).ready(function (){
            $('.city_id').on('change',function (){
                var city_id=$(this).val();
                $.ajax({
                    url: '<?php echo e(route('dashboard.core.address.getRegion')); ?>',
                    data:{city_id:city_id},
                    success: function(response) {
                        $('.region_id').empty()
                        $('.region_id').append('<option disabled><?php echo e(__('dash.choose')); ?></option>')
                        $.each(response, function (i, item) {

                            $('.region_id').append($('<option>', {
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



<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/booking_settings/edit.blade.php ENDPATH**/ ?>