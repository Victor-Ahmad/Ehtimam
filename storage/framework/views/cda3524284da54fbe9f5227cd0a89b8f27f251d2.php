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
                                        href="<?php echo e(route('dashboard.core.service.index')); ?>">الخدمات</a></li>
                                <li class="breadcrumb-item active" aria-current="page">تعديل خدمه</li>
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
                        <h3>إنشاء خدمه جديد</h3>
                    </div>
                    <div class="col-md-12">
                        <form action="<?php echo e(route('dashboard.core.service.update', $service->id)); ?>" method="post"
                              class="form-horizontal"
                              enctype="multipart/form-data" id="demo-form" data-parsley-validate="">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="box-body">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4"><?php echo e(__('dash.title_ar')); ?></label>
                                        <input type="text" name="title_ar" class="form-control"
                                               id="inputEmail4" value="<?php echo e($service->title_ar); ?>"
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

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4"><?php echo e(__('dash.title_en')); ?></label>
                                        <input type="text" name="title_en" class="form-control"
                                               id="inputEmail4" value="<?php echo e($service->title_en); ?>"
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


                                    <div class="form-group col-md-4">

                                        <label for="inputEmail4"><?php echo e(__('dash.category')); ?></label>
                                        <select id="inputState" class="select2 form-control pt-1"
                                                name="category_id">
                                            <option disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>"
                                                        <?php if($key == $service->category_id): ?> selected <?php endif; ?>><?php echo e($category); ?></option>
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













                                </div>


                                





                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                
                                
                                

                                
                                <div class="form-row mb-2">


                                    <div class="form-group col-md-6">

                                        <label for="inputEmail4"><?php echo e(__('dash.description_ar')); ?></label>
                                        <textarea name="description_ar" class="ckeditor" cols="10"
                                                  rows="5"><?php echo e($service->description_ar); ?></textarea>
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

                                        <label for="inputEmail4"><?php echo e(__('dash.description_en')); ?></label>
                                        <textarea name="description_en" class="ckeditor" cols="10"
                                                  rows="5"><?php echo e($service->description_en); ?></textarea>
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


                                <div class="form-row mb-2">


                                    <div
                                        class="form-group type-col <?php if($service->type == 'evaluative'): ?> col-md-4 <?php else: ?> col-md-6 <?php endif; ?>">

                                        <label for="inputEmail4"><?php echo e(__('dash.type')); ?></label>
                                        <select id="inputState" class="select2 type form-control"
                                                name="type">
                                            <option value="<?php echo e(\App\Enums\Core\ServiceType::fixed()->value); ?>"
                                                    <?php if(\App\Enums\Core\ServiceType::fixed()->value == $service->type): ?> selected <?php endif; ?> ><?php echo e(\App\Enums\Core\ServiceType::fixed()->value); ?></option>
                                            <option value="<?php echo e(\App\Enums\Core\ServiceType::evaluative()->value); ?>"
                                                    <?php if(\App\Enums\Core\ServiceType::evaluative()->value == $service->type): ?> selected <?php endif; ?>><?php echo e(\App\Enums\Core\ServiceType::evaluative()->value); ?></option>

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

                                    <div
                                        class="form-group price-col <?php if($service->type == 'evaluative'): ?> col-md-4 <?php else: ?> col-md-6 <?php endif; ?>">


                                        <label for="inputEmail4"><?php echo e(__('dash.price')); ?></label>
                                        <input type="text" name="price" class="form-control"
                                               id="inputEmail4" value="<?php echo e($service->price); ?>"
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

                                    <div
                                        class="form-group start_from <?php if($service->type == 'evaluative'): ?> col-md-4 <?php else: ?> col-md-6 <?php endif; ?>"
                                        <?php if($service->type == 'evaluative'): ?> style="display: block;"
                                        <?php else: ?> style="display: none;" <?php endif; ?>>

                                        <label for="inputEmail4"><?php echo e(__('dash.start_from')); ?></label>
                                        <input type="text" name="start_from" class="form-control"
                                               id="inputEmail4" value="<?php echo e($service->start_from); ?>"
                                               placeholder="<?php echo e(__('dash.start_from')); ?>"
                                        >
                                        <?php $__errorArgs = ['start_from'];
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
                                    <div class="form-group col-md-6">

                                        <label for="icon_ids">الايقونات</label>
                                        <select id="icon_ids" multiple class="select2 form-control pt-1"
                                                name="icon_ids[]" required>
                                            <option disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($icon->id); ?>"  <?php if(in_array($icon->id,$service->icons()->pluck('icon_id')->toArray())): ?> selected <?php endif; ?>><?php echo e($icon->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['icon_ids'];
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

                                        <label for="measurement_id">وحدات القياس</label>
                                        <select id="measurement_id"  class="select2 form-control pt-1"
                                                name="measurement_id" required>
                                            <option disabled><?php echo e(__('dash.choose')); ?></option>
                                            <?php $__currentLoopData = $measurements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measurement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($measurement->id); ?>" <?php if($measurement->id == $service->measurement_id): ?> selected <?php endif; ?>><?php echo e($measurement->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['measurement_id'];
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
                                        <label for="is_quantity"></label>
                                        <label class="switch s-outline s-outline-info  mb-4 mx-4 mt-3 d-block w-50">
                                            <label class="mx-5" for="is_quantity">السماح بزياده الكميه</label>
                                            <input type="checkbox" name="is_quantity" id="is_quantity" <?php if($service->is_quantity == 1): ?> checked <?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        <?php $__errorArgs = ['is_quantity'];
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
                                        <label for="is_quantity"></label>
                                        <label class="switch s-outline s-outline-info  mb-4 mx-4 mt-3 d-block w-50">
                                            <label class="mx-5" for="is_quantity">الاكثر مبيعا</label>
                                            <input type="checkbox" name="best_seller" id="best_seller" <?php if($service->best_seller == 1): ?> checked <?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        <?php $__errorArgs = ['best_seller'];
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


                                    <div class="form-group col-md-6">

                                        <label for="inputEmail4"><?php echo e(__('dash.term_cond_ar')); ?></label>
                                        <textarea name="ter_cond_ar" class="ckeditor" cols="10"
                                                  rows="5"><?php echo e($service->ter_cond_ar); ?></textarea>
                                        <?php $__errorArgs = ['ter_cond_ar'];
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

                                        <label for="inputEmail4"><?php echo e(__('dash.term_cond_en')); ?></label>
                                        <textarea name="ter_cond_en" class="ckeditor" cols="10"
                                                  rows="5"><?php echo e($service->ter_cond_en); ?></textarea>
                                        <?php $__errorArgs = ['ter_cond_en'];
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

        $("body").on('change', '.type', function () {
            if ($(this).val() == 'evaluative') {

                $('.type-col').removeClass('col-md-6');
                $('.type-col').addClass('col-md-4');
                $('.price-col').removeClass('col-md-6');
                $('.price-col').addClass('col-md-4');
                $('.start_from').show();
                $('.start_from').removeClass('col-md-6');
                $('.start_from').addClass('col-md-4');


            } else {
                $('.type-col').removeClass('col-md-4');
                $('.type-col').addClass('col-md-6');
                $('.price-col').removeClass('col-md-4');
                $('.price-col').addClass('col-md-6');
                $('.start_from').hide();
                $('.start_from').val('');

            }

        })


    </script>
    <script>

        $('.select2').select2({
            tags: true,
            dir: '<?php echo e(app()->getLocale() == "ar"? "rtl" : "ltr"); ?>'
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/core/services/edit.blade.php ENDPATH**/ ?>