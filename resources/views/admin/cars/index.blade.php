@extends('layouts.admin')

@section('title')
    بيانات السيارات
@endsection

@section('contentHeader')
    السيارات
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.cars.index') }}">السيارات</a>
@endsection

@section('contentHeaderActive')
    عرض
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات  السيارات</h3>
                    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" id="ajax_search_url" value="{{ route('admin.treasuiers.ajax_search') }}">
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
                            <th>موديل السيارة</th>
                            <th>الشركة المصنعة</th>
                            <th> سنة الصنع</th>
                            <th> اللون </th>
                            <th> الشركة الموردة</th>
                            <th>السعر</th>
                            <td></td>

                           </thead>
                           <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info->model }}</td>
                                    <td>{{ $info->make }}</td>
                                    <td>{{ $info->year }}</td>
                                    <td>@foreach ($data1 as $info1)
                                        @if ($info->color_id==$info1->id)
                                       {{ $info1->color_name}}
                                        @endif
                                    @endforeach</td>

                                    <td>@foreach ($data2 as $info2)
                                        @if ($info->supplier_id==$info2->id)
                                       {{ $info2->company_name}}
                                        @endif
                                    @endforeach</td>
                                    <td>{{ $info->price }}</td>
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
