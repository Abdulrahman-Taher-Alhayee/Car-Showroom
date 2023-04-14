<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Car_color;
use App\Models\Admin;
use App\Models\Company_supplier;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        $data = Car::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        $data1 = Car_color::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        $data2 = Company_supplier::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        // if (!empty($data)) {
        //     foreach ($data as $info) {
        //         $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
        //         if ($info->updated_by > 0 and $info->updated_by != null) {
        //             $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
        //         }
        //     }
        // }
        return view('admin.cars.index', ['data' => $data,'data1'=>$data1,'data2'=>$data2]);
    }
}
