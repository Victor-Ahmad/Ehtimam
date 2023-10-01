<?php $__env->startSection('sub-header'); ?>
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-2">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.home')); ?>"><?php echo e(__('dash.home')); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dash.roles')); ?></li>
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
                    <div class="col-md-12 text-right mb-3">
                        <a href="<?php echo e(route('dashboard.core.administration.roles.create')); ?>" class="btn btn-primary"><?php echo e(__('dash.add_new')); ?></a>

                    </div>
                    <?php echo e($dataTable->table(['class'=>'table dt-table-hover'])); ?>


                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <?php echo e($dataTable->scripts()); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/974206.cloudwaysapps.com/xzgdmzdxcn/public_html/resources/views/dashboard/core/administration/roles/index.blade.php ENDPATH**/ ?>