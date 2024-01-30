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
                    <a href="{{route('gd.booking_tour',[$product_id, $schedule_id, khongdau($detail->name)] )}}"
                        class="btn btn-primary btn-lg btn-block px-5">Đặt ngay</a>

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
                            <td>{{ date('d-m-Y', strtotime($detail->date_start)) }} &nbsp; <br> <b>Giờ đi:</b> {{ date('H:i',
                                strtotime($detail->date_start)) }}</td>

                        </tr>
                        <tr>
                            <td><i class="fa fa-calendar-alt text-primary me-2"></i>Ngày về: </td>
                            <td> {{ date('d-m-Y', strtotime($detail->date_end)) }}</td>
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



<!-- rating form -->
<div class="container-xxl py-5" style=" max-width: 1320px;">
    <div class="container">
        <div class="row">
            <!-- Left side - Existing Ratings -->
            <div class="col-md-6">
                <h3 class="h4 pb-3">Bình luận</h3>

                @foreach($ratings as $rating)

                <div class="mt-4"> <strong>{{ $rating->username }}</strong> <small>{{ date('d-m-Y',
                        strtotime($rating->created_at)) }}</small> &nbsp;
                    @if (Auth::user() && (Auth::user()->id == $rating->user_id))
                    <a href="{{route('gd.delete_comments',$rating->id)}}"> <i class="fa fa-trash"></i></a>
                    @endif
                </div>
                @if($rating->rating > 0)
                <?php 
                $count=1;
                while($count <= $rating['rating']){ ?>
                <span style="   color: #FFD700; font-size:20px;">&#9733;</span>
                <?php $count++;    } ?>
                @else
                <p><br>Write any thing in here</br></p>
                @endif
                <div class="text-break mt-1"> {{ $rating->comment }}</div>
                @endforeach

            </div>

            <!-- Right side - Rating Form -->

            <div class="col-md-6">
                <?php if(Auth::check()){?>
                <form action="{{route('gd.saveRating', ['id' => $product_id])}}" name="productRatingForm"
                    id="productRatingForm" method="post">
                    @csrf



                    <div class="form-group">
                        <label for="rating">Đánh giá</label>
                        <div class="rating" style="width: 15rem">
                            <input id="rating-5" type="radio" name="rating" value="5" /><label for="rating-5"><i
                                    class="fas fa-3x fa-star"></i></label>
                            <input id="rating-4" type="radio" name="rating" value="4" /><label for="rating-4"><i
                                    class="fas fa-3x fa-star"></i></label>
                            <input id="rating-3" type="radio" name="rating" value="3" /><label for="rating-3"><i
                                    class="fas fa-3x fa-star"></i></label>
                            <input id="rating-2" type="radio" name="rating" value="2" /><label for="rating-2"><i
                                    class="fas fa-3x fa-star"></i></label>
                            <input id="rating-1" type="radio" name="rating" value="1" /><label for="rating-1"><i
                                    class="fas fa-3x fa-star"></i></label>

                        </div>
                        {!! $errors->first('rating', '<div class="has-error text-danger">:message</div>') !!}

                    </div>

                    <div class="form-group mt-3">

                        <textarea name="comment" id="review" class="form-control" cols="30" rows="10"
                            placeholder="Bạn có ý kiến gì ?"></textarea>
                        {!! $errors->first('comment', '<div class="has-error text-danger">:message</div>') !!}
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg mt-2">Gửi</button>
                    </div>
                </form>
                <?php }else{ ?>
                <div>Đăng nhập để bình luận
                    <a href="{{route('gd.register')}}">Đăng nhập</a>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

@endsection