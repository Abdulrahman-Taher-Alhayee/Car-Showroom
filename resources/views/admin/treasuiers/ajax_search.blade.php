
                        @if (@isset($data) && !@empty($data))
                        @php
                            $i=1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                           <thead class="custom_thead">
                            <th>مسلسل</th>
                            <th>إسم الخزنة</th>
                            <th>نوع الخزنة</th>
                            <th>اخر ايصال صرف</th>
                            <th>اخر ايصال تحصيل</th>
                            <th>حالة التفعيل</th>
                            <th></th>

                           </thead>
                           <tbody>
                            @foreach ($data as $info)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td> @if($info->is_master==1)رئيسية @else فرعية @endif</td>
                                    <td>{{ $info->last_isal_exchange }}</td>
                                    <td>{{ $info->last_isal_collect }}</td>
                                    <td>@if($info->active==1)مفعل @else معطل @endif</td>
                                    <td>
                                        <a  href="{{ route('admin.treasuiers.edit',$info->id) }}" class="btn btn-sm btn-primary"> تعديل</a>
                                        <button data-id="{{ $info->id }}" class="btn btn-sm btn-info">المزيد</button>
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
