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
            <br>
            <br>

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-6">


                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <p class="card-title text-right">
                                        Add Course Content
                                    </p>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <form method="post" action="/admin_add_course_content" enctype="multipart/form-data">
                                        {{@csrf_field()}}

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label>Select Course*</label>
                                                    <select class="form-control select2bs4" name="course_id" style="width: 100%;" required>
                                                        <option value="" selected='selected' disabled='disabled'>--select--</option>
                                                        @foreach($all_course as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                        
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="upload">Upload Video</label>
                                                    <br>
                                                    <input type="file" class="btn btn-primary btn-sm" name='file' id="upload" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Video Title*</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter the video title" required>
                                        </div>



                                        <input type="submit" class="btn btn-danger" value="Save">


                                    </form>

                                </div>
                                <!-- /.card-body -->
                            </div>


                        </div>

                        <div class="col-md-6">


                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <p class="card-title text-right">
                                        view Course Content
                                    </p>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                   

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

    <!---Ajax Script--->

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/admin_ajax_category',
                    method: 'post',
                    dataType: "json",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(result) {

                        $('#sub_category').html(result);

                    }
                })

            })
        })
    </script>

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