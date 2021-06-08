<!DOCTYPE html>
<html>

<head>
    @include('teacher.link')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('teacher.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('teacher.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Advanced Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Advanced Form</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">SetUp Payment Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Type*</label>
                                        <select class="form-control select2" style="width: 100%;">

                                            <option value='Paytm' selected="selected">Paytm</option>
                                            <option value='Paypal'>Paypal</option>
                                            <option value="Bank">Bank Transfer</option>
                                            {{csrf_field()}}

                                        </select>
                                    </div>

                                </div>


                            </div>
                            <!-- /.row -->

                            <div id="data">
                                <div class="col-md-6" style="margin-left:-8px">
                                    <div class="form-group">
                                        <br>
                                        PAYTM PAYMENT <br>
                                        <label style="margin-top:5px">Paytm Mobile no*</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <!-- /.card -->


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('teacher.script')

    <script>
        $(document).ready(function() {
            $('.select2').change(function() {
                var name = $(this).val();
                var token = $('input[name="_token"]').val();



                $.ajax({

                    url: '/ajax_payment_setting',
                    method: 'post',
                    dataType: "json",
                    data: {
                        name: name,
                        _token: token
                    },
                    success: function(result) {

                        $('#data').html(result);
                        //$('#brand').html(result);
                    }
                })
            })

        });
    </script>
</body>

</html>