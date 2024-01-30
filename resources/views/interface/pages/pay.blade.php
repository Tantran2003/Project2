@extends('interface/layout_interface')
@section('content')

@if(session()->has('booking'))
@php
$booking = session('booking');
@endphp

<div class="container-xxl" style="max-width: 1200px; margin-bottom: 200px; margin-top: 100px;">

    <div class="row my-4 text-center">
        <h3 class="text-muted">TOTAL TRANSACTION AMOUNT:</h3>
        <p class="total-price">{{ number_format($booking['total_price'], 0, ',', '.') }} VNĐ</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th><b>Tourist name</b></th>
                        <th><b>Email</b></th>
                        <th><b>Phone</b></th>
                        <th><b>Address</b></th>
                        <th><b>Departure Location</b></th>
                        <th><b>Arrival Location</b></th>
                        <th><b>Departure Date</b></th>
                        <th><b>Leave Date</b></th>
                        <th><b>Transportation</b></th>
                        <th><b>Total</b></th>
                        <th>Payment option</th>
               
                    </tr>
                    <tr>
                        <td>{{$booking['fullname']}}</td>
                        <td>{{$booking['email']}}</td>
                        <td>{{$booking['phone']}}</td>
                        <td>{{$booking['address']}}</td>
                        <td>{{$booking['departurelocation']}}</td>
                        <td>{{$booking['arrivallocation']}}</td>
                        <td>{{$booking['date_start']}}</td>
                        <td>{{$booking['date_end']}}</td>
                        <td>{{$booking['vehicle']}}</td>
                        <td>{{ number_format($booking['total_price'], 0, ',', '.') }}</td>
                        <td>

                            <form action="{{ route('gd.momo_payment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="total_momo" value="{{ $booking['total_price'] }}">
                                <button type="submit" class="btn btn-primary" name="payURl">Thanh toán MoMo</button>
                            </form>
                        </td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endif
<style>
    .total-price {
        font-size: 24px;
        font-weight: bold;
        color: #007bff;
        /* Set the color you prefer */
    }
</style>
@endsection