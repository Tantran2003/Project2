@extends('interface.layout_interface')
@section('content')
<div class="container-xxl my-5 py-5" style=" max-width: 1420px;">
        <h1>Lịch sử đặt hàng</h1>
<h3> Hóa đơn</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Hóa đơn số</th>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Số tiền</th>
                           
                            <th scope="col">Phương thức thanh toán</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->partner_code }}</td>
                                <td>{{ date('d-m-Y',
                        strtotime($order->created_at)) }}</td>
                                <td>{{ number_format($order->amount, 0, ',', '.') }} VNĐ</td>
                              
                                <td>{{ $order->order_info }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h3>Chi tiết hóa đơn</h3>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Điểm đi</th>
                            <th scope="col">Điểm đến</th>
                            <th style="width: 100px;" scope="col">Ngày đi</th>
                            <th style="width: 100px;" scope="col">Ngày về</th>
                            <th scope="col">Phương tiện đi</th>
                            <th scope="col">Thời gian đi</th>
                            <th scope="col">Mã tour</th>
                            <th scope="col">Người lớn</th>
                            <th scope="col">Trẻ em</th>
                            <th scope="col">Trẻ nhỏ</th>
                          
                            <th scope="col">Giá người lớn</th>
                            <th scope="col">Giá trẻ em</th>
                            <th scope="col">Giá trẻ nhỏ</th>
                            <th scope="col">Giá chuyến tour</th>
                           
                    
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->fullname }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{$order->address}}</td>
                                <td>{{ $order->departurelocation }}</td>
                                <td>{{ $order->arrivallocation }}</td>
                                <td>{{ date('d-m-Y H:i',
                        strtotime($order->date_start)) }}</td>
                                <td>{{ date('d-m-Y ',
                        strtotime($order->date_end)) }}</td>
                                <td>{{ $order->vehicle }}</td>
                                <td>{{$order->keyword}}</td>
                                <td>{{ $order->tour_code }}</td>
                                <td>{{ $order->person1 }}</td>
                                <td>{{ $order->person2 }}</td>
                                <td>{{ $order->person3 }}</td>
                                <td>{{ $order->price1 }}</td>
                                <td>{{ $order->price2 }} </td>
                                <td>{{ $order->price3 }}</td>
                                <td>{{ $order->price0}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection