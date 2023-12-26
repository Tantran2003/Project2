@extends ('admin.layout_admin')
@section ('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-dark">Category</h2>
                        <small class="text-dark">System<a class="text-primary" href="">/Category</a></small>

                    </div>
                    <div>
                        <a href="{{route('ht.categorieadd')}}" class="btn btn-link btn-soft-light bg-primary ">
                        Add cate
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
                        <h4 class="card-title">Category</h4>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                            <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Keyword</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                            </thead>
                            <tbody>
                    <?php     
   foreach ($categorie as $value){  
    ?>


                    <tr>
                        <td scope="row">{{ $value["id"]}}</td>
                        <td>{{ $value["name"]}}</td>
                        <td>{{ $value["keyword"]}}</td>
                        <td>{{ $value["desc"]}}</td>
                        <td>
                            <img width="100" height="100" src="{{asset('public/file/img/img_category/'.$value->image)}}" alt="">
                        </td>
                        <td>{{ $value["level"]}}</td>
                        <td>
                            @if($value->status == 1)
                            <span style="font-weight:bold;  border: 2px solid #0f994b; padding: 2px 5px; color: #0f994b;">Active</span>
                            @else
                            <span style="font-weight:bold;  border: 2px solid #df2a3c; padding: 2px 5px; color: #df2a3c;">Deactivate </span>
                            @endif

                        </td>
                        <td>
                            <a href="{{route('ht.categorieupdate',$value['id'])}}" class="btn "><i
                                    class="fa-regular fa-pen-to-square" style="color: green;"></i></a>
                            <a href="{{route('ht.categoriedelete',$value['id'])}}" class="btn "><i
                                    class="fa-regular fa-trash-can" style="color: red;"></i></a>
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
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection