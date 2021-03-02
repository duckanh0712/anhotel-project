@extends('admin.layouts.main');
@section('title', 'Quản lý Phòng')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa thông tin phòng</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.room.update', ['id' => $room->id]) }}" method="post">

        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã phòng</label>
                <input type="text" class="form-control" id="name"  name="name" value="{{ $room->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá phòng</label>
                <input type="number" class="form-control" id="price"  name="price" value="{{ $room->price }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <textarea type="text" class="form-control" id="description" name="description" >{{ $room->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="inputName">Trạng thái </label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" value="1" name="state" checked="">
                    <label for="customRadio1" class="custom-control-label">Rảnh </label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2"  value="2" name="state">
                    <label for="customRadio2" class="custom-control-label">Bận </label>
                </div>
            </div>
            <div class="form-group">
                <label>Loại Phòng</label>
                <select class="form-control" id="category" name="category">
                    < <option value="Đơn">Đơn</option>
                    <option value="Đôi">Đôi</option>
                    <option value="Thương gia">Thương gia</option>

                </select>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu </button>
        </div>
    </form>
</div>
@endsection
