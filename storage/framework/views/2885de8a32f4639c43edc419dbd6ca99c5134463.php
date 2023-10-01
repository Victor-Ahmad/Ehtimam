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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('dash.services')); ?></li>
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






                        <a href="<?php echo e(route('dashboard.core.service.create')); ?>" id="" class="btn btn-primary card-tools">
                            <?php echo e(__('dash.add_new')); ?>

                        </a>

                    </div>
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('dash.service name')); ?></th>
                            <th><?php echo e(__('dash.status')); ?></th>
                            <th class="no-content"><?php echo e(__('dash.actions')); ?></th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>

        </div>

    </div>

    <?php echo $__env->make('dashboard.core.services.images', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#html5-extension').DataTable({
                dom: "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                buttons: {
                    buttons: [
                        {extend: 'copy', className: 'btn btn-sm'},
                        {extend: 'csv', className: 'btn btn-sm'},
                        {extend: 'excel', className: 'btn btn-sm'},
                        {extend: 'print', className: 'btn btn-sm'}
                    ]
                },
                "oLanguage": {
                    'sEmptyTable': "<?php echo e(__('dash.no data available in table')); ?>",
                    'sInfo': "<?php echo e(__('dash.Showing')); ?>" + ' _START_ ' + "<?php echo e(__('dash.to')); ?>" + ' _END_ ' + "<?php echo e(__('dash.of')); ?>" + ' _TOTAL_ ' + "<?php echo e(__('dash.entries')); ?>",
                    'sInfoEmpty': "<?php echo e(__('dash.Showing')); ?>" + ' 0 ' + "<?php echo e(__('dash.to')); ?>" + ' 0 ' + "<?php echo e(__('dash.of')); ?>" + ' 0 ' + "<?php echo e(__('dash.entries')); ?>",
                    'sInfoFiltered'  : '('+"<?php echo e(__('dash.filtered')); ?>"+' '+"<?php echo e(__('dash.from')); ?>"+' _MAX_ '+"<?php echo e(__('dash.total')); ?>"+' '+"<?php echo e(__('dash.entries')); ?>"+')',
                'sInfoThousands': ',',
                    'sLengthMenu': "<?php echo e(__('dash.show')); ?>" + ' _MENU_ ',
                    'sLoadingRecords': "<?php echo e(__('dash.loading...')); ?>",
                    'sProcessing': "<?php echo e(__('dash.processing')); ?>" + '...',
                    'sSearch': "<?php echo e(__('dash.search')); ?>" + ' : ',
                    'sZeroRecords': "<?php echo e(__('dash.no matching records found')); ?>",
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                },
                charset: 'UTF-8',
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,
                ajax: '<?php echo e(route('dashboard.core.service.index')); ?>',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'status', name: 'status'},
                    {data: 'controll', name: 'controll', orderable: false, searchable: false},

                ]
            });
        });

        // $("body").on('click', '.edit', function () {
        //
        //     // var id = $(this).attr('data-id');
        //     // var title_ar = $(this).attr('data-title_ar');
        //     // var title_en = $(this).attr('data-title_en');
        //     // var des_ar = $(this).attr('data-des_ar');
        //     // var des_en = $(this).attr('data-des_en');
        //     // var ter_ar = $(this).attr('data-ter_ar');
        //     // var ter_en = $(this).attr('data-ter_en');
        //     // var category_id = $(this).attr('data-category_id');
        //     // var price = $(this).attr('data-price');
        //     var type = $(this).attr('data-type');
        //     // var start = $(this).attr('data-start');
        //     //
        //     //
        //     // $('#title_ar').val(title_ar)
        //     // $('#title_en').val(title_en)
        //     // $('.price').val(price)
        //     // $('.start_from').val(start)
        //     //
        //     // $('.type  option[value="'+type+'"]').prop("selected", true);
        //     // $('.category_id  option[value="'+category_id+'"]').prop("selected", true);
        //
        //
        //     if (type == 'evaluative'){
        //
        //         $('.type-col').removeClass('col-md-6');
        //         $('.type-col').addClass('col-md-4');
        //         $('.price-col').removeClass('col-md-6');
        //         $('.price-col').addClass('col-md-4');
        //         $('.start_from').show();
        //
        //
        //     }else{
        //         $('.type-col').removeClass('col-md-4');
        //         $('.type-col').addClass('col-md-6');
        //         $('.price-col').removeClass('col-md-4');
        //         $('.price-col').addClass('col-md-6');
        //         $('.start_from').hide();
        //
        //     }
        //     //
        //     //
        //     // CKEDITOR.instances['description_ar'].setData(des_ar);
        //     // CKEDITOR.instances['description_en'].setData(des_en);
        //     // CKEDITOR.instances['ter_cond_ar'].setData(ter_ar);
        //     // CKEDITOR.instances['ter_cond_en'].setData(ter_en);
        //     //
        //     // var action = window.location.origin + '/admin/core/service/' + id;
        //     // console.log(action)
        //     // $('#demo-form-edit').attr('action', action);
        //
        // })


        $("body").on('change', '#customSwitch4', function () {
            var active = $(this).is(':checked');
            var id = $(this).attr('data-id');

            $.ajax({
                url: '<?php echo e(route('dashboard.core.service.change_status')); ?>',
                type: 'get',
                data: {id: id, active: active},
                success: function (data) {
                    swal({
                        title: "<?php echo e(__('dash.successful_operation')); ?>",
                        text: "<?php echo e(__('dash.request_executed_successfully')); ?>",
                        type: 'success',
                        padding: '2em'
                    })
                }
            });
        })


        $(document).on('click', '.image', function () {

            $('.image_preview').empty();
            let id = $(this).attr('data-id');
            let url = '<?php echo e(route('dashboard.core.service.getImage')); ?>';
            let token = '<?php echo e(csrf_token()); ?>';
            let temp = "<?php echo e(url('/')); ?>";
            $('#service_id').val(id)
            $.ajax({
                url: url,
                method: "post",
                data: {'_token': token, 'id': id},
                dataType: 'json',
                success: function (response) {
                    if (response.length > 0) {
                        $('.image_preview').empty()
                        $.each(response, function (key, val) {

                            $('.image_preview').append(`<div class="div-preview col-sm-2" style="width: 18rem;">
                            <a data-fancybox="gallery" href="${temp}/` + val['image'] + `"><img class="card-img-top" style="width: 111px;"  src="${temp}/` + val['image'] + `"  alt="Card image cap"></a>
                        <div class="card-body">
                            <a href="javascript:;" class="btn btn-danger deleteImage" data-id="` + val['id'] + `"><?php echo e(__('dash.delete')); ?></a>
                        </div>
                        </div>`);
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    var errors = $.parseJSON(xhr.responseText);
                }
            });

        });
        $(document).on('click', '.deleteImage', function () {
            let id = $(this).data('id');
            let url = '<?php echo e(route('dashboard.core.service.deleteImage')); ?>';
            let token = ' <?php echo e(csrf_token()); ?>';
            let button = $(this);
            $.ajax({
                url: url,
                method: "post",
                data: {'_token': token, 'id': id},
                dataType: 'json',
                success: function (response) {

                    button.closest('.div-preview').remove();
                },
                error: function (xhr, textStatus, errorThrown) {
                    var errors = $.parseJSON(xhr.responseText);
                }
            });
        });

    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tcavw\Desktop\Sahmtech\Ultra\public_html\resources\views/dashboard/core/services/index.blade.php ENDPATH**/ ?>