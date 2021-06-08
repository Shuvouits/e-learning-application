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
                            <h6 class="m-0 text-dark" style="font-weight: bold;">Instructor</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">instructor</li>
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

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        
                                        <a href="#" id="downloadexcel"  style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="#"  data-toggle="modal" data-target="#addCategory" style="margin-top:-5px;margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Category</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="">
                                                
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>E-Mail</th>
                                                <th>Detail</th>
                                                <th>Status</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody> 

                                            @foreach($teacher as $item)                                           
                                            
                                            <tr class="">
                                                
                                                @if($item=='')
                                                <td>
                                                    <img src="{{asset('images/avater.png')}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                @else
                                                <td>
                                                    <img src="{{asset('images/'.$item->image)}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                @endif
                                                <td>{{$item->first_name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->details}}</td>

                                                <td>
                                                    @if($item->status=='Approved')
                                                    <a href="/admin_instructor_status/{{$item->email}}" class="btn btn-success btn-sm">Approved</a>
                                                    @else
                                                    <a href="/admin_instructor_status/{{$item->email}}" class="btn btn-danger btn-sm">Pending</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/admin_instructor_view/{{$item->email}}" class="btn btn-success btn-sm"> View</a>
                                                </td>
                                                <td>
                                                    <a href="/admin_instructor_delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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