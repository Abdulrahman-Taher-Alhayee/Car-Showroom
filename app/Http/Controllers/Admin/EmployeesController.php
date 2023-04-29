<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Admin;

class EmployeesController extends Controller
{
    public function index()
    {
        $data = Employee::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);

        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.employees.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(EmployeesRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExists = Employee::where(['name' => $request->name, 'com_code' => $com_code])->first();
            if ($checkExists == null) {

                $data['name'] = $request->name;
                $data['phone'] = $request->phone;
                $data['email'] = $request->email;
                $data['address'] = $request->address;
                $data['position'] = $request->position;
                $data['salary'] = $request->salary;
                $data['hire_date'] = $request->hire_date ;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
              //  $data['date'] = date('Y-m-d');
              Employee::create($data);
                return redirect()->route('admin.employees.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
            } else {
                return redirect()->back()
                ->with(['error' => 'عفوا اسم الموظف موجود من قبل'])
                ->withInput();
            }
        } catch (\Exception $ex) {
            return redirect()->back()
            ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()])
            ->withInput();
        }
    }

    public function edit($id){
        $data=Employee::select()->find($id);
        return view('admin.employees.edit',['data'=>$data]);
    }

    public function update($id,EmployeesRequest $request){
        try{
             $com_code = auth()->user()->com_code;
             $data=Employee::select()->find($id);
             if(empty($data)){
                 return redirect()->route('admin.employees.index')->with(['error' => 'لم يتم الوصول الى البيانات المطلوبة']);

             }
             $checkExists = Employee::where(['name' => $request->name, 'com_code' => $com_code])->where('id','!=',$id)->first();
             if($checkExists!=null){
                 return redirect()->back()
                 ->with(['error' => 'عفوا اسم الموظف موجود من قبل'])
                 ->withInput();
             }

             $data_to_update['name']=$request->name;
             $data_to_update['phone']=$request->phone;
             $data_to_update['email']=$request->email;
             $data_to_update['address']=$request->address;
             $data_to_update['position']=$request->position;
             $data_to_update['salary']=$request->salary;
             $data_to_update['hire_date']=$request->hire_date;
             $data_to_update['updated_by']=auth()->user()->id;
             $data_to_update['updated_at']=date("Y-m-d H:i:s");
             Employee::where(['id' =>$id, 'com_code' => $com_code])->update($data_to_update);
             return redirect()->route('admin.employees.index')->with(['success' => 'تم تحديث البيانات بنجاح']);

         }catch (\Exception $ex) {
             return redirect()->back()
             ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()])
             ->withInput();
         }
     }

     public  function delete($id)
     {
        try{
            $td=Employee::find($id);
            if(!empty($td)){
                $flag=$td->delete();
                if($flag){
                    return redirect()->back()
                    ->with(['success' => 'تم حذف البيانات بنجاح']);
                }else{
                    return redirect()->back()
             ->with(['error' => 'عفوا حدث خطأ ما']);
                }
            }else{
                return redirect()->back()
                ->with(['error' => 'عفوا غير قادر على الوصول الى البيانات ']);
            }

        }catch(\Exception $ex){
            return redirect()->back()
             ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()]);
        }
     }

     public function ajax_search(Request $request){
        if($request->ajax()){
            $searh_by_text=$request->search_by_text;
            $data=Employee::where('name','LIKE',"%{$searh_by_text}%")->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
            if (!empty($data)) {
                foreach ($data as $info) {
                    $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                    if ($info->updated_by > 0 and $info->updated_by != null) {
                        $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                    }
                }
            }
            return view('admin.employees.ajax_search',['data' => $data]);
        }
    }
    public function show()
    {
        $data =Employee::where('com_code', auth()->user()->com_code)->first();
        if (!empty($data)) {
            $data['added_by_admin'] = Admin::where('id', $data['added_by'])->value('name');
            if ($data['updated_by'] > 0 and $data['updated_by'] != null) {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }
        }
        return view('admin.employees.show',['data'=>$data]);
    }
}
 