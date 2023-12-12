<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Enums\Core\ServiceType;
use App\Http\Controllers\Controller;
use App\Models\BookingSetting;
use App\Models\Category;
use App\Models\Group;
use App\Models\Icon;
use App\Models\Measurement;
use App\Models\Service;
use App\Models\ServiceGroup;
use App\Models\ServiceImages;
use App\Models\ServiceServices;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    use imageTrait;

    public function index()
    {

        if (request()->ajax()) {
            try {
                $service = Service::get();
                $var = DataTables::of($service)
                    ->addColumn('title', function ($service) {
                        return $service->title;
                    })
                    ->addColumn('service_type', function ($service) {
                        if ($service->is_package == 1) {
                            return __('dash.service_type_package');
                        } else {
                            return __('dash.service_type_service');
                        }
                    })
                    ->addColumn('gender', function ($service) {
                        if ($service->gender == 'male') {
                            return __('dash.males');
                        } else {
                            return __('dash.females');
                        }
                    })
                    ->addColumn('status', function ($service) {
                        $checked = '';
                        if ($service->active == 1) {
                            $checked = 'checked';
                        }
                        return '<label class="switch s-outline s-outline-info  mb-4 mr-2">
                    <input type="checkbox" id="customSwitch4" data-id="' . $service->id . '"' . $checked . '>
                    <span class="slider round"></span>
                    </label>';
                    })
                    ->addColumn('controll', function ($service) {

                        $html = '

                <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools image" data-id="' . $service->id . '" data-toggle="modal" data-target="#imageModel">
                        <i class="far fa-image fa-2x"></i>
                   </button>

<a href="' . route('dashboard.core.service.edit', $service->id) . '"  id="edit-booking" class="btn btn-primary btn-sm card-tools edit" data-id="' . $service->id . '"
                     data-type="' . $service->type . '"
                     data-gender="' . $service->gender . '" >
                        <i class="far fa-edit fa-2x"></i>
                   </a>


                            <a data-href="' . route('dashboard.core.service.destroy', $service->id) . '" data-id="' . $service->id . '" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                        <i class="far fa-trash-alt fa-2x"></i>
                </a>
                            ';

                        return $html;
                    })
                    ->rawColumns([
                        'title',
                        'service_type',
                        'gender',
                        'status',
                        'controll',
                    ])
                    ->make(true);
            } catch (\Exception $e) {
                error_log('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            }
            return $var;
        }

        return view('dashboard.core.services.index');
    }

    public function create()
    {
        $categories = category::whereNull('parent_id')->where('active', 1)->get();
        $groups = Group::query()->where('active', 1)->get();
        $icons = Icon::query()->get();
        $measurements = Measurement::query()->get();
        $services = Service::where('is_package', 0)->get()();
        return view('dashboard.core.services.create', compact('services', 'categories', 'groups', 'measurements', 'icons'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title_ar' => 'required|String|min:3',
            'title_en' => 'required|String|min:3',
            'description_ar' => 'required|String|min:3',
            'description_en' => 'required|String|min:3',
            'ter_cond_ar' => 'required|String|min:3',
            'ter_cond_en' => 'required|String|min:3',
            'category_id' => 'required',
            'measurement_id' => 'required|exists:measurements,id',
            'price' => 'required|Numeric',
            'type' => 'required|in:evaluative,fixed',
            'gender' => 'required',
            //            'group_ids' => 'required|array',
            //            'group_ids.*' => 'required|exists:groups,id',
            'is_package' => 'required',
            'service_ids' => 'nullable',
            'service_ids.*' => 'nullable',
            'icon_ids' => 'required|array',
            'icon_ids.*' => 'required|exists:icons,id',
            'start_from' => 'nullable|Numeric',
            'is_quantity' => 'nullable|in:on,off',
            'best_seller' => 'nullable|in:on,off',

        ]);
        try {




            $data = $request->except(['_token', 'group_ids', 'is_quantity', 'best_seller', 'icon_ids', 'is_package', 'service_ids']);

            if ($request['is_quantity'] && $request['is_quantity'] == 'on') {
                $data['is_quantity'] = 1;
            } else {
                $data['is_quantity'] = 0;
            }

            if ($request['best_seller'] && $request['best_seller'] == 'on') {
                $data['best_seller'] = 1;
            } else {
                $data['best_seller'] = 0;
            }

            $service = Service::query()->create($data);

            if ($request->is_package == '1') {
                $servicesIds = $request->service_ids;
                foreach ($servicesIds as $serviceId) {
                    ServiceServices::create([
                        'package_service_id' => $service->id,
                        'service_id' => $serviceId,
                    ]);
                }
                $service->update(['is_package' => 1]);
            }

            $service->icons()->sync($request->icon_ids);


            $bookingByservice = BookingSetting::query()->where('service_id', $service->id)->first();
            if ($bookingByservice == null) {
                BookingSetting::create([
                    'service_id' => $service->id,
                    'service_start_date' => 'Saturday',
                    'service_end_date' => 'Thursday',
                    'available_service' => 4,
                    'service_start_time' => '12:34:00',
                    'service_end_time' => '18:34:00',
                    'service_duration' => 30,
                    'buffering_time' => 10,
                ]);
            }
            //        foreach ($request->group_ids as $group_id) {
            //            ServiceGroup::query()->create([
            //                'service_id' => $service->id,
            //                'group_id' => $group_id,
            //            ]);
            //        }

            session()->flash('success');
        } catch (\Exception $e) {
            error_log('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
        }
        return redirect()->route('dashboard.core.service.index');
    }

    public function edit($id)
    {
        $service = Service::where('id', $id)->first();
        $categories = category::whereNull('parent_id')->where('active', 1)->get();
        $groups = Group::query()->where('active', 1)
            ->whereNotIn('id', ServiceGroup::query()->pluck('group_id')->toArray())
            ->orWhereIn('id', ServiceGroup::query()->where('service_id', $service->id)->pluck('group_id')->toArray())
            ->get();
        $measurements = Measurement::query()->get();
        $icons = Icon::query()->get();
        $services = Service::where('is_package', 0)->get();
        $service_services = ServiceServices::where('package_service_id', $id)->pluck('id')->toArray();
        return view('dashboard.core.services.edit', compact('service_services', 'services', 'service', 'categories', 'groups', 'measurements', 'icons'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title_ar' => 'required|String|min:3',
            'title_en' => 'required|String|min:3',
            'description_ar' => 'required|String|min:3',
            'description_en' => 'required|String|min:3',
            'ter_cond_ar' => 'required|String|min:3',
            'ter_cond_en' => 'required|String|min:3',
            'category_id' => 'required|exists:categories,id',
            'measurement_id' => 'required|exists:measurements,id',
            'price' => 'required|Numeric',
            'type' => 'required|in:evaluative,fixed',
            'start_from' => 'nullable|Numeric',
            //            'group_ids' => 'required|array',
            //            'group_ids.*' => 'required|exists:groups,id',
            'icon_ids' => 'required|array',
            'icon_ids.*' => 'required|exists:icons,id',
            'is_quantity' => 'nullable|in:on,off',
            'best_seller' => 'nullable|in:on,off',

        ]);
        $data = $request->except(['_token', 'group_ids', 'is_quantity', 'best_seller', 'icon_ids']);

        if ($request['is_quantity'] && $request['is_quantity'] == 'on') {
            $data['is_quantity'] = 1;
        } else {
            $data['is_quantity'] = 0;
        }

        if ($request['best_seller'] && $request['best_seller'] == 'on') {
            $data['best_seller'] = 1;
        } else {
            $data['best_seller'] = 0;
        }


        if ($request->type == 'fixed') {
            $data['start_from'] = null;
        }
        $service = Service::find($id);

        $service->update($data);

        $service->icons()->sync($request->icon_ids);


        ServiceGroup::query()->where('service_id', $service->id)->delete();
        //        foreach ($request->group_ids as $group_id) {
        //            ServiceGroup::query()->create([
        //                'service_id' => $service->id,
        //                'group_id' => $group_id
        //            ]);
        //        }
        session()->flash('success');
        return redirect()->route('dashboard.core.service.index');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return [
            'success' => true,
            'msg' => __("dash.deleted_success")
        ];
    }

    public function change_status(Request $request)
    {
        $admin = Service::where('id', $request->id)->first();
        if ($request->active == 'true') {
            $active = 1;
        } else {
            $active = 0;
        }

        $admin->active = $active;
        $admin->save();
        return response()->json(['sucess' => true]);
    }


    public function uploadImage(Request $request)
    {

        $request->validate([
            'file' => 'required',
            'service_id' => 'required',
        ]);

        if ($request->has('file')) {
            $image = $this->storeImages($request->file, 'service');
            $image = 'storage/images/service' . '/' . $image;
        }

        ServiceImages::create([
            'image' => $image,
            'service_id' => $request->service_id,
        ]);
        $serviceImage = ServiceImages::where('service_id', $request->service_id)->latest()->first();

        return response()->json($serviceImage);
    }

    public function getImage(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $service = Service::find($request->id);
        if (!$service) {
            return response()->json('error');
        }
        return response()->json($service->serviceImages);
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $image = ServiceImages::find($request->id);

        if (File::exists(public_path($image->image))) {
            File::delete(public_path($image->image));
        }
        $image->delete();
        return response()->json('success');
    }
}
