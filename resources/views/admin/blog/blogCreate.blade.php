

@extends ('admin.layout_admin')
@section ('content')
<div class="container-fluid px-4 mt-4">
<div class="row justify-content-center">
        <div class="col-sm-10">
            <div style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin: 0 auto;">
    <ol class="breadcrumb mb-4">
        <h3 class="breadcrumb-item active">Tạo Blog</h3>
    </ol>

    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Tiêu đề</label>
            <div class="col-sm-5 p-0">
                <input type="text" class="form-control" value="{{old('title')}}" name="title" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
            
            <textarea required class="form-control" value="{{old('description')}}" name="description" id="description"
                                cols="30" rows="10"></textarea>
                            <script>   CKEDITOR.replace('description');</script>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Hình ảnh</label>
            <div class="col-sm-5 p-0">
                <input required type="file" class="form-control" name="image" >
            </div>
        </div>
<!--         
        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" checked value=1>
                <label class="form-check-label">Mở</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value=2>
                <label class="form-check-label">Khóa</label>
            </div>
        </div> -->

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5 ">
                <button class="btn btn-success" type="submit" role="button"><i class="fa fa-floppy-disk"></i>&nbsp;Tạo</button>
                <a class="btn btn-secondary" href="{{route('blog.admin.index')}}" role="button">Quay lại</a>
            </div>
        </div>
    </form>
    </div>
        </div>
   
</div>
</div>
@endsection