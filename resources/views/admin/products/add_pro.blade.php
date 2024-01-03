@extends ('admin/layout_admin')
@section ('content')
<div class="container-fluid px-4 mt-4">
    <ol class="breadcrumb mb-4">
        <h3 class="breadcrumb-item active">Thêm tour</h3>
    </ol>

    <form action="{{route('ht.productsadd')}}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tên tour</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                {!!$errors->first('name','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
       
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="desc" value="{{old('desc')}}">
                {!!$errors->first('desc','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="image">
                {!!$errors->first('image','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hình ảnh*</label>
            <div class="col-sm-5">
                <input type="file" class="form-control"  multiple="multiple" name="images[]">
                {!!$errors->first('images.*','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Giá</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old('price')}}" name="price">
                {!!$errors->first('price','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Danh mục</label>
            <div class="col-sm-5">
                <select class="form-control form-select" aria-label="Default select example" name="idcat" id="">
                    @foreach($cate as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nội dung</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                <script>   CKEDITOR.replace('content');</script>
                {!!$errors->first('datecreate','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Ngày đi</label>
            <div class="col-sm-5">
                <input type="datetime-local" class="form-control" value="{{old('departuredate')}}" name="departuredate" min="{{ now()->format('Y-m-d\TH:i') }}">
                {!!$errors->first('departuredate','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Thời gian đi</label>
    <div class="col-sm-5">
        <select class="form-select" name="keyword">
             <option value="">Chọn thời gian đi</option>
            <option value="2 Ngày 1 Đêm">2 Ngày 1 Đêm</option>
            <option value="3 Ngày 2 Đêm">3 Ngày 2 Đêm</option>
            <option value="4 Ngày 3 Đêm">4 Ngày 3 Đêm</option>
            <option value="6 Ngày 5 Đêm">6 Ngày 5 Đêm</option>
        </select>
        {!! $errors->first('keyword', '<div class="has-error text-danger">:message</div>') !!}
    </div>
</div>

        <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Điểm khởi hành</label>
    <div class="col-sm-5">
        <select class="form-select" name="departurelocation">
            <option value="">Chọn điểm khởi hành</option>
            <option value="TP. Hồ Chí Minh" {{ old('departurelocation') == 'TP. Hồ Chí Minh' ? 'selected' : '' }}>TP.Hồ Chí Minh</option>
            <option value="Hà Nội" {{ old('departurelocation') == 'Hà Nội' ? 'selected' : '' }}>Hà Nội</option>
            <!-- Thêm các option khác nếu cần -->
        </select>
        {!!$errors->first('departurelocation','<div class="has-error text-danger">:message</div>')!!}
    </div>
</div>

        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" checked value=1>
                <label class="form-check-label">Mở</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value=0>
                <label class="form-check-label">Khóa</label>
            </div>

        </div>


        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5 ">
                <button class="btn btn-success" type="submit" href="" role="button">Thêm</button>
                <a class="btn btn-secondary" href="{{route('ht.products')}}" role="button">Quay lại</a>

            </div>
        </div>
    </form>
</div>
@endsection