<div class="modal fade " id="addGroupModel"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة فريق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('dashboard.visits.store')); ?>" method="post" class="form-horizontal"
                      enctype="multipart/form-data" id="create_order_status_form" data-parsley-validate="">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">

                        <input type="hidden" name="booking_id" id="booking_id">
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">

                                <label for="group_ids">المجموعات</label>
                                <select id="group_id"  class="select2 form-control pt-1"
                                        name="assign_to_id" required>
                                    <option disabled selected><?php echo e(__('dash.choose')); ?></option>

                                </select>
                                <?php $__errorArgs = ['group_id'];
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
                            <input type="hidden" name="visits_status_id" value="1">
















                        </div>

                        <div class="form-row mb-2">
                            <div class="form-group reason_cancel col-md-6" style="display:none;">

                                <label for="inputEmail4">سبب الالغاء</label>
                                <textarea name="reason_cancel" class="ckeditor" cols="10" rows="5"></textarea>
                                <?php $__errorArgs = ['reason_cancel'];
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

                            <div class="form-group notes col-md-12">

                                <label for="inputEmail4">ملاحظات</label>
                                <textarea name="note" class="ckeditor" cols="10" rows="5"></textarea>
                                <?php $__errorArgs = ['notes'];
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
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> <?php echo e(__('dash.close')); ?>

                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="modal fade " id="changeGroupModel"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل فريق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post" class="form-horizontal"
                       enctype="multipart/form-data" id="edit_group_form" data-parsley-validate="">
                    <?php echo method_field('PUT'); ?>

                    <?php echo csrf_field(); ?>
                    <div class="box-body">

                        <input type="hidden" name="booking_id" id="edit_booking_id">
                        <div class="visit_Div">

                        </div>
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">

                                <label for="group_ids">المجموعات</label>
                                <select id="edit_group_id"  class="select2 form-control pt-1"
                                        name="assign_to_id" required>
                                    <option disabled selected><?php echo e(__('dash.choose')); ?></option>

                                </select>
                                <?php $__errorArgs = ['group_id'];
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
                            <input type="hidden" name="visits_status_id" value="1">
                            

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            

                        </div>

                        <div class="form-row mb-2">
                            <div class="form-group reason_cancel col-md-6" style="display:none;">

                                <label for="inputEmail4">سبب الالغاء</label>
                                <textarea name="reason_cancel" class="ckeditor" cols="10" rows="5"></textarea>
                                <?php $__errorArgs = ['reason_cancel'];
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

                            <div class="form-group notes col-md-12">

                                <label for="inputEmail4">ملاحظات</label>
                                <textarea name="note" class="ckeditor" cols="10" rows="5"></textarea>
                                <?php $__errorArgs = ['notes'];
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
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> <?php echo e(__('dash.close')); ?>

                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\tcavw\Desktop\Sahmtech\Ultra\public_html\resources\views/dashboard/bookings/partial/add_group.blade.php ENDPATH**/ ?>