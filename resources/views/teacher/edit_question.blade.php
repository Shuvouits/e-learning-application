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
                                        Edit Question
                                    </h3>
                                </div>



                                 @foreach($teacher_question_data as $item)
                                <div class="card-body">
                                    <form method="post" action="/teacher_question_asnwer_edit">
                                        {{@csrf_field()}}
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <div class="form-group">
                                            <label for="question">Question*</label>
                                            <input type="text" id="question" class="form-control" name="question" value="{{$item->question}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Status*</label>
                                            <select class="form-control select2bs4" name="status" required style="width: 100%;">
                                                <option>{{$item->status}}</option>
                                                @if($item->status=='Active')
                                                <option>Inactive</option>
                                                @else
                                                <option>Active</option>
                                                @endif
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-danger" value="Edit" >

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



</body>

</html>