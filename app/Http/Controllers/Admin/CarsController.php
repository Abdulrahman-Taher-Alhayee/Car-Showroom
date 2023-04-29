<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarsRequest;
use App\Models\Car;
use App\Models\Car_color;
use App\Models\Admin;
use App\Models\Car_company;
use App\Models\Company_supplier;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $data = Car::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);
        $data1 = Car_company::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.cars.index', ['data' => $data, 'data1' => $data1]);
    }
    public function create()
    {
        $data1 = Car_company::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);
        return view('admin.cars.create', ['data1' => $data1]);
    }

    public function store(CarsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExists = Car::where(['model' => $request->model, 'com_code' => $com_code])->first();
            if ($checkExists == null) {

                $data['company_id'] = $request->company_id;
                $data['model'] = $request->model;
                $data['plate_num'] = $request->plate_num;
                $data['year'] = $request->year;
                $data['colors'] = $request->colors;
                $data['purchase_price'] = $request->purchase_price;
                $data['sale_price'] = $request->sale_price;
                $data['discount'] = $request->discount;
                $data['status'] = $request->status;
                $data['active'] = $request->active;
                if ($request->has('photo')) {
                    $request->validate([
                        'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
                    ]);
                    $the_file_path = uploadImage('assest/admin/uploads', $request->photo);
                    $data['photo'] = $the_file_path;
                }
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
                //  $data['date'] = date('Y-m-d');
                Car::create($data);
                return redirect()->route('admin.cars.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
            } else {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم السيارة موجود من قبل'])
                    ->withInput();
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $data = Car::select()->find($id);
        $data1 = Car_company::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);
        return view('admin.cars.edit', ['data' => $data, 'data1' => $data1]);
    }

    public function update($id, CarsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = Car::select()->find($id);
            if (empty($data)) {
                return redirect()->route('admin.cars.index')->with(['error' => 'لم يتم الوصول الى البيانات المطلوبة']);
            }
            $checkExists = Car::where(['model' => $request->model, 'com_code' => $com_code])->where('id', '!=', $id)->first();
            if ($checkExists != null) {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم السيارة موجود من قبل'])
                    ->withInput();
            }

            $data_to_update['company_id'] = $request->company_id;
            $data_to_update['model'] = $request->model;
            $data_to_update['plate_num'] = $request->plate_num;
            $data_to_update['year'] = $request->year;
            $data_to_update['colors'] = $request->colors;
            $data_to_update['purchase_price'] = $request->purchase_price;
            $data_to_update['sale_price'] = $request->sale_price;
            $data_to_update['discount'] = $request->discount;
            $data_to_update['status'] = $request->status;
            $data_to_update['active'] = $request->active;
          //  $data_to_update['photo']= $request->photo;
            $oldphotoPath=$data['photo'];
            if($request->has('photo')){
                $request->validate([
                    'photo'=>'required|mimes:png,jpg,jpeg|max:2000',
                ]);
                $the_file_path=uploadImage('assest/admin/uploads',$request->photo);
                $data_to_update['photo']=$the_file_path;
                if(file_exists('assest/admin/uploads/'.$oldphotoPath)){
                    unlink('assest/admin/uploads/'.$oldphotoPath );
                }
               }
            $data_to_update['updated_by'] = auth()->user()->id;
            $data_to_update['updated_at'] = date("Y-m-d H:i:s");
            Car::where(['id' => $id, 'com_code' => $com_code])->update($data_to_update);
            return redirect()->route('admin.cars.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public  function delete($id)
    {
        try {
            $td = Car::find($id);
            if (!empty($td)) {
                $flag = $td->delete();
                if ($flag) {
                    return redirect()->back()
                        ->with(['success' => 'تم حذف البيانات بنجاح']);
                } else {
                    return redirect()->back()
                        ->with(['error' => 'عفوا حدث خطأ ما']);
                }
            } else {
                return redirect()->back()
                    ->with(['error' => 'عفوا غير قادر على الوصول الى البيانات ']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()]);
        }
    }

    public function ajax_search(Request $request)
    {
        if ($request->ajax()) {
            $searh_by_text = $request->search_by_text;
            $company_search = $request->company_search;
            if ($searh_by_text == null) {
                $field1 = "id";
                $operator1 = ">";
                $value1 = 0;
            } else {
                $field1 = "model";
                $operator1 = "LIKE";
                $value1 = "%{$searh_by_text}%";
            }
            if ($company_search == 'all') {
                $field2 = "id";
                $operator2 = ">";
                $value2 = 0;
            } else {
                $field2 = "company_id";
                $operator2 = "=";
                $value2 = $company_search;
            }
            $data = Car::where($field1, $operator1, $value1)->where($field2, $operator2, $value2)->orderBy('id', 'ASC')->paginate(PAGINATION_COUNT);
            if (!empty($data)) {
                foreach ($data as $info) {
                    $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                    if ($info->updated_by > 0 and $info->updated_by != null) {
                        $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                    }
                }
            }
            $data1 = Car_company::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);
            return view('admin.cars.ajax_search', ['data' => $data, 'data1' => $data1]);
        }
    }
}
