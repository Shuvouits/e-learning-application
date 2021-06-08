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
                            <h6 class="m-0 text-dark" style="font-weight: bold;">Course</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">course</li>
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

                            @if(Session::has('delete_zoom'))
                            <div class="alert alert-danger  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_zoom') }}
                            </div>
                            @endif

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users


                                        <a href="#" id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#" onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="/admin_add_course" style="margin-top:-5px;margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Course</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="">
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Meeting</th>
                                                <th>Url</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>

                                        <tbody>


                                            @foreach($all_zoom_data as $item)

                                            <tr class="">
                                                <td>{{$item->id}}</td>
                                                <td>Admin</td>
                                                <td>
                                                    Meeting-ID : {{$item->meeting_id}}
                                                    <br>
                                                    Owner-ID : {{$item->owner_id}}
                                                    <br>
                                                    Meeting-Topic : {{$item->meeting_topic}}
                                                    <br>
                                                    Start-Time : {{$item->start_time}}
                                                    <br>
                                                    Meeting On Course : {{$item->course_name}}
                                                </td>
                                                <td>
                                                    <a href="{{$item->meeting_url}}" class="btn btn-warning">Join</a>
                                                </td>
                                                <td>
                                                    <a href="/zoom_meeting_delete/{{$item->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
        document.getElementById('downloadexcel').addEventListener('click', function() {
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