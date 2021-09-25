@extends('common.main')


@section('content')

<div class="row">
    <div class="col-xl-6">

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

@section('menubar')

{{-- Thành viên --}}
<ul class="navbar-nav">
    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
        Thành viên
    </a>
    <li class="nav-item dropdown dropdown-user">
        <div class="dropdown-menu dropdown-menu-right">
            <a href="" class="dropdown-item"><i class="icon-user-plus"></i>Danh sách thành viên</a>
            <a href="" class="dropdown-item"><i class="icon-switch2"></i>Danh sách giáo viên</a>
            <div class="dropdown-divider"></div>
            <a href="" class="dropdown-item"><i class="icon-switch2"></i>Tạo thành viên mới</a>
        </div>
    </li>
</ul>

{{-- Môn học --}}
<ul class="navbar-nav">
    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
        Môn học
    </a>
    <li class="nav-item dropdown dropdown-user">
        <div class="dropdown-menu dropdown-menu-right">
            <a href="" class="dropdown-item"><i class="icon-user-plus"></i>Danh sách môn học</a>
            <a href="" class="dropdown-item"><i class="icon-switch2"></i>Tạo môn học mới</a>
            <div class="dropdown-divider"></div>
            <a href="" class="dropdown-item"><i class="icon-switch2"></i>Danh sách bài học</a>
            <a href="" class="dropdown-item"><i class="icon-switch2"></i>Tạo bài học mới</a>
        </div>
    </li>
</ul>

@endsection