@extends('interface/layout_interface')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @include('partial.successMessage')

            <div class="card my-5 mx-4">
                <div class="card-header bg-dark">
                    <h3 class="card-title float-left p-0 m-0"><strong>Tour History ({{ $historyList->count() }})</strong></h3>
                </div>
                <!-- card-header -->
                @if ($historyList->count() > 0)
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableId" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Departure location</th>
                                    <th>Arrival location</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Vehicle</th>
                                    <th>Duration</th>
                                    <th>Tour Code</th>
                                    <th>Adults</th>
                                    <th>Children</th>
                                    <th>Babies</th>
                                    <th>Adults price</th>
                                    <th>Children price</th>
                                    <th>Babies price</th>
                                    <th>Total price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historyList as $booking)
                                <tr>
                                    <td>{{ $booking-> fullname}}</td>
                                    <td>{{ $booking-> email}}</td>
                                    <td>{{ $booking-> phone}}</td>
                                    <td>{{ $booking-> address}}</td>
                                    <td>{{ $booking-> departurelocation}}</td>
                                    <td>{{ $booking-> arrivallocation}}</td>
                                    
                                    <td>{{ $booking->date_start }}</td>
                                    <td>{{ $booking->date_end }}</td>
                                    <td>{{ $booking->vehicle }}</td>
                                    <td>{{ $booking->tour_code }}</td>
                                    <td>{{ $booking->person1 }}</td>
                                    <td>{{ $booking->person2 }}</td>
                                    <td>{{ $booking->person3 }}</td>
                                    <td>{{ $booking->price1 }}</td>
                                    <td>{{ $booking->price2 }}</td>
                                    <td>{{ $booking->price3 }}</td>
                                    <td>{{ $booking->total_price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <h2 class="text-center text-info font-weight-bold m-3">No Tour History Found</h2>
                @endif

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div><!-- /.container -->
@endsection
