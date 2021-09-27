@extends('common.main')
@php
    $user = Auth::user();
@endphp

@section('content')

<div class="row">
    
    <div class="col-md-6 mx-auto">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h4 class="card-title text-blue-700">Thông tin cá nhân</h4>
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
                <ul class="nav nav-tabs nav-tabs-solid bg-teal-400 border-0 nav-justified">
                    <li class="nav-item"><a href="#colored-justified-tab1" class="nav-link active" data-toggle="tab">Cập nhật thông tin</a></li>
                    <li class="nav-item"><a href="#colored-justified-tab2" class="nav-link" data-toggle="tab">Thay đổi mật khẩu</a></li>
                    <li class="nav-item"><a href="#colored-justified-tab3" class="nav-link" data-toggle="tab">Cập nhật ảnh đại diện</a></li>
                </ul>

                <div class="tab-content">
                    {{-- Thông tin chung --}}
                    <div id="colored-justified-tab1" class="tab-pane fade show active">
                        <div class="card-body">
                            <form action="{{ route('teacher.store-info') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Họ lót:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="last_name" class="form-control" 
                                        value="{{ old('last_name', $user->last_name) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Tên:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="first_name" class="form-control" 
                                        value="{{ old('first_name', $user->first_name) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Mã số:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="id_code" class="form-control" 
                                        value="{{ old('id_code', $user->id_code) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Điện thoại:</label>
                                    <div class="col-lg-10">
                                        <input type="tel" name="phone_number" class="form-control" 
                                        value="{{ old('phone_number', $user->phone_number) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Địa chỉ:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="address" class="form-control" 
                                        value="{{ old('address', $user->address) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Thông tin khác:</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="info" class="form-control" 
                                        value="{{ old('info', $user->info) }}">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn bg-teal-400">Cập nhật <i class="icon-paperplane ml-2"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>
                    {{-- Thay đổi mật khẩu --}}
                    <div id="colored-justified-tab2" class="tab-pane fade">
                        <div class="card-body">
                            <form action="{{ route('teacher.store-password') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
            
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Mật khẩu mới:</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="password" class="form-control" required>
                                        <span class="form-text text-muted">Tối thiểu 6 ký tự, bao gồm chữ cái, số và các ký tự @#$%&^*+</span>
                                    </div>
                                </div>
            
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Nhập lại mật khẩu:</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                </div>
            
                                <div class="text-right">
                                    <button type="submit" class="btn bg-teal-400">Cập nhật <i class="icon-paperplane ml-2"></i></button>
                                </div>
            
                            </form>
                        </div>
                    </div>
                    {{-- Thay đổi ảnh đại diện --}}
                    <div id="colored-justified-tab3" class="tab-pane fade">
                        <div class="card-body">
                            <form action="{{ route('teacher.store-avatar') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
            
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Chọn ảnh đại diện mới:</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="image" class="form-control-uniform-custom">
                                        @if (Auth::user()->image != null)
                                        <div class="form-group row pt-2">
                                            <span class="form-text text-muted">Ảnh cũ:</span>
                                            <img src="{{ asset(Auth::user()->image) }}" width="60px" height="50px" class="pl-2">
                                        </div>
                                        @else
                                            <span class="form-text text-muted">Tập tin ảnh dạng: png, jpg, jpeg. Tối đa 5Mb</span>
                                        @endif
                                    </div>
                                </div>
            
                                <div class="text-right">
                                    <button type="submit" class="btn bg-teal-400">Cập nhật <i class="icon-paperplane ml-2"></i></button>
                                </div>
            
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

