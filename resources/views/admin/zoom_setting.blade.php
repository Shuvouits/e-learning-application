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


            <!-- Main content -->

            <br>

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Update Zoom Token And Email:</h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Zoom Email</label>
                                                <input type="text" class="form-control" value="0123456789">
                                            </div>

                                            <div class="form-group">
                                                <label for="comment">Zoom JWT Token</label>
                                                <textarea class="form-control" rows="8" id="comment">
                                                     eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlZ6SWNHTV9JUmVPT1FKSDhrbERuTXciLCJleHAiOjE2MTEyMDczODMsImlhdCI6MTYxMTEyMDk4N30.9pPrWOQf1i6D4wImi3ZTylC1SsOLjTihHrKrcaaOpEQ
                                                
                                                </textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Save">

                                        </div>

                                        <div class="col-md-1"></div>

                                        <div class="col-md-5">
                                            <i class="fa fa-question-circle" style="font-size:18px"> How to get JWT Token and Email : </i>
                                            <hr>

                                            <div class="card">
                                                <div class="card-header">
                                                    <p class="card-title">
                                                        • First Sign up or Sign in here : Zoom Market Place Portal<br>
                                                        • Click on Top right side menu and click on build app : Create app<br>
                                                        • Choose JWT App and Continue...<br>
                                                        • After filling details click on credtional tab and bottom you will see JWT Token change token expiry accroding to your setting.<br>
                                                        • Paste your zoom email account id and JWT token here and create,edit meetings here.<br>
                                                    </p>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
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