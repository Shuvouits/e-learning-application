<!DOCTYPE html>
<html>

<head>
    @include('teacher.link')
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
                            <h6 class="m-0 text-dark" style="font-weight:bold">Courses</h6>
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

                            @if(Session::has('add_course'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_course') }}
                            </div>
                            @endif

                            @if(Session::has('edit_course'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_course') }}
                            </div>
                            @endif

                            @if(Session::has('delete_course'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_course') }}
                            </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users


                                        <a href="#" id="downloadexcel" style="color:white; margin-left:20px;" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#" onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="#" style="margin-top:-5px; margin-left:20px;" data-toggle="modal" data-target="#addCourse" class="btn btn-default"><i class="fa fa-plus"></i> Add Courses</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Instructor</th>
                                                <th>Type</th>
                                                <th>Featured</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($all_teacher_course as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    @if($item->image=='')
                                                    <p>No Image</p>
                                                    @else
                                                    <img src="{{asset('images/'.$item->image)}}" style="width:50px;height:50px" class="img-thumbnail">
                                                    @endif
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->teacher_email}}</td>
                                                <td>{{$item->slug}}</td>

                                                <td class="text-center">
                                                    <a href="#" class="">Yes</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="">Active</a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_course/edit/{{$item->id}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_course/delete/{{$item->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal" id="edit{{$item->id}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">EditChildCategory</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->

                                                        <div class="modal-body">
                                                            <form method="post" action="/teacher_edit_course" enctype="multipart/form-data">
                                                                {{@csrf_field()}}

                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <input type="hidden" name="course_id" value="{{$item->id}}">
                                                                        <div class="form-group">
                                                                            <label>Category*</label>
                                                                            <select class="form-control select2bs4" id="categoryEdit{{$item->id}}" name="category" required style="width: 100%;">
                                                                                {{$category_name = $item->category_name}}
                                                                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>

                                                                                @foreach($all_category_data as $data)
                                                                                @if($category_name==$data->name)
                                                                                @else
                                                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                                                @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>SubCategory*</label>
                                                                            <select class="form-control select2bs4" name="sub_category" id="sub_categoryEdit{{$item->id}}" required style="width: 100%;">
                                                                                <option value="{{$item->subcategory_id}}">{{$item->subcategory_name}}</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>ChildCategory*</label>
                                                                            <select class="form-control select2bs4" name="child_category" id="child_categoryEdit{{$item->id}}" required style="width: 100%;">
                                                                                <option value="{{$item->childcategory_id}}">{{$item->childcategory_name}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Language*</label>
                                                                            <select class="form-control select2bs4" name="language" required style="width: 100%;">
                                                                                <option>{{$item->language}}</option>
                                                                                @if($item->language=='English')
                                                                                <option>Hindi</option>
                                                                                <option>Chinese</option>
                                                                                <option>Zerman</option>
                                                                                @endif
                                                                                @if($item->language=='Hindi')
                                                                                <option>English</option>
                                                                                <option>Chinese</option>
                                                                                <option>Zerman</option>
                                                                                @endif
                                                                                @if($item->language=='Chinese')
                                                                                <option>English</option>
                                                                                <option>Hindi</option>
                                                                                <option>Zerman</option>
                                                                                @endif
                                                                                @if($item->language=='Zerman')
                                                                                <option>English</option>
                                                                                <option>Hindi</option>
                                                                                <option>Chinese</option>
                                                                                @endif



                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Select Refund Policy*</label>
                                                                            <select class="form-control select2bs4" name="refund_policy" required style="width: 100%;">
                                                                                <option>{{$item->refund_policy}}</option>
                                                                                @if($item->refund_policy=='Yes')
                                                                                <option>No</option>
                                                                                @else
                                                                                <option>Yes</option>
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Course Tags*</label>
                                                                            <input type="text" class="form-control" name="course_tag" value="{{$item->course_tag}}">
                                                                        </div>
                                                                    </div>

                                                                </div>





                                                                <div class="form-group">
                                                                    <label for="comment">Details</label>
                                                                    <textarea class="textarea" name="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;">
                                                                    {{$item->details}}
                                                                    </textarea>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Course Title*</label>
                                                                            <input type="text" class="form-control" name="course_title" value="{{$item->title}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="upload">Course Image</label>
                                                                            <br>
                                                                            <input type="file" class="btn btn-primary btn-sm" name='image' id="upload">
                                                                            @if($item->image=='')
                                                                            @else
                                                                            <img src="{{asset('images/'.$item->image)}}" class="img-thumbnail" style="width: 50px; height:50px">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>




                                                                <div class="form-group">
                                                                    <label for="comment">Short Details</label>
                                                                    <textarea class="form-control" rows="5" name="short_details" id="comment">
                                                                    {{$item->short_details}}
                                                                    </textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="requirement">Requirements</label>
                                                                    <textarea class="form-control" rows="5" name="requirements" id="requirement">
                                                                    {{$item->requirements}}
                                                                    </textarea>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Payment Option*</label>
                                                                            <select class="form-control select2bs4" name="payment_option" required style="width: 100%;">
                                                                                <option>{{$item->pay_option}}</option>
                                                                                @if($item->pay_option=="Free")
                                                                                <option>Paid</option>
                                                                                @else
                                                                                <option>Free</option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Course Duration*</label>
                                                                            <select class="form-control select2bs4" name="course_duration" required style="width: 100%;">
                                                                                <option>{{$item->course_duration}}</option>
                                                                                @if($item->course_duration=='Day')
                                                                                <option>Month</option>
                                                                                @else
                                                                                <option>Day</option>
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Assignment Option*</label>
                                                                            <select class="form-control select2bs4" name="assignment_option" required style="width: 100%;">
                                                                                <option>{{$item->assignment_option}}</option>
                                                                                @if($item->assignment_option=='Yes')
                                                                                <option>No</option>
                                                                                @else
                                                                                <option>Yes</option>
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Appointment Option*</label>
                                                                            <select class="form-control select2bs4" name="appointment_option" required style="width: 100%;">

                                                                                <option>{{$item->appointment_option}}</option>
                                                                                @if($item->appointment_option=='Yes')
                                                                                <option>No</option>
                                                                                @else
                                                                                <option>Yes</option>
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Certificate*</label>
                                                                            <select class="form-control select2bs4" name="certificate" required style="width: 100%;">
                                                                                <option>{{$item->certificate_option}}</option>
                                                                                @if($item->certificate=='Yes')
                                                                                <option>No</option>
                                                                                @else
                                                                                <option>Yes</option>
                                                                                @endif

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="price">Price</label>
                                                                            <input type="text" id="price" class="form-control" name="price" value="{{$item->course_price}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="url">Video Url</label>
                                                                            <input type="text" id="url" class="form-control" name="video_url" value="{{$item->url}}">
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


                                                                <input type="submit" class="btn btn-danger" value="Edit">


                                                            </form>
                                                        </div>




                                                    </div>
                                                </div>
                                            </div>







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

        <!-- The Modal -->
        <div class="modal" id="addCourse">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Add Courses</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                    <div class="modal-body">
                        <form method="post" action="/teacher_add_course" enctype="multipart/form-data">
                            {{@csrf_field()}}

                            <?php

                            $teacher_email = session()->get('session_teacher_email');


                            ?>

                            <input type="hidden" name="teacher_email" value="{{$teacher_email}}">




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
                                        <input type="text" class="form-control" id="title" name="course_title">
                                    </div>


                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course Tags*</label>
                                        <input type="text" class="form-control" id='slug' name="course_tag">
                                    </div>
                                </div>

                            </div>





                            <div class="form-group">
                                <label for="comment">Details</label>
                                <textarea class="textarea" name="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;"></textarea>
                            </div>

                            <div class="row">




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Refund Policy*</label>
                                        <select class="form-control select2bs4" name="refund_policy" required style="width: 100%;">
                                            <option>Yes</option>
                                            <option>No</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="upload">Course Image</label>
                                        <br>
                                        <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" id="upload">
                                        <img src="{{asset('images/avater.png')}}" id="blah" class="img-thumbnail" style="width: 50px; height:50px">
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="comment">Short Details</label>
                                <textarea class="form-control" rows="5" name="short_details" id="comment"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="requirement">Requirements</label>
                                <textarea class="form-control" rows="5" name="requirements" id="requirement"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Payment Option*</label>
                                        <select class="form-control select2bs4" name="payment_option" required style="width: 100%;">
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Free</option>
                                            <option>Paid</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Course Duration*</label>
                                        <select class="form-control select2bs4" name="course_duration" required style="width: 100%;">
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Day</option>
                                            <option>Month</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assignment Option*</label>
                                        <select class="form-control select2bs4" name="assignment_option" required style="width: 100%;">
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Yes</option>
                                            <option>No</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Option*</label>
                                        <select class="form-control select2bs4" name="appointment_option" required style="width: 100%;">
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Yes</option>
                                            <option>No</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Certificate*</label>
                                        <select class="form-control select2bs4" name="certificate" required style="width: 100%;">
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Yes</option>
                                            <option>No</option>

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




                </div>
            </div>
        </div>
        <!---End Modal--->



    </div>
    <!-- ./wrapper -->

    @include('teacher.script')

    <!--image Script--->

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

    <!---slug Script--->

    <script>
        $(document).ready(function() {
            $('#title').change(function() {
                var title = $(this).val();
                var token = $('input[name="_token"]').val();

                console.log(title);

                // console.log(token)

                $.ajax({

                    url: '/teacher_ajax_course_slug',
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



    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/teacher_ajax_course_category',
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

                    url: '/teacher_ajax_course_subcategory',
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