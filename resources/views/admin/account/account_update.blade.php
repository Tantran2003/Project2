@extends ('admin.layout_admin')
@section ('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<div class="container-fluid px-4 mt-4">
<div class="row justify-content-center">
        <div class="col-sm-10">
            <div style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin: 0 auto;">
    <ol class="breadcrumb mb-4">
        <h3 class="breadcrumb-item active">Cập nhật tài khoản</h3>
    </ol>

    <form action="{{route('ht.accountupdate',$display->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="fullname"  value="{{old('fullname',isset($display ->fullname)?$display ->fullname:null)}}">
                {!!$errors->first('fullname','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"   value="{{old('email',isset($display ->email)?$display ->email:null)}}" name="email" readonly>
                {!!$errors->first('email','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Số điện thoại</label>
            <div class="col-sm-5">
                <input type="number" class="form-control"   value="{{old('phone',isset($display ->phone)?$display ->phone:null)}}" name="phone">
                {!!$errors->first('phone','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"   value="{{old('address',isset($display ->address)?$display ->address:null)}}" name="address" >
                {!!$errors->first('address','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Vai trò</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="role" {{$display->role==1?"checked":""}} value=
                "1">
                <label class="form-check-label">Quản trị viên</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" {{$display->role==0?"checked":""}} value=
                "0">
                <label class="form-check-label">Người dùng</label>
            </div>

        </div>
        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" {{$display->status==1?"checked":""}} value=
                "1">
                <label class="form-check-label">Hoạt động</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" {{$display->status==2?"checked":""}} value=
                "2">
                <label class="form-check-label">Khóa</label>
            </div>

        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5 ">
                <button class="btn btn-success" type="submit" href="" role="button"><i class="fa fa-floppy-disk"></i>&nbsp;Lưu</button>
                <a class="btn btn-secondary" href="{{route('ht.account')}}" role="button">Quay lại</a>

            </div>
        </div>
    </form>
    </div>
    </div>
</div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection