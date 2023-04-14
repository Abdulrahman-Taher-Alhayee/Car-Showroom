<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_panal_setting;
use App\Models\Admin;
use App\Http\Requests\Admin_panal_settings_Request;
use Illuminate\Http\Request;

class Admin_panal_settingsController extends Controller
{
    public  function index()
    {
        $data =Admin_panal_setting::where('com_code', auth()->user()->com_code)->first();
        if (!empty($data)) {
            if ($data['updated_by'] > 0 and $data['updated_by'] != null) {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }
        }
        return view('admin.admin_panal_settings.index',['data'=>$data]);
    }
    public function edit(){
        $data =Admin_panal_setting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panal_settings.edit',['data'=>$data]);

    }
    public function update(Admin_panal_settings_Request $request){
        try{
        $admin_panal_setting =Admin_panal_setting::where('com_code', auth()->user()->com_code)->first();
        $admin_panal_setting->system_name=$request->system_name;
        $admin_panal_setting->address=$request->address;
        $admin_panal_setting->phone=$request->phone;
        $admin_panal_setting->general_alert=$request->general_alert;
        $admin_panal_setting->updated_by=auth()->user()->id;
        $admin_panal_setting->updated_at=date("Y-m-d H:i:s");
        $oldphotoPath=$admin_panal_setting->photo;
        if($request->has('photo')){
            $request->validate([
                'photo'=>'required|mimes:png,jpg,jpeg|max:2000',
            ]);
            $the_file_path=uploadImage('assest/admin/uploads',$request->photo);
            $admin_panal_setting->photo=$the_file_path;
            if(file_exists('assest/admin/uploads/'.$oldphotoPath)){
                unlink('assest/admin/uploads/'.$oldphotoPath );
            }
           }
           $admin_panal_setting->save();
           return redirect()->route('admin.adminpanalsetting.index')->with(['success'=>'تم تحديث البيانات بنجاح']);

        }catch(\Exception $ex){
            return redirect()->route('admin.adminpanalsetting.index')->with(['error'=>'عفوا حدث خطأ ما'.$ex->getMessage()]);
        }
    }
}
