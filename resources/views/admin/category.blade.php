<!DOCTYPE html>
<html>

<head>
    @include('admin.link')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.navbar')

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h6 class="m-0 text-dark" style="font-weight: bold;">Category</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">category</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">

                            @if(Session::has('add_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_category') }}
                            </div>
                            @endif

                            @if(Session::has('edit_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_category') }}
                            </div>
                            @endif

                            @if(Session::has('delete_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_category') }}
                            </div>
                            @endif

                            @if(Session::has('status'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('status') }}
                            </div>
                            @endif

                            @if(Session::has('featured'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('featured') }}
                            </div>
                            @endif

                            @if(Session::has('recent'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('recent') }}
                            </div>
                            @endif

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        
                                        <a href="#" id="downloadexcel"  style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="/admin_add_category_show"  style="margin-top:-5px;margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Category</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Categories</th>
                                                <th>Slug</th>
                                                <th>Icon</th>
                                                <th>Recent</th>
                                                <th>Featured</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody> 


                                            @foreach($all_category as $item)                                           
                                            
                                            <tr class="text-center">
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    <img src="{{asset('images/'.$item->image)}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->slug}}</td>
                                                <td><i class="fa {{$item->icon}}"></i></td>
                                                <td>
                                                    @if($item->recent=='Yes')
                                                    <a href="/admin_category_recent/{{$item->id}}" class="btn btn-primary btn-sm">Yes</a>
                                                    @else
                                                    <a href="/admin_category_recent/{{$item->id}}" class="btn btn-warning btn-sm">No</a>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($item->featured=='Yes')
                                                        <a href="/admin_category/featured/{{$item->id}}" class="btn btn-success btn-sm">{{$item->featured}}</a>
                                                    @else
                                                        <a href="/admin_category/featured/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->featured}}</a>
                                                    @endif

                                                </td>

                                                <td>

                                                    @if($item->status=='Active')
                                                        <a href="/admin_category/status/{{$item->id}}" class="btn btn-success btn-sm">{{$item->status}}</a>
                                                    @else
                                                        <a href="/admin_category/status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="/admin_category_edit/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/admin_delete_category/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>


                        </div>

                    </div>
                    <!-- /.row -->





                </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->


        </div>

        


    </div>
    <!-- ./wrapper -->

    @include('admin.script')

    <!---Imge Script-->

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!--pdf script--->
    <script>
        window.onload = function() {
            document.getElementById("download")
                .addEventListener("click", () => {
                    const invoice = this.document.getElementById("invoice");
                    console.log(invoice);
                    console.log(window);
                    html2pdf().from(invoice).save();
                })
        }
    </script>

    <!--excel script--->


    <script>
       document.getElementById('downloadexcel').addEventListener('click', function(){
           var table2excel = new Table2Excel();
           table2excel.export(document.querySelectorAll('#example1'));
       })
    </script>

    <!---Print Script---->

    <script>
       function myfun() {
           window.print();
       }
    </script>


</body>

</html>