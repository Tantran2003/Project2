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
                    <div class="text-center">
                <h2>  Không có kết quả </h2>
                    </div>
                </div>
            </div>






        </div>
    </div>
</div>
@endsection
