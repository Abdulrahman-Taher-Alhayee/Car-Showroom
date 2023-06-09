@extends('layouts.admin')

@section('title')
    الضبط العام
@endsection

@section('contentHeader')
    <i class="fas fa-cog"></i>
    الضبط
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.adminpanalsetting.index') }}">الضبط</a>
@endsection

@section('contentHeaderActive')
    عرض
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <td class="width30" style="font-weight: bold">اسم الشركة</td>
                                <td>{{ $data['system_name'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">كود الشركة</td>
                                <td>{{ $data['com_code'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">حالة الشركة</td>
                                <td>
                                    @if ($data['active'] == 1)
                                        مفعل
                                    @else
                                        معطل
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">عنوان الشركة</td>
                                <td>{{ $data['address'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">هاتف الشركة</td>
                                <td>{{ $data['phone'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">رسالة التنبيه اعلى الشاشة للشركة </td>
                                <td>{{ $data['general_alert'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">لوجو الشركة</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ asset('assest/admin/uploads') . '/' . $data['photo'] }}" alt="لوجو الشركة"
                                            class="custom_img">
                                    </div>
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
                                        {{ $date }}
                                        {{ $time }}
                                        {{ $newDateTimeType }}
                                        بواسطة
                                        {{ $data['updated_by_admin'] }}
                                    @else
                                        لا يوجد تحديث
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <br>
                        <div class="col-12">
                            <div class="form-group text-center">
                                <a href="{{ route('admin.adminpanalsetting.edit') }}" class="btn btn-sm btn-primary"> <i
                                        class="fas fa-edit"></i> تعديل</a>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            عفوا لا يوجد بيانات لعرضها!!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
