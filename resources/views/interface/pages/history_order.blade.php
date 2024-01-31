    @extends('interface.layout_interface')
    @section('content')
    <div class="container-xxl my-5 py-5" style="max-width: 1420px;">
        <h1>Booking History</h1>

        <h3>Receipts</h3>
        <div class="row">
            <div class="col-md-12">
                <!-- Add this form to your view -->
                <form action="{{ route('gd.searchorder') }}" method="post">
                @csrf
                <label for="order_id_momo">Enter Order ID from Receipt:</label>
                <input type="text" id="order_id_momo" name="order_id_momo" required>
                <button type="submit">Search</button>
            </form>

            @if(session('order_not_found'))
                <div class="alert alert-danger" role="alert">
                    No order is found.
                </div>
            @endif

                <table class="table table-bordered table-striped ">
                    <thead class="thead-dark">
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
                                    <td>{{ $order->order_id_momo }}</td>
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
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                                <th scope="col">Tourist name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Departure location</th>
                                <th scope="col">Arrival Location</th>
                                <th style="width: 100px;" scope="col">Departure date</th>
                                <th style="width: 100px;" scope="col">Leave date</th>
                                <th scope="col">Transportation</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Tour code</th>
                                <th scope="col">Adults</th>
                                <th scope="col">Children</th>
                                <th scope="col">Babies</th>
                                <th scope="col">Price per adult(VND)</th>
                                <th scope="col">Price per child(VND)</th>
                                <th scope="col">Price per baby(VND)</th>
                                <th scope="col">Tour(VND)</th>
                            
                        
                                
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