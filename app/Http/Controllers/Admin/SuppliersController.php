<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuppliersRequest;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Admin;

class SuppliersController extends Controller
{
    public function index()
    {
        $data = Supplier::select()->orderby('id', 'ASC')->paginate(PAGINATION_COUNT);

        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.suppliers.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.suppliers.create');
    }

    public function store(SuppliersRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExists = Supplier::where(['name' => $request->name, 'com_code' => $com_code])->first();
            if ($checkExists == null) {

                $data['name'] = $request->name;
                $data['phone'] = $request->phone;
                $data['email'] = $request->email;
                $data['address'] = $request->address;
               // $data['active'] = $request->active;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
              //  $data['date'] = date('Y-m-d');
              Supplier::create($data);
                return redirect()->route('admin.suppliers.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
            } else {
                return redirect()->back()
                ->with(['error' => 'عفوا اسم المورد موجود من قبل'])
                ->withInput();
            }
        } catch (\Exception $ex) {
            return redirect()->back()
            ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()])
            ->withInput();
        }
    }

    public function edit($id){
        $data=Supplier::select()->find($id);
        return view('admin.suppliers.edit',['data'=>$data]);
    }

    public function update($id,SuppliersRequest $request){
        try{
             $com_code = auth()->user()->com_code;
             $data=Supplier::select()->find($id);
             if(empty($data)){
                 return redirect()->route('admin.suppliers.index')->with(['error' => 'لم يتم الوصول الى البيانات المطلوبة']);

             }
             $checkExists = Supplier::where(['name' => $request->name, 'com_code' => $com_code])->where('id','!=',$id)->first();
             if($checkExists!=null){
                 return redirect()->back()
                 ->with(['error' => 'عفوا اسم المورد موجود من قبل'])
                 ->withInput();
             }

             $data_to_update['name']=$request->name;
             $data_to_update['phone']=$request->phone;
             $data_to_update['email']=$request->email;
             $data_to_update['address']=$request->address;
             $data_to_update['updated_by']=auth()->user()->id;
             $data_to_update['updated_at']=date("Y-m-d H:i:s");
             Supplier::where(['id' =>$id, 'com_code' => $com_code])->update($data_to_update);
             return redirect()->route('admin.suppliers.index')->with(['success' => 'تم تحديث البيانات بنجاح']);

         }catch (\Exception $ex) {
             return redirect()->back()
             ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()])
             ->withInput();
         }
     }

     public  function delete($id)
     {
        try{
            $td=Supplier::find($id);
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
            $data=Supplier::where('name','LIKE',"%{$searh_by_text}%")->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
            if (!empty($data)) {
                foreach ($data as $info) {
                    $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                    if ($info->updated_by > 0 and $info->updated_by != null) {
                        $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                    }
                }
            }
            return view('admin.suppliers.ajax_search',['data' => $data]);
        }
    }
}
