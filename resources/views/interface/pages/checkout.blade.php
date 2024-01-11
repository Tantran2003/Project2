@extends('interface.layout_interface')

@section('content')
@foreach ($data as $d)
    <div class="container my-5">

        <div class="row my-4">
            <h4><strong class="text-muted">Enter Infomation & Payment</strong></h4>
        </div>
        <hr>

            <div class="row">
                <div class="col-sm-4">
                    <a href=""><img width="500px" height="300px"
                            style="border:1px solid rgba(0, 0, 0, 0);border-radius:10px"
                            src="" alt=""></a>
                </div>
                <div class="col-sm-8 bg-light">
                    <div class="m-4">
                        <h5><strong>{{ $d->name }}</strong></h5> <br><br>
                        @php
                            $date = strtotime($d->departureday);
                        @endphp
                        <small>Date Start</small> <strong>{{ date('d-m-y', $date) }}</strong> <br><br>
                        <small>Duration </small> <strong>{{ $d->keyword }}days</strong> <br><br>
                        <small>Place Start</small> <strong>{{ $d->departurelocation }}</strong>
                    </div>
                </div>
            </div>

    </div>

    <div class="container mb-5">
        <h5><strong class="text-muted">Communications</strong></h5>

        <div class="row">
            <div class="col-sm-7 bg-light p-3">
                <form action="{{url('interface/pages/paymentPost')}}" onsubmit="return validateForm()" name="form">
                    <input type="hidden" name="schedule_id" value="{{$d->schedule_id}}">
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
                    <div class="row p-3">
                        <div class="col-sm-6">
                            Name<input type="name" class="form-control" placeholder="Enter name" name="name"
                                value="{{ session('userName') }}" id="name">

                        </div>
                        <div class="col-sm-6">
                            Email<input type="email" class="form-control" placeholder="Enter email" name="email"
                                value="{{ session('userEmail') }}" id="email">

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

                    <h5><strong class="text-muted">Passenger</strong></h5>
                    <div class="row p-3">
                        <div class="col-sm-6">

                            Adults<input type="number" min="1" value="1" class="form-control"
                                placeholder="Enter Adults" name="person1">
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
                            Baby<input type="number" min="0" value="0" class="form-control"
                                placeholder="Enter Baby" name="person4">
                        </div>
                    </div>

                    <div class="row mt-3 alert alert-secondary">
                        <div style="font-size: 15px" class="col-sm-6">. Adults born before <strong >July 23, 2010
                            </strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Children born from<strong> July 23, 2017 to July
                                23, 2020</strong></div>
                        <div style="font-size: 15px" class="col-sm-6">. Young Children born from<strong> July 23, 2010 to July
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
                                <input type="radio" class="form-check-input" id="radio2" name="payment"
                                    value="card">
                                <label class="form-check-label" for="radio2">Credit Card Payment</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio3" name="payment"
                                    value="transfer">
                                <label class="form-check-label" for="radio3">Transfer Payments</label>
                            </div>
                        </div>
                    </div>

                    <h5><strong class="text-muted"> If you have any notes, please tell us!</strong></h5>
                    <div class="row m-3">
                        <textarea name="" id="" cols="5" rows="5"></textarea>
                    </div>

                    <div class="row mb-3 mt-5">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4"><a href="{{url('user/paymentPost')}}"><button class="btn btn-primary btn-lg"><strong> <small
                                            class="text-primary">----</small> BOOK <small
                                            class="text-primary">----</small> </strong></button></a></div>

                    </div>
                </form>
            </div>
            @endforeach

            @isset($passenger)
            <div class="col-sm-4 ml-3 p-3"
            style="background-color: aliceblue;border:1px solid rgba(0, 0, 0, 0);border-radius:5px">
            <h4 class="text-danger">Trip summary</h4>

            <div class="row mt-5 mb-2">
                <div class="col-sm-3">
                    <a href=""><img width="100px" style="border:1px solid rgba(0, 0, 0, 0);border-radius:3px"
                            src="https://media.travel.com.vn/tour/tfd_220512092523_383290.jpg" alt=""></a>
                </div>
                <div class="col-sm-9">
                    <span style="font-weight: bold">{{$tour_name}}</span>
                </div>
            </div>

            <div class="row mt-5 mb-5">
                <div class="col-sm-5"><span>Passenger</span></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5"> <strong class="badge bg-danger"><span
                            style="font-size: 15px">{{$passenger}}</span></strong> <strong> Passenger </strong></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-5"><span style="font-size: 20px">Adults</span></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5"><strong>{{$person1}} x {{$price1}}.00$</strong></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-5"><span style="font-size: 20px">Children</span></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5"><strong>{{$person2}} x {{$price2}}.00$</strong></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-5"><span style="font-size: 20px">Young</span></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5"><strong>{{$person3}} x {{$price3}}.00$</strong></div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-5"><span style="font-size: 20px">Baby</span></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5"><strong>{{$person4}} x {{$price4}}.00$</strong></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <hr>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-5">
                    <h4><strong>AMOUNT</strong></h4>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <h3><strong class="text-danger">{{$amount}}.00$</strong></h3>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <h3 style="text-align: center" class="alert alert-success">BOOKING SUCCSESS!!!</h3>
                </div>
                <div class="col-sm-1"></div>
            </div>

        </div>
            @endisset

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
    alert("All communication must be filled out");
    return false;
  }
}
</script>
@endsection
