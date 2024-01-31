@extends('interface.layout_interface')

@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 pt-5 mt-5">
            <h1 class="text-center">Profile</h1>
            <div class="card">
                <div class="card-body">
                    <div class="form-group d-flex">
                        <label class="fw-bold" for="email">Email:</label>&nbsp;
                        <p class="form-control-static">{{ $user->email }}</p>
                    </div>
                    <div class="form-group d-flex">
                        <label class="fw-bold" for="fullname">Tên:</label>&nbsp;
                        <p class="form-control-static">{{ $user->fullname }}</p>
                    </div>
                    <div class="form-group d-flex">
                        <label class="fw-bold" for="address">Địa chỉ:</label>&nbsp;
                        <p class="form-control-static">{{ $user->address }}</p>
                    </div>
                    <div class="form-group d-flex">
                        <label class="fw-bold" for="phone">Số điện thoại:</label>&nbsp;
                        <p class="form-control-static">{{ $user->phone }}</p>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('gd.editprofile.form') }}" class="btn btn-primary">Chỉnh sửa thông tin</a>
                        <a href="{{ route('gd.history_order') }}" class="btn btn-primary">Lịch sử đặt hàng</a>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection