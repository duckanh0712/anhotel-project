@extends('admin.layouts.main')
@section('title','Quản lý phòng')
@section('content')
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
