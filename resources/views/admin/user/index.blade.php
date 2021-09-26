@extends('common.main')

@section('content')

<div class="row">

    {{-- Index --}}
    <div class="col-xl-8">
        <div class="card">

            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-600">Danh sách các thành viên</h5>
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
                    Liệt kê danh sách tất cả các thành viên của chương trình: <code>Cán bộ Quản lý</code>, <code>Giáo viên</code> và <code>Sinh viên</code>.Thông tin của mỗi thành viên bao gồm: họ và tên, địa chỉ email, mã số, số điện thoại, địa chỉ, v.v... 
                </p>
            </div>

            <table class="table datatable-button-html5-basic">
                <thead>
                    <tr style="text-align: center">
                        <th>Họ lót</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Mã số</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tình trạng</th>
                        <th width="150px">Thay đổi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @switch($user->role)
                                @case(LOGIN_ADMIN)
                                Quản lý
                                @break
                                @case(LOGIN_TEACHER)
                                Giáo viên
                                @break
                                @case(LOGIN_STUDENT)
                                Sinh viên
                                @break
                                @default
                                @break
                            @endswitch
                        </td>
                        <td>{{ $user->id_code }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->address }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('user.change', ['id' => $user->id]) }}">
                            @if ($user->status == 'on')
                                <span class="btn btn-success">Hoạt_Động</span>
                            @else
                                <span class="btn btn-secondary">Tạm_Dừng</span>
                            @endif
                            </a>  
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn bg-danger accept-delete">Xoá<i class="icon-blocked ml-2"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    
        </div>
    </div>

    {{-- Create --}}
    <div class="col-md-4 mx-auto">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title text-blue-600">Tạo thành viên mới</h5>
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
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Nhập địa chỉ email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Mật khẩu:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu, tối thiểu 6 ký tự">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Họ lót:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Tên:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Vai trò:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <select name="role" class="form-control">
                                <option value="">Xin chọn vai trò</option>
                                <option value="{{LOGIN_ADMIN}} " {{ (old('role') == LOGIN_ADMIN) ? 'selected' : '' }}>Quản lý</option>
                                <option value="{{LOGIN_TEACHER}}" {{ (old('role') == LOGIN_TEACHER) ? 'selected' : '' }}>Giáo viên</option>
                                <option value="{{LOGIN_STUDENT}}" {{ (old('role') == LOGIN_STUDENT) ? 'selected' : '' }}>Sinh viên</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-lg-3 form-check-label">Tình trạng: </label>
                        <div class="col-lg-9">
                            <input type="checkbox" name="status" class="form-check-input form-check-input-switch" 
                                data-on-text="Hoạt động" data-off-text="Tạm dừng" {{ (old('status','on') == 'on') ? 'checked' : '' }}>
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

@endsection

