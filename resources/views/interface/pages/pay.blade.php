@extends ('interface/layout_interface')
@section('content')
@if(session()->has('booking'))
@php
$booking = session('booking');
@endphp

<div class="container-xxl " style=" max-width: 1320px; margin-bottom:200px; margin-top:100px;">

    <div class="row my-4 text-center">
        <h3 class="text-muted">Số tiền cần thanh toán của bạn là:</h3>
        <p>{{ number_format($booking['total_price'], 0, ',', '.') }} VNĐ
</p>

   
<form action="{{route('gd.momo_payment')}}" method="POST">
@csrf
<input type="hidden" name="total_momo" value="{{ $booking['total_price'] }}">
<button type="submit" class="btn btn-primary" name="payURl">Thanh toán MoMo</button>
</div>
</form>
</div>
@endif



@endsection