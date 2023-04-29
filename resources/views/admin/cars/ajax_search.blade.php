
                        @if (@isset($data) && !@empty($data))
                        @php
                            $i=1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th>مسلسل</th>
                                <th>الشركة المصنعة</th>
                                <th>موديل السيارة</th>
                                <th> سنة الصنع</th>
                                <th> اللون </th>
                                <th>السعر</th>
                                <th>الخصم</th>
                                <td>تحكم</td>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            @foreach ($data1 as $info1)
                                                @if ($info->company_id == $info1->id)
                                                    {{ $info1->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $info->model }}</td>
                                        <td>{{ $info->year }}</td>
                                        <td>{{ $info->colors }}</td>
                                        <td>{{ $info->price }}</td>
                                        <td>{{ $info->discount }}</td>
                                        <td>
                                            <a href="{{ route('admin.cars.edit', $info->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> تعديل</a>
                                            <a href="{{ $info->id }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> عرض</a>
                                            <a href="{{ route('admin.cars.delete', $info->id) }}"
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
