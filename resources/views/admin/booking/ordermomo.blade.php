@extends ('admin.layout_admin')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

              	@include('partial.successMessage')

                <div class="card my-5 mx-4">
                <div class="card-header bg-white">
                    <h3 class="card-title float-left p-0 m-0"><strong>Momo payment ({{ $booking->count() }})</strong></h3>
                </div>
                <!-- card-header -->
                @if ($booking->count() > 0)
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableId" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Partner_code</th>
                                    <th>order_id</th>
                                    <th>amount</th>
                                    <th>order_info</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $value)
                                <tr>
                                    <td>{{ $value-> partner_code}}</td>
                                    <td>{{ $value-> order_id}}</td>
                                    <td>{{ number_format($value['amount'], 0, ',', '.') }} VNĐ</td>
                                    <td>{{ $value-> order_info}}</td>
                                    <td>{{ $value-> created_at}}</td>
                                    <td>{{ $value-> updated_at}}</td>
                                    <td class="td-table">
                                    
                                    <a href="{{route('ht.ordermomodel',$value['id'])}}" class="btn" onclick="confirmation(event)"><i
                                            class="fa-regular fa-trash-can" style="color: red;" ></i></a>
                                    <a href="{{route('ht.ordermomodetail',$value['id'])}}" class="btn "> <i class="fa-solid fa-eye" style="color: #1663e9;"></i></a>

                           </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <h2 class="text-center text-info font-weight-bold m-3">No payment Found</h2>
                @endif

                <!-- /.card-body -->
            </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->
 @endsection