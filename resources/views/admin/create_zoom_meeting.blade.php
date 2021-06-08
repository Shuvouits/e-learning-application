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
                            <h6 class="m-0 text-dark" style="font-weight: bold;">Create Meeting</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Create Zoom Meeting</li>
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
                        <div class="col-md-8">



                            <div class="card card-primary card-outline">

                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <form method="post" action="/zoom_meeting_post_data">
                                        {{@csrf_field()}}

                                        <div class="form-group">
                                            <label for="topics">Topics</label>
                                            <input type="text" id="topics" name="topics" class="form-control" placeholder="Enter Your Topics" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="apikey">Zoom Api Key</label>
                                            <input type="text" id="apikey" name="apikey" class="form-control" placeholder="Enter Your Api Key" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="apisecret">Zoom Api Secret</label>
                                            <input type="text" id="apisecret" name="apisecret" class="form-control" placeholder="Enter Your Api Secret" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="apiurl">Zoom Api Url</label>
                                            <h6 style="font-weight:bold">Hints* : https://api.zoom.us/v2/users/your_correct_gmail/meetings</h6>
                                            <input type="text" id="apiurl" name="apiurl" class="form-control" placeholder="Enter Your Url" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="mpassword">Meeting Password</label>
                                            <input type="text" id="mpassword" name="password" class="form-control" placeholder="Create Your Password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Meeting Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Google Email" required>
                                        </div>

                                       

                                        <div class="form-group">
                                            <label>Select Course</label>
                                            <select class="form-control select2" name="course" required>
                                               <option selected='selected' disabled='disabled'>--select--</option>

                                               @foreach($teacher_course as $item)
                                               <option>{{$item->title}}</option>
                                               @endforeach
                                               
                                            </select>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label>Meeting Duration</label>
                                            <select class="form-control select2" name="meeting_duration" required>
                                               <option selected='selected' disabled='disabled'>--select--</option>
                                               <option>30</option>
                                               <option>45</option>
                                               <option>60</option>
                                               <option>90</option>
                                               <option>120</option>
                                            </select>
                                           
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="save">

                                    </form>

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