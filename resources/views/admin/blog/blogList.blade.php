@extends ('admin.layout_admin')
@section ('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0 ">
    <div class="row">
        <div class="col-sm-12" style="padding-top:100px;">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Blogs</h4>
                    </div>
                    <div>
                        <a href="{{route('blog.create')}}" class="btn btn-link btn-soft-light bg-primary text-white ">
                            Tạo mới
                        </a>
                    </div>
                </div>
                <div class="card-body">

                <div class="table-responsive">
    <table id="datatable" class="table" data-toggle="data-table">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogList as $value)
            <tr>
                <td scope="row">
                    <div class="d-flex align-items-center">
                        <img class="img-fluid" style=" height:100px;width:200px; object-fit: cover;" src="{{ asset('public/file/img/img_blog/'.$value->image) }}" alt="Hình ảnh Blog">
                    </div>
                </td>
                <td>{{ $value["title"] }}</td>
                <td style="width:150px;">
                    <a href="{{ route('blog.update', $value['id']) }}" class="btn"><i class="fa-regular fa-pen-to-square" style="color: green;"></i></a>
                    <a href="{{ route('blog.destroy', $value) }}" class="btn" onclick="confirmation(event)"><i class="fa-regular fa-trash-can" style="color: red;"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        Swal.fire({
            title: 'Bạn có chắc muốn xóa không?',
            text: 'Dữ liệu sẽ bị mất vĩnh viễn!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#009900',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            customClass: {
                container: 'custom-swal'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection