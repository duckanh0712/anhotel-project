@extends('admin.layouts.main')
@section('title','Quản lý phòng')
@section('content')
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Thống kê doanh thu</h3>
                        <form class="d-flex col-6 justify-content-between " action="{{route('room-book.statistics.filter')}}"
                              method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Từ</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ (!empty($start_date)) ? $start_date : '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Đến</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ (!empty($end_date)) ? $end_date : '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Lọc</button>
                                </div>
                            </div>

                        </form>
            <form class="col-3" action="{{route('room-book.cat.filter')}}" method="post"><div class="form-group">
                    @csrf
                    <label>Loại Phòng</label>
                    <select class="form-control" id="category" required name="category">
                        <option value="thuong">Thương gia</option>
                    </select>
                </div>
                <button class="btn btn-primary">lọc</button>
            </form>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Phòng</th>
                <th>Giá phòng</th>
                <th>Trạng thái</th>
                <th>thanh toán</th>
                <th>Khách hàng</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Thu ngân</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $data as $key => $item )
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->room->name }}</td>
                    <td>{{ number_format($item->room->price,0,",",".").' đ' }}</td>
                    @if($item->state == 3)
                        <td>Đã xong</td>
                    @elseif ($item->state == 2 )
                        <td> đã duyệt</td>
                    @else <td>Chờ duyệt</td>
                    @endif
                    <td>{{ (!empty($item->total_price)) ? number_format($item->total_price,0,",",".").' đ' : '0 đ'}}</td>
                    <td>{{ $item->khachhang->name }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ (!empty($item->end_date)) ? $item->end_date : '' }}</td>
                    <td>{{ (!empty($item->employee->name)) ? $item->employee->name : '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-body">
            <hr>
            <strong>Tổng thu:</strong>

            <p class="text-muted">
                {{ number_format($total_price,0,",",".").' đ'  }}
            </p>

            <hr>

        </div>
    </div>
@endsection
