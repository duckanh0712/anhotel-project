@extends('admin.layouts.main');
@section('title', 'Quản lý Phòng')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tạo phòng</h3>
    </div>
    <div class="box-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Lỗi!</h4>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
    @endif
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.room.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Mã phòng</label>
                <input type="text" class="form-control" id="name"  required name="name" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" class="form-control" id="description" required name="description">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giá</label>
                <input type="number" class="form-control" id="price" required name="price">
            </div>
            <div class="form-group">
                <label for="inputName">Trạng thái</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" value="1" required name="state" checked="">
                    <label for="customRadio1" class="custom-control-label">Rảnh</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2"  value="2" required name="state" >
                    <label for="customRadio2" class="custom-control-label">Bận</label>
                </div>
            </div>

            <div class="form-group">
                <label>Loại Phòng</label>
                <select class="form-control" id="category" required name="category">
                    <option value="don">Đơn</option>
                    <option value="doi">Đôi</option>
                    <option value="Thương gia">Thương gia</option>
                </select>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
    </form>
</div>
</div>
@endsection
