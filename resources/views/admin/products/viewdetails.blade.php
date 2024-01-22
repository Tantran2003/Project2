@extends ('admin.layout_admin')
@section ('content')


<div class="container-fluid iq-container  content-inner  py-5">
      <div class="row">
@foreach($viewproducts as $item)
    <div>

        <h2>{{ $item->name }}</h2> 
        
  
        <p class="mt-2"><b>Tiêu đề: <br> </b>{{ $item->desc }}</p>
        <p><b>Lịch trình:</b> {!! $item->content !!}</p>
        <div class="col-12">
    <div class="row">
        <div class="col-6">
            <p><b>Giá:</b> {{ $item->price }}</p>
            <p><b>Giá người lớn:</b> {{ $item->price1 }}</p>
            <p><b>Giá trẻ em: </b>{{ $item->price2 }}</p>
            <p><b>Giá trẻ nhỏ:</b> {{ $item->price3 }}</p>
        </div>
        <div class="col-6">
            <p><b>Danh mục:</b>  {{ $item->category->name }}</p>
            <p><b>Điểm đi:</b> {{ $item->departurelocation }}</p>
            <p><b>Điểm đến:</b> {{ $item->arrivallocation }}</p>
            <p><b>Ngày đi:</b> {{ $item->keyword }}</p>
            <p><b>Phương tiện:</b> {{ $item->vehicle }}</p>
        </div>
    </div>
</div>

        <p><b>Hình chính</b> <img src="{{ asset('public/file/img/img_product/' . $item->image) }}" alt="Hình ảnh sản phẩm" width="100" height="100">
  <b>Hình chi tiết </b>   @foreach(json_decode($item->images, true) as $image)
       <img src="{{ asset('public/file/img/img_product/' . $image) }}"  alt="Hình ảnh sản phẩm"  width="100" height="100">
        @endforeach</p>
        <!-- Hiển thị các trường khác tùy thuộc vào cấu trúc của bảng products -->

      
    </div>
<a href="{{route('ht.productsupdate',$item['id'])}}" class="btn btn-primary ">Cập nhật</a>

@endforeach
</div>
</div>

@endsection