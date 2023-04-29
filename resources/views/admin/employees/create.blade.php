@extends('layouts.admin')

@section('title')
    إضافة موظف جديد
@endsection

@section('contentHeader')
    <i class="fas fa-users-cog"></i>
    الموظفين
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.employees.index') }}">الموظفين</a>
@endsection

@section('contentHeaderActive')
    إضافة
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">إضافة موظف جديد</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>إسم الموظف</label>
                            <input name="name" id="name" class="form-control" value="{{ old('name') }}"
                                placeholder="أدخل إسم الموظف">
                        </div>
                    </div>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-6">
                        <div class="form-group">
                            <label> رقم الموظف</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="phone" id="phone"
                                class="form-control" value="{{ old('phone') }}" placeholder="أدخل رقم الموظف">
                        </div>
                    </div>

                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-6">
                        <div class="form-group">
                            <label>الإيميل </label>
                            <input name="email" id="email" class="form-control" value="{{ old('email') }}"
                                placeholder="أدخل إيميل الموظف">
                        </div>
                    </div>

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-6">
                        <div class="form-group">
                            <label>العنوان </label>
                            <input name="address" id="address" class="form-control" value="{{ old('address') }}"
                                placeholder="أدخل عنوان الموظف">
                        </div>
                    </div>

                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-6">
                        <div class="form-group">
                            <label>المنصب </label>
                            <input name="position" id="position" class="form-control" value="{{ old('position') }}"
                                placeholder="أدخل منصب الموظف">
                        </div>
                    </div>

                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-6">
                        <div class="form-group">
                            <label>الراتب </label>
                            <input name="salary" id="salary" class="form-control" value="{{ old('salary') }}"
                                placeholder="أدخل راتب الموظف">
                        </div>
                    </div>

                    @error('salary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-6">
                        <div class="form-group">
                            <label>تاريخ التوظيف </label>
                            <input type="date" value="@php echo  date("Y-m-d"); @endphp" name="hire_date" id="hire_date"
                                class="form-control" value="{{ old('hire_date') }}" style="text-align: right">
                    </div>

                    @error('hire_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                إضافة </button>
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                                إلغاء</a>
                        </div>
                    </div>
                </div>
            </form>



        </div>
    </div>
@endsection
