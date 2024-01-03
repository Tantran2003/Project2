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
                    <!-- Content for the left section -->
                    <!-- Example content: Left Package -->
                    <h4>Bộ lọc tìm kiếm</h4>

                    <h6 class="pt-2">Sắp xếp theo</h6>
                    <select class="form-select pt-2" aria-label="Default select example">
                        <option selected>Chọn sắp xếp</option>
                        <option value="lowToHigh">Giá thấp đến cao</option>
                        <option value="highToLow">Giá cao đến thấp</option>
                    </select>
                    <!-- Filter by Price Range using Checkboxes -->
                    <h6 class="pt-3">Price Range</h6>
                    <div class="form-check pt-2">
                        <input class="form-check-input" type="checkbox" value="" id="priceCheckbox1">
                        <label class="form-check-label" for="priceCheckbox1">
                            $0 - $50
                        </label>
                    </div>
                    <div class="form-check pt-2">
                        <input class="form-check-input" type="checkbox" value="" id="priceCheckbox2">
                        <label class="form-check-label" for="priceCheckbox2">
                            $50 - $100
                        </label>
                    </div>
                    <div class="form-check pt-2">
                        <input class="form-check-input" type="checkbox" value="" id="priceCheckbox3">
                        <label class="form-check-label" for="priceCheckbox3">
                            $100 - $200
                        </label>
                    </div>


                </div>
            </div>
      
            <div class="col-lg-9 col-md-12 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row g-4">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
       
       <h1 class="mb-5">Du lịch</h1>
   </div>
                    <!-- Bạn có thể thêm thẻ card vào đây -->
                    <?php foreach($search as $item){ ?>

                    <div class=" col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">



                        <div class="card product-item package-item  mb-4 h-100  ">
                            <div class="custom-image-container card-header   product-img position-relative overflow-hidden bg-transparent border p-0 ">
                                <a href="" > <img class="card-img-top img-fluid w-100 h-100 "
                                        src="{{asset('public/file/')}}/img/img_product/{{$item->image}}" alt=""></a>
                            </div>
                            <div class=" card-body p-4 p-0 pt-4 pb-1">
                              <div class="d-flex justify-content-between">  <p><i class="fa fa-calendar-alt text-primary me-2"></i>Ngày đi:{{$item->departureday}} </p>
                                <p>{{$item->keyword}}</p></div>
                                <div class="">
                                <a href=""><h5 class="card-title  text-break mb-0" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{$item->name}}</h5></a>
                                </div>
                                <div>
                                <p class="flex-fill pt-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Điểm
                                        khởi hành: {{$item->departurelocation}}</p>
                                        <h5 class="flex-fill pt-2" style="color:#e01600;">{{$item->price}}</h5>
                                </div>
                            </div>

                            <div class="px-4 pb-4 card-footer d-flex justify-content-between border-none"
                                style="background-color:white;">
                                <a href="" class="btn btn-sm  px-3 border border-info text-info"><i class="fas fa-eye  mr-1"></i>&nbsp; Thông tin</a>
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