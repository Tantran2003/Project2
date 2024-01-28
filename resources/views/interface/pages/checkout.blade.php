@extends('interface.layout_interface')

@section('content')

@foreach ($checkout as $booking)
<style>
    .rounded {
        border-radius: 1rem !important;
    }
</style>
<div class="container-xxl my-5 py-2" style=" max-width: 1320px;">

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
                <form action="{{route('gd.tourbooking',['key' => $booking->id, 'name' => $booking->name])}}"
                    method="post" name="form">

                    @csrf
                    <!-- <input type="hidden" name="id" value="{{$booking->id}}">
                    <input type="hidden" name="schedule_id" value="{{ $booking->id }}">
                    <input type="hidden" name="departurelocation" value="{{$booking->departurelocation}}">
                    <input type="hidden" name="date_start" value="{{$booking->date_start}}">
                    <input type="hidden" name="date_end" value="{{$booking->date_end}}">
                    <input type="hidden" name="vehicle" value="{{$booking->vehicle}}">
                    <input type="hidden" name="keyword" value="{{$booking->keyword}}">
                    <input type="hidden" name="status" value="{{$booking->status}}">
                    <input type="hidden" name="tour_code" value="{{$booking->tour_code}}">
                    <input type="hidden" name="user_id" value="{{session('id')}}">
                    <input type="hidden" name="name" value="{{$booking->name}}">
                    <input type="hidden" name="price" value="{{$booking->price}}">
                    <input type="hidden" name="price1" value="{{$booking->price1}}">
                    <input type="hidden" name="price2" value="{{$booking->price2}}">
                    <input type="hidden" name="price3" value="{{$booking->price3}}"> --> -->
                    <?php 
                    if(Auth::check()){         
                    ?>
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <label for="name">Name</label>
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
                            Phone<input type="tel" class="form-control" placeholder="" name="phone"
                                value="<?php echo Auth::user()->phone; ?>" id="phone">

                        </div>
                        <div class="col-sm-6 mt-3">
                            Address<input type="text" class="form-control" placeholder="" name="address"
                                value="<?php echo Auth::user()->address; ?>" id="address">

                        </div>

                    </div>
                    <?php 
                        }else{
                    ?>
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" placeholder="Enter name" name="fullname"
                                value="{{ old('name', session('userName')) }}" id="name" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email"
                                value="{{ old('email', session('userEmail')) }}" id="email" required>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-6 mt-3">
                            Phone<input type="tel" class="form-control" placeholder="Enter phone" name="phone"
                                value="{{ session('userPhone') }}" id="phone">

                        </div>
                        <div class="col-sm-6 mt-3">
                            Address<input type="text" class="form-control" placeholder="Enter address" name="address"
                                value="{{ session('userAddress') }}" id="address">

                        </div>

                    </div>
                    <?php 
                        }
                    ?>
                    <!-- <h5><strong class="text-muted">Passenger</strong></h5> -->
                    <!-- <div id='booking-details'>
                        <div class="row p-3">
                            <div class="col-sm-6">
                                Người lớn<input type="number" min="1" value="1" class="form-control"
                                    placeholder="Nhập số người lớn" name="person1" data-person="Người lớn"
                                    data-price="{{ $booking->price }}">
                            </div>
                            <div class="col-sm-6">
                                Trẻ em<input type="number" min="0" value="0" class="form-control "
                                    placeholder="Nhập số trẻ em" name="person2" data-person="Trẻ em"
                                    data-price="{{ $booking->price1 }}">
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col-sm-6 mt-3">
                                Trẻ nhỏ<input type="number" min="0" value="0" class="form-control"
                                    placeholder="Nhập số trẻ nhỏ" name="person3" data-person="Trẻ nhỏ"
                                    data-price="{{ $booking->price2}}">
                            </div>
                        </div>
                    </div> -->


                    <h5><strong class="text-muted"> If you have any notes, please tell us!</strong></h5>
                    <div class="row m-3">
                        <textarea name="" id="" cols="5" rows="5"></textarea>
                    </div>
                    <!-- Trip Summary Section -->

                    <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="p-4 border border-secondary-subtle rounded">
                            <div class="border-0">
                                <h4 class="font-weight-semi-bold m-0">Tổng chuyến đi</h4>
                            </div>
                            <div class="card-body mt-5">
                                <?php
                                    $Subtotal=0; $total=0;
                                    foreach(Session::get("booking") as $item ) 
                                {?>
                                    <div class="d-flex justify-content-between">
                                        <p>Adults</p>
                                        <p>${{$item['price']}}</p>
                                        <p>Children</p>
                                        <p>${{$item['price1']}}</p>
                                        <p>Babies</p>
                                        <p>${{$item['price2']}}</p>
                                    </div>
                                <?php 
                                        $Subtotal=$Subtotal+$item['amount']*$item['price'] + $item['amount1']*$item['price1'] + $item['amount1']*$item['price1'];
                                    } ?>
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">$<?php echo $Subtotal; ?></h6>
                                </div>
                                <!-- <div class="d-flex justify-content-between">
                                    <h5>{{$booking->name}}</h5>
                                    <h5 id="totalAmount"></h5>
                                </div>
                                
                                <hr class="mt-0">
                                <div class="  mb-3 pt-1">
                                    div hiển thị giá và person 
                                    <h6 id="displayText" class="font-weight-medium mt-2"></h6>
                                    
                                    <h6 class="font-weight-medium"></h6>
                                </div>  -->

                            </div>
                            
                        </div>
                    </div>

                </form>

                <divs class="row my-4">
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="payment" value="direct"
                                checked>
                            <label class="form-check-label" for="radio1">Direct Payment</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="payment" value="card">
                            <label class="form-check-label" for="radio2">Credit Card Payment</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{route('gd.vnpay')}}" method="post" name="form">
                            <!-- other form fields -->
                            <label class="form-check-label" for="radio2">VN PAY</label>
                            <!-- Add a hidden input for book_id -->
                            <input type="hidden" name="book_id" value="{{ $book_id }}">

                            <div class="card-footer border-secondary bg-transparent">
                                <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toan</button>
                            </div>
                        </form>

                    </div>
                </divs>
            </div>
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
        var totalPrice = parseFloat($("#booking-details").data('price')) +
            parseFloat($("#booking-details").data('price1')) +
            parseFloat($("#booking-details").data('price2'));

        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0,
            }).format(amount).replace(/₫/, 'VNĐ');
        }

        function updateDisplay() {
            var totalCost = 0;
            var displayString = "";

            $('input[type="number"]').each(function () {
                var person = $(this).data('person');
                var value = $(this).val();
                var priceIndex = $(this).data('price-index');

                if (priceIndex !== undefined && !isNaN(priceIndex) && value > 0) {
                    var individualCost = totalPrice * value;
                    var formattedIndividualCost = formatCurrency(individualCost);

                    displayString += `<div class="display-item">
                                    <span>${person} x${value}</span>
                                    <span>${formattedIndividualCost}<br><br></span>
                                  </div>`;
                    totalCost += individualCost;
                }
            });

            var formattedTotalCost = formatCurrency(totalCost);
            $("#displayText").html(displayString);
            $("#totalAmount").html(formattedTotalCost);

            // Update the session with the total amount using Ajax
            $.ajax({
                url: "{{ route('gd.updateTotalAmountSession') }}", // Adjust the route to your actual route
                type: "POST",
                data: { totalAmount: totalCost },
                success: function (response) {
                    // Provide user feedback here, e.g., display a message
                    console.log("Giá trị totalAmount đã được lưu vào session.");
                },
                error: function (xhr, status, error) {
                    console.error("Đã xảy ra lỗi khi lưu giá trị totalAmount vào session.");
                }
            });
        }

        updateDisplay();
        $('input[type="number"]').on('input', updateDisplay);
    });
</script>