@extends('layouts.admin')

@section('title')
   إضافة عميل جديد
@endsection

@section('contentHeader')
    العملاء
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.customers.index') }}">العملاء</a>
@endsection

@section('contentHeaderActive')
    إضافة
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">إضافة عميل جديد</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>إسم العميل</label>
                            <input name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="أدخل إسم العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>  رقم  العميل</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="أدخل رقم العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>الإيميل </label>
                            <input name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="أدخل إيميل العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>العنوان </label>
                            <input name="address" id="address" class="form-control" value="{{ old('address') }}" placeholder="أدخل عنوان العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">إضافة </button>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-danger">إلغاء</a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
@endsection
