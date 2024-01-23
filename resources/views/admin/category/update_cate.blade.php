@extends ('admin.layout_admin')
@section ('content')
<div class="container-fluid px-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin: 0 auto;">
                <ol class="breadcrumb mb-4">
                    <h3 class="breadcrumb-item active">Cập nhật</h3>
                </ol>

                <form action="{{route('ht.categorieupdate',$display->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tên</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"
                                value="{{old('name',isset($display ->name)?$display ->name:null)}}" name="name">
                            {!!$errors->first('name','<div class="has-error text-danger">:message</div>')!!}

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Từ khóa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"
                                value="{{old('keyword',isset($display ->keyword)?$display ->keyword:null)}}"
                                name="keyword">
                            {!!$errors->first('keyword','<div class="has-error text-danger">:message</div>')!!}

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control"
                                value="{{old('desc',isset($display ->desc)?$display ->desc:null)}}" name="desc">
                            {!!$errors->first('desc','<div class="has-error text-danger">:message</div>')!!}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hình ảnh</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control"
                                value="{{old('image',isset($load ->image)?$load ->image:null)}}" name="image">
                            {!!$errors->first('image','<div class="has-error text-danger">:message</div>')!!}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
                        <div class="form-check form-check-inline ">
                            <input class="form-check-input" type="radio" name="status"
                                {{$display->status==1?"checked":""}} value=
                            "1">
                            <label class="form-check-label">Mở</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status"
                                {{$display->status==2?"checked":""}}
                            value="2">
                            <label class="form-check-label">Khóa</label>
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5 ">
                            <button class="btn btn-success" type="submit" href="" role="button"><i
                                    class="fa fa-floppy-disk"></i>&nbsp;Lưu</button>
                            <a class="btn btn-secondary" href="{{route('ht.categorie')}}" role="button">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection