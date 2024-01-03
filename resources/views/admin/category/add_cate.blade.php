@extends ('admin.layout_admin')
@section ('content')
<div class="container-fluid px-4 mt-4">
    <ol class="breadcrumb mb-4">
        <h3 class="breadcrumb-item active">Add Category</h3>
    </ol>

    <form action="{{route('ht.addtourmonthlist')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old('name')}}" name="name">
                {!!$errors->first('name','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Keyword</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old('keyword')}}" name="keyword">
                {!!$errors->first('keyword','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Language</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old('language')}}" name="language">
                {!!$errors->first('language','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>
        <!-- <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="image">
                {!!$errors->first('image','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div> -->
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old('level')}}" name="level">
                {!!$errors->first('level','<div class="has-error text-danger">:message</div>')!!}

            </div>
        </div>
        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Status</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" checked value=1>
                <label class="form-check-label">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value=2>
                <label class="form-check-label">Deactivate</label>
            </div>

        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5 ">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> ADD</button>
            <a href="{{route('ht.tourmonthlist')}}" class="btn btn-sm btn-primary"> <i
                        class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>
</div>
@endsection