@extends ('interface/layout_interface')
@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


<section class="vh-100" style="margin:100px 0 10px 0;" style="">
  <div class="d-flex justify-content-center align-items-center pb-4">
    <h1 class="font-weight-bold">Đăng nhập</h1>
  </div>
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-md-9 col-lg-6 col-xl-5" style=" box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 15px;">
        <img src="{{asset('public/interface')}}/img/login.jpg" class="img-fluid" alt="Sample image">
      </div>
      <div class="form-login  col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{ route('gd.storetourbooking', ['id' => $product->id]) }}" method="get">
          @csrf
          <div class="form-group">
            <select name="guide" class="form-control">
              <option value="">select any guide</option>

              @foreach ($guides as $guide)
              <option value="{{ $guide->id }}">{{ $guide->name }}</option>
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

          <input type="text" name="date" id="date" class="form-control" value="{{ old('date', $date_start) }}">
<input type="hidden" name="package_id" value="{{ $product->id }}">
<input type="hidden" name="package_name" value="{{ $product->name }}">
<input type="hidden" name="package_price" value="{{ $product->price }}">
<input type="hidden" name="day" value="{{ $product->day }}">


          <div class="form-group">
            <button type="submit" class="btn btn-success ">Submit</button>
            <a href="{{ route('gd.home') }}" class="btn btn-danger">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>





<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection