@extends ('admin.layout_admin')
@section ('content')


<div class="container-fluid iq-container content-inner py-5">
    <div class="row">
        @foreach($viewproducts as $item)
            <div class="col-md-9 mb-4 " style="background-color: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <h2>{{ $item->name }}</h2>
                <p class="mt-2"><b>Tiêu đề: <br> </b>{{ $item->desc }}</p>
                <p><b>Lịch trình:</b> {!! $item->content !!}</p>
                <div class="row">
                    <div class="col-6">
                        <p><b>Giá:</b> {{ $item->price }}</p>
                        <p><b>Giá người lớn:</b> {{ $item->price1 }}</p>
                        <p><b>Giá trẻ em: </b>{{ $item->price2 }}</p>
                        <p><b>Giá trẻ nhỏ:</b> {{ $item->price3 }}</p>
                    </div>
                    <div class="col-6">
                        <p><b>Danh mục:</b> {{ $item->category->name }}</p>
                        <p><b>Điểm đi:</b> {{ $item->departurelocation }}</p>
                        <p><b>Điểm đến:</b> {{ $item->arrivallocation }}</p>
                        <p><b>Ngày đi:</b> {{ $item->keyword }}</p>
                        <p><b>Phương tiện:</b> {{ $item->vehicle }}</p>
                    </div>
                </div>

                <!-- Hiển thị hình ảnh -->
                <p>Hình chính &nbsp; <img src="{{ asset('public/file/img/img_product/' . $item->image) }}" alt="Hình ảnh sản phẩm" width="100" height="100"></p>

                <!-- Hiển thị hình ảnh chi tiết -->
                @if ($item->images)
                    <p>Hình chi tiết @foreach(json_decode($item->images, true) as $image)
                        <img src="{{ asset('public/file/img/img_product/' . $image) }}" alt="Hình ảnh sản phẩm" class="" width="100" height="100">
                    @endforeach</p>
                @else
                    Không có hình ảnh chi tiết cho sản phẩm này</p>
                @endif

               
            </div>
        @endforeach
        <div class="col-md-3 mb-4"  > <a href="{{ route('ht.productsupdate', $item['id']) }}" class="btn btn-primary mt-2">Cập nhật</a>
                <a class="btn btn-secondary mt-2" href="{{ route('ht.products') }}">Quay lại</a></div>
    </div>
</div>


@endsection