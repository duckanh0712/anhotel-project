@extends('admin.layouts.main')
@section('title','Trả phòng');
@section('content')
    <div class="card card-info col-6" >
        <div class="card-header">
            <h3 class="card-title">Thanh toán </h3>
        </div>
        <div class="">
            <form action="{{ route('admin.room_book.pay',[ 'id' => $data->id ]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Khách hàng</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->khachhang->name }}" disabled>
{{--                        <input type="hidden" id="name"  name="name"  value="{{ $data->user_id }}">--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phòng</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->room->name }}" disabled>
{{--                        <input type="hidden" id="room_id"  name="room_id"  value="{{ $data->room_id }}">--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Loại phòng</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->room->category }}" disabled>
{{--                        <input type="hidden" id="room_id"  name="room_id"  value="{{ $data->room_id }}">--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày bắt đầu</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->start_date }}" disabled>
{{--                        <input type="hidden" id="start_date"  name="start_date"  value="{{ $data->start_date }}">--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày trả</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->timeNow }}" disabled>
                        <input type="hidden" id="end_date"  name="end_date"  value="{{ $data->timeNow }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tổng chi phí</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{number_format($data->totalPrice,0,",",".").' VNĐ'}}" disabled>
                        <input type="hidden" id="totalPrice"  name="totalPrice"  value="{{ $data->totalPrice }}">                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhân viên duyệt</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->employee->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thu ngân</label>
                        <input type="text" class="form-control" id="name"  name="name"  value="{{ $data->employee->name }}"  disabled>
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="">
                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.card-body -->
    </div>
@endsection

