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
                                        href="<?php echo e(route('dashboard.core.icon.index')); ?>">الايقونات</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تعديل ايقونه</li>
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
                <div class="widget-content widget-content-area br-6" style="min-height: 400px;">
                    <div class="col-md-12 text-left mb-3">
                        <h3>تعديل ايقونه</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(route('dashboard.core.icon.update', $icon->id)); ?>" method="post"
                              class="form-horizontal"
                              enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="box-body">
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4"><?php echo e(__('dash.title_ar')); ?></label>
                                        <input type="text" name="title_ar" class="form-control"
                                               id="inputEmail4" value="<?php echo e($icon->title_ar); ?>"
                                               placeholder="<?php echo e(__('dash.title_ar')); ?>"
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

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4"><?php echo e(__('dash.title_en')); ?></label>
                                        <input type="text" name="title_en" class="form-control"
                                               id="inputEmail4" value="<?php echo e($icon->title_en); ?>"
                                               placeholder="<?php echo e(__('dash.title_en')); ?>"
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


                                </div>
                                <div
                                class="form-group price-col  col-md-6 ">


                                <label for="inputEmail4"><?php echo e(__('dash.price')); ?></label>
                                <input type="text" name="price" class="form-control"
                                       id="inputEmail4" value="<?php echo e($icon->price); ?>"
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


                                <div class="form-row mb-3">
                                    <div class="col-md-6 custom-file-container form-group"
                                         data-upload-id="myImage">
                                        <label><?php echo e(__('dash.upload')); ?><a href="javascript:void(0)"
                                                                       class="custom-file-container__image-clear"
                                                                       title="Clear Image">x</a></label>
                                        <div style="display: flex" class="editImage">
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

        let myImage = new FileUploadWithPreview('myImage')

        var img = '<?php echo e($icon->images); ?>';
        if (img != ''){
            $('.editImage .custom-file-container__image-preview').css('background-image', 'url("'+img+'")');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tcavw\Desktop\Sahmtech\Ultra\public_html\resources\views/dashboard/core/icon/edit.blade.php ENDPATH**/ ?>