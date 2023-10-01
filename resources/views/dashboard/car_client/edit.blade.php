@extends('dashboard.layout.layout')

@section('sub-header')
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
                                        href="{{route('dashboard.home')}}">{{__('dash.home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('dash.edit')}}</li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
        </header>
    </div>


@endsection

@section('content')



    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <form  method="post"
                           action="{{route('dashboard.car_client.update',$car_client->id)}}"
                           enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        @csrf
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">

                                <label for="inputEmail4">{{__('dash.user')}}</label>
                                <select id="inputState"  class="select2 user_id form-control pt-1"
                                        name="user_id">
                                    <option disabled selected>{{__('dash.choose')}}</option>
                                    @foreach($users as  $user)
                                        <option value="{{$user->id}}" @if($user->id == $car_client->user_id) selected @endif>{{$user->first_name .' '.$user->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for="inputEmail4">نوع السياره</label>
                                <select id="inputState" class="select2 type_id form-control pt-1"
                                        name="type_id">
                                    <option selected disabled>{{__('dash.choose')}}</option>
                                    @foreach($types as  $type)
                                        <option value="{{$type->id}}" @if($type->id == $car_client->type_id) selected @endif>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for="inputEmail4">موديل السياره</label>
                                <select id="inputState" class="select2 model_id form-control pt-1"
                                        name="model_id">
                                    <option  disabled>{{__('dash.choose')}}</option>
                                    @foreach($models as  $model)
                                        <option value="{{$model->id}}" @if($model->id == $car_client->model_id) selected @endif>{{$model->name}}</option>
                                    @endforeach
                                </select>
                                @error('model_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>


                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">اللون</label>
                                <input type="text" name="color" value="{{$car_client->color}}" class="form-control"
                                       id="inputEmail4"
                                       placeholder="اللون">
                                @error('color')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">رقم اللوحه</label>
                                <input type="text" name="Plate_number" value="{{$car_client->Plate_number}}" class="form-control"
                                       id="inputEmail4"
                                       placeholder="رقم اللوحه">
                                @error('Plate_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group col-md-3">
                            <button type="submit"
                                    class="btn btn-primary col-md-3">{{__('dash.submit')}}</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection


@push('script')
    <script>

        $('.select2').select2({
            tags: true,
            dir: '{{app()->getLocale() == "ar"? "rtl" : "ltr"}}'
        })

        $(document).ready(function (){
            $('.type_id').on('change',function (){
                var type_id=$(this).val();
                $.ajax({
                    url: '{{route('dashboard.car.getModel')}}',
                    data:{type_id:type_id},
                    success: function(response) {
                        $('.model_id').empty()
                        $('.model_id').append('<option disabled selected>{{__('dash.choose')}}</option>')
                        $.each(response, function (i, item) {

                            $('.model_id').append($('<option>', {
                                value: i,
                                text : item
                            }));
                        });

                    }
                });

            });

        });

    </script>
@endpush
