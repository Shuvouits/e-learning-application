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
                            <h1 class="m-0 text-dark">Feature Course</h1>
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

                        @if(Session::has('featured_add'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('featured_add') }}
                            </div>
                        @endif

                        @if(Session::has('delete_featured'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_featured') }}
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
                                        <a href="#" style="margin-top:-5px" data-toggle="modal" data-target="#addFeatured" class="btn btn-default"><i class="fa fa-plus"></i> Add Featured Course</a>

                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Courses</th>
                                                
                                                

                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach($all_featured_course as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>

                                                <td>{{$item->teacher_email}}</td>
                                                <td>{{$item->featured_course_name}}</td>
                                                
                                                

                                                <td>
                                                    <a href="/teacher_featured_course/view/{{$item->course_id}}" class="btn btn-danger btn-sm">View</a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_featured_course/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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


                    <!-- The Modal -->
                    <div class="modal" id="addFeatured">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h6 class="modal-title">Add Featured</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="/teacher_featured_course_add">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Select Course</label>

                                            <select class="form-control select2bs4" name="course">
                                                <option disabled='disabled' selected='selected'>Select Item</option>
                                                @foreach($teacher_course as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                               
                                                @endforeach

                                            </select>
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>





                </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->


        </div>



    </div>
    <!-- ./wrapper -->

    @include('teacher.script')
</body>

</html>