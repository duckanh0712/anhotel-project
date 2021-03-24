@extends('admin.layouts.main')
@section('title','Quản lý phòng')
@section('content')
    <div class="card">

        <div class="card-header">
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
            <h3 class="card-title">Danh sách phòng</h3>

            <div class="card-tools">
                <a href="{{route('admin.room.create')}}" class="btn btn-primary fas">Thêm mới</a>
            </div>
        </div>
        <form class="col-6" action="{{route('room.filter')}}"><div class="form-group">
                <label>Loại Phòng</label>
                <select class="form-control" id="category" required name="category">
                    <option value="Don">Đơn</option>
                    <option value="Doi">Đôi</option>
                    <option value="thuong">Thương gia</option>
                </select>
            </div>
            <button class="btn btn-primary">lọc</button>
        </form>

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Phòng</th>
                    <th>Trạng thái</th>
                    <th>Loại phòng</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $data as $key => $item)
                    <tr id="{{'tr-'.$item->id}}">

                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="project-state">
                            @if( $item->state == 1)
                            <span class="badge badge-success">Rảnh </span>
                            @else
                                <span class="badge badge-danger">Bận</span>
                            @endif
                        </td>

                        <td>{{ $item->category}}</td>
                        <td>{{ $item->description  }}</td>
                        <td>{{number_format($item->price,0,",",".")}}</td>
                        <td>
                            <a href="{{ route('admin.room.edit', ['id'=> $item->id]) }}" class="btn btn-primary fas fa-edit"> Sửa</a>
{{--                            <a href="javascript:void(0)" onclick="destroy( {{$item->id}},'room')" class="btn btn-danger "> Xóa</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
