<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Admin;

class EmployeesController extends Controller
{
    public function index()
    {
        $data = Employee::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);

        // if (!empty($data)) {
        //     foreach ($data as $info) {
        //         $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
        //         if ($info->updated_by > 0 and $info->updated_by != null) {
        //             $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
        //         }
        //     }
        // }
        return view('admin.employees.index', ['data' => $data]);
    }
}
