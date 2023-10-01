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
                                <li class="breadcrumb-item active" aria-current="page">موديل السياره</li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>


        </header>
    </div>

    <?php echo $__env->make('dashboard.car_model.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-md-12 text-right mb-3">

                        <button type="button" id="add-work-exp" class="btn btn-primary card-tools" data-toggle="modal"
                                data-target="#exampleModal">
                            <?php echo e(__('dash.add_new')); ?>

                        </button>

                    </div>
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('dash.name')); ?></th>
                            <th>نوع السياره</th>
                            <th class="no-content"><?php echo e(__('dash.actions')); ?></th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>

        </div>

    </div>
    <?php echo $__env->make('dashboard.car_model.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "language": {
                    "url": "<?php echo e(app()->getLocale() == 'ar'? '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json' : '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json'); ?>"
                },
                buttons: {
                    buttons: [
                        {extend: 'copy', className: 'btn btn-sm'},
                        {extend: 'csv', className: 'btn btn-sm'},
                        {extend: 'excel', className: 'btn btn-sm'},
                        {extend: 'print', className: 'btn btn-sm'}
                    ]
                },
                charset: 'UTF-8',
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '<?php echo e(route('dashboard.car_model.index')); ?>',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'type', name: 'type'},
                    {data: 'controll', name: 'controll', orderable: false, searchable: false},

                ]
            });
        });

        $("body").on('click', '.edit', function () {

            var id = $(this).attr('data-id');
            var name_ar = $(this).attr('data-name_ar');
            var name_en = $(this).attr('data-name_en');
            var type = $(this).attr('data-type');


            $('#name_ar').val(name_ar)
            $('#name_en').val(name_en)
            $('.type_id').val(type).trigger('change')


            var action = window.location.origin + '/admin/car_model/' + id;
            console.log(action)
            $('#demo-form-edit').attr('action', action);

        })



    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\sahmTech\Altra\resources\views/dashboard/car_model/index.blade.php ENDPATH**/ ?>