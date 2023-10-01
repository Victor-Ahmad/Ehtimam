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
                                        href="<?php echo e(route('dashboard.coupons.index')); ?>">الكوبونات</a></li>
                                <li class="breadcrumb-item active" aria-current="page">إنشاء كوبون</li>
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
                        <h3>إنشاء كوبون جديد</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(route('dashboard.coupons.store')); ?>" method="post" class="form-horizontal"

                              enctype="multipart/form-data" id="create_order_status_form" data-parsley-validate="">
                            <?php echo csrf_field(); ?>
                            <div class="box-body">

                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <label for="title_ar">العنوان باللغة العربية</label>
                                        <input type="text" name="title_ar" class="form-control"
                                               id="title_ar"
                                               placeholder="أدخل العنوان"
                                               required
                                        >
                                        <?php $__errorArgs = ['title_ar'];
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
                                        <label for="title_en">العنوان باللغة الإنجليزية</label>
                                        <input type="text" name="title_en" class="form-control"
                                               id="title_en"
                                               placeholder="أدخل العنوان"
                                               required
                                        >
                                        <?php $__errorArgs = ['title_en'];
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

                                    <div class="col-md-4 custom-file-container form-group"
                                         data-upload-id="mySecondImage">
                                        <label><?php echo e(__('dash.upload')); ?><a href="javascript:void(0)"
                                                                       class="custom-file-container__image-clear"
                                                                       title="Clear Image">x</a></label>
                                        <div style="display: flex">
                                            <label class="custom-file-container__custom-file">
                                                <input required type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       name="image"
                                                >
                                                
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>

                                            <div class=" col-md-2 custom-file-container__image-preview"></div>
                                        </div>
                                    </div>



                                </div> 

                                <div class="form-row mb-0 pb-0">
                                    <div class="form-group mb-0 col-md-4 pt-1">
                                        <label for=""
                                               style="padding-left: 14px; padding-right: 14px">نطاق الخصم : </label>
                                        <div class="" style="width: 100%; padding-left: 14px; padding-right: 14px">
                                            <label class="radio-inline px-1">
                                                <input class="mx-1" value="all" type="radio" name="sale_area"
                                                       id="all_value"
                                                       checked><span>الكل</span>
                                            </label>
                                            <label class="radio-inline px-1">
                                                <input class="mx-1" value="category" type="radio" name="sale_area"
                                                       id="category_value"><span>قسم</span>
                                            </label>
                                            <label class="radio-inline px-1">
                                                <input class="mx-1" value="service" type="radio" name="sale_area"
                                                       id="service_value"><span>خدمة</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">

                                        <label for="category_id">القسم</label>
                                        <select id="category_id" disabled class="select2 form-control pt-1"
                                                name="category_id">
                                            <option selected disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['category_id'];
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

                                        <label for="service_id">الخدمة</label>
                                        <select id="service_id" disabled class="select2 form-control pt-1"
                                                name="service_id">
                                            <option selected disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($service->id); ?>"><?php echo e($service->title); ?></option>
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
                                </div>

                                <div class="form-row mb-2">
                                    <div class="form-group col-md-3">
                                        <label for="type">النوع</label>
                                        <select required class="form-control" style="width: 100%; padding: 8px"
                                                name="type">
                                            <option value="percentage" selected>نسبة</option>
                                            <option value="static">مبلغ ثابت</option>
                                        </select>
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
                                    <div class="form-group col-md-3">
                                        <label for="value">القيمة</label>
                                        <input type="number" step="0.1" name="value" class="form-control"
                                               id="value"
                                               placeholder="أدخل القيمة"
                                               required
                                        >
                                        <?php $__errorArgs = ['value'];
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

                                        <label for="birth">تاريخ التفعيل</label>
                                        <input required name="start" type="date" class="form-control datepicker"
                                               data-date-format="dd/mm/yyyy">
                                        <?php $__errorArgs = ['start'];
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

                                        <label for="birth">تاريخ الانتهاء</label>
                                        <input required name="end" type="date" class="form-control datepicker"
                                               data-date-format="dd/mm/yyyy">
                                        <?php $__errorArgs = ['end'];
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
                                <div class="form-row mb-2">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="times_limit">مرات الاستخدام</label>
                                            <input type="number" name="times_limit" class="form-control"
                                                   id="times_limit"
                                                   placeholder="أدخل العدد"
                                            >
                                            <?php $__errorArgs = ['times_limit'];
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
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="code">الكود (اتركه فارغ للإنشاء التلقائي)</label>
                                            <input type="text" name="code" class="form-control"
                                                   id="code"
                                                   placeholder="أدخل الكود"
                                            >
                                            <?php $__errorArgs = ['code'];
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

                                <div class="form-row mb-2">


                                    <div class="form-group col-md-6">

                                        <label for="description_ar">الوصف باللغة العربية</label>
                                        <textarea name="description_ar" id="description_ar" class="ckeditor" cols="30"
                                                  rows="10"></textarea>
                                        <?php $__errorArgs = ['description_ar'];
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

                                        <label for="description_en">الوصف باللغة الإنجليزية</label>
                                        <textarea name="description_en" id="description_en" class="ckeditor" cols="30"
                                                  rows="10"></textarea>
                                        <?php $__errorArgs = ['description_en'];
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
    <script>
        $('input[name=sale_area]').change(function () {
            let val = $(this).val()
            if (val === 'category') {
                $('#category_id').prop('disabled', false)
                $('#category_id').prop('required', true)
                $('#service_id').prop('disabled', true)
                $('#service_id').prop('required', false)
                $('#service_id').val('').trigger('change')

            } else if (val === 'service') {
                $('#category_id').prop('disabled', true)
                $('#category_id').prop('required', false)
                $('#service_id').prop('disabled', false)
                $('#service_id').prop('required', true)
                $('#category_id').val('').trigger('change')

            } else {
                $('#category_id').prop('disabled', true)
                $('#category_id').prop('required', false)
                $('#category_id').val('').trigger('change')

                $('#service_id').prop('disabled', true)
                $('#service_id').prop('required', false)
                $('#service_id').val('').trigger('change')

            }
        })
    </script>
    <?php $__env->startPush('script'); ?>
        <script>
            let secondUpload = new FileUploadWithPreview('mySecondImage')

        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/coupons/create.blade.php ENDPATH**/ ?>