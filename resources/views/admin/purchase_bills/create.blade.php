@extends('layouts.admin')

@section('title')
    ةإضافة فاتورة جديد
@endsection

@section('contentHeader')
    <i class="fas fa-car">
    </i>
    المشتريات
@endsection

@section('contentHeaderLink')
    <a href="{{ route('admin.purchase_bills.index') }}">المشتريات</a>
@endsection

@section('contentHeaderActive')
    إضافة
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center" style="font-weight: bold">إضافة فاتورة جديدة</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('admin.purchase_bills.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> التاريخ</label>
                            <input type="date" value="@php echo date("Y-m-d"); @endphp" name="date" id="date"
                                class="form-control" value="{{ old('date') }}" style="text-align: right">
                        </div>
                    </div>

                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-12">
                        <div class="form-group">
                            <label> رقم الفاتورة المسجل بفاتورة المشتريات الأصل</label>
                            <input name="bill_number" id="bill_number"
                                class="form-control" value="{{ old('bill_number') }}" style="text-align: right">
                        </div>
                    </div>

                    @error('bill_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>بيانات المورد </label>
                            <select name="supplier_id" id="supplier_id" class="form-control">
                                <option value="">اختر المورد</option>
                                @if (@isset($dataSuppliers) && !@empty($dataSuppliers))
                                    @foreach ($dataSuppliers as $infoSuppleirs)
                                        <option @if (old('suppleir_id') == $infoSuppleirs->id) selected="selected" @endif
                                            value="{{ $infoSuppleirs->id }}"> {{ $infoSuppleirs->name }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @error('supplier_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="col-md-12">
                        <div class="form-group">
                            <label>نوع الفاتورة </label>
                            <select name="bill_type" id="bill_type" class="form-control">
                                <option value="">اختر النوع </option>
                                <option @if (old('bill_type') == 1) selected='selected' @endif value="1"> كاش
                                </option>
                                <option @if (old('bill_type') == 2) selected='selected' @endif value="2"> آجل
                                </option>
                            </select>
                        </div>

                        @error('bill_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label> ملاحظات</label>
                            <input name="comments" id="comments" class="form-control" value="{{ old('comments') }}"
                                placeholder="ملاحظات....">
                        </div>
                    </div>

                    @error('comments')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                                إضافة </button>
                            <a href="{{ route('admin.purchase_bills.index') }}" class="btn btn-sm btn-danger">
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
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#uploadedimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
