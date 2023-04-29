
                        @if (@isset($data) && !@empty($data))
                        @php
                            $i=1;
                        @endphp
                       <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">
                            <th>الكود</th>
                            {{-- <th> السيارة</th> --}}
                            <th> المورد</th>
                            <th>نوع الفاتورة</th>
                            {{-- <th>المبلغ الإجمالي</th> --}}
                            {{-- <th> الخصم</th>
                                <th> الضريبة</th>
                                <th> المبلغ الصافي</th> --}}
                                <th> تاريخ الفاتورة</th>
                            <th>  ملاحظات</th>
                            <td>تحكم</td>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $i }}</td>
                                    {{-- <td>
                                        @foreach ($dataCars as $infoCars)
                                            @if ($info->car_id == $infoCars->id)
                                                {{ $infoCars->model }}
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        @foreach ($dataSuppliers as $infoSuppliers)
                                            @if ($info->supplier_id == $infoSuppliers->id)
                                                {{ $infoSuppliers->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>@if($info->bill_type==1) كاش @else  آجل @endif</td>
                                    <td>{{ $info->date }}</td>
                                    <td>{{ $info->comments }}</td>

                                    <td>
                                        <a href="{{ route('admin.purchase_bills.edit', $info->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> تعديل</a>
                                        <a href="{{ route('admin.purchase_bills.show', $info->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> عرض</a>
                                        <a href="{{ route('admin.purchase_bills.delete', $info->id) }}"
                                            class="btn btn-sm are_you_shue btn-danger">
                                            <i class="fas fa-trash"></i> حذف</a>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                        @else
                        <div class="alert alert-danger">
                            عفوا لا يوجد بيانات لعرضها!!
                        </div>
                    @endif
