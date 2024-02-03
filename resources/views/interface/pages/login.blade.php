@extends ('interface/layout_interface')
@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<style>
    .session-message {
        font-family: 'YourFont', sans-serif; /* Change 'YourFont' to the desired font-family */
        font-size: 16px; /* Adjust the font size as needed */
        color: #ffffff; /* Adjust the font color */
        background-color: #007bff; /* Adjust the background color */
        /* Add any other styling properties you want */
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        align: center;
    }
</style>
@if (session('failed_to_process'))
    <div class="session-message" >
        {{ session('failed_to_process') }}
    </div>
@endif
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


<section class="vh-100" style="margin:100px 0 10px 0;" style="">
<div class="d-flex justify-content-center align-items-center pb-4"><h1 class="font-weight-bold">Đăng nhập</h1></div>
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        
      <div class="col-md-9 col-lg-6 col-xl-5" style=" box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 15px;">
        <img src="{{asset('public/interface')}}/img/login.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="form-login  col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{route('gd.login')}}" method="post">
        @csrf
          

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Email" value="{{old('email')}}" />
              {!!$errors->first('email','<div class="has-error text-danger">:message</div>')!!}
      
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Mật khẩu" />
              {!!$errors->first('password','<div class="has-error text-danger">:message</div>')!!}

          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0 d-flex align-items-center">
              <input name="remember" class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
              Nhớ mật khẩu
              </label>
            </div>
            <a href="{{route('gd.forget')}}" class="text-body">Quên mật khẩu?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản?<a href="{{route('gd.register')}}"
                class="link-danger">Đăng ký</a></p>
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

