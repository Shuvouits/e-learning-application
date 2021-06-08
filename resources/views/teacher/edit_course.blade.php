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
            <br>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        Edit Course
                                    </h3>
                                </div>



                                @foreach($course_edit_data as $item)
                                <div class="card-body">

                                    <form method="post" action="/teacher_edit_course" enctype="multipart/form-data">
                                        {{@csrf_field()}}

                                        <div class="row">

                                            <div class="col-md-6">
                                                <input type="hidden" name="course_id" value="{{$item->id}}">
                                                <div class="form-group">
                                                    <label>Category*</label>
                                                    <select class="form-control select2bs4" id="category" name="category" required style="width: 100%;">
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
                                                    <select class="form-control select2bs4" name="sub_category" id="sub_category" required style="width: 100%;">
                                                        <option value="{{$item->subcategory_id}}">{{$item->subcategory_name}}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ChildCategory*</label>
                                                    <select class="form-control select2bs4" name="child_category" id="child_category" required style="width: 100%;">
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
                                                    <input type="file" class="btn btn-primary btn-sm" name='image' id="upload" onchange="readURL(this);" required>
                                
                                                    <img src="{{asset('images/'.$item->image)}}" class="img-thumbnail" id="blah" style="width: 50px; height:50px">
                                                    
                                                </div>
                                            </div>
                                        </div>




                                       

                                        <div class="form-group">
                                            <label for="shortdetails">Short Details</label>
                                            <textarea class="textarea" id="shortdetails" name="short_details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;">
                                            {{$item->short_details}}
                                            </textarea>
                                        </div>

                                       

                                        <div class="form-group">
                                            <label for="requirements">Requirements</label>
                                            <textarea class="textarea" id="requirements" name="requirements" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;">
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

                                @endforeach



                                <!-- /.card -->
                            </div>


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->
                </div><!-- /.container-fluid -->









            </section>
            <!-- /.content -->



            <!-- /.content -->


        </div>

        <!---Add Category modal---->










    </div>
    <!-- ./wrapper -->

    @include('teacher.script')

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

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/teacher_ajax_course_category_edit',
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

                    url: '/teacher_ajax_course_subcategory_edit',
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

</body>

</html>