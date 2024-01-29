@extends ('admin.layout_admin')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                <div class="card-header bg-white">
                    <h3 class="card-title float-left p-0 m-0"><strong>Tour History ({{ $booking->count() }})</strong></h3>
                </div>
                <!-- card-header -->
                @if ($booking->count() > 0)
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
                                @foreach ($booking as $value)
                                <tr>
                                    <td>{{ $value-> fullname}}</td>
                                    <td>{{ $value-> email}}</td>
                                    <td>{{ $value-> phone}}</td>
                                    <td>{{ $value-> address}}</td>
                                    <td>{{ $value-> departurelocation}}</td>
                                    <td>{{ $value-> arrivallocation}}</td>
                                    
                                    <td>{{ $value->date_start }}</td>
                                    <td>{{ $value->date_end }}</td>
                                    <td>{{ $value->vehicle }}</td>
                                    <td>{{ $value->tour_code }}</td>
                                    <td>{{ $value->person1 }}</td>
                                    <td>{{ $value->person2 }}</td>
                                    <td>{{ $value->person3 }}</td>
                                    <td>{{ $value->price1 }}</td>
                                    <td>{{ $value->price2 }}</td>
                                    <td>{{ $value->price3 }}</td>
                                    <td>{{ $value->total_price }}</td>
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