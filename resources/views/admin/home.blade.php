@extends('common.main')

@section('content')

<div class="row">
    <div class="col-xl-6 mx-auto">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-600">Trang chủ của người quản lý</h5>
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
                    <h6>Đây là trang chủ của người <code> quản lý dự án </code> (thông thường là Chủ nhiệm 
                        Bộ môn, ...). Người quản lý được quyền truy xuất tất cả các thông tin của mọi thành viên 
                        (giáo viên, sinh viên). Người quản lý tạo ra các môn học với đề cương theo từng tuần 
                        hoặc từng tiết học.

                    </h6>
                </p>

                <div class="mb-3">
                    <h6 class="font-weight-semibold">1. Danh sách các thành viên.</h6>
                    <h6>Liệt kê tất cả các thành viên tham gia dự án: quản lý, giáo viên và sinh viên.</h6>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-semibold">2. Tạo thành viên mới</h6>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-semibold">3. Danh sách các môn học</h6>
                </div>

                <div class="mb-3">
                    <h6 class="font-weight-semibold">4. Tạo môn học mới</h6>
                </div>

            </div>
        </div>
    </div>    
</div>


@endsection
