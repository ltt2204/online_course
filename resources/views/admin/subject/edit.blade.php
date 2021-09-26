@extends('common.main')

@section('content')

<div class="row pt-2">
    <div class="col-xl-6 mx-auto">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-700">Sửa thông tin môn học</h5>
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
                <form action="{{ route('subject.update', ['id' => $subject->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Mã MH:<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="code" class="form-control" value="{{ old('code', $subject->code) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tên MH:<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name', $subject->name) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Mô tả MH:</label>
                        <div class="col-lg-10">
                            <input type="text" name="description" class="form-control" value="{{ old('description', $subject->description) }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tập tin (Đề cương):</label>
                        <div class="col-lg-10">
                            <input type="file" name="outline" class="form-control-uniform-custom" data-fouc 
                            value="{{ old('outline', $subject->outline) }}">
                            <span class="form-text text-muted">Tập tin dạng: pdf, docx, ...</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Ảnh đại diện:</label>
                        <div class="col-lg-10">
                            <input type="file" name="image" class="form-control-uniform-custom" data-fouc 
                            value="{{ old('image', $subject->image) }}">
                            <span class="form-text text-muted">Tập tin dạng: png, jpg, jpeg ...</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 form-check-label">Tình trạng: </label>
                        <div class="col-lg-10">
                            <input type="checkbox" name="status" class="form-check-input form-check-input-switch" 
                                data-on-text="Hoạt động" data-off-text="Tạm dừng" {{ (old('status', $subject->status) == 'on') ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn bg-teal-400">Lưu<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>