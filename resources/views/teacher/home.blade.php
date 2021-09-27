@extends('common.main')

@section('content')

<div class="row">
    <div class="col-xl-6 mx-auto">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-600">Trang chủ của giáo viên</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-6">
                    <h6>Đây là trang chủ của <code> giáo viên </code>. Người quản lý được quyền tạo các lớp học (course) và bài giảng (lesson) tương ứng cho môn học (subject) và học phần (module).
                    </h6>
                </p>

                <div class="mb-3">
                    <h6 class="font-weight-semibold">1. Danh sách các lớp học.</h6>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-semibold">2. Danh sách các bài giảng</h6>
                </div>

            </div>
        </div>
    </div>    
</div>


@endsection
