@extends('layouts.admin')

@section('title')
    بيانات الموظفين
@endsection

@section('contentHeader')
    الموظفين
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.employees.index') }}">الموظفين</a>
@endsection
 
@section('contentHeaderActive')
    عرض
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات  الموظفين</h3>
                    {{-- <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" id="ajax_search_url" value="{{ route('admin.treasuiers.ajax_search') }}"> --}}
                    <a href="{{route('admin.cars.create') }}" class="btn btn-sm btn-success"> إضافة جديد</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-4">
                        <input type="text" id="search_by_text" placeholder="بحث بالإسم" class="form-control"><br>
                    </div>

                    <div id="ajax_responce_searchDiv">
                        @if (@isset($data) && !@empty($data))
                        @php
                            $i=1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                           <thead class="custom_thead">
                            <th>مسلسل</th>
                            <th> الإسم</th>
                            <th> المنصب</th>
                            <th>  الراتب</th>
                            <th> تاريخ التوظيف </th>
                            <td></td>

                           </thead>
                           <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->position }}</td>
                                    <td>{{ $info->salary }}</td>
                                    <td>{{ $info->hire_date }}</td>
                                    <td>
                                        <a  href="{{ route('admin.treasuiers.edit',$info->id) }}" class="btn btn-sm btn-primary"> تعديل</a>
                                        <button data-id="{{ $info->id }}" class="btn btn-sm btn-info">المزيد</button>
                                        <button data-id="{{ $info->id }}" class="btn btn-sm btn-danger">حذف</button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                           </tbody>
                        </table>
                        @else
                        <div class="alert alert-danger">
                            عفوا لا يوجد بيانات لعرضها!!
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assest/admin/js/treasuiers.js') }}"></script>
@endsection
