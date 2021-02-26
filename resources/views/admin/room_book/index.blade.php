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
            <h3 class="card-title">Danh sách đặt phòng</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Phòng</th>
                    <th>Trạng thái</th>
                    <th>Tên khách hàng</th>
                    <th>Người duyệt</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $data as $key => $item)
                    <tr id="{{'tr-'.$item->id}}">

                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->room->name }}</td>
                        <td class="project-state">
                            @if( $item->state == 1)
                                <span class="badge badge-success">Duyệt </span>
                            @else
                                <span class="badge badge-danger">Chờ </span>
                            @endif
                        </td>

                        <td>{{ $item->khachhang->name }}</td>
                        <td>{{ $item->employee_id ? $item->employee->name : ''  }}</td>
                        <td>
                            @if(!$item->employee_id)
                            <a href="javascript:void(0)" onclick="confirm({{$item->id}})" class="btn btn-primary"> Duyệt</a>
                            @endif
                                @if( $item->state == 1)
                            <a href="{{ route('admin.room_book.pay.form',[ 'id' => $item->id]) }}"   class="btn btn-primary"> Thanh toán</a>
                                @endif
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

