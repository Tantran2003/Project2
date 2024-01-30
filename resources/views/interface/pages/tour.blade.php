@extends ('interface/layout_interface')
@section('content')
<style>
    .custom-image-container {
        position: relative;
        width: 100%;

        overflow: hidden;
        margin: 0;

    }

    .custom-image-container a img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        margin: 0;

    }

    .rounded {
        border-radius: 1rem !important;
    }

    .rounded-image {
        border-top-left-radius: 1rem !important;
        border-bottom-left-radius: 1rem !important;
    }
</style>
<?php


?>
<div class="container-xxl py-5 mt-5">
    <div class="container">

        <div class="row g-4">
            <div class="col-lg-3 col-md-12  wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-itemm p-3">

                    <h4>Bộ lọc tìm kiếm</h4>
                    <form action="{{ route('filter.products') }}" method="get">
                        @csrf
                        <h6 class="pt-2">Sắp xếp theo</h6>
                        <select name="filterBy" class="form-select pt-2" aria-label="Default select example">
                            <option value="" @if (!isset($filterBy) || $filterBy=='' ) selected @endif>Chọn sắp xếp
                            </option>
                            <option value="lowToHigh" @if (isset($filterBy) && $filterBy=='lowToHigh' ) selected @endif>
                                Giá thấp đến cao</option>
                            <option value="highToLow" @if (isset($filterBy) && $filterBy=='highToLow' ) selected @endif>
                                Giá cao đến thấp</option>
                        </select>

                        <h6 class="pt-3">Khoảng giá</h6>
                        <div class="form-group">
                            <select class="form-select" name="priceRange" id="priceRange">
                                <option value="" @if (!isset($priceRange) || $priceRange=='' ) selected @endif>Chọn
                                </option>
                                <option value="0-all" @if (isset($priceRange) && $priceRange=='0-all' ) selected @endif>
                                    Tất cả giá</option>
                                <option value="0-5000000" @if (isset($priceRange) && $priceRange=='0-5000000' ) selected
                                    @endif>Dưới 5 triệu vnđ</option>
                                <option value="5000000-10000000" @if (isset($priceRange) &&
                                    $priceRange=='5000000-10000000' ) selected @endif>5 triệu - 10 triệu vnđ</option>
                                <option value="10000000-21000000" @if (isset($priceRange) &&
                                    $priceRange=='10000000-21000000' ) selected @endif>10 triệu - 21 triệu vnđ</option>
                            </select>
                        </div>


                        <h6 class="pt-3">Ngày đi</h6>
                        <input type="date" name="departureday" class="form-control"
                            value="{{ isset($departureday) ? $departureday : '' }}" min="{{ now()->format('Y-m-d') }}">
                        <button type="submit" class="mt-2 btn btn-primary">Chọn</button>

                    </form>
                    <!-- Filter by Price Range using Checkboxes -->
                </div>
            </div>




            <div class="col-lg-9 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row g-4">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-5">Du lịch</h1>
                    </div>
                    <!-- Bạn có thể thêm thẻ card vào đây -->
                    <?php  foreach($loadproduct as $item) { ?>
                    @php
                    $dateStart = $dateStart ?? now()->toDateString(); // Gán giá trị mặc định nếu không tồn tại
                    @endphp
                    @if(count($item->schedule) > 0)
                    @foreach($item->schedule as $tourDate)
                    <div class=" col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card product-item package-item mb-4 rounded">
                            <div class="row g-0">
                                <div class="col-lg-4 col-md-4">
                                    <div class="rounded-image custom-image-container card-header product-img position-relative overflow-hidden bg-transparent border p-0"
                                        style="height: 100%;">
                                        <a href=""><img class="card-img-top img-fluid w-100 h-100"
                                                src="{{asset('public/file/')}}/img/img_product/{{$item->image}}"
                                                alt=""></a>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8">
                                    <div class="card-body p-4 p-0 pt-4">
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between">
                                                <p><i class="fa fa-calendar-alt text-primary me-2"></i><b>Ngày đi:</b>
                                                    &nbsp;{{ date('d-m-Y', strtotime($tourDate->date_start)) }}
                                                    <!-- &nbsp;<b>Giờ đi:</b> &nbsp;{{ date('H:i',strtotime($tourDate->date_start)) }}</p> -->
                                                <p> {{$item->keyword}}</p>
                                            </div>
                                            <p><b>Mã tour:</b> {{ $tourDate->tour_code }}</p>
                                            <div class="">
                                           
                                                    <h5 class="card-title text-break mb-0"
                                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{$item->name}}</h5>
                                               
                                            </div>
                                            <p class="flex-fill pt-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>Điểm khởi hành:
                                                {{$item->departurelocation}}</p>
                                            <div class="d-flex justify-content-between">

                                                <h5 class="flex-fill pt-2" style="color:#e01600;">{{$item->price}}</h5>

                                            </div>

                                        </div>
                                        <div class="">
                                            <a href="{{ route('gd.details_tour', [$item->id,$tourDate->id,khongdau($item->name) ]) }}"
                                                class="btn btn-sm px-3 border border-info text-info "><i
                                                    class="fas fa-eye mr-1"></i>&nbsp;Thông tin</a>
                                           
                                                    <a href="{{route('gd.booking_tour', [$item->id,$tourDate->id,khongdau($item->name) ])}}"    class="btn btn-sm px-3 border border-info  btn-primary "><i class="fas fa-shopping-cart"></i>&nbsp;Đặt ngay</a>

                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else

                    @endif
                    <?php } ?>
                </div>
            </div>






        </div>
    </div>
</div>
@endsection

