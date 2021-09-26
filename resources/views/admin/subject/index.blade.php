@extends('common.main')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-700">Danh sách các môn học</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    <p class="mb-3 col-lg-11">
                        Liệt kê danh sách tất cả các <code>Môn học</code> của chương trình.
                    </p>
                    <a href="{{ route('subject.create') }}" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-book mb-1"></i></b>Tạo mới</a>
                </div>
            </div>

            <table class="table datatable-button-html5-basic">
                <thead>
                    <tr style="text-align: center">
                        <th>Mã MH</th>
                        <th>Tên MH</th>
                        <th>Mô tả MH</th>
                        <th>File đề cương</th>
                        <th>Ảnh đại diện</th>
                        <th>Tình trạng</th>
                        <th width="150px">Thay đổi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->description }}</td>
                        <td>{{ $subject->outline }}</td>
                        <td>{{ $subject->image }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('subject.change', ['id' => $subject->id]) }}">
                            @if ($subject->status == 'on')
                                <span class="btn btn-success">Hoạt_động</span>
                            @else
                                <span class="btn btn-secondary">Tạm_dừng</span>
                            @endif  
                            </a>
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('subject.edit', ['id' => $subject->id]) }}" class="btn bg-info">Sửa</a>
                            <a href="{{ route('subject.destroy', ['id' => $subject->id]) }}" class="btn bg-danger accept-delete">Xoá</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

