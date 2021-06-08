<!DOCTYPE html>
<html>

<head>
    @include('student.link')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('student.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">


            <!-- Sidebar -->
            @include('student.sidebar')
            <!-- /.sidebar -->


        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <br>
            <br>

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        Bank Information

                                        <a href="/student_add_bank"   style="margin-top:-5px;margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Bank</a>
                                    </h3>
                                </div>




                                <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>A/C Holder Name</th>
                                                <th>Bank name</th>
                                                <th>A/C No.</th>
                                                <th>IFSC Codes</th>
                                                <th>Actions</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>


                                            
                                            
                                            <tr class="text-center">
                                                <td>id</td>
                                                <td>
                                                    <img src="{{asset('images/avater.png')}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                <td>Name</td>
                                                <td>slug</td>
                                                <td>icon</td>

                                                <td>
                                                    featured
                                                </td>
                                               
                                            </tr>

                                            

                                            

                                        </tbody>

                                    </table>


                                </div>

                                <!-- /.card -->
                            </div>


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->
                </div><!-- /.container-fluid -->









            </section>

            <!-- /.content -->


        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('student.script')


</body>

</html>