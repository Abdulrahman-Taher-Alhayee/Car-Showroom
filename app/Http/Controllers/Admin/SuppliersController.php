<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Admin;

class SuppliersController extends Controller
{
    public function index()
    {
        $data = Supplier::select()->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);
        // if (!empty($data)) {
        //     foreach ($data as $info) {
        //         $info->added_by_admin = Admin::where('id', $info->added_by)->value('name');
        //         if ($info->updated_by > 0 and $info->updated_by != null) {
        //             $info->updated_by_admin = Admin::where('id', $info->updated_by)->value('name');
        //         }
        //     }
        // }
        return view('admin.suppliers.index', ['data' => $data]);
    }
}
