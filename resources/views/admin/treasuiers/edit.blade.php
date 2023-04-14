@extends('layouts.admin')

@section('title')
    تعديل بيانات الخزن
@endsection

@section('contentHeader')
    الخزن
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.treasuiers.index') }}">الخزن</a>
@endsection

@section('contentHeaderActive')
    تعديل
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">تعديل بيانات الخزن </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <form action="{{ route('admin.treasuiers.update',$data['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>إسم الخزنة</label>
                            <input name="name" id="name" class="form-control" value=" {{ old('name', $data['name']) }}" placeholder="أدخل إسم الشركة" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>نوع الخزنة</label>
                            <select name="is_master" id="is_master" class="form-control" >
                                <option value="">اختر النوع</option>

                                <option @if(@isset($_POST['is_master']))
                                @if(old('is_master')==1 and old('is_master')!="") selected="selected" @endif
                                @else
                                @if($data['is_master']==1) selected @endif
                                @endif value="1"> رئيسية </option>

                                <option @if(@isset($_POST['is_master']))
                                @if(old('is_master')==0 and old('is_master')!="") selected="selected" @endif
                                @else
                                @if($data['is_master']==0) selected @endif
                                @endif value="0"> فرعية</option>
                            </select>
                        </div>

                        @error('is_master')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label> اخر رقم ايصال للصرف</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="last_isal_exchange" id="last_isal_exchange" class="form-control" value="{{ old('last_isal_exchange', $data['last_isal_exchange']) }}" oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('last_isal_exchange')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label> اخر رقم ايصال للتحصيل</label>
                            <input oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="last_isal_collect" id="last_isal_collect" class="form-control" value="{{ old('last_isal_collect', $data['last_isal_collect']) }}"  oninvalid="setCustomValidity('من فضلك أدخل هذه الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>

                        @error('last_isal_collect')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label>حالة الخزنة</label>
                            <select name="active" id="active" class="form-control" >
                                <option value="">اختر الحالة</option>
                                <option @if(@isset($_POST['active']))
                                @if(old('active')==1 and old('active')!="") selected="selected" @endif
                                @else
                                @if($data['active']==1) selected @endif
                                @endif  value="1"> مفعل</option>
                                <option @if(@isset($_POST['active']))
                                @if(old('active')==0 and old('active')!="") selected="selected" @endif
                                @else
                                @if($data['active']==0) selected @endif
                                @endif value="0"> معطل</option>
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
