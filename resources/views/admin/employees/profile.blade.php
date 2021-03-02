@extends('admin.layouts.main')
@section('title','Quản lý Anhotel '.Auth::user()->name)
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Thông báo</h5>
                    {{ Session::get('error') }}
                </div>
            @elseif( Session::has('success') )
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Thông báo </h5>
                    {{ Session::get('success') }}
                </div>
            @endif


            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

            <p class="text-muted text-center">{{( Auth::user()->role == 'EMPLOYEE') ? 'Nhân viên' : 'Quản Lý'}}</p>

            <ul class="list-group ">
                <li class="list-group-item ">
                    <b>SĐT</b> <b class="float-right">{{ '0'.Auth::user()->phone }}</b>
                </li>
                <li class="list-group-item ">
                    <b>email</b> <b class="float-right">{{ Auth::user()->email }}</b>
                </li>
                <li class="list-group-item ">
                    <b>username</b> <b class="float-right">{{ Auth::user()->username }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Giới tính</b> <b class="float-right">{{ Auth::user()->sex }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Ngày sinh</b> <b class="float-right">{{ Auth::user()->birthday }}</b>
                </li>
                <li class="list-group-item ">
                    <b>Trạng thái</b> <b class="float-right">{{ (Auth::user()->state == true) ? 'Hoạt động' : 'Không hoạt động'}}</b>

                </li>
            </ul>
{{--            <form action="{{route('admin.employee.change',['employee' => $data->id])}}" method="post">--}}
{{--                @csrf--}}
{{--                <input type="hidden" name="state" id="state" value="{{$data->state}}">--}}
                <a href="{{route('admin.employee.edit', ['id'=> Auth::user()->id])}}" class="btn btn-primary" >Cập nhật thông tin</a>
{{--            </form>--}}

        </div>
        <!-- /.card-body -->
    </div>
@endsection


