<!DOCTYPE html>
<html>

<head>
    @include('student.link')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>




            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">12</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <image src='images/avater.png' class="img-thumbnail" style='width:40px; height:40px; margin-top:-10px'></image>

                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <span><i class="fa fa-user"></i></span>
                                        <span style="margin-left:10px">Profile</span>

                                    </h3>

                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <span><i class="fa fa-key"></i></span>
                                        <span style="margin-left:10px">Change Password</span>

                                    </h3>

                                </div>
                            </div>
                            <!-- Message End -->
                        </a>


                        <div class="dropdown-divider"></div>

                        <a href="/student_logout" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <span><i class="fa fa-sign-out"></i></span>
                                        <span style="margin-left:10px">Logout</span>

                                    </h3>

                                </div>
                            </div>
                            <!-- Message End -->
                        </a>


                    </div>
                </li>


            </ul>
        </nav>
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
                                        Personal Information
                                    </h3>
                                </div>




                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for='fname'>First Name</label>
                                                    <input type="text" class="form-control" id="fname" name="fname">
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for='lname'>Last Name</label>
                                                    <input type="text" class="form-control" id="lname" name="lname">
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for='email'>E-Mail</label>
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for='mobile'>Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile">
                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label for='address'>Address</label>
                                                    <textarea class="form-control" rows="5" id="address"></textarea>
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control select2bs4" name="icon">
                                                        <option>hellow</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <select class="form-control select2bs4" name="icon">
                                                        <option>hellow</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select class="form-control select2bs4" name="icon">
                                                        <option>hellow</option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label id="author">Author Bio</label>
                                                <textarea class="textarea" id="author" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" data-toggle="collapse" data-target="#demo" value="option1">
                                                    <label for="customCheckbox1" class="custom-control-label">Change Password</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="col-md-6 collapse" id="demo">
                                                <label for='password'>Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">

                                            </div>

                                            <div class="col-md-6 collapse" id="demo">
                                                <label for='cpassword'>Confirm Password</label>
                                                <input type="password" class="form-control" name="password" id="cpassword" placeholder="Confirm Password">

                                            </div>

                                        </div>

                                    </form>


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