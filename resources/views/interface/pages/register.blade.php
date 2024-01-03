@extends ('interface/layout_interface')
@section('content')

<section class="vh-100" style="margin:100px 0;">
<div class="d-flex justify-content-center align-items-center pb-4"><h1 class="font-weight-bold">Đăng Ký</h1></div>

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 15px 15px;">
        <img src="{{asset('public/interface')}}/img/login.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class=" form-register col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{route('gd.register')}}" method="POST">
        @csrf
          <div class="form-outline mb-4">
            <input name="fullname" type="text" id="form3Example3" value="{{old('fullname')}}"  class="form-control form-control-lg"
              placeholder="Họ và tên" />
              {!!$errors->first('fullname','<div class="has-error text-danger">:message</div>')!!}

          </div>

 
          <div class="form-outline mb-4">
            <input name="email" type="email" id="form3Example3" value="{{old('email')}}" class="form-control form-control-lg"
              placeholder="Email " />
              {!!$errors->first('email','<div class="has-error text-danger">:message</div>')!!}

        </div>

          <div class="form-outline mb-3">
            <input name="address" type="text" id="form3Example4" value="{{old('address')}}" class="form-control form-control-lg"
              placeholder="Địa chỉ" />
              {!!$errors->first('address','<div class="has-error text-danger">:message</div>')!!}

          </div>

          <div class="form-outline mb-3">
            <input name="phone" type="number" id="form3Example4" value="{{old('phone')}}" class="form-control form-control-lg"
              placeholder="Số điện thoại" />
              {!!$errors->first('phone','<div class="has-error text-danger">:message</div>')!!}

          </div>

          <div class="form-outline mb-3">
            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Mật khẩu" />
              {!!$errors->first('password','<div class="has-error text-danger">:message</div>')!!}

          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng ký</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản <a href="{{route('gd.login')}}"
                class="link-danger">Đăng nhập</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
 
@endsection