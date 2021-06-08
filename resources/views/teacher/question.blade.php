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
                            <h6 class="m-0 text-dark" style="font-weight:bold">Course Questions</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                                <li class="breadcrumb-item active">Question</li>
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

                            @if(Session::has('add_question'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_question') }}
                            </div>
                            @endif

                            @if(Session::has('edit_question'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_question') }}
                            </div>
                            @endif

                            @if(Session::has('delete_question'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_question') }}
                            </div>
                            @endif


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        
                                        <a href="#"  id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#"  id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>
                                        <a href="#" style="margin-top:-5px; margin-left:20px" data-toggle="modal" data-target="#addQuestion" class="btn btn-default"><i class="fa fa-plus"></i> Add New Question</a>

                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course</th>
                                                <th>Question</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($teacher_question as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>

                                                <td>{{$item->course_name}}</td>
                                                <td>{{$item->question}}</td>

                                                <td>
                                                    @if($item->status=="Active")
                                                    <a href="/teacher_question_answer/status/{{$item->id}}" class="btn btn-success btn-sm">{{$item->status}}</a>
                                                    @else
                                                    <a href="/teacher_question_answer/status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/teacher_question_answer/edit/{{$item->id}}" class="btn btn-success "><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_question_answer/delete/{{$item->id}}" class="btn btn-danger "><i class="fa fa-trash"></i></a>
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



        <!-- The Modal -->
        <div class="modal" id="addQuestion">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Add Question</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="/add_teacher_question">
                            {{@csrf_field()}}

                            <?php

                            $session_teacher_email = session()->get('session_teacher_email');


                            ?>

                            <input type="hidden" name="teacher_name" value="{{$session_teacher_email}}">

                            <div class="form-group">
                                <label>Course*</label>

                                <select class="form-control select2bs4" name="course" data-placeholder="Select a State" style="width: 100%;">
                                    
                                    <option selected='selected' disabled='disabled'>--select--</option>
                                    @foreach($teacher_course as $item)
                                    <option>{{$item->title}}</option>
                                    @endforeach
                                </select>

                               

                            </div>
                            <div class="form-group">
                                <label for="comment">Question</label>
                                <textarea class="form-control" name="question" rows="5" id="comment"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control select2bs4" name="status" style="width: 100%;">

                                    <option selected='selected' disabled='disabled'>--select--</option>
                                    <option>Active</option>
                                    <option>Inactive</option>


                                </select>
                            </div>

                            <input type="submit" class="btn btn-danger" value="Save">


                        </form>
                    </div>


                </div>
            </div>
        </div>



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