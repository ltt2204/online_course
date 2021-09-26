@extends('common.main')

@section('content')

<div class="row pt-2">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-700">Tạo học phần mới</h5>
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
                <form action="{{ route('module.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Môn học: <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select name="subject_id" class="form-control">
                                <option value="">Hãy chọn môn học</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ old('subject_id', $subject->id) }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tên học phần:<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Mô tả:</label>
                        <div class="col-lg-10">
                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 form-check-label">Tình trạng: </label>
                        <div class="col-lg-10">
                            <input type="checkbox" name="status" class="form-check-input form-check-input-switch" 
                                data-on-text="Hoạt động" data-off-text="Tạm dừng" {{ (old('status','on') == 'on') ? 'checked' : '' }}>
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