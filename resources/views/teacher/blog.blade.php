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
                            <h1 class="m-0 text-dark">
                                Blog
                            </h1>
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

                        @if(Session::has('blog_add'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('blog_add') }}
                            </div>
                        @endif

                        @if(Session::has('edit_blog'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_blog') }}
                            </div>
                        @endif

                        @if(Session::has('delete_blog'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_blog') }}
                            </div>
                        @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        <a href="#" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">copy</a>
                                        <a href="#" style="color:white;" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#" style="color:white;" class="btn btn-primary btn-sm">Print</a>
                                        <a href="#" style="margin-top:-5px" data-toggle="modal" data-target="#addBlog" class="btn btn-default"><i class="fa fa-plus"></i> Add Blog</a>

                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>User</th>
                                                <th>Heading</th>
                                                <th>Details</th>
                                                <th>Text</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             
                                             <?php

                                             $session_teacher_email = session()->get('session_teacher_email');
                                             
                                             ?>

                                             

                                            @foreach($teacher_blog as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    <img src="{{asset('images/'.$item->image)}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                <td>{{$item->teacher_email}}</td>
                                                <td>{{$item->headings}}</td>
                                                <td>{{$item->details}}</td>
                                                <td>{{$item->text}}</td>
                                                <td>
                                                    <a href="/teacher_blog/edit/{{$item->id}}" class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_blog/delete/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a>
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

        <div class="modal" id="addBlog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Add Blog</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form method="post" action="/teacher_blog_add" enctype="multipart/form-data">

                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-6">

                                    <input type="hidden" name='teacher_name' value="{{$session_teacher_email}}">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='heading'>Headings*:</label>
                                        <input type="text" id="heading" name='headings' class="form-control" name="headings" placeholder='Please enter your heading'>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for='button'>Button Text*:</label>
                                        <input type="text" id="button" name='button_text' class="form-control" name="headings" placeholder='please Enter your text'>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Preview:</label>
                                        <br>
                                        <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" required>

                                        <img src="{{asset('images/avater.png')}}" id="blah" class="img-thumbnail" style="width: 50px; height:50px">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for='details'>Details</label>
                                <textarea id='details' class="textarea" name="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;">

                            </textarea>
                            </div>

                            <input type="submit" class="btn btn-danger" value='Add Blog'>

                        </form>





                    </div>



                </div>
            </div>
        </div>



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