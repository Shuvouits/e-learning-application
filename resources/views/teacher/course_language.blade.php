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
                            <h6 style="font-weight: bold;" class="m-0 text-dark">Course Language</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                                <li class="breadcrumb-item active">Course Language</li>
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

                            @if(Session::has('add_language'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_language') }}
                            </div>
                            @endif

                            @if(Session::has('edit_language'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_language') }}
                            </div>
                            @endif

                            @if(Session::has('delete_language'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_language') }}
                            </div>
                            @endif



                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        
                                        <a  href="#"  id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#"   id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="#" style="margin-top:-5px; margin-left:20px" data-toggle="modal" data-target="#addLanguage" class="btn btn-default"><i class="fa fa-plus"></i> Add Language</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Language</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($all_language_data as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>

                                                <td>{{$item->name}}</td>

                                                <td>

                                                    @if($item->status=='Disable')
                                                    <a href="/teacher_language_status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @else
                                                    <a href="/teacher_language_status/{{$item->id}}" class="btn btn-success btn-sm ">{{$item->status}}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#edit{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_course_language_delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal" id="edit{{$item->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">EditLanguage</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form method="post" action="/teacher_course_language_edit">
                                                                {{@csrf_field()}}
                                                                <div class="form-group">
                                                                    <label for='lang'>Name</label>
                                                                    <input type="text" id="lang" class="form-control" name="language_name" value="{{$item->name}}">
                                                                </div>
                                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select class="form-control select2bs4" name="status" required style="width: 100%;">
                                                                        <option>{{$item->status}}</option>
                                                                        @if($item->status=='Enable')
                                                                        <option>Disable</option>
                                                                        @else
                                                                        <option>Enable</option>
                                                                        @endif
                                                                    </select>

                                                                </div>
                                                                <input type="submit" class="btn btn-danger" value="Edit">
                                                            </form>

                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                            <!---Edit Modal--->

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
        <div class="modal" id="addLanguage">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Add Language</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->

                    <div class="modal-body">
                        <form method="post" action="/teacher_add_language" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label for="lang">Name</label>
                                <input type="text" class="form-control" id="lang" name="language" placeholder="Enter your language">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" name="status" required style="width: 100%;">
                                    <option selected='selected' disabled='disabled'>--Select--</option>
                                    <option>Enable</option>
                                    <option>Disable</option>


                                </select>
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