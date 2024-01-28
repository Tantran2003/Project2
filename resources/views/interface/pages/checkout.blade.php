@extends('interface.layout_interface')

@section('content')

@foreach ($checkout as $booking)
<style>
    .rounded {
        border-radius: 1rem !important;
    }
</style>
<div class="container-xxl my-5 py-5" style=" max-width: 1320px; ">

    <div class="row my-4">
        <h3 class="text-muted">Thanh toán</h3>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <img width="500px" height="315px" style="border:1px solid rgba(0, 0, 0, 0);border-radius:10px"
                src="{{asset('public/file/')}}/img/img_product/{{$booking->image}}" alt="Tour Image">
        </div>
        <div class="col-sm-8 bg-light">
            <div class="m-4">

                <div>
                    <h5><strong>{{ $booking->name }}</strong></h5>
                </div>
                <div class="pt-3"><small>Mã tour </small>&nbsp; <strong>{{ $booking->tour_code }} </strong></div>
                <div class="pt-3"> <small>Ngày đi</small> &nbsp; <strong>{{ date('d-m-Y',
                        strtotime($booking->date_start))
                        }}</strong></div>

                <div class="pt-3"> <small>Ngày về</small> &nbsp; <strong>{{ date('d-m-Y', strtotime($booking->date_end))
                        }}</strong></div>
                <div class="pt-3"><small>Thời gian đi </small>&nbsp; <strong>{{ $booking->keyword }} </strong></div>
                <div class="pt-3"> <small>Điểm khởi hành</small> &nbsp; <strong>{{ $booking->departurelocation
                        }}</strong>
                </div>
                <div class="pt-3"> <small>Điểm đến</small> &nbsp; <strong>{{ $booking->arrivallocation }}</strong></div>
                <div class="pt-3"> <small>Phương tiện di chuyển</small>&nbsp; <strong>{{ $booking->vehicle }}</strong>
                </div>

            </div>
        </div>
    </div>
    <div class="container my-5">
        <h4><strong class="text-muted pb-3">Thông tin liên lạc</strong></h4>

        <div class="row ">
            <div class="col-lg-7 bg-light p-3 mt-4">
                <form action="{{route('gd.savebooking')}}" method="post" name="form">
                    @csrf
                    <input type="hidden" name="id" value="{{$booking->id}}">
                    <input type="hidden" name="schedule_id" value="{{ $booking->id }}">
                    <input type="hidden" name="departurelocation" value="{{$booking->departurelocation}}">
                    <input type="hidden" name="arrivallocation" value="{{$booking->arrivallocation}}">
                    <input type="hidden" name="date_start" value="{{$booking->date_start}}">
                    <input type="hidden" name="date_end" value="{{$booking->date_end}}">
                    <input type="hidden" name="vehicle" value="{{$booking->vehicle}}">
                    <input type="hidden" name="keyword" value="{{$booking->keyword}}">
                    <input type="hidden" name="status" value="{{$booking->status}}">
                    <input type="hidden" name="tour_code" value="{{$booking->tour_code}}">
                    @if(Auth::check())
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endif


                    <?php 
                    if(Auth::check()){         
                    ?>
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <label for="name">Tên</label>
                            <input type="name" class="form-control" placeholder="" name="fullname"
                                value="<?php echo Auth::user()->fullname; ?>" id="name" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="" name="email"
                                value="<?php echo Auth::user()->email; ?>" id="email" required>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-6 mt-3">
                            Số điện thoại<input type="tel" class="form-control" placeholder="" name="phone"
                                value="<?php echo Auth::user()->phone; ?>" id="phone">

                        </div>
                        <div class="col-sm-6 mt-3">
                            Địa chỉ<input type="text" class="form-control" placeholder="" name="address"
                                value="<?php echo Auth::user()->address; ?>" id="address">

                        </div>

                    </div>
                    <?php 
                        }else{
                    ?>
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <label for="name">Tên</label>
                            <input type="name" class="form-control" placeholder="Nhập tên" name="fullname"
                                value="{{ old('fullname') }}" id="name">
                            {!! $errors->first('fullname', '<div class="has-error text-danger">:message</div>') !!}
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Nhập email" name="email"
                                value="{{ old('email') }}" id="email">
                            {!! $errors->first('email', '<div class="has-error text-danger">:message</div>') !!}

                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-6 mt-3">
                            Số điện thoại<input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone"
                                value="{{ old('phone') }}" id="phone">
                            {!! $errors->first('phone', '<div class="has-error text-danger">:message</div>') !!}

                        </div>
                        <div class="col-sm-6 mt-3">
                            Địa chỉ<input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                                value="{{ old('address') }}" id="address">
                            {!! $errors->first('address', '<div class="has-error text-danger">:message</div>') !!}

                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                    <h5><strong class="text-muted">Passenger</strong></h5>

                    <div class="row p-3">
                        <div class="col-sm-6">
                            Người lớn<input type="number" min="1" value="1" class="form-control"
                                placeholder="Nhập số người lớn" name="person1" data-person="Người lớn"
                                data-price="{{ $booking->price1 }}">
                        </div>
                        <div class="col-sm-6">
                            Trẻ em<input type="number" min="0" value="0" class="form-control "
                                placeholder="Nhập số trẻ em" name="person2" data-person="Trẻ em"
                                data-price="{{ $booking->price2 }}">
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-6 mt-3">
                            Trẻ nhỏ<input type="number" min="0" value="0" class="form-control"
                                placeholder="Nhập số trẻ nhỏ" name="person3" data-person="Trẻ nhỏ"
                                data-price="{{ $booking->price3 }}">
                        </div>
                    </div>
                    <input type="hidden" value="{{ $booking->price1 }}" name="price1">
                    <input type="hidden" value="{{ $booking->price2 }}" name="price2">
                    <input type="hidden" value="{{ $booking->price3 }}" name="price3">
                    <input type="hidden" value="{{ $booking->price }}" name="price0">

                    <h5><strong class="text-muted">Bạn có thể ghi chú tại đây</strong></h5>
                    <div class="row m-3">
                        <textarea name="" id="" cols="5" rows="5"></textarea>
                    </div>



            </div>


            <!-- Trip Summary Section -->

            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                <div class="p-4 border border-secondary-subtle rounded">
                    <div class="border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng chuyến đi</h4>
                    </div>
                    <div class="card-body mt-5">


                        <div class="d-flex justify-content-between">
                            <h5>{{$booking->name}}</h5>
                            <h5>{{$booking->price}}</h5>
                        </div>
                        @endforeach
                        <hr class="mt-0">
                        <div class="  mb-3 pt-1">
                            <!-- div hiển thị giá và person -->
                            <h6 id="displayText" class="font-weight-medium mt-2"></h6>
                            <!--  -->
                            <h6 class="font-weight-medium"></h6>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h4 class="font-weight-bold">Total</h4>

                            <h4 class="font-weight-bold text-danger" id="totalAmount"></h4>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" id="paymentButton" class="btn btn-primary btn-lg"><strong>Đặt
                                    ngay</strong></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- @if(Session::has('totalAmount'))
    Giá trị totalAmount trong session là: {{ Session::get('totalAmount') }}
@else
    Session không có giá trị totalAmount
@endif -->
</div>
</div>
</div>
@endsection
<style>
    .display-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        var mainPrice = convertPriceToNumber("{{$booking->price}}");

        function convertPriceToNumber(priceString) {
            return parseFloat(priceString.replace(/[^\d]/g, ''));
        }
        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0,
            }).format(amount).replace(/₫/, 'VNĐ');
        }
        function updateDisplay() {
            var totalCost = mainPrice;
            var displayString = "";
            $('input[type="number"]').each(function () {
                var person = $(this).data('person');
                var value = $(this).val();
                var price = parseFloat($(this).data('price').replace(/[^\d]/g, ''));

                if (!isNaN(price) && value > 0) {
                    var individualCost = price * value;
                    var formattedIndividualCost = formatCurrency(individualCost);

                    displayString += `<div class="display-item">
                                    <span>${person} x${value}</span>
                                    <span>${formattedIndividualCost}<br><br></span>
                                  </div>`;
                    totalCost += individualCost;
                }
            });
            var totalAmount = totalCost;
            var formattedTotalCost = formatCurrency(totalCost);
            $("#displayText").html(displayString);
            $("#totalAmount").html(formattedTotalCost);
        }
        updateDisplay();
        $('input[type="number"]').on('input', updateDisplay);
    });
</script>
