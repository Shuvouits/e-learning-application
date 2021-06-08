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
                        <div class="col-md-8">


                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <p class="card-title text-right">

                                        Add Course
                                    </p>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <form method="post" action="/admin_add_course" enctype="multipart/form-data">
                                        {{@csrf_field()}}

                                        <?php

                                        $admin_email = session()->get('session_admin_email');


                                        ?>

                                        <input type="hidden" name="teacher_email" value="{{$admin_email}}">




                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Category*</label>
                                                    <select class="form-control select2bs4" id="category" name="category" required style="width: 100%;">
                                                        <option selected='selected' disabled='disabled'>--select--</option>
                                                        @foreach($all_category_data as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>SubCategory*</label>
                                                    <select class="form-control select2bs4" name="sub_category" id="sub_category" required style="width: 100%;">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ChildCategory*</label>
                                                    <select class="form-control select2bs4" name="child_category" id="child_category" required style="width: 100%;">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Language*</label>
                                                    <select class="form-control select2bs4" name="language" required style="width: 100%;">
                                                        <option>English</option>
                                                        <option>Hindi</option>
                                                        <option>Chinese</option>
                                                        <option>Zerman</option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">


                                                <div class="form-group">
                                                    <label>Course Title*</label>
                                                    <input type="text" class="form-control" id="title" name="course_title" required>
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Course Tags*</label>
                                                    <input type="text" class="form-control" id='slug' name="course_tag" required>
                                                </div>
                                            </div>

                                        </div>




                                        <div class="form-group">
                                            <label for="details">Details:</label>
                                            <textarea class="form-control" rows="10" name='details' id="details"></textarea>
                                        </div>

                                        <div class="row">




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Select Refund Policy*</label>
                                                    <select  class="form-control select2bs4" name="refund_policy" style="width: 100%;" required>
                                                        <option value="" selected='selected' disabled='disabled'>--select--</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="upload">Course Image</label>
                                                    <br>
                                                    <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" id="upload" required>
                                                    <img src="{{asset('images/avater.png')}}" id="blah" class="img-thumbnail" style="width: 50px; height:50px">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label for="comment">Short Details</label>
                                            <textarea class="form-control" rows="5" name="short_details" id="comment" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="requirement">Requirements</label>
                                            <textarea class="form-control" rows="5" name="requirements" id="requirement" required></textarea>
                                        </div>

                                        <div class="form-group">
                                           <label for='intro'>Introduction To Course Learning*</label>
                                           <textarea class="form-control" rows="5" name="intro_learn" id="intro" required></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Payment Option*</label>
                                                    <select class="form-control select2bs4" name="payment_option" required style="width: 100%;">
                                                        <option selected='selected' disabled='disabled' value="">--select--</option>
                                                        <option value="Free">Free</option>
                                                        <option value="Paid">Paid</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Course Duration*</label>
                                                    <select class="form-control select2bs4" name="course_duration" required style="width: 100%;">
                                                        <option selected='selected' disabled='disabled' value="">--select--</option>
                                                        <option value="Day">Day</option>
                                                        <option value="Month">Month</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Assignment Option*</label>
                                                    <select class="form-control select2bs4" name="assignment_option" required style="width: 100%;">
                                                        <option selected='selected' disabled='disabled' value="">--select--</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for='course_content'>Course Content*</label>
                                                    <input type="text" id="course_content" class="form-control" name="course_content" placeholder="Enter the title of the course">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Certificate*</label>
                                                    <select class="form-control select2bs4" name="certificate" required style="width: 100%;">
                                                        <option selected='selected' disabled='disabled' value="">--select--</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" id="price" class="form-control" name="price">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="url">Video Url</label>
                                                    <input type="text" id="url" class="form-control" name="video_url">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="upload">Upload Video</label>
                                                    <br>
                                                    <input type="file" class="btn btn-primary btn-sm" name='upload_video' id="upload">
                                                </div>
                                            </div>
                                        </div>


                                        <input type="submit" class="btn btn-danger" value="Save">


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

    <!---slug Script--->

    <script>
        $(document).ready(function() {
            $('#title').change(function() {
                var title = $(this).val();
                var token = $('input[name="_token"]').val();

                console.log(title);

                // console.log(token)

                $.ajax({

                    url: '/admin_ajax_course_slug',
                    method: 'post',
                    dataType: "json",
                    data: {
                        title: title,
                        _token: token
                    },
                    success: function(result) {

                        $('#slug').val(result);

                    }
                })

            })
        })
    </script>

    <!---Ajax Script--->

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/admin_ajax_course_category',
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

    <script>
        $(document).ready(function() {
            $('#sub_category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/admin_ajax_course_subcategory',
                    method: 'post',
                    dataType: "json",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(result) {

                        $('#child_category').html(result);

                    }
                })

            })
        })
    </script>

    <!---End Ajax Script-->


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