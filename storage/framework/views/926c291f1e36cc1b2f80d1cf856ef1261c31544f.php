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
                                        href="<?php echo e(route('dashboard.contract_packages.index')); ?>">باقات التقاول</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تعديل باقة التقاول</li>
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
                        <h3>تعديل باقة التقاول</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(route('dashboard.contract_packages.update', $ContractPackage->id)); ?>" method="post" class="form-horizontal"

                              enctype="multipart/form-data" id="edit-contract-package" data-parsley-validate="">
                            <?php echo method_field('PUT'); ?>

                            <?php echo csrf_field(); ?>
                            <div class="box-body">

                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">

                                        <label for="birth">اسم الباقة بالعربي</label>
                                        <input required name="name_ar" value="<?php echo e($ContractPackage->name_ar); ?>" placeholder="اسم الباقة بالعربي" type="text" class="form-control">
                                        <?php $__errorArgs = ['name_ar'];
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

                                        <label for="birth">اسم الباقة بالانجليزي</label>
                                        <input required name="name_en" value="<?php echo e($ContractPackage->name_en); ?>" type="text" placeholder="اسم الباقة بالانجليزي" class="form-control">
                                        <?php $__errorArgs = ['name_en'];
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

                                        <label for="service">الخدمة</label>
                                        <select required class="select2 form-control pt-1"
                                                name="service_id">
                                            <option selected disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php if($ContractPackage->service_id == $key): ?> selected <?php endif; ?>><?php echo e($service); ?></option>
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

                                <div class="form-row mb-3">
                                    <div class="form-group col-md-2">

                                        <label for="price"><?php echo e(__('dash.price_value')); ?></label>
                                        <input required type="number" value="<?php echo e($ContractPackage->price); ?>" step="0.1" name="price" class="form-control"
                                               id="price"
                                               placeholder="<?php echo e(__('dash.price')); ?>"
                                        >
                                        <?php $__errorArgs = ['price'];
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

                                    <div class="form-group col-md-2">

                                        <label for="visit_number">عدد الزيارات </label>
                                        <input required type="number" step="0.1" value="<?php echo e($ContractPackage->visit_number); ?>" name="visit_number" class="form-control"
                                               id="visit_number"
                                               placeholder="عدد الزيارات "
                                        >
                                        <?php $__errorArgs = ['visit_number'];
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

                                        <label for="birth">الفترة</label>
                                        <input required name="time" type="text" value="<?php echo e($ContractPackage->time); ?>" placeholder="الفترة" class="form-control">
                                        <?php $__errorArgs = ['time'];
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
                                         data-upload-id="myFirstImage">
                                        <label><?php echo e(__('dash.upload')); ?><a href="javascript:void(0)"
                                                                       class="custom-file-container__image-clear"
                                                                       title="Clear Image">x</a></label>
                                        <div style="display: flex">
                                            <label class="custom-file-container__custom-file">
                                                <input type="file"
                                                       class="custom-file-container__custom-file__custom-file-input"
                                                       name="avatar"
                                                >
                                                
                                                <span
                                                    class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>

                                            <div class=" col-md-2 custom-file-container__image-preview"></div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-row mb-3">


                                    <div class="form-group col-md-6">

                                        <label for="inputEmail4"><?php echo e(__('dash.description_ar')); ?></label>
                                        <textarea name="description_ar" class="ckeditor" cols="30" rows="10"><?php echo e($ContractPackage->description_ar); ?></textarea>
                                        <?php $__errorArgs = ['description_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>->
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="inputEmail4"><?php echo e(__('dash.description_en')); ?></label>
                                        <textarea name="description_en" class="ckeditor" cols="30" rows="10"><?php echo e($ContractPackage->description_en); ?></textarea>
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


        let firstUpload = new FileUploadWithPreview('myFirstImage')



            var img = '<?php echo e($ContractPackage->avater); ?>';

            if (img != ''){

                $('#edit-contract-package .custom-file-container__image-preview').css('background-image', 'url("'+img+'")');
            }


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/contract_packages/edit.blade.php ENDPATH**/ ?>