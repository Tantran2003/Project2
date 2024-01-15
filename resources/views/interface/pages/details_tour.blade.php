@extends ('interface/layout_interface')
@section('content')

<!-- Destination Start -->
@foreach($details as $detail)
<div class="container-xxl py-5 mt-5 destination" style=" max-width: 1320px;">
    <div class="container">
        <div class="d-md-flex  flex-md-row flex-column justify-content-between align-items-center pb-5">
     
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 100%; overflow-wrap: break-word;">
             
                <h3 class="mb-5 text-break">{{$detail->name}}</h3>
            
            </div>

            <div class="col-md-6 wow d-flex  justify-content-xl-end  justify-content-md-center align-items-center fadeInUp"
                data-wow-delay="0.1s">
                <div class="  ">
                    <button class="btn btn-primary btn-lg btn-block px-5">Đặt Ngay</button>
               

                    <h4 class="text-danger pt-4">{{$detail->price}}<span class="text-dark fs-6">/khách</span></h4>
                   
              
                </div>
            </div>
        </div>



        <div class="row g-3">
            <!-- Hình ảnh đầu tiên -->
            <div class="col-lg-4 col-md-12 wow zoomIn " data-wow-delay="0.1s">
                <div class="position-relative d-block overflow-hidden img-container ">
                    @if(isset($detail->images) && count($detail->images) > 0)
                    <img class=" img-fluid w-100 rounded-image "
                        src="{{asset('public/file/img/img_product/'.$detail->images[0]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
            <!-- Hình ảnh thứ hai -->
            <div class="col-lg-4 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                <div class="position-relative d-block overflow-hidden img-container ">
                    @if(isset($detail->images) && count($detail->images) > 1)
                    <img class=" img-fluid w-100 rounded-image"
                        src="{{ asset('public/file/img/img_product/' . $detail->images[1]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
            <!-- Hình ảnh thứ ba -->
            <div class="col-lg-4 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                <div class="position-relative d-block overflow-hidden img-container">
                    @if(isset($detail->images) && count($detail->images) > 2)
                    <img class="img-fluid w-100 rounded-image"
                        src="{{ asset('public/file/img/img_product/' . $detail->images[2]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
            <!-- Hình ảnh thứ tư -->
            <div class="col-lg-3 col-md-12 wow zoomIn" data-wow-delay="0.7s">
                <div class="position-relative d-block overflow-hidden img-container">
                    @if(isset($detail->images) && count($detail->images) > 3)
                    <img class="img-fluid w-100 rounded-image"
                        src="{{ asset('public/file/img/img_product/' . $detail->images[3]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
            <!-- Hình ảnh thứ năm -->

            <div class="col-lg-3 col-md-12 wow zoomIn" data-wow-delay="0.7s">
                <div class="position-relative d-block overflow-hidden img-container">
                    @if(isset($detail->images) && count($detail->images) > 4)
                    <img class="img-fluid w-100 rounded-image"
                        src="{{ asset('public/file/img/img_product/' . $detail->images[4]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow zoomIn" data-wow-delay="0.7s">
                <div class="position-relative d-block overflow-hidden img-container">
                    @if(isset($detail->images) && count($detail->images) > 5)
                    <img class="img-fluid w-100 rounded-image"
                        src="{{ asset('public/file/img/img_product/' . $detail->images[5]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-12 wow zoomIn" data-wow-delay="0.7s">
                <div class="position-relative d-block overflow-hidden img-container">
                    @if(isset($detail->images) && count($detail->images) > 6)
                    <img class="img-fluid w-100 rounded-image"
                        src="{{ asset('public/file/img/img_product/' . $detail->images[6]) }}" alt="Product Image">
                    @endif
                </div>
            </div>
        </div>

        <div class="row gx-5 gy-2 mt-1 ">
            <h3 class="mt-5">Điểm nhấn hành trình</h3>
            <div class="col-lg-3 col-md-12 wow fadeInUp   rounded" data-wow-delay="0.3s">

                <table class="mt-3">
                    <tbody>
                      
                        <tr>


                            <td><i class="fa fa-barcode text-primary me-2"></i>Mã tour: </td>
                            <td> {{$detail->tour_code}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-calendar-alt text-primary me-2"></i>Ngày đi: </td>
                            <td> {{$detail->date_start}}</td>

                        </tr>
                        <tr>
                            <td><i class="fa fa-calendar-alt text-primary me-2"></i>Ngày về: </td>
                            <td> {{$detail->date_end}}</td>

                        </tr>
                       
                        <tr>
                            <td><i class="fa fa-map-marker-alt text-primary me-2"></i>Điểm khởi hành:</td>
                       
                            <td>{{$detail->departurelocation}}</td>
                           

                        </tr>
                        <tr>
                            <td><i class="fa fa-map-marker-alt text-primary me-2"></i>Điểm đến:</td>
                       
                            <td>{{$detail->arrivallocation}}</td>
                           

                        </tr>
                        <tr>
                            <td><i class="fa fa-clock text-primary me-2"></i>Thời gian:</td>
                       
                            <td>{{$detail->keyword}}</td>
                           

                        </tr>
                        <tr>
                            <td><i class="fa fa-paper-plane text-primary me-2"></i>Phương tiện đi:</td>
                       
                            <td>{{$detail->vehicle}}</td>
                           
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.3s">
           
                <p id="myDIV" class="example-text">
                    {{$detail->desc}}</p>
               

                <a id="xemthem" onclick="toggleContent()">Xem thêm >></a>
                <a id="collapseBtn" style="display: none;" onclick="toggleContent()">Rút gọn <<< </a>

            </div>
        </div>


    </div>
</div>


<!-- lich trinh -->
<div class="container-xxl py-2  destination" style=" max-width: 1320px;">
    <div class="container">
        <div class="row gx-5 gy-2 ">
            <h3 class="mt-5">Lịch trình di chuyển</h3>
            <div class="col-lg-9 col-md-12 wow fadeInUp   rounded" data-wow-delay="0.3s">
                <p class="example-text  fw-bold">
        

                    {!!$detail->content!!}
                    
                </p>
            </div>
          

        </div>
    </div>
</div>
@endforeach
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
               
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection