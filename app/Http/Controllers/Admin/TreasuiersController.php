<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treasuier;
use App\Models\Admin;
use App\Http\Requests\TreasuiersRequest;
use Illuminate\Http\Request;

class TreasuiersController extends Controller
{
    public function index()
    {
        $data = Treasuier::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.treasuiers.index', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.treasuiers.create');
    }
    public function store(TreasuiersRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $checkExists = Treasuier::where(['name' => $request->name, 'com_code' => $com_code])->first();
            if ($checkExists == null) {
                if ($request->is_master == 1) {
                    $checkExists_is_master = Treasuier::where(['is_master' => 1, 'com_code' => $com_code])->first();
                    if ($checkExists_is_master != null) {
                        return redirect()->back()
                        ->with(['error' => 'عفوا هناك  خزنة رئيسية بالفعل'])
                        ->withInput();                    }
                }
                $data['name'] = $request->name;
                $data['is_master'] = $request->is_master;
                $data['last_isal_exchange'] = $request->last_isal_exchange;
                $data['last_isal_collect'] = $request->last_isal_collect;
                $data['active'] = $request->active;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
                $data['date'] = date('Y-m-d');
                Treasuier::create($data);
                return redirect()->route('admin.treasuiers.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
            } else {
                return redirect()->back()
                ->with(['error' => 'عفوا اسم الخزنة موجود من قبل'])
                ->withInput();
            }
        } catch (\Exception $ex) {
            return redirect()->back()
            ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()])
            ->withInput();
        }
    }
    public function edit($id){
        $data=Treasuier::select()->find($id);
        return view('admin.treasuiers.edit',['data'=>$data]);
    }

    public function update($id,TreasuiersRequest $request){
       try{
            $com_code = auth()->user()->com_code;
            $data=Treasuier::select()->find($id);
            if(empty($data)){
                return redirect()->route('admin.treasuiers.index')->with(['error' => 'لم يتم الوصول الى البيانات المطلوبة']);

            }
            $checkExists = Treasuier::where(['name' => $request->name, 'com_code' => $com_code])->where('id','!=',$id)->first();
            if($checkExists!=null){
                return redirect()->back()
                ->with(['error' => 'عفوا اسم الخزنة موجود من قبل'])
                ->withInput();
            }
            if ($request->is_master == 1) {
                $checkExists_is_master = Treasuier::where(['is_master' => 1, 'com_code' => $com_code])->where('id','!=',$id)->first();
                if ($checkExists_is_master != null) {
                    return redirect()->back()
                    ->with(['error' => 'عفوا هناك  خزنة رئيسية بالفعل'])
                    ->withInput();

                }
            }
            $data_to_update['name']=$request->name;
            $data_to_update['active']=$request->active;
            $data_to_update['is_master']=$request->is_master;
            $data_to_update['last_isal_exchange']=$request->last_isal_exchange;
            $data_to_update['last_isal_collect']=$request->last_isal_collect;
            $data_to_update['updated_by']=auth()->user()->id;
            $data_to_update['updated_at']=date("Y-m-d H:i:s");
            Treasuier::where(['id' =>$id, 'com_code' => $com_code])->update($data_to_update);
            return redirect()->route('admin.treasuiers.index')->with(['success' => 'تم تحديث البيانات بنجاح']);

        }catch (\Exception $ex) {
            return redirect()->back()
            ->with(['error' => 'عفوا حدث خطأ ما'.$ex->getMessage()])
            ->withInput();
        }
    }
    public function ajax_search(Request $request){
        if($request->ajax()){
            $searh_by_text=$request->search_by_text;
            $data=Treasuier::where('name','LIKE',"%{$searh_by_text}%")->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
            return view('admin.treasuiers.ajax_search',['data'=>$data]);
        }
    }
}
