@extends ('interface/layout_interface')
@section('content')
<style>
    .custom-image-container {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .custom-image-container a img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>
<?php
//  $loadproducts=App\Models\Products::where('status',1)->get();

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
                        <input type="date" name="departureday" class="form-control" value="{{ $departureDate ?? '' }}"
                            min="{{ now()->format('Y-m-d') }}">
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
                    <?php foreach($loadproduct as $item){ ?>

                    <div class=" col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">



                        <div class="card product-item package-item  mb-4 h-100  ">
                            <div
                                class="custom-image-container card-header   product-img position-relative overflow-hidden bg-transparent border p-0 ">
                                <a href=""> <img class="card-img-top img-fluid w-100 h-100 "
                                        src="{{asset('public/file/')}}/img/img_product/{{$item->image}}" alt=""></a>
                            </div>
                            <div class=" card-body p-4 p-0 pt-4 pb-1">
                                <div class="d-flex justify-content-between">
                                    <p><i class="fa fa-calendar-alt text-primary me-2"></i>Ngày
                                        đi:{{$item->departureday}} </p>
                                    <p>{{$item->keyword}}</p>
                                </div>
                                <div class="">
                                    <a href="">
                                        <h5 class="card-title  text-break mb-0"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{$item->name}}</h5>
                                    </a>
                                </div>
                                <div>
                                    <p class="flex-fill pt-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Điểm
                                        khởi hành: {{$item->departurelocation}}</p>
                                    <h5 class="flex-fill pt-2" style="color:#e01600;">{{$item->price}}</h5>
                                </div>
                            </div>

                            <div class="px-4 pb-4 card-footer d-flex justify-content-between border-none"
                                style="background-color:white;">
                                <a href="" class="btn btn-sm  px-3 border border-info text-info"><i
                                        class="fas fa-eye  mr-1"></i>&nbsp; Thông tin</a>
                                <a href="" class="btn btn-sm btn-primary px-3"><i
                                        class="fas fa-shopping-cart mr-1"></i>&nbsp; Đặt ngay</a>
                            </div>
                        </div>
                        <!-- <divss class="package-item h-100 ">
                            <div class="custom-image-container overflow-hidden flex-fill ">
                                <a href=""> <img class=" img-fluid h-100"
                                        src="{{asset('public/file/')}}/img/img_product/{{$item->image}}" alt=""></a>
                            </div>

                            <div class=" p-4 flex-fill">
                                <div class="d-flex justify-content-between h-100">
                                    <p><i class="fa fa-calendar-alt text-primary me-2"></i>Ngày đi:
                                        {{$item->departureday}} </p>
                                    <p>{{$item->keyword}}</p>
                                </div>
                                <a class="d-block" href="">
                                    <h5 class="text-break mb-0">{{$item->name}}</h5>
                                </a>
                                <div class="mb-3 row d-flex flex-column h-50">
                                    <p class="flex-fill py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>Điểm
                                        khởi hành: {{$item->departurelocation}}</p>
                                    <h5 class="flex-fill py-2" style="color:#e01600;">{{$item->price}}</h5>
                                </div>

                                <div class=" d-flex justify-content-between mt-2 mb-2">
                                    <a href="#" class="btn btn-sm border border-info text-info px-3">Thông tin</a>
                                    <a href="#" class="btn btn-sm btn-primary px-3">Đặt ngay</a>
                                </div>
                            </div>
                        </divss> -->
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lắng nghe sự kiện khi select box sắp xếp thay đổi
        document.getElementById('sortBy').addEventListener('change', function () {
            filterProducts();
        });

        // Lắng nghe sự kiện khi checkbox giá thay đổi
        var priceCheckboxes = document.querySelectorAll('input[name^="priceCheckbox"]');
        priceCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                filterProducts();
            });
        });

        // Gọi hàm filter khi trang được tải
        filterProducts();
    });

    function filterProducts() {
        // Lấy giá trị từ select box sắp xếp
        var sortBy = document.getElementById('sortBy').value;

        // Lấy giá trị từ checkbox giá
        var priceRanges = [];
        var priceCheckboxes = document.querySelectorAll('input[name^="priceCheckbox"]:checked');
        priceCheckboxes.forEach(function (checkbox) {
            priceRanges.push(checkbox.value);
        });

        // Gửi Ajax request để lấy danh sách sản phẩm theo filter
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/your-api-endpoint?sortBy=' + sortBy + '&priceRanges=' + priceRanges.join(','), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Cập nhật nội dung container sản phẩm
                document.getElementById('productListContainer').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script> -->