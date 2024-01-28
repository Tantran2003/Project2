@extends ('interface/layout_interface')
@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<?php
 $category=App\Models\Category::where('status',1)->get();

?>
<div class="container-fluid py-5 mb-5 hero-header"
    style="background: linear-gradient(rgba(20, 20, 31, .3), rgba(20, 20, 31, .3)), url({{asset('public/interface')}}/img/bg123.jpg);">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Khám phá địa điểm yêu thích của bạn</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Du lịch đến nơi bạn muốn với chúng tôi</p>
                <form action="{{route('gd.search')}}" method="post">
                    {{csrf_field()}}
                    <div class="position-relative w-75 mx-auto animated slideInDown">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input placeholder="Chọn ngày đi" name="departure_date" id="departure_date"
                                        class="form-control rounded-2 py-3" type="date"
                                        min="{{ now()->format('Y-m-d') }}">

                                    <select name="arrivallocation" id="destination" class="form-select rounded-2 py-3 ms-2">
                                        <option value="" selected>Chọn điểm đến</option>
                                        @foreach($destinations as $destination)
                                        <option value="{{ $destination->arrivallocation }}">{{
                                            $destination->arrivallocation }}</option>
                                        @endforeach
                                        <!-- Thêm các tùy chọn khác nếu cần -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary rounded-2 py-3 px-4 w-100">Tìm
                                    kiếm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="d-flex wow fadeInUp" data-wow-delay="0.1s">
            <!-- <h6 class="section-title bg-white text-center  px-3">Dịch vụ</h6> -->
            <h3 class="section-title bg-white text-center   mb-5">Dịch vụ của chúng tôi</h3>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <!-- <i class="fa fa-3x fa-globe  mb-4"></i> -->
                        <img class="mb-4" src="{{asset('public/interface')}}/img/travel.png" alt="" srcset="">
                        <h5>Đặt tour</h5>
                        <p>Dễ dàng & nhanh chóng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img class="mb-4" src="{{asset('public/interface')}}/img/best-price.png" alt="" srcset="">

                        <h5>Thanh toán</h5>
                        <p>An toàn & linh hoạt</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img class="mb-4" src="{{asset('public/interface')}}/img/quality-service.png" alt="" srcset="">

                        <h5>Sản phẩm & Dịch vụ</h5>
                        <p>Đa dạng – Chất lượng – An toàn</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img class="mb-4" src="{{asset('public/interface')}}/img/help-desk.png" alt="" srcset="">

                        <h5>Hỗ trợ</h5>
                        <p>Hotline & trực tuyến (08h00 - 22h00)</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->


<!-- Destination Start -->
<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="d-flex wow fadeInUp" data-wow-delay="0.1s">
            <h3 class="section-title bg-white text-center   mb-5">Những điểm đến yêu thích</h3>
        </div>
        <div class="row g-4">
            <?php foreach($category as $item){  ?>
            <div class="col-lg-3 col-sm-6 wow zoomIn mb-3" data-wow-delay="0.3s">
                <a class="position-relative d-block overflow-hidden" href="{{route('gd.index_tour',$item->id)}}">
                    <img class="img-fluid" src="{{asset('public/file')}}/img/img_category/{{$item->image}}" alt="">
                    <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                        {{$item->name}}</div>
                </a>
            </div>
            <?php } ?>

        </div>
        <!-- <disv class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('public/interface')}}/img/destination-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">20% OFF</div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Indonesia</div>
                    </a>
                </disv> -->
    </div>
</div>
</div>
<!-- Destination Start -->







<!-- Testimonial Start -->
<!-- <divssssssssssssss class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-1.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita
                    erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-2.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                    Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-3.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                    Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white text-center border p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-4.jpg"
                    style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                    Clita erat ipsum et lorem et sit.</p>
            </div>
        </div>
    </div>
</divssssssssssssss> -->
<!-- Testimonial End -->
<!-- Team Start -->
<!-- <divss class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
            <h1 class="mb-5">Meet Our Guide</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-1.jpg" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-2.jpg" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-3.jpg" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="img/team-4.jpg" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Full Name</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</divss> -->
<!-- Team End -->

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@endsection