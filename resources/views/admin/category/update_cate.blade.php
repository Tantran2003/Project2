@extends ('admin.layout_admin')
@section ('content')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Edit</h1>
    </ol>

    <form action="{{route('ht.categorieupdate',$display->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"
                    value="{{old('name',isset($display ->name)?$display ->name:null)}}" name="name">
                {!!$errors->first('name','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Keyword</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"
                    value="{{old('keyword',isset($display ->keyword)?$display ->keyword:null)}}" name="keyword">
                {!!$errors->first('keyword','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"
                    value="{{old('desc',isset($display ->desc)?$display ->desc:null)}}" name="desc">
                {!!$errors->first('desc','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control"
                    value="{{old('image',isset($load ->image)?$load ->image:null)}}" name="image">
                {!!$errors->first('image','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
        
        <div class="mb-3">
            <label for="" class="col-sm-2 col-form-label">Status</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" {{$display->status==1?"checked":""}} value=
                "1">
                <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" {{$display->status==2?"checked":""}}
                value="2">
                <label class="form-check-label">Deactivate</label>
            </div>

        </div>

<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5 ">
        <button class="btn btn-success" type="submit" href="" role="button">Update</button>
        <a class="btn btn-secondary" href="{{route('ht.categorie')}}" role="button">Back</a>
    </div>
</div>
</form>
</div>
@endsection