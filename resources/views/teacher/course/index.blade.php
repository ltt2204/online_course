@extends('common.main')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-600">Danh sách các lớp học</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-3">
                    Liệt kê danh sách tất cả các <code>Lớp học</code> của giáo viên.
                </p>
            </div>
            <table class="table datatable-button-html5-columns">
                <thead>
                    <tr>
                        <th>Tên Lớp</th>
                        <th>Môn học</th>
                        <th>ID</th>
                        <th>Key</th>
                        <th>Nội dung</th>
                        <th>Ảnh đại diện</th>
                        <th>Tập tin</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Tình trạng</th>
                        <th width="150px">Thay đổi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->subject->name }}</td>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->key }}</td>
                        <td>{{ $course->content }}</td>
                        <td style="text-align: center">
                            @if ($course->avatar != null)
                            <img src="{{ asset($course->avatar) }}" alt="" width="40px" height="40px">
                            @else
                            <span class="btn btn-light"><i class="icon-blocked"></i></span>
                            @endif
                        </td>
                        <td>{{ $course->file }}</td>
                        <td>{{ Carbon\Carbon::parse($course->start_date)->format('d-m-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($course->end_date)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('course.change', ['id' => $course->id]) }}" >
                            @if ($course->status == 'on')
                                <span class="btn btn-success">&nbsp;&nbsp;Hoạt_động&nbsp;&nbsp;</span>
                            @else
                                <span class="btn btn-secondary">Tạm_dừng</span>
                            @endif  
                            </a>
                        </td>
                        
                        <td style="text-align: center">
                            <a href="{{ route('course.edit', ['id' => $course->id]) }}" class="btn bg-info">Sửa</a>
                            <a href="{{ route('course.destroy', ['id' => $course->id]) }}" class="btn bg-danger accept-delete">Xoá</a>
                        </td>                
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

