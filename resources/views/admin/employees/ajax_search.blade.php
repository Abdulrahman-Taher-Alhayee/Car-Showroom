
                        @if (@isset($data) && !@empty($data))
                        @php
                            $i=1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th>مسلسل</th>
                                <th> الإسم</th>
                                <th> رقم الهاتف</th>
                                <th> الإيميل</th>
                                <th> العنوان </th>
                                <th> المنصب </th>
                                <th> الراتب </th>
                                <th> تاريخ التوظيف </th>
                                <th> تاريخ الإضافة </th>
                                <th> تاريخ التحديث </th>
                                <th> تحكم </th>

                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->phone }}</td>
                                        <td>{{ $info->email }}</td>
                                        <td>{{ $info->address }}</td>
                                        <td>{{ $info->position  }}</td>
                                        <td>{{ $info->salary  }}</td>
                                        <td>{{ $info->hire_date  }}</td>
                                        <td>
                                            @php
                                                $dt = new DateTime($info->created_at);
                                                $date = $dt->format('Y-m-d');
                                                $time = $dt->format('h:i');
                                                $newDateTime = date('A', strtotime($time));
                                                $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساء';
                                            @endphp
                                            {{ $date }}<br>
                                            {{ $time }}
                                            {{ $newDateTimeType }}<br>
                                            بواسطة
                                            {{ $info->added_by_admin }}
                                        </td>
                                        <td>
                                            @if ($info->updated_by > 0 and $info->updated_by != null)
                                                @php
                                                    $dt = new DateTime($info->updated_at);
                                                    $date = $dt->format('Y-m-d');
                                                    $time = $dt->format('h:i');
                                                    $newDateTime = date('A', strtotime($time));
                                                    $newDateTimeType = $newDateTime == 'AM' ? 'صباحا' : 'مساء';
                                                @endphp
                                                {{ $date }}<br>
                                                {{ $time }}
                                                {{ $newDateTimeType }}<br>
                                                بواسطة
                                                {{ $info->updated_by_admin }}
                                            @else
                                                لا يوجد تحديث
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.employees.edit', $info->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> تعديل</a>
                                            <a href="{{ $info->id }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> عرض</a>
                                            <a href="{{ route('admin.employees.delete', $info->id) }}"
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
