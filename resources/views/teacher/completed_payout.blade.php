<!DOCTYPE html>
<html>

<head>
    @include('admin.link')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('teacher.navbar')

        <!-- Main Sidebar Container -->
        @include('teacher.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Completed Payout</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                                <li class="breadcrumb-item active">Courses</li>
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

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                       Users
                                      
                                       <a href="#" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">copy</a>
                                       <a href="#" style="color:white;" class="btn btn-primary btn-sm">CSV</a>
                                       <a href="#" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                       <a href="#" style="color:white;" class="btn btn-primary btn-sm">Print</a>
                    
                                    </h3>
                                   
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Mobile</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                   <img src="{{asset('images/avater.png')}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                <td>User</td>
                                                <td>user@gmail.com</td>
                                                <td>Admin</td>
                                                <td>01751720590</td>
                                                <td>Bangladesh</td>
                                                <td>
                                                   <a href="#" class="btn btn-success btn-sm">Active</a>
                                                </td>
                                                <td>
                                                   <a href="#" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                </td>
                                                <td>
                                                   <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Edit</a>
                                                </td>
                                            </tr>
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
</body>

</html>