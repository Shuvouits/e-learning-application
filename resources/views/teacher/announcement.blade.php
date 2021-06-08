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
                            <h6 class="m-0 text-dark" style="font-weight:bold">Course Announcement</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                                <li class="breadcrumb-item active">Announcement</li>
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

                            @if(Session::has('add_announcement'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_announcement') }}
                            </div>
                            @endif

                            @if(Session::has('edit_announcement'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_announcement') }}
                            </div>
                            @endif

                            @if(Session::has('delete_announcement'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_announcement') }}
                            </div>
                            @endif


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                       
                                        <a href="#"   id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#"  id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"   onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>
                                        <a href="#" data-toggle="modal" data-target="#addAnnouncement" style="margin-top:-5px; margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Announcement</a>

                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Announcement</th>
                                                <th>Courses</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach( $all_announcement as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>

                                                <td>{{$item->announcement}}</td>
                                                <td>{{$item->course}}</td>


                                                <td>
                                                    @if($item->status=='Active')
                                                    <a href="/teacher_annoucement_status/{{$item->id}}" class="btn btn-success btn-sm">{{$item->status}}</a>
                                                    @else
                                                    <a href="/teacher_annoucement_status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/teacher_announcement/edit/{{$item->id}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_announcement/delete/{{$item->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                    <div class="modal" id="addAnnouncement">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h6 class="modal-title">Add Announcement</h6>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="/teacher_annoucement_add">
                                        {{@csrf_field()}}
                                        <div class="form-group">
                                            <label>Courses*</label>
                                            <select class="form-control select2bs4" id="category" name="course" style="width: 100%;">
                                                <option disabled='disabled' selected="selected">Select an Option</option>
                                                @foreach($all_course as $item)
                                                <option>{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="comment">Announcement:</label>
                                            <textarea class="form-control" rows="5" name="announcement" id="comment"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for='status'>Status</label>
                                            <select class="form-control select2bs4" id="status" name="status" style="width: 100%;">
                                                <option disabled='disabled' selected='selected'>Select an Option</option>
                                                <option>Active</option>
                                                <option>Deactive</option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value='Save'>
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