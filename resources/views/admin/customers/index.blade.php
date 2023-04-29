@extends('layouts.admin')

@section('title')
    بيانات العملاء
@endsection

@section('contentHeader')
    <i class="fas fa-users"></i>
    العملاء
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.customers.index') }}">العملاء</a>
@endsection

@section('contentHeaderActive')
    <a href="{{ route('admin.customers.create') }}" class="btn btn-sm btn-success">
        <i class="fas fa-plus"></i> إضافة جديد</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center" style="font-weight: bold">بيانات العملاء</h3>
                    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" id="ajax_search_url" value="{{ route('admin.customers.ajax_search') }}">

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-4">
                        <input type="text" id="search_by_text" placeholder="بحث ..." class="form-control"><br>
                    </div>

                    <div id="ajax_responce_searchDiv">
                        @if (@isset($data) && !@empty($data))
                            @php
                                $i = 1;
                            @endphp
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="custom_thead">
                                    <th>مسلسل</th>
                                    <th> الإسم</th>
                                    <th> رقم الهاتف</th>
                                    <th> الإيميل</th>
                                    <th> العنوان </th>
                                    <th> تاريخ الإضافة </th>
                                    <th> تاريخ التحديث </th>
                                    <th> تحكم </th>

                                </thead>
                                <tbody>
                                    @foreach ($data as $info)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $info->name }}</td>
                                            <td>{{ $info->phone }}</td>
                                            <td>{{ $info->email }}</td>
                                            <td>{{ $info->address }}</td>
                                            <td>
                                                @php
                                                    $dt = new DateTime($info->created_at);
                                                    $date = $dt->format('Y-m-d');
                                                    $time = $dt->format('h:i');
                                                    $newDateTime = date('A', strtotime($time));
                                                    $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساء';
                                                @endphp
                                                {{ $date }}<br>
                                                {{ $time }}
                                                {{ $newDateTimeType }}<br>
                                                بواسطة
                                                {{ $info->added_by_admin }}
                                            </td>
                                            <td>
                                                @if ($info->updated_by > 0 and $info->updated_by != null)
                                                    @php
                                                        $dt = new DateTime($info->updated_at);
                                                        $date = $dt->format('Y-m-d');
                                                        $time = $dt->format('h:i');
                                                        $newDateTime = date('A', strtotime($time));
                                                        $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساء';
                                                    @endphp
                                                    {{ $date }}<br>
                                                    {{ $time }}
                                                    {{ $newDateTimeType }}<br>
                                                    بواسطة
                                                    {{ $info->updated_by_admin }}
                                                @else
                                                    لا يوجد تحديث
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.customers.edit', $info->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> تعديل</a>
                                                <a href="{{ $info->id }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> عرض</a>
                                                <a href="{{ route('admin.customers.delete', $info->id) }}"
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
    <script src="{{ asset('assest/admin/js/treasuiers.js') }}"></script>
@endsection
