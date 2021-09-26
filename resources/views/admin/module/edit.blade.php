@extends('common.main')

@section('content')

<div class="row">
    {{-- <div class="col-xl-8">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-700">Danh sách các học phần</h5>
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
                    <p class="mb-0">
                        Liệt kê danh sách tất cả các <code>Học phần</code> của chương trình.
                    </p>
                </div>
            </div>

            <table class="table datatable-button-html5-basic">
                <thead>
                    <tr style="text-align: center">
                        <th>Môn học</th>
                        <th>Học phần</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th width="120px">Thay đổi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($modules as $module)
                    <tr>
                        <td>{{ $module->subject->name }}</td>
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->description }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('module.change', ['id' => $module->id]) }}">
                            @if ($module->status == 'on')
                                <span class="badge badge-success">Hoạt_động</span>
                            @else
                                <span class="badge badge-secondary">Tạm_dừng</span>
                            @endif  
                            </a>
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('module.edit', ['id' => $module->id]) }}" class="badge badge-info">Sửa</a>
                            <a href="{{ route('module.destroy', ['id' => $module->id]) }}" class="badge badge-danger accept-delete">Xoá</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-700">Sửa học phần</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            @include('common.error')

            <div class="card-body">
                <form action="{{ route('module.update', ['id' => $module->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Môn học: <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select name="subject_id" class="form-control">
                                <option value="">Hãy chọn môn học</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ (old('subject_id', $module->subject_id) == $subject->id) ? 'selected' : '' }}>{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tên học phần:<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" value="{{ $module->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Mô tả:</label>
                        <div class="col-lg-10">
                            <input type="text" name="description" class="form-control" value="{{  $module->description }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 form-check-label">Tình trạng: </label>
                        <div class="col-lg-10">
                            <input type="checkbox" name="status" class="form-check-input form-check-input-switch" 
                                data-on-text="Hoạt động" data-off-text="Tạm dừng" {{ (old('status', $module->status) == 'on') ? 'checked' : '' }}>
                        </div>
                    </div>

                    @include('common.button',['exit' => 'module.index'])
                    
                    {{-- <div class="text-right">
                        <button type="submit" class="btn bg-teal-400">Lưu<i class="icon-paperplane ml-2"></i></button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

