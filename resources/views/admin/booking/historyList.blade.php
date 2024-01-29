@extends ('admin.layout_admin')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partial.successMessage')

            <div class="card my-5 mx-4">
                <div class="card-header bg-white">
                    <h3 class="card-title float-left p-0 m-0"><strong>Booking details ({{ $booking->count() }})</strong>
                    </h3>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>

                                @foreach ($booking as $order)
                                <th scope="col">Tourist name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Departure location</th>
                                <th scope="col">Arrival Location</th>
                                <th style="width: 100px;" scope="col">Departure date</th>
                                <th style="width: 100px;" scope="col">Leave date</th>
                                <th scope="col">Transportation</th>
                                <th scope="col">Duration</th>

                            </thead>
                            <tr>

                                <td>{{ $order->fullname }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{$order->address}}</td>
                                <td>{{ $order->departurelocation }}</td>
                                <td>{{ $order->arrivallocation }}</td>
                                <td>{{ date('d-m-Y H:i',
                                    strtotime($order->date_start)) }}</td>
                                <td>{{ date('d-m-Y ',
                                    strtotime($order->date_end)) }}</td>
                                <td>{{ $order->vehicle }}</td>
                                <td>{{$order->keyword}}</td>    
                            </tr>
                            </thead>
                            <tr class="thead-dark">
                                <th scope="col">Adults</th>
                                <th scope="col">Children</th>
                                <th scope="col">Babies</th>
                                <th scope="col">Price per adult(VND)</th>
                                <th scope="col">Price per child(VND)</th>
                                <th scope="col">Price per baby(VND)</th>
                                <th scope="col">Tour(VND)</th>
                                <th scope="col">Tour code</th>
                                </thead>
                                <tbody>
                            </tr>
                            <tr>
                                <td>{{ $order->person1 }}</td>
                                <td>{{ $order->person2 }}</td>
                                <td>{{ $order->person3 }}</td>
                                <td>{{ $order->price1 }}</td>
                                <td>{{ $order->price2 }} </td>
                                <td>{{ $order->price3 }}</td>
                                <td>{{ $order->price0}}</td>
                                <td>{{ $order->tour_code }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div><!-- /.container -->
@endsection