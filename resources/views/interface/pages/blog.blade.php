@extends('interface.layout_interface')

@section('content')
<div class="container-xxl py-5">

    <div class="container">
        <div class="row justify-content-center py-5">
            <h1><strong>Blogs</strong></h1>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($blog as $item)
            <!-- <div>
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->content }}</p>
                @if($item->image)
                <img src="{{ asset($item->image) }}" alt="Blog Image" style="width: 200px;">
                @endif
            </div>
            <hr> -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="package-item">
                    <div class="overflow-hidden" style="height: 300px;object-fit:cover">
                        <img class="img-fluid" style="min-height:300px;" src="{{ asset('public/file/img/img_blog/'.$item->image) }}" alt="Blog Image">
                    </div>
                    <div class="text-center p-4">
                        <h3 class="mb-0">{{ $item->title }}</h3>
                        <div style="text-overflow: ellipsis;overflow:hidden;white-space:nowrap;-webkit-line-clamp: 1;-webkit-box-orient: vertical;display: -webkit-box; ">{!!$item->description!!}</div>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="{{route('blog.detail', $item->id)}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection