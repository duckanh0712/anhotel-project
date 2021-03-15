@extends('admin.layouts.main')
@section('title','Thêm mới khách hàng');
@section('content')
    <div class="card card-info col-6" >
        <div class="card-header">
            <h3 class="card-title">Thêm mới nhân viên </h3>
        </div>
        <div class="">
            <form action="{{route('admin.employee.store')}}" method="post">
                @csrf
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Họ và Tên">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="SĐT">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
{{--                <div class="input-group mb-3">--}}
{{--                    <input type="date" class="form-control" name="birthday" id="birthday" >--}}
{{--                    <div class="input-group-append">--}}
{{--                        <div class="input-group-text">--}}
{{--                            <span class="fas fa-calendar-alt"></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
{{--                <input type="hidden" name="role" id="role" value="EMPLOYEE">--}}
                <div class="row">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary btn-block">Tạo </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>

        </div>
        <!-- /.card-body -->
    </div>
@endsection

