@extends('layouts.admin')

@section('title')
    تعديل بيانات العملاء
@endsection

@section('contentHeader')
    العملاء
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.customers.index') }}">العملاء</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">تعديل بيانات العملاء </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <form action="{{ route('admin.customers.update',$data['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>إسم العميل</label>
                            <input name="name" id="name" class="form-control" value=" {{ old('name', $data['name']) }}" placeholder="أدخل إسم العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="form-group">
                            <label>  رقم  العميل</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="phone" id="phone" class="form-control" value="{{ old('phone', $data['phone']) }}" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>إيميل العميل</label>
                            <input name="email" id="email" class="form-control" value=" {{ old('email', $data['email']) }}" placeholder="أدخل إيميل العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>عنوان العميل</label>
                            <input name="address" id="address" class="form-control" value=" {{ old('address', $data['address']) }}" placeholder="أدخل عنوان العميل" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                            <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-danger">إلغاء</a>

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
