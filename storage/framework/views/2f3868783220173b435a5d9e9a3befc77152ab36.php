<?php $__env->startPush('style'); ?>
    <style>
        .card-wallet{
            background-color: #1b4269 !important;
            text-align: center;
            height: 46px;
            line-height: 2.7;
            margin-top: 30px;
        }

        .card-wallet p{
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 0;
        }
    </style>
    <?php $__env->stopPush(); ?>
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dash.customers wallet')); ?></li>
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
                    <?php if($wallet): ?>
                    <form action="<?php echo e(route('dashboard.core.customer_wallet.update',$wallet->id)); ?>" method="post" class="form-horizontal"
                          enctype="multipart/form-data" id="demo-form" data-parsley-validate="">

                        <?php else: ?>
                            <form action="<?php echo e(route('dashboard.core.customer_wallet.store')); ?>" method="post" class="form-horizontal"
                                  enctype="multipart/form-data" id="demo-form" data-parsley-validate="">

                            <?php endif; ?>
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="form-row mb-3">
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4"><?php echo e(__('dash.name_ar')); ?></label>
                                    <input type="text" name="name_ar" value="<?php echo e($wallet->name_ar ?? ''); ?>" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.name_ar')); ?>"
                                    >
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

                                <div class="form-group col-md-5">
                                    <label for="inputEmail4"><?php echo e(__('dash.name_en')); ?></label>
                                    <input type="text" name="name_en" value="<?php echo e($wallet->name_en ?? ''); ?>" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.name_en')); ?>"
                                    >
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

                                <div class="form-group col-md-2">
                                    <div class="row" style="    margin-top: 22px;">
                                        <label class="mx-3 mt-3 col-md-2" for="status"><?php echo e(__('dash.status')); ?></label>
                                        <label class="switch s-outline s-outline-info mb-4 mx-4 mt-3 d-block col-md-3">
                                            <input type="checkbox" name="active" id="status" <?php if($wallet && $wallet->active == 1): ?> checked <?php endif; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        <?php $__errorArgs = ['status'];
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





                            <div class="form-row mb-3">
                                <div class="card col-md-1 card-wallet">
                                    <p ><?php echo e(__('dash.order')); ?> /</p>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4"><?php echo e(__('dash.deserved percentage')); ?></label>
                                    <input type="text" name="order_percentage" value="<?php echo e($wallet->order_percentage ?? 0); ?>" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.deserved percentage')); ?>"
                                    >
                                    <?php $__errorArgs = ['order_percentage'];
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
                                    <label for="inputEmail4"><?php echo e(__('dash.Maximum refund amount')); ?></label>
                                    <input type="text" name="refund_amount" value="<?php echo e($wallet->refund_amount ?? 0); ?>" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.Maximum refund amount')); ?>"
                                    >
                                    <?php $__errorArgs = ['refund_amount'];
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
                                <div class="card col-md-1 card-wallet" >
                                    <p><?php echo e(__('dash.replacing')); ?> /</p>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4"><?php echo e(__('dash.Minimum order amount')); ?></label>
                                    <input type="text" name="order_amount" value="<?php echo e($wallet->order_amount ?? 0); ?>" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.Minimum order amount')); ?>"
                                    >
                                    <?php $__errorArgs = ['order_amount'];
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
                                    <label  for="inputEmail4"><?php echo e(__('dash.Minimum wallet amount')); ?></label>
                                    <input type="text" name="wallet_amount" value="<?php echo e($wallet->wallet_amount ?? 0); ?>" class="form-control"
                                           id="inputEmail4"
                                           placeholder="<?php echo e(__('dash.Minimum wallet amount')); ?>"
                                    >
                                    <?php $__errorArgs = ['wallet_amount'];
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
<button type="submit" class="btn btn-primary"><?php echo e(__('dash.save')); ?></button>
                    </form>


                </div>
            </div>

        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/core/customer_wallet/index.blade.php ENDPATH**/ ?>