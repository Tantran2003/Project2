@extends('admin.layout_admin')
@section('content')
<div class="container-fluid px-4 mt-4">
    <ol class="breadcrumb mb-4">
        <h3 class="breadcrumb-item active">Tạo mới lịch trình</h3>
    </ol>

    <form action="{{route('ht.scheduleadd')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
           
                <label for="inputPassword" class="col-sm-2 col-form-label">Tour</label>
                <div class="col-sm-5   ">
                <select class="form-control form-select" aria-label="Default select example" name="tour_id" id="">
                    @foreach($schedule as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                </div>

            </div>
        <!-- Datetime 1 -->
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Ngày đi</label>
            <div class="col-sm-5">
                <input type="datetime-local" class="form-control" value="{{old('date_start')}}" name="date_start"   min="{{ now()->format('Y-m-d\TH:i') }}">
                {!!$errors->first('date_start','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>

        <!-- Datetime 2 -->
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Ngày về</label>
            <div class="col-sm-5">
                <input type="datetime-local" class="form-control" value="{{old('date_end')}}" name="date_end"    min="{{ now()->format('Y-m-d\TH:i') }}">
                {!!$errors->first('date_end','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>

        <!-- Normal Text Input -->
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mã tour</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" value="{{old('tour_code')}}" name="tour_code">
                {!!$errors->first('tour_code','<div class="has-error text-danger">:message</div>')!!}
            </div>
        </div>

        <div class="mb-3  ">
            <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="status" checked value=1>
                <label class="form-check-label">Mở </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value=2>
                <label class="form-check-label">Khóa</label>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5 ">
                <button class="btn btn-success" type="submit" href="" role="button">Add</button>
                <a class="btn btn-secondary" href="{{route('ht.categorie')}}" role="button">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
