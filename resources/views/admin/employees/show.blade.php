
@extends('layouts.admin')

@section('title')
بيانات الموظفين
@endsection

@section('contentHeader')
    <i class="fas fa-cog"></i>
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
                    <h3 class="card-title card_title_center">بيانات الموظفين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <td class="width30" style="font-weight: bold">اسم الموظف</td>
                                <td>{{ $data['name'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> رقم الهاتف</td>
                                <td>{{ $data['phone'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">  الإيميل</td>
                                <td>{{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">عنوان الموظف</td>
                                <td>{{ $data['address'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> المنصب</td>
                                <td>{{ $data['position'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> الراتب</td>
                                <td>{{ $data['salary'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold"> تاريخ التوظيف</td>
                                <td>{{ $data['hire_date'] }}</td>
                            </tr>
                            <tr>
                                <td class="width30" style="font-weight: bold">تاريخ  الإضافة</td>
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
@endsection
