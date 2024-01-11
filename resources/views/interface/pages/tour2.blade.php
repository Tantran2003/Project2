@extends ('interface/layout_interface')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-sm-3 filter mt-5">
                <div class="row mb-5 mt-3">
                    <h4 style="text-align:center" class="text-primary"><strong>Result Filter</strong></h4>
                </div>
                <div class="row mb-1"> <strong>POINT</strong> </div>

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <select class="form-select" form="start" name="start">
                            <option  hidden> Select Point</option>
                            <option value="Nha Trang">Nha Trang</option>
                            <option value="Da Nang">Da Nang</option>
                            <option value="Ho Chi Minh">Ho Chi Minh</option>
                            <option value="Ha Noi">Ha Noi</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ url('user/tour') }}" id="start"><button
                                class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1"> <strong>DESTINATION</strong> </div>

                <div class="row mb-3">

                    <div class="col-sm-8">
                        <select class="form-select" form="end" name="end">
                            <option hidden>Select Destination</option>
                           
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <form action="{{ url('user/tour') }}" id="end"><button
                                class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <strong>REGIONS</strong>
                </div>

                <div class="row mt-2 mb-4">

                        <div class="col-sm-8">
                            <select class="form-select" form="regionform" name="region">
                                <option hidden>Select Region</option>
                                <option value="B">Northern</option>
                                <option value="T">Central</option>
                                <option value="N">South</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{ url('user/tour') }}" id="regionform">
                                <button class="btn btn-primary">Search</button>
                            </form>
                        </div>

                </div>

                <div class="row mb-1">
                    <strong>NUMBER OF DAYS</strong>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{ url('user/tour') }}">
                            <input type="hidden" name="one" value="one">
                            <button style="min-width: 130px" class="btn btn-outline-danger">1-3 days</button>
                        </form>
                    </div>
                    <div class="col-sm-6 ">
                        <form action="{{ url('user/tour') }}">
                            <input type="hidden" name="two" value="two">
                            <button style="min-width: 130px" class="btn btn-outline-danger">4-7 days</button>
                        </form>
                    </div>
                </div>



                <div class="row mb-2"> <strong>DATE START</strong> </div>

                <div class="row mb-3">
                    <form class="input-group mb-3" action="{{ url('user/tour') }}">
                        <input type="date" class="form-control" placeholder="Some text" name="date" id="date">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>

                <div class="row mb-2"> <strong>PRICE RANGE</strong> </div>
                <div class="row mb-5">
                    <form class="input-group" action="{{ url('user/tour') }}" id="priceRange" onsubmit="return validate()">
                        <input type="number" min="0" id="min" class="form-control" placeholder="Min price"
                            name="min">
                        <input type="number" min="0" id="max" class="form-control" placeholder="Max price"
                            name="max">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-9 tour-result">
                <div class="row mb-5 my-5">
                    <div class="col-sm-7">
                        <hr>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-select" form="price" name="price">
                            <option hidden value="asc">--- SELECT ---</option>
                            <option value="asc">PRICE FROM LOW -> HIGH</option>
                            <option value="desc">PRICE FROM HIGH -> LOW</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <form action="{{ url('user/tour') }}" class="btn btn-primary" id="price">
                            <button class="btn btn-primary btn-sm">Search</button>
                        </form>
                    </div>
                </div>

                <div class="row">
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
                                <a href="{{route('gd.checkout',$item->id)}}" class="btn btn-sm btn-primary px-3"><i
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
@endsection
