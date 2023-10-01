<?php

namespace App\Http\Controllers\Dashboard\Cars;

use App\Http\Controllers\Controller;
use App\Models\CarType;
use App\Models\Category;
use App\Models\Group;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;


class CarTypeController extends Controller
{
    use imageTrait;
    public function index()
    {

        if (request()->ajax()) {

            $car_type = CarType::all();

            return DataTables::of($car_type)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })

                ->addColumn('controll', function ($row) {

                    $html = '

                                <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit" data-id="'.$row->id.'"  data-name_ar="'.$row->name_ar.'"
                                 data-name_en="'.$row->name_en.'"  data-toggle="modal" data-target="#editModel">
                            <i class="far fa-edit fa-2x"></i>
                       </button>

                                <a data-href="'.route('dashboard.car_type.destroy', $row->id).'" data-id="'.$row->id.'" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                            <i class="far fa-trash-alt fa-2x"></i>
                    </a>
                                ';

                    return $html;
                })

                ->rawColumns([
                    'name',
                    'controll',
                ])
                ->make(true);
        }

        return view('dashboard.car_type.index');
    }

    public function create()
    {
        return view('dashboard.car_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|String|min:3',
            'name_en' => 'required|String|min:3',
        ]);

        $data=$request->except('_token');

        $car_type = CarType::updateOrCreate($data);
        session()->flash('success');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('dashboard.car_type.edit');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        $data=$request->except('_token');

        $car_type = CarType::find($id);

        $car_type->update($data);
        session()->flash('success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $car_type = CarType::find($id);

        $car_type->delete();
        return [
            'success' => true,
            'msg' => __("dash.deleted_success")
        ];
    }

}
