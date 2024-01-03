@extends('interface/layout_interface')
@section('content')


<!-- tourdates.blade.php -->
<div class="tour-details">
    <!-- Hiển thị thông tin chi tiết của tour -->
    <h2>Tour Details</h2>
    <!-- Thông tin chi tiết về tour ở đây -->
    <!-- Ví dụ: -->
    <p>Tên tour: {{ $tour->name }}</p>
    <p>Ngày bắt đầu: {{ $tour->start_date }}</p>
    <!-- ... -->

    <!-- Nút Book -->
    <a href="{{ route('tourconfirm', ['tour_id' => $tour->id]) }}" class="btn btn-primary">Book</a>
</div>

@endsection