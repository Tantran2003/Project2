@extends('interface.layout_interface')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 pt-5 mt-5">
                <h1 class="text-center">Chỉnh sửa Profile</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('gd.editprofile') }}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label class="fw-bold form-label" for="fullname">Tên:</label>&nbsp;
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                       value="{{$user->fullname}}">
                            </div>
                            <div class="form-group mt-2 ">
                                <label class="fw-bold form-label" for="address">Địa chỉ:</label>&nbsp;
                                <input type="text" class="form-control" name="address" id="address"
                                       value="{{$user->address}}">
                            </div>
                            <div class="form-group mt-2 ">
                                <label class="fw-bold" for="phone">Số điện thoại:</label>&nbsp;
                                <input type="text" class="form-control" name="phone" id="phone"
                                       value="{{ $user->phone }}">
                            </div>
                           
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">Cập nhật Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
