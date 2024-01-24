@extends('interface.layout_interface')

@section('content')
@foreach ($checkout as $d)

<div class="container-xxl my-5" style=" max-width: 1320px;">

    <div class="row my-4">
        <h4><strong class="text-muted">Enter Information & Payment</strong></h4>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <img width="500px" height="315px" style="border:1px solid rgba(0, 0, 0, 0);border-radius:10px"
                src="{{asset('public/file/')}}/img/img_product/{{$d->image}}" alt="Tour Image">
        </div>
        <div class="col-sm-8 bg-light">
            <div class="m-4">

                <div>
                    <h5><strong>{{ $d->name }}</strong></h5>
                </div>
                <div class="pt-3"><small>Mã tour </small>&nbsp; <strong>{{ $d->tour_code }} </strong></div>
                <div class="pt-3"> <small>Ngày đi</small> &nbsp; <strong>{{ date('d-m-Y', strtotime($d->date_start))
                        }}</strong></div>

                <div class="pt-3"> <small>Ngày về</small> &nbsp; <strong>{{ date('d-m-Y', strtotime($d->date_end))
                        }}</strong></div>
                <div class="pt-3"><small>Thời gian đi </small>&nbsp; <strong>{{ $d->keyword }} </strong></div>
                <div class="pt-3"> <small>Điểm khởi hành</small> &nbsp; <strong>{{ $d->departurelocation }}</strong>
                </div>
                <div class="pt-3"> <small>Điểm đến</small> &nbsp; <strong>{{ $d->arrivallocation }}</strong></div>
                <div class="pt-3"> <small>Phương tiện di chuyển</small>&nbsp; <strong>{{ $d->vehicle }}</strong></div>

            </div>
        </div>
    </div>
    <div class="container my-5">
        <h5><strong class="text-muted">Communications</strong></h5>

        <div class="row">
            <div class="col-sm-7 bg-light p-3">
                <form action="{{route('gd.checkout',['key' => $d->id, 'name' => $d->name])}}" method="post" name="form">

                    @csrf
                    <input type="hidden" name="id" value="{{$d->id}}">
                    <input type="hidden" name="schedule_id" value="{{ $d->id }}">
                    <input type="hidden" name="departurelocation" value="{{$d->departurelocation}}">
                    <input type="hidden" name="date_start" value="{{$d->date_start}}">
                    <input type="hidden" name="date_end" value="{{$d->date_end}}">
                    <input type="hidden" name="vehicle" value="{{$d->vehicle}}">
                    <input type="hidden" name="keyword" value="{{$d->keyword}}">
                    <input type="hidden" name="status" value="{{$d->status}}">
                    <input type="hidden" name="tour_code" value="{{$d->tour_code}}">
                    <input type="hidden" name="user_id" value="{{session('id')}}">
                    <input type="hidden" name="name" value="{{$d->name}}">
                    <input type="hidden" name="price" value="{{$d->price}}">
                    <input type="hidden" name="price1" value="{{$d->price1}}">
                    <input type="hidden" name="price2" value="{{$d->price2}}">
                    <input type="hidden" name="price3" value="{{$d->price3}}">
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
                    <h5><strong class="text-muted">Passenger</strong></h5>
                    <div class="row p-3">
                        <div class="col-sm-6">

                            Adults<input type="number" min="1" value="1" class="form-control" placeholder="Enter Adults"
                                name="person1">
                        </div>
                        <div class="col-sm-6">
                            Children<input type="number" min="0" value="0" class="form-control"
                                placeholder="Enter Children" name="person2">
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-sm-6 mt-3">
                            Young Children<input type="number" min="0" value="0" class="form-control"
                                placeholder="Enter Young Children" name="person3">
                        </div>
                        <div class="col-sm-6 mt-3">
                            Baby<input type="number" min="0" value="0" class="form-control" placeholder="Enter Baby"
                                name="person4">
                        </div>
                    </div>

                    <div class="row mt-3 alert alert-secondary">
                        <div style="font-size: 15px" class="col-sm-6">. Adults born before <strong>July 23, 2010
                            </strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Children born from<strong> July 23, 2017 to July
                                23, 2020</strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Young Children born from<strong> July 23, 2010
                                to July
                                24, 2017</strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Baby born from<strong> 23/07/2020 to
                                24/07/2022</strong></div>

                    </div>

                    <div class="row my-4">
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
                        
                    </div>

                    <h5><strong class="text-muted"> If you have any notes, please tell us!</strong></h5>
                    <div class="row m-3">
                        <textarea name="" id="" cols="5" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg"><strong> Đặt ngay </strong></button>

                </form>
            </div>
                        
            @endforeach
            <!-- Trip Summary Section -->
            @if(isset($passenger))
        <div class="col-sm-4 ml-3 p-3" style="background-color: aliceblue;border:1px solid rgba(0, 0, 0, 0);border-radius:5px">
            <!-- Trip Summary Content -->
            <h4 class="text-danger">Trip summary</h4>
            <!-- ... Your existing code ... -->

            <!-- Dynamic Price Adjustment using JavaScript -->
            <script>
                function updateTotalAmount() {
                    // Get quantities and prices
                    var person1 = parseInt(document.getElementById('person1').value);
                    var person2 = parseInt(document.getElementById('person2').value);
                    var person3 = parseInt(document.getElementById('person3').value);
                    var person4 = parseInt(document.getElementById('person4').value);

                    var price = parseFloat("{{ $price }}");
                    var price1 = parseFloat("{{ $price1 }}");
                    var price2 = parseFloat("{{ $price2 }}");
                    var price3 = parseFloat("{{ $price3 }}");

                    // Calculate total amount
                    var amount = (person1 * price) + (person2 * price1) + (person3 * price2) + (person4 * price3);

                    // Update the total amount on the page
                    document.getElementById('totalAmount').innerText = "$" + amount.toFixed(2);
                }
            </script>

            <div class="row p-3">
                <div class="col-sm-6">
                    <label for="person1">Adults</label>
                    <input type="number" min="0" value="1" class="form-control" placeholder="Enter Adults" name="person1" id="person1" onchange="updateTotalAmount()">
                </div>
                <div class="col-sm-6">
                    <label for="person2">Children</label>
                    <input type="number" min="0" value="0" class="form-control" placeholder="Enter Children" name="person2" id="person2" onchange="updateTotalAmount()">
                </div>
                <div class="col-sm-6">
                    <label for="person2">Young Children</label>
                    <input type="number" min="0" value="0" class="form-control" placeholder="Enter Young Children" name="person3" id="person3" onchange="updateTotalAmount()">
                </div>
                <div class="col-sm-6">
                    <label for="person2">Baby</label>
                    <input type="number" min="0" value="0" class="form-control" placeholder="Enter Baby" name="person4" id="person4" onchange="updateTotalAmount()">
                </div>
            </div>
            <!-- ... Add similar rows for Young Children and Baby ... -->

            <div class="row mt-5">
                <div class="col-sm-5">
                    <h4><strong>AMOUNT</strong></h4>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <h3><strong id="totalAmount" class="text-danger">${{$amount}}</strong></h3>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <h3 style="text-align: center" class="alert alert-success">BOOKING SUCCESS!!!</h3>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
        @endif

            
            

        </div>
    </div>
</div>



@endsection

@section('title')
Payment
@endsection

@section('linkcss')
@endsection

@section('linkjs')
@endsection

@section('page-script')
<script>
    function validateForm() {
        let name = document.forms["form"]["name"].value;
        let email = document.forms["form"]["email"].value;
        let phone = document.forms["form"]["phone"].value;
        let address = document.forms["form"]["address"].value;

        if (name == "" || email == "" || phone == "" || address == "") {
            alert("All communication fields must be filled out");
            return false;
        return true; // Form is valid
    }
    }
</script>
@endsection