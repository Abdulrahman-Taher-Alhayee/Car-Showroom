@extends('layouts.admin')

@section('title')
    تعديل بيانات الموظفين
@endsection

@section('contentHeader')
    <i class="fas fa-users-cog"></i>
    الموظفين
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.employees.index') }}">الموظفين</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">تعديل بيانات الموظفين </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data))
                <form action="{{ route('admin.employees.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>إسم الموظف</label>
                                <input name="name" id="name" class="form-control"
                                    value=" {{ old('name', $data['name']) }}" placeholder="أدخل إسم الموظف">
                            </div>
                        </div>

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-6">
                            <div class="form-group">
                                <label> رقم الموظف</label>
                                <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="phone" id="phone"
                                    class="form-control" value="{{ old('phone', $data['phone']) }}" placeholder="من فضلك أدخل رقم المظف">
                            </div>
                        </div>

                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-6">
                            <div class="form-group">
                                <label>إيميل الموظف</label>
                                <input name="email" id="email" class="form-control"
                                    value=" {{ old('email', $data['email']) }}" placeholder="أدخل إيميل الموظف">
                            </div>
                        </div>

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-6">
                            <div class="form-group">
                                <label>عنوان الموظف</label>
                                <input name="address" id="address" class="form-control"
                                    value=" {{ old('address', $data['address']) }}" placeholder="أدخل عنوان الموظف">
                            </div>
                        </div>

                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-6">
                            <div class="form-group">
                                <label>منصب الموظف</label>
                                <input name="position" id="position" class="form-control"
                                    value=" {{ old('position', $data['position']) }}" placeholder="أدخل عنوان الموظف">
                            </div>
                        </div>

                        @error('position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-6">
                            <div class="form-group">
                                <label>راتب الموظف</label>
                                <input name="salary" id="salary" class="form-control"
                                    value=" {{ old('salary', $data['salary']) }}" placeholder="أدخل راتب الموظف">
                            </div>
                        </div>

                        @error('salary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-6">
                            <div class="form-group">
                                <label>تاريخ التوظيف</label>
                                <input style="text-align: right" type="date" name="hire_date" id="hire_date"
                                    class="form-control" value="{{ old('hire_date', $data['hire_date']) }}">
                            </div>
                        </div>

                        @error('hire_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save"></i>
                                    حفظ التعديلات</button>
                                <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-danger">
                                    <i class="fas fa-times"></i>
                                    إلغاء</a>

                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="alert alert-danger">
                    عفوا لا يوجد بيانات لعرضها!!
                </div>
            @endif
        </div>
    </div>
@endsection
