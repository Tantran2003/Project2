@extends ('interface/layout_interface')
@section('content')
@if(session()->has('booking'))
@php
$booking = session('booking');
@endphp

<div class="container-xxl my-5 py-2 " style=" max-width: 1320px;">

    <div class="row my-4">
        <h3 class="text-muted">Số tiền cần thanh toán</h3>
        <p>{{ number_format($booking['total_price'], 0, ',', '.') }} VNĐ
</p>

    </div>
<form action="{{route('gd.momo_payment')}}" method="POST">
@csrf
<input type="hidden" name="total_momo" value="{{ $booking['total_price'] }}">
<button type="submit" name="payURl">Thanh toán MoMo</button>
</form>
</div>
@endif



@endsection