@extends ('admin.layout_admin')
@section ('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<!-- <div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <divs class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-dark">Tài khoản</h2>
                        <small class="text-dark">Hệ thống<a class="text-primary" href="">/Tài khoản</a></small>

                    </div>
                    <div>
                        <a href="{{route('ht.accountadd')}}" class="btn btn-link btn-soft-light bg-primary ">
                            Tạo mới
                        </a>
                    </div>
                </div>
            </div>
        </divs>
    </div>
    <div class="iq-header-img">
        <img src="{{asset('public')}}/webadmin/assets/images/dashboard/top-header.png" alt="header"
            class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
   
    </div>
</div> Nav Header Component End -->
<!--Nav End-->
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0 " >
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
                        <table id="datatable" class="table " data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php     
   foreach ($blogList as $value){  
    ?>


                                <tr>
                                    <td scope="row"><img class="img-fluid" style="height: 100px;" src="{{ asset('public/file/img/img_blog/'.$value->image) }}" alt="Blog Image"></td>
                                    <td>{{ $value["title"]}}</td>
                                    <td style="width:150px;">
                                        <a href="{{route('blog.update',$value['id'])}}" class="btn "><i
                                                class="fa-regular fa-pen-to-square" style="color: green;"></i></a>
                                        <a href="{{route('blog.destroy',$value)}}" class="btn "
                                            onclick="confirmation(event)"><i class="fa-regular fa-trash-can"
                                                style="color: red;"></i></a>
                                    </td>
                                </tr>
                                <?php  }?>
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
        console.log(urlToRedirect);

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