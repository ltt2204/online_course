<div class="navbar navbar-dark bg-teal-700 navbar-component navbar-expand-xl rounded fixed-top">    
    <div class="navbar-brand">
        <div class="d-inline-block">
            <img src="{{ asset('images/logo_oc.png') }}" alt="">
        </div>
    </div>
    
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    @php
        $user = Auth::user();
        if ($user != null) {
            $name = $user->last_name . ' ' . $user->first_name;
            $image = $user->image;
        } else {
            redirect()->roure('logout')->with('error', 'Bạn không còn quyền truy cập vào tài khoản này. Hãy đăng nhập lại.');
        }
    @endphp


    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    {{-- <i class="icon-paragraph-justify3"></i> --}}
                </a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <a  href="{{ route('admin-home') }}"
                class="navbar-nav-link" >
                {{-- class="navbar-nav-link d-flex"> --}}
                <i class="icon-home4"></i>
                <span style="text-color: white">&nbsp;&nbsp;Trang chủ</span> 
            </a>
        </ul>
        
        {{-- Thành viên --}}
        <ul class="navbar-nav">
            <a  href="{{ route('user.index') }}"
                class="navbar-nav-link">
                <i class="icon-people"></i>
                <span style="text-color: white">&nbsp;&nbsp;Thành viên</span> 
            </a>
        </ul>
        
        {{-- Môn học --}}
        <ul class="navbar-nav">
            <a  href=""
                class="navbar-nav-link">
                <i class="icon-book"></i>
                <span style="text-color: white">&nbsp;&nbsp;Môn học</span> 
            </a>
        </ul>
        
        {{-- Học phần --}}
        <ul class="navbar-nav">
            <a  href=""
                class="navbar-nav-link">
                <i class="icon-stack"></i>
                <span style="text-color: white">&nbsp;&nbsp;Học phần</span> 
            </a>
        </ul>

        <span class="badge bg-teal-700 ml-md-3 mr-md-auto text-shadow-light" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    @if ($image != null)
                    <img src="{{ asset($image) }}" class="rounded-circle mr-2" height="34" alt="">
                    @endif
                    <span>{{ $name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('user.info') }}" class="dropdown-item"><i class="icon-user-plus"></i> Thông tin cá nhân</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
