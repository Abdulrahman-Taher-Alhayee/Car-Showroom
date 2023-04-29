@extends('layouts.admin')

@section('title')
    بيانات فاتورة المشتريات
@endsection

@section('contentHeader')
    <i class="fas fa-car"></i>
    المشتريات
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.purchase_bills.index') }}">المشتريات</a>
@endsection

@section('contentHeaderActive')
    <a href="{{ route('admin.purchase_bills.create') }}" class="btn btn-sm btn-success">
        <i class="fas fa-plus"></i> إضافة جديد</a>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">بيانات فاتورة المشتريات</h3>
            <input type="hidden" id="token_search" value="{{ csrf_token() }}">
            <input type="hidden" id="ajax_search_url" value="{{ route('admin.purchase_bills.ajax_search') }}">

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
                            @foreach ($dataCars as $infoCars)
                                <option value="{{ $infoCars->id }}"> {{ $infoCars->model }} </option>
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
                                    <th>الكود</th>
                                    {{-- <th> السيارة</th> --}}
                                    <th> المورد</th>
                                    <th>نوع الفاتورة</th>
                                    {{-- <th>المبلغ الإجمالي</th> --}}
                                    {{-- <th> الخصم</th>
                                        <th> الضريبة</th>
                                        <th> المبلغ الصافي</th> --}}
                                        <th> تاريخ الفاتورة</th>
                                    <th>  ملاحظات</th>
                                    <td>تحكم</td>
                                </thead>
                                <tbody>
                                    @foreach ($data as $info)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            {{-- <td>
                                                @foreach ($dataCars as $infoCars)
                                                    @if ($info->car_id == $infoCars->id)
                                                        {{ $infoCars->model }}
                                                    @endif
                                                @endforeach
                                            </td> --}}
                                            <td>
                                                @foreach ($dataSuppliers as $infoSuppliers)
                                                    @if ($info->supplier_id == $infoSuppliers->id)
                                                        {{ $infoSuppliers->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>@if($info->bill_type==1) كاش @else  آجل @endif</td>
                                            <td>{{ $info->date }}</td>
                                            <td>{{ $info->comments }}</td>

                                            <td>
                                                <a href="{{ route('admin.purchase_bills.edit', $info->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> تعديل</a>
                                                <a href="{{ route('admin.purchase_bills.show', $info->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> عرض</a>
                                                <a href="{{ route('admin.purchase_bills.delete', $info->id) }}"
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
