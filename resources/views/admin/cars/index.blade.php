@extends('layouts.admin')

@section('title')
    بيانات السيارات
@endsection

@section('contentHeader')
    <i class="fas fa-car"></i>
    السيارات
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.cars.index') }}">السيارات</a>
@endsection

@section('contentHeaderActive')
    <a href="{{ route('admin.cars.create') }}" class="btn btn-sm btn-success">
        <i class="fas fa-plus"></i> إضافة جديد</a>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">بيانات السيارات</h3>
            <input type="hidden" id="token_search" value="{{ csrf_token() }}">
            <input type="hidden" id="ajax_search_url" value="{{ route('admin.cars.ajax_search') }}">

        </div>
        <!-- /.card-header -->
        <div class="card-body" style="overflow: auto">
            <div class="row">
                <div class="col-md-4">
                    <label for="">بحث بالإسم</label>
                    <input type="text" id="search_by_text" placeholder="بحث ..." class="form-control"><br>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>بحث بواسطة الشركة </label>
                        <select name="company_search" id="company_search" class="form-control">
                            <option value="all">بحث بالكل</option>
                            @foreach ($data1 as $info1)
                                <option value="{{ $info1->id }}"> {{ $info1->name }} </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="ajax_responce_searchDiv">
                        @if (@isset($data) && !@empty($data))
                            @php
                                $i = 1;
                            @endphp
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="custom_thead">
                                    <th>مسلسل</th>
                                    <th>الشركة المصنعة</th>
                                    <th>موديل السيارة</th>
                                    <th>رقم اللوحة</th>
                                    <th>سنة الصنع</th>
                                    <th>اللون</th>
                                    <th>سعر الشراء</th>
                                    <th>سعر البيع</th>
                                    <th>الخصم</th>
                                    <th>حالة السيارة</th>
                                    <th>الحالة</th>
                                    <td>تحكم</td>
                                </thead>
                                <tbody>
                                    @foreach ($data as $info)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                @foreach ($data1 as $info1)
                                                    @if ($info->company_id == $info1->id)
                                                        {{ $info1->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $info->model }}</td>
                                            <td>{{ $info->plate_num }}</td>
                                            <td>{{ $info->year }}</td>
                                            <td>{{ $info->colors }}</td>
                                            <td>{{ $info->purchase_price }}</td>
                                            <td>{{ $info->sale_price }}</td>
                                            <td>{{ $info->discount }}</td>
                                            <td>@if($info->status==1)جديد @else مستعمل @endif</td>
                                            <td>@if($info->active==1) مفعله @else غير مفعله @endif</td>
                                            <td>
                                                <a href="{{ route('admin.cars.edit', $info->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> تعديل</a>
                                                <a href="{{ $info->id }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> عرض</a>
                                                <a href="{{ route('admin.cars.delete', $info->id) }}"
                                                    class="btn btn-sm are_you_shue btn-danger">
                                                    <i class="fas fa-trash"></i> حذف</a>
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
    <script src="{{ asset('assest/admin/js/cars.js') }}"></script>
@endsection
