<div class="modal fade " id="editGroupTechModel" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل مجموعة الأخصائيين</h5>
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
                <form action="" method="post" class="form-horizontal"
                      enctype="multipart/form-data" id="edit_grouptech_form" data-parsley-validate="">
                    @csrf
                    {!! method_field('PUT') !!}
                    <div class="box-body">
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="edit_name_ar">الاسم باللغة بالعربية</label>
                                <input type="text" name="name_ar" class="form-control"
                                       id="edit_name_ar"
                                       placeholder="الاسم باللغة العربية"
                                >
                                @error('name_ar')
                                <div class=name_ar>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_name_en">الاسم باللغة الانجليزية</label>
                                <input type="text" name="name_en" class="form-control"
                                       id="edit_name_en"
                                       placeholder="الاسم باللغة الانجليزية"
                                >
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">

                                <label for="gender">{{__('dash.gender')}}</label>
                                <select id="gender"  class="select2 form-control pt-1"
                                        name="gender" required>
                                    <option disabled>{{__('dash.choose')}}</option>
                                    <option value="male">{{__('dash.males')}}</option>
                                    <option value="female">{{__('dash.females')}}</option>
                                </select>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-6">

                                <label for="edit_technician_id">مشرف المجموعة</label>
                                <select  id="edit_technician_id" class="select2 form-control pt-1"
                                         name="technician_id">
                                    <option value="">{{__('dash.choose')}}</option>
                                    @foreach($technicians as $technician)
                                        <option value="{{$technician->id}}">{{$technician->name}}</option>
                                    @endforeach
                                </select>
                                @error('technician_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

               

                        </div>

                        <div class="form-row mb-3">
                        <div class="form-group col-md-6">

                            <label for="technician_group_id">الأخصائيين</label>
                            <select  id="technician_group_id" multiple class="select2 form-control pt-1"
                                     name="technician_group_id[]">
                                <option selected disabled value="">{{__('dash.choose')}}</option>
                                @foreach($technicians as $technician)
                                    <option value="{{$technician->id}}">{{$technician->name}}</option>
                                @endforeach
                            </select>
                            @error('technician_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">

                                <label for="country_id">{{__('dash.country')}}</label>
                                <select id="country_id"  class=" country_id form-control pt-1"
                                        name="country_id">
                                    <option disabled >{{__('dash.choose')}}</option>
                                    @foreach($countries as $key => $country)
                                        <option value="{{$key}}">{{$country}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for="city_id">{{__('dash.city')}}</label>
                                <select id="city_id" class=" city_id form-control pt-1"
                                        name="city_id">
                                    <option disabled>{{__('dash.choose')}}</option>
                                    @foreach($cities as $key => $city)
                                        <option value="{{$key}}">{{$city}}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-4">

                                <label for="region_id">{{__('dash.region')}}</label>
                                <select id="region_id"  multiple class="select2 region_id form-control pt-1"
                                        name="region_id[]">
                                    <option disabled>{{__('dash.choose')}}</option>
                                    @foreach($regions as $key => $region)
                                        <option value="{{$key}}">{{$region}}</option>
                                    @endforeach
                                </select>
                                @error('region_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dash.save')}}</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('dash.close')}}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Get the initial group options
        var initialGroupOptions = $('#edit_technician_id option').clone();
        var initialGroupOptions2 = $('#technician_group_id option').clone();
        // Handle the change event of the gender select
        $(document).on('change', '#gender', function() {
            var selectedGender = $(this).val();

            // Clear the second select options
            $('#edit_technician_id').empty();
            $('#technician_group_id').empty();

            // Filter the groups based on the selected gender
            var filteredGroups = {!! $technicians !!}.filter(function(group) {
    
          
                return group.gender === selectedGender;
            });
            
      
            // Add the filtered group options to the second select
            $.each(filteredGroups, function(index, group) {
                console.log(group);
                $('#edit_technician_id').append($('<option>', {
                    value: group.id,
                    text: group.name
                }));
                $('#technician_group_id').append($('<option>', {
                    value: group.id,
                    text: group.name
                }));
            });
        });

    });
</script>


