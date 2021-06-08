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
                                        Edit Blog
                                    </h3>
                                </div>


                                @foreach($teacher_blog_edit_data as $item)

                                <div class="card-body">
                                    <form method="post" action='/teacher_blog_edit_post' enctype="multipart/form-data">
                                        {{@csrf_field()}}
                                        <div class="form-group">
                                            <label for='headings'>Headings</label>
                                            <input type="text" class="form-control" value="{{$item->headings}}" name="headings" id="headings">
                                        </div>
                                        <div class="form-group">
                                            <label for='headings'>Button Text</label>
                                            <input type="text" class="form-control" value="{{$item->text}}" name="button_text" id="headings">
                                        </div>
                                        <input type="hidden" value="{{$item->id}}" name='id'>
                                        <div class="form-group">
                                            <label>Preview:</label>
                                            <br>
                                            <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" required>
                                            <br>

                                            <img src="{{asset('images/'.$item->image)}}" id="blah" class="img-thumbnail" style="width:500px">
                                        </div>

                                        <div class="form-group">
                                            <label for='details'>Details</label>
                                            <textarea id='details' class="textarea" name="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;">
                                                {{$item->details}}
                                            </textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Save">
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
</body>

</html>