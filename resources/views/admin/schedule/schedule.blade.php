@extends ('admin.layout_admin')
@section ('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<div class="iq-navbar-header" style="height: 215px;">
   <div class="container-fluid iq-container">
      <div class="row">
         <div class="col-md-12">
            <div class="flex-wrap d-flex justify-content-between align-items-center">
               <div>
                  <h2 class="text-dark">Lịch trình</h2>
                  <small class="text-dark">System<a class="text-primary" href="">/Lịch trình</a></small>
               </div>
               <div>
                  <a href="{{route('ht.scheduleadd')}}" class="btn btn-link btn-soft-light bg-primary ">
                     Tạo mới
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="iq-header-img">
      <!-- <img src="{{asset('public')}}/webadmin/assets/images/dashboard/top-header.png" alt="header"
            class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
    -->
   </div>
</div> <!-- Nav Header Component End -->
<!--Nav End-->
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Tour</h4>
               </div>
            </div>
            <div class="card-body">

               <div class="table-responsive">
                  <table id="datatable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Tour</th>
                           <th>Ngày đi</th>
                           <th>Ngày về</th>
                           <th>Mã tour</th>
                           <!-- <th>Trạng thái</th> -->
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php     
    foreach ($schedule as $value){  
      ?>


                        <tr>
                           <td scope="row">{{ $value["id"]}}</td>


                           <!-- dựa vào model mối quan hệ belongto lấy phương thức gọi thẳng tên -->
                           <td scope="row" class="text-break">{{ $value->product->name }}</td>

                           <td style="width:100px;">{{ date('d-m-Y', strtotime( $value["date_start"])) }}</td>

                           <td style="width:100px;">{{ date('d-m-Y', strtotime( $value["date_end"])) }}</td>
                           <td>{{ $value["tour_code"]}}</td>
                           <!-- <td>
                              @if($value->status == 1)
                              <span
                                 style="font-weight:bold; border: 2px solid #0f994b; padding: 2px 5px; color: #0f994b;">Mở</span>
                              @else
                              <span
                                 style="font-weight:bold; border: 2px solid #df2a3c; padding: 2px 5px; color: #df2a3c;">Khóa
                              </span>
                              @endif
                           </td> -->
                           <td style="width: 120px;">
                              <a href="{{route('ht.scheduleupdate',$value['id'])}}" class="btn "><i
                                    class="fa-regular fa-pen-to-square" style="color: green;"></i></a>
                              <a href="{{route('ht.scheduledelete',$value['id'])}}" class="btn"
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
         confirmButtonColor: '#3085d6',
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