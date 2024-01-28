@extends ('admin.layout_admin')
@section ('content')
<div class="container-fluid px-4 mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); margin: 0 auto;">
                <ol class="breadcrumb mb-4">
                    <h3 class="breadcrumb-item active">Cập nhật Blog</h3>
                </ol>

                <form action="{{route('blog.update',$blogDetail->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tiêu đề</label>
                        <div class="col-sm-5 p-0">
                            <input type="text" class="form-control" value="{{old('title',isset($blogDetail ->title)?$blogDetail ->title:null)}}" name="title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả</label>
                        <!-- <input type="text" class="form-control"
                                value="{{old('description',isset($blogDetail ->description) ? $blogDetail -> description : null)}}" name="description"> -->

                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                            {!!isset($blogDetail)? $blogDetail->description:null!!}</textarea>
                        <script>
                            CKEDITOR.replace('description');
                        </script>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Hình ảnh</label>
                        <div class="col-sm-5 p-0">
                            <img id="previewImage" style="width: 100%;height:auto" class="pb-2" src="{{ asset('public/file/img/img_blog/'.$blogDetail->image)}}" alt="">
                            <input type="file" onchange="onUpload(this)" class="form-control" name="image">
                        </div>
                    </div>
                        <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5 ">
                    <button class="btn btn-success" type="submit" href="" role="button"><i class="fa fa-floppy-disk"></i>&nbsp;Cập nhật</button>
                    <a class="btn btn-secondary" href="{{route('blog.admin.index')}}" role="button">Quay lại</a>
                </div>
            </div>
            </div>
            </form>
        </div>
    </div>

</div>
</div>
@endsection

<script type="text/javascript">
    function onUpload(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>