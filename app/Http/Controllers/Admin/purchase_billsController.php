<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase_bill;
use App\Models\Admin;
use App\Models\Car;
use App\Models\Supplier;
use App\Http\Requests\Purchases_billsRequest;

class purchase_billsController extends Controller
{
    public function index()
    {
        $data = Purchase_bill::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        $dataCars = Car::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        $dataSuppliers = Supplier::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);

        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.purchase_bills.index', ['data' => $data, 'dataCars' => $dataCars, 'dataSuppliers' => $dataSuppliers]);
    }
    public function create()
    {
        $dataSuppliers = Supplier::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.purchase_bills.create', ['dataSuppliers' => $dataSuppliers]);
    }
    public function store(Purchases_billsRequest $request)
    {

        try {
            $com_code = auth()->user()->com_code;
            $checkExists = Purchase_bill::where(['id' => $request->id, 'com_code' => $com_code])->first();
            if ($checkExists == null) {

                $data['date'] = $request->date;
                $data['bill_number'] = $request->bill_number;
                $data['supplier_id'] = $request->supplier_id;
                $data['bill_type'] = $request->bill_type;
                $data['comments'] = $request->comments;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['added_by'] = auth()->user()->id;
                $data['com_code'] = $com_code;
                Purchase_bill::create($data);
                return redirect()->route('admin.purchase_bills.index')->with(['success' => 'تم تحديث البيانات بنجاح']);
            } else {
                return redirect()->back()
                    ->with(['error' => 'عفوا  الفاتورة موجود من قبل'])
                    ->withInput();
            }
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
    public function show($id)
    {
        $com_code = auth()->user()->com_code;
        $data = Purchase_bill::where(['id' => $id, 'com_code' => $com_code])->first();
        $data['name'] = Supplier::where('id', $data['supplier_id'])->value('name');
        if (!empty($data)) {
            $data['added_by_admin'] = Admin::where('id', $data['added_by'])->value('name');
            if ($data['updated_by'] > 0 and $data['updated_by'] != null) {
                $data['updated_by_admin'] = Admin::where('id', $data['updated_by'])->value('name');
            }
        }
        return view('admin.purchase_bills.show', ['data' => $data]);
    }
}
