@extends('layouts.admin')

@section('title')
    إضافة مورد جديد
@endsection

@section('contentHeader')
    <i class="fas fa-user-shield"></i>
    الموردين
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.suppliers.index') }}">الموردين</a>
@endsection

@section('contentHeaderActive')
    إضافة
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center" style="font-weight: bold">إضافة مورد جديد</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('admin.suppliers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>إسم المورد</label>
                            <input name="name" id="name" class="form-control" value="{{ old('name') }}"
                                placeholder="أدخل إسم المورد" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')"
                                onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label> رقم المورد</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="phone" id="phone"
                                class="form-control" value="{{ old('phone') }}" placeholder="أدخل رقم المورد"
                                oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')"
                                onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>الإيميل </label>
                            <input name="email" id="email" class="form-control" value="{{ old('email') }}"
                                placeholder="أدخل إيميل المورد" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')"
                                onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>العنوان </label>
                            <input name="address" id="address" class="form-control" value="{{ old('address') }}"
                                placeholder="أدخل عنوان المورد" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')"
                                onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                إضافة </button>
                            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                                إلغاء</a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
@endsection
