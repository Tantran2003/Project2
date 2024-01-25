@extends('interface.layout_interface')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
    <div class="row justify-content-center py-5">
    <img class="img-fluid" src="{{ asset('public/file/img/img_blog/'.$blogDetail->image) }}" alt="Blog Image">
        </div>
        <div class="d-flex justify-content-center py-5">
            <h1><strong>{{$blogDetail -> title}}</strong></h1>
        </div>
        <div>
          <div style="white-space: pre;text-wrap:wrap;">
          {!! $blogDetail->description !!}
        </div>
    </div>
</div>

@endsection