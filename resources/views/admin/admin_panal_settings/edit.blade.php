@extends('layouts.admin')

@section('title')
    تعديل الضبط العام
@endsection

@section('contentHeader')
<i class="fas fa-cog"></i>
    الضبط
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.adminpanalsetting.index') }}">الضبط</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">تعديل بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <form action="{{ route('admin.adminpanalsetting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>إسم الشركة</label>
                            <input name="system_name" id="system_name" class="form-control" value="{{ $data['system_name'] }}" placeholder="أدخل إسم الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('system_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>عنوان الشركة</label>
                            <input name="address" id="address" class="form-control" value="{{ $data['address'] }}" placeholder="أدخل عنوان الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>هاتف الشركة</label>
                            <input name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}" placeholder="أدخل هاتف الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>رسالة التنبيه أعلى الشاشة</label>
                            <input name="general_alert" id="general_alert" class="form-control" value="{{ $data['general_alert'] }}" placeholder="أدخل  رسالة التنبيه"oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        <div class="form-group">
                            <label>شعار الشركة</label>
                            <div class="image">
                                <img class="custom_img" src="{{ asset('assest/admin/uploads') . '/' . $data['photo'] }}" alt="لوجو الشركة" >
                                <button type="button" class="btn btn-sm btn-danger" id="update_image">تغيير الصورة</button>
                                <button type="button" class="btn btn-sm btn-danger" id="cancel_update_image" style="display: none">إلغاء الصورة</button>
                            </div >
                            <div  id="oldimage"></div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-save"></i>
                                        حفظ التعديلات</button>
                                    <a href="{{ route('admin.adminpanalsetting.index') }}" class="btn btn-sm btn-danger">
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
        </div>
    </div>
@endsection
