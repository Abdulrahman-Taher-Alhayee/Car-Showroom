@extends('layouts.admin')

@section('title')
    تعديل بيانات السيارات
@endsection

@section('contentHeader')
    <i class="fas fa-car"></i>
    السيارات
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.cars.index') }}">السيارات</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">تعديل بيانات السيارات </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data))
                <form action="{{ route('admin.cars.update', $data['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>الشركة المصنعة </label>
                                <select name="company_id" id="company_id" class="form-control">
                                    <option value="">اختر الشركة</option>

                                    @foreach ($data1 as $info1)
                                        <option
                                            @if (@isset($_POST['company_id'])) @if (old('company_id') == $info1->id and old('company_id') != '') selected="selected" @endif
                                        @else @if ($data['company_id'] == $info1->id) selected @endif @endif value="{{ $info1->id }}"> {{ $info1->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @error('company_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label>موديل السيارة</label>
                                <input name="model" id="model" class="form-control"
                                    value=" {{ old('model', $data['model']) }}" placeholder="أدخل موديل السيارة">
                            </div>
                        </div>

                        @error('model')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label>رقم اللوحة</label>
                                <input name="plate_num" id="plate_num" class="form-control"
                                    value=" {{ old('plate_num', $data['plate_num']) }}" placeholder="أدخل رقم اللوحة">
                            </div>
                        </div>

                        @error('plate_num')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label>سنة الصنع</label>
                                <input style="text-align: right" type="date" name="year" id="year"
                                    class="form-control" value="{{ old('year', $data['year']) }}">
                            </div>
                        </div>

                        @error('year')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label>لون السيارة</label>
                                <input name="colors" id="colors" class="form-control"
                                    value=" {{ old('colors', $data['colors']) }}" placeholder="أدخل لون السيارة">
                            </div>
                        </div>

                        @error('colors')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label> سعر شراء السيارة</label>
                                <input oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="purchase_price" id="purchase_price"
                                    class="form-control" value="{{ old('purchase_price', $data['purchase_price']) }}"
                                    placeholder="أدخل سعر الشراء">
                            </div>
                        </div>

                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label> سعر بيع السيارة</label>
                                <input oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="sale_price" id="sale_price"
                                    class="form-control" value="{{ old('sale_price', $data['sale_price']) }}"
                                    placeholder="أدخل سعر البيع">
                            </div>
                        </div>

                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-4">
                            <div class="form-group">
                                <label> الخصم </label>
                                <input oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="discount" id="discount"
                                    class="form-control" value="{{ old('discount', $data['discount']) }}"
                                    placeholder="أدخل الخصم">
                            </div>
                        </div>

                        <div class="col-4">
                        <div class="form-group">
                            <label>حالة السيارة</label>
                            <select name="status" id="status" class="form-control" >
                                <option value="">اختر حالة السيارة</option>
                                <option @if(@isset($_POST['status']))
                                @if(old('status')==1 and old('status')!="") selected="selected" @endif
                                @else
                                @if($data['status']==1) selected @endif
                                @endif  value="1"> جديد</option>
                                <option @if(@isset($_POST['status']))
                                @if(old('status')==0 and old('status')!="") selected="selected" @endif
                                @else
                                @if($data['status']==0) selected @endif
                                @endif value="0"> مستعمل</option>
                            </select>
                        </div>
                    </div>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    <div class="col-4">
                    <div class="form-group">
                        <label> الحالة</label>
                        <select name="active" id="active" class="form-control" >
                            <option value="">اختر الحالة</option>
                            <option @if(@isset($_POST['active']))
                            @if(old('active')==1 and old('active')!="") selected="selected" @endif
                            @else
                            @if($data['active']==1) selected @endif
                            @endif  value="1">مفعلة</option>
                            <option @if(@isset($_POST['active']))
                            @if(old('active')==0 and old('active')!="") selected="selected" @endif
                            @else
                            @if($data['active']==0) selected @endif
                            @endif value="0"> غير مفعلة</option>
                        </select>
                    </div>
                </div>

                    @error('active')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror



                        @error('discount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-4" style="border: solid 5px #000 ; margin:10px">
                            <div class="form-group">
                                <label> الصورة</label>
                                <div class="image">
                                    <img id="uploadedimg" class="custom_img" src="{{ asset('assest/admin/uploads') . '/' . $data['photo'] }}" alt="صورة السيارة " >
                                    <button type="button" class="btn btn-sm btn-danger" id="update_image">تغيير الصورة</button>
                                    <button type="button" class="btn btn-sm btn-danger" id="cancel_update_image" style="display: none">إلغاء الصورة</button>
                                </div >
                                <div  id="oldimage"></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save"></i>
                                    حفظ التعديلات</button>
                                <a href="{{ route('admin.cars.index') }}" class="btn btn-sm btn-danger">
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
