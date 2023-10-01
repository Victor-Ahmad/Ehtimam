<div class="modal fade " id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('dash.Edit Category')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal"
                      enctype="multipart/form-data" id="demo-form-edit" data-parsley-validate="">
                    <?php echo e(method_field('patch')); ?>

                    <?php echo csrf_field(); ?>

                    <div class="box-body">
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4"><?php echo e(__('dash.title_ar')); ?></label>
                                <input type="text" name="title_ar" class="form-control"
                                       id="title_ar"
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
                                       id="title_en"
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

                            <div class="col-md-4 custom-file-container form-group"
                                 data-upload-id="myFirstImage">
                                <label><?php echo e(__('dash.upload')); ?><a href="javascript:void(0)"
                                                               class="custom-file-container__image-clear"
                                                               title="Clear Image">x</a></label>
                                <div style="display: flex" class="editImage">
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


                        <input type="hidden" name="parent_id" id="parent_id" value="">


                        <div class="form-row mb-2">
                            <div class="form-group col-md-12">

                                <label for="group_ids">المجموعات</label>
                                <select id="group_ids" multiple class="group_ids select2 form-control pt-1"
                                        name="group_ids[]" required>
                                    <option disabled><?php echo e(__('dash.choose')); ?></option>
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['group_ids'];
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

                                <label for="inputEmail4"><?php echo e(__('dash.description_ar')); ?></label>
                                <textarea name="description_ar" id="description_ar" class="ckeditor" cols="30" rows="10"></textarea>
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
                                <textarea name="description_en" id="description_en" class="ckeditor" cols="30" rows="10"></textarea>
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('dash.save')); ?></button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> <?php echo e(__('dash.close')); ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php $__env->startPush('script'); ?>
    <script>
        let firstUpload = new FileUploadWithPreview('myFirstImage')

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\xampp\htdocs\sahmTech\Altra\resources\views/dashboard/core/categories/edit.blade.php ENDPATH**/ ?>