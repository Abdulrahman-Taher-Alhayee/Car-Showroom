@extends('layouts.admin')

@section('title')
   إضافة خزنة جديدة
@endsection

@section('contentHeader')
    الخزن
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.treasuiers.index') }}">الخزن</a>
@endsection

@section('contentHeaderActive')
    إضافة
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">إضافة خزنة جديدة</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <form action="{{ route('admin.treasuiers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>إسم الخزنة</label>
                            <input name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="أدخل إسم الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>نوع الخزنة</label>
                            <select name="is_master" id="is_master" class="form-control" >
                                <option value="">اختر النوع</option>
                                <option @if(old('is_master')==1)  selected='selected' @endif value="1"> رئيسية</option>
                                <option @if(old('is_master')==0 and old('is_master')!="" ) selected='selected' @endif value="0"> فرعية</option>
                            </select>
                        </div>

                        @error('is_master')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label> اخر رقم ايصال للصرف</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="last_isal_exchange" id="last_isal_exchange" class="form-control" value="{{ old('last_isal_exchange') }}" placeholder="أدخل إسم الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('last_isal_exchange')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label> اخر رقم ايصال للتحصيل</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="last_isal_collect" id="last_isal_collect" class="form-control" value="{{ old('last_isal_collect') }}" placeholder="أدخل إسم الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('last_isal_collect')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>حالة الخزنة</label>
                            <select name="active" id="active" class="form-control" >
                                <option value="">اختر الحالة</option>
                                <option @if(old('active')==1 ) selected='selected' @endif value="1"> مفعل</option>
                                <option @if(old('active')==0 and old('active')!="" ) selected='selected' @endif value="0"> معطل</option>
                            </select>
                        </div>

                        @error('active')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                            <a href="{{ route('admin.treasuiers.index') }}" class="btn btn-sm btn-danger">إلغاء</a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
@endsection
