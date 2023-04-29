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
    عرض
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">
                        تفاصيل فاتورة المشتريات</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <td class="width30" style="font-weight: bold">كود الفاتورة الآلي</td>
                                <td>{{ $data['id'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">كود الفاتورة المسجل بالفاتورة الأصل</td>
                                <td>{{ $data['bill_number'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> تاريح الفاتورة</td>
                                <td>{{ $data['date'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">إسم المورد</td>
                                <td>{{ $data['name'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> نوع الفاتوره</td>
                                <td>
                                    @if ($data['bill_type'] == 1)
                                        كاش
                                    @else
                                        اجل
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> إجمالي الفاتورة</td>
                                <td>{{ $data['total_price'] * 1 }}</td>
                            </tr>
                            @if ($data['discount'] != null)
                                <tr>
                                    <td class="width30" style="font-weight: bold"> الخصم على الفاتورة</td>
                                    <td>خصم بنسبة ({{ $data['discount'] * 1 }})</td>
                                </tr>
                            @else
                                <tr>
                                    <td class="width30" style="font-weight: bold"> الخصم على الفاتورة</td>
                                    <td>لا يوجد خصم</td>
                                </tr>
                            @endif
                            <tr>
                                <td class="width30" style="font-weight: bold">نسبة القيمة المضافة</td>
                                <td>
                                    @if ($data['tax'] > 0)
                                        لا يوجد
                                    @else
                                        بنسبة ({{ $data['tax'] * 1 }})
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">تاريخ الإضافة</td>
                                <td>
                                    @php
                                        $dt = new DateTime($data['created_at']);
                                        $date = $dt->format('Y-m-d');
                                        $time = $dt->format('h:i');
                                        $newDateTime = date('A', strtotime($time));
                                        $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساء';
                                    @endphp
                                    {{ $date }}<br>
                                    {{ $time }}
                                    {{ $newDateTimeType }}<br>
                                    بواسطة
                                    {{ $data['added_by_admin'] }}
                                </td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">تاريخ اخر تحديث</td>
                                <td>
                                    @if ($data['updated_by'] > 0 && $data['updated_by'] != null)
                                        @php
                                            $dt = new DateTime($data['updated_at']);
                                            $date = $dt->format('Y-m-d');
                                            $time = $dt->format('h:i');
                                            $newDateTime = date('A', strtotime($time));
                                            $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساء';
                                        @endphp
                                        {{ $date }} <br>
                                        {{ $time }}
                                        {{ $newDateTimeType }} <br>
                                        بواسطة
                                        {{ $data['updated_by_admin'] }}
                                    @else
                                        لا يوجد تحديث
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"></td>
                                <td> <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#Add-cars-Modal">
                                        إضافة سيارة للفاتورة
                                    </button></td>
                            </tr>
                        </table>
                        <br>
                    @else
                        <div class="alert alert-danger">
                            عفوا لا يوجد بيانات لعرضها!!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Add-cars-Modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-info">
                <div class="modal-header">
                    <h4 class="modal-title">إضافة سيارة للفاتورة</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="Add-cars-Modal-body" style="background-color: white !important">
                    <p >One fine body&hellip;</p>
                </div>
                <div class="modal-footer gustify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-outline-light">اضف للفاتورة</button>
                </div>
            </div>
        </div>
    </div>
@endsection
