@extends ('admin/layout_admin')
@section ('content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Update tour</h1>
    </ol>

    <form action="{{route('ht.productsupdate',$load->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tên</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name"
                    value="{{old('name',isset($load ->name)?$load ->name:null)}}">
                {!!$errors->first('name','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
       
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="desc" value="{{old('desc',isset($load ->desc)?$load ->desc:null)}}">
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
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hình ảnh *</label>
            <div class="col-sm-5">
                <input type="file" class="form-control"  multiple="multiple" name="images[]">
                {!!$errors->first('images.*','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Giá</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"
                    value="{{old('price',isset($load ->price)?$load ->price:null)}}" name="price">
                {!!$errors->first('price','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Danh mục</label>
            <div class="col-sm-5">
                <select class="form-control" name="idcat" id="">
                    @foreach($cate as $value)
                    <option value="{{$value->id}}" <?php  if($value->id==$load->id){echo"selected";} ?>>{{$value->name}}</option>
                    @endforeach

                </select>
                {!!$errors->first('idcat','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nội dung</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>{!!isset($load)? $load->content:null!!}
                <script>   CKEDITOR.replace('content');</script>
               

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Ngày đi</label>
            <div class="col-sm-5">
                <input type="datetime-local" class="form-control"
                    value="{{old('departuredate',isset($load ->departuredate)?$load ->departuredate:null)}}"
                    name="departuredate" min="{{ now()->format('Y-m-d\TH:i') }}">
                {!!$errors->first('departuredate','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Thời gian đi</label>                        
            <div class="col-sm-5">
            <select class="form-select" name="keyword"
            <option value=" {{old('keyword',isset($load ->keyword)?$load ->keyword:null)}}">Chọn thời gian đi</option> 
            <option value="2 Ngày 1 Đêm" >2 Ngày 1 Đêm</option>
            <option value="3 Ngày 2 Đêm">3 Ngày 2 Đêm</option> 
            <option value="4 Ngày 3 Đêm">4 Ngày 3 Đêm</option>   
            <option value="6 Ngày 5 Đêm">6 Ngày 5 Đêm</option>

                </select>
                {!!$errors->first('keyword','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Điểm khởi hành</label>
            <div class="col-sm-5">
                <select class="form-select" name="departurelocation"
                <option  value="{{old('departurelocation',isset($load ->departurelocation)?$load ->departurelocation:null)}}">Chọn điểm khởi hành</option> 
                <option value="TP. Hồ Chí Minh" {{ old('departurelocation') == 'TP. Hồ Chí Minh' ? 'selected' : '' }}>TP.Hồ Chí Minh</option>
            <option value="Hà Nội" {{ old('departurelocation') == 'Hà Nội' ? 'selected' : '' }}>Hà Nội</option>
            </select>
                {!!$errors->first('departurelocation','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
<!-- 
        <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Điểm khởi hành</label>
    <div class="col-sm-5">
        <select class="form-select" name="departurelocation">
            <option value="">Chọn điểm khởi hành</option>
            <option value="location1" {{ old('departurelocation') == 'location1' ? 'selected' : '' }}>Điểm khởi hành 1</option>
            <option value="location2" {{ old('departurelocation') == 'location2' ? 'selected' : '' }}>Điểm khởi hành 2</option>
           
        </select>
        {!!$errors->first('departurelocation','<div class="has-error text-danger">:message</div>')!!}
    </div>
</div> -->


        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Status</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" <?php if($load-> status==1){echo "checked";}else{echo"";} ?>  value=1>
                <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" <?php if($load-> status==0){echo "checked";}else{echo"";} ?> value=0>
                <label class="form-check-label">Deactivate</label>
            </div>

        </div>

<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5 ">
        <button class="btn btn-success" type="submit" href="" role="button">Update</button>
        <a class="btn btn-secondary" href="{{route('ht.products')}}" role="button">Back</a>

    </div>
</div>
</form>
</div>
@endsection