@extends('admin.layouts.main')
@section('title','Sửa khách hàng');
@section('content')
    <div class="card card-info col-6" >
        <div class="card-header">
            <h3 class="card-title">Sửa khách hàng</h3>
        </div>
        <div class="">
            <form action="{{route('admin.user.update',[ 'employee' => $data->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Họ và Tên" value="{{$data->name}}" disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{$data->username}}" disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$data->email}}" disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="SĐT" value="{{$data->phone}}" disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="birthday" id="birthday" value="{{$data->birthday}}"  disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-calendar-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu" value="{{$data->password}}" disabled>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" value="Nam" name="sex" disabled>
                            <label for="customRadio1" class="custom-control-label">Nam</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" value="Nữ" name="sex" checked="" disabled>
                            <label for="customRadio2" class="custom-control-label">Nữ</label>
                        </div>

                    </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"  placeholder="" value="{{ $data->state == 1 ? 'Hoạt động' : "Không hoạt động" }}" disabled>
                            <div class="input-group-append">
                                <div class="input-group-text">

                                </div>
                            </div>
                        </div>

                    <!-- /.col -->
                    <div class="col-4">
                        @if($data->state == 1)
                            <input type="hidden" name="state" id="state" value="0">
                        <button type="submit" class="btn btn-primary btn-block">Khóa tài khoản</button>
                        @else
                            <input type="hidden" name="state" id="state" value="1">
                        <button type="submit" class="btn btn-primary btn-block">Mở khóa tài khoản</button>
                            @endif
                    </div>
                    <!-- /.col -->
                    </div>
                </div>
            </form>
        </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection

