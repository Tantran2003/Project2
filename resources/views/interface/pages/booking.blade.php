@extends('interface/layout_interface')
@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<?php 
if(Session::get("booking")){
?>
<section class="vh-100" style="margin:100px 0 10px 0;">
  <div class="d-flex justify-content-center align-items-center pb-4">
    <h1 class="font-weight-bold">Đăng nhập</h1>
  </div>
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-md-9 col-lg-6 col-xl-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 15px;">
        <img src="{{asset('public/interface')}}/img/login.jpg" class="img-fluid" alt="Sample image">
      </div>
      <div class="form-login  col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <!-- <form action="{{ route('gd.storetourbooking', ['id' => $product->id]) }}" method="post">
          @csrf
          
           Hidden Inputs for Package Information -->
          <!-- <input type="hidden" name="package_id" value="{{ $product->id }}">
          <input type="hidden" name="package_name" value="{{ $product->name }}">
          <input type="hidden" name="package_price" value="{{ $product->price }}"> --> -->

          <div class="form-group">
            <select name="guide" class="form-control">
              <option value="">select any guide</option>
              @foreach ($guides as $guide)
              <option value="{{ $guide->id }}">{{$guide->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="date">Select a date</label>
            @php
            $date_start = $schedule ? $schedule->date_start : null;
            @endphp
            <input type="text" name="date" id="date" class="form-control" value="{{ old('date', $date_start) }}">
          </div>
          <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Tour</th>
                            <th>Children</th>
                            <th>Young Children</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>Young Children</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        <?php
                            $Subtotal=0; $total=0;
                                
                        {?>
                        
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">{{$item['name']}}</td>
                            <td class="align-middle">${{$item['price']}}</td>
                            <td class="align-middle">${{$item['price1']}}</td>
                            <td class="align-middle">${{$item['price2']}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <label for="">Adults</label>
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center" 
                                    value="{{$item['amount']}}"name="quantity" data-id="{{$item['id']}}" onchange="updatebooking(this)">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <label for="">Children</label>
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center" 
                                    value="{{$item['amount1']}}"name="quantity" data-id="{{$item['id']}}" onchange="updatebooking(this)">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <label for="">Babies</label>
                                    <input type="number" class="form-control form-control-sm bg-secondary text-center" 
                                    value="{{$item['amount2']}}"name="quantity" data-id="{{$item['id']}}" onchange="updatebooking(this)">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">${{$item['price']*$item['amount']}}</td>
                            <td class="align-middle"><a href="{{route('gd.delcart',$item['id'])}}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>

                        <?php 
                            $Subtotal=$Subtotal+$item['amount']*$item['price'];
                        } ?>
                    </tbody>
                </table>
          <!-- Display card with data from the Products model -->
          <div class="card mb-3">
            <div class="card-header">
              Product Information
            </div>
            <div class="rounded-image custom-image-container card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="height: 100%;">
            </div>

            <div class="card-body">
              @foreach($product->getAttributes() as $key => $value)
              @if($key !== 'status' && $key !== 'idcat'&& $key !== 'id'&& $key !== 'images'&& $key !== 'image' && $key
              !== 'desc'&& $key !== 'content')
              <div class="row mb-2">
                <div class="col-md-3"><strong>{{ ucfirst($key) }}:</strong></div>
                <div class="col-md-9">{{ $value }}</div>
              </div>
              @endif
              @endforeach
            </div>
          </div>

          <div class="col-lg-4">
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-header">
                        Guide Information
                    </div>
                    <div class="card-body">
                      <!-- Add guide information here based on your Guide model -->
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{$Subtotal}}</h6>
                        </div>
                        
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{$Subtotal}}</h5>
                        </div>
                        <a href="{{route('gd.checkout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>

        <!-- </form> -->
      </div>
    </div>
  </div>
</section>
<?php }else{
        echo "<p align='center'>Choose a tour</p>";
    } 
?>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection
@pushOnce('scripts')
    <script>
        function updatebooking(row){
            var id=$(row).data('id');
            var amount=$(row).val();
            $.ajax({
                url: "{{route('gd.addbooking',['product_id' => ':product_id', 'schedule_id' => ':schedule_id'])}}"
                .replace(':product_id', product_id)
                .replace(':schedule_id', schedule_id),
                type:'post',
                data: { 
                    'id':id,
                    'amount': amount,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(message){
                    if(message){
                        location.reload();
                    }else{
                        alert("update cart failed!");
                        location.reload();
                    }
                }
            });
        }
    </script>
@endPushOnce
