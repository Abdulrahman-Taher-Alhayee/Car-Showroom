@extends('layouts.admin')

@section('title')
    ةإضافة سيارة جديد
@endsection

@section('contentHeader')
    <i class="fas fa-car">
    </i>
    السيارات
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.cars.index') }}">السيارات</a>
@endsection

@section('contentHeaderActive')
    إضافة
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">إضافة سيارة جديدة</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>الشركة المصنعة </label>
                            <select name="company_id" id="company_id" class="form-control">
                                <option value="">اختر الشركة</option>

                                @foreach ($data1 as $info1)
                                    <option value="{{ $info1->id }}"> {{ $info1->name }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    @error('company_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>موديل السيارة</label>
                            <input name="model" id="model" class="form-control" value="{{ old('model') }}"
                                placeholder="أدخل موديل السيارة">
                        </div>
                    </div>

                    @error('model')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>رقم اللوحة</label>
                            <input name="plate_num" id="plate_num" class="form-control" value="{{ old('plate_num') }}"
                                placeholder="أدخل رقم اللوحة">
                        </div>
                    </div>

                    @error('plate_num')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>تاريخ الصنع </label>
                            <input type="date" value="@php echo  date("Y-m-d"); @endphp" name="year" id="year"
                                class="form-control" value="{{ old('year') }}" style="text-align: right">
                        </div>
                    </div>

                    @error('year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>لون السيارة</label>
                            <input name="colors" id="colors" class="form-control" value="{{ old('colors') }}"
                                placeholder="أدخل لون السيارة">
                        </div>
                    </div>

                    @error('colors')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> سعر الشراء</label>
                            <input oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="purchase_price" id="purchase_price"
                                class="form-control" value="{{ old('purchase_price') }}" placeholder="أدخل  سعر الشراء">
                        </div>
                    </div>

                    @error('purchase_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-4">
                        <div class="form-group">
                            <label> سعر البيع</label>
                            <input oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="sale_price" id="sale_price"
                                class="form-control" value="{{ old('sale_price') }}" placeholder="أدخل  سعر البيع">
                        </div>
                    </div>

                    @error('sale_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>الخصم</label>
                            <input oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="discount" id="discount"
                                class="form-control" value="{{ old('discount') }}" placeholder="أدخل  الخصم">
                        </div>
                    </div>

                    @error('discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>حالة السيارة</label>
                            <select name="status" id="active" class="form-control" >
                                <option value="">اختر الحالة</option>
                                <option @if(old('status')==1 ) selected='selected' @endif value="1"> جديد</option>
                                <option @if(old('status')==0 and old('status')!="" ) selected='selected' @endif value="0"> مستعمل</option>
                            </select>
                        </div>

                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label> الحالة</label>
                            <select name="active" id="active" class="form-control" >
                                <option value="">اختر الحالة</option>
                                <option @if(old('active')==1 ) selected='selected' @endif value="1">مفعله</option>
                                <option @if(old('active')==0 and old('active')!="" ) selected='selected' @endif value="0"> غير مفعله</option>
                            </select>
                        </div>

                        @error('active')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4" style="border: solid 5px #000 ; margin:10px">
                        <div class="form-group">
                            <label>الصورة</label>
                            <img id="uploadedimg" src="#" alt="uploaded img" style="width: 200px; width: 200px">
                             <input onchange="readURL(this)" type="file" id="photo" name="photo"
                                class="form-control" >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                إضافة </button>
                            <a href="{{ route('admin.cars.index') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                                إلغاء</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
    <script type="text/javascript">
    function readURL(input) {
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#uploadedimg').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
