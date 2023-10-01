<?php $__env->startPush('style'); ?>
    <link href="<?php echo e(asset('css/VisitShowStyle.css')); ?>" rel="stylesheet" type="text/css"/>
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
                                <li class="breadcrumb-item active" aria-current="page">عرض الطلب</li>
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
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="card-title">تفاصيل الطلب</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">

                            <table class="table table-bordered nowrap">

                                <thead>

                                <tr>
                                    <th>رقم الطلب</th>
                                    <td><?php echo e($order->id); ?></td>
                                </tr>
                                <tr>
                                    <?php
                                        $date = Illuminate\Support\Carbon::parse($order->created_at);
                                    ?>
                                    <th>تاريخ الطلب</th>
                                    <td><?php echo e($date->format("Y-m-d H:i:s")); ?></td>
                                </tr>

                                <tr>

                                    <th>القسم</th>
                                    <td>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <button class="btn-sm btn-primary"><?php echo e($item->title); ?></button>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>

                                <tr>

                                    <th>عدد الخدمات</th>
                                    <td>
                                        <?php echo e($order->services->count()); ?>

                                    </td>
                                </tr>

                                <tr>
                                    <th>اسم العميل</th>
                                    <td><?php echo e($order->user?->first_name . '' .$order->user?->last_name); ?></td>
                                </tr>
                                <tr>
                                    <th>حاله الطلب</th>
                                    <td><?php echo e($order->status?->name); ?></td>
                                </tr>
                                <tr>
                                    <th>طريقه الدفع</th>
                                    <td><?php echo e($order->payment_method); ?></td>
                                </tr>
                                <tr>
                                    <th>الاجمالي</th>
                                    <td><?php echo e($order->sub_total); ?></td>
                                </tr>
                                <tr>
                                    <th>الاجمالي بعد الخصم</th>
                                    <td><?php echo e($order->total); ?></td>
                                </tr>

                                <tr>
                                    <th>نوع السياره</th>
                                    <td><?php echo e($order->userCar?->type?->name); ?></td>
                                </tr>
                                <tr>
                                    <th>موديل السياره</th>
                                    <td><?php echo e($order->userCar?->model?->name); ?></td>
                                </tr>
                                <tr>
                                    <th>لون السياره</th>
                                    <td><?php echo e($order->userCar?->color); ?></td>
                                </tr>
                                <tr>
                                    <th>رقم لوحة السياره</th>
                                    <td><?php echo e($order->userCar?->Plate_number); ?></td>
                                </tr>
                                <tr>
                                        <th>اسماء الخدمات</th>

                                        <td>
                                            <?php $__currentLoopData = $order->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn-sm btn-primary"><?php echo e($service->title); ?></button>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>

                                </tr>

                                <tr>
                                    <th>صوره المرفقه</th>
                                    <td>
                                        <div class="container__img-holder">
                                            
                                            <img class="img-fluid"  src="<?php echo e(asset($order->image)); ?>">

                                        </div>

                                    </td>
                                </tr>

                                <tr>
                                    <th>الملاحظات</th>
                                    <td><?php echo e($order->notes); ?></td>
                                </tr>

                                </thead>

                            </table><!-- end of table -->


                        </div>
                        <!-- /.card-body -->
                    </div>

                    <?php if($order->file != null): ?>
                        <div class="card">
                            <div class="card-header">

                                <div class="row">
                                    <div class="col-md-5">
                                        <h3 class="card-title">عرض الفيديو</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0" style="margin: auto">

                                <video width="500" height="240" controls>
                                    <source src="<?php echo e(URL::asset($order->file)); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    <?php endif; ?>

                </div>
            </div>




        </div>

    </div>

    <div class="img-popup">
        <img src="" alt="Popup Image">
        <div class="close-btn">
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {

            // required elements
            var imgPopup = $('.img-popup');
            var imgCont  = $('.container__img-holder');
            var popupImage = $('.img-popup img');
            var closeBtn = $('.close-btn');

            // handle events
            imgCont.on('click', function() {
                var img_src = $(this).children('img').attr('src');
                imgPopup.children('img').attr('src', img_src);
                imgPopup.addClass('opened');
            });

            $(imgPopup, closeBtn).on('click', function() {
                imgPopup.removeClass('opened');
                imgPopup.children('img').attr('src', '');
            });

            popupImage.on('click', function(e) {
                e.stopPropagation();
            });

        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\sahmTech\Altra\resources\views/dashboard/orders/show.blade.php ENDPATH**/ ?>