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
                                        Edit adminstaticword.Annoncement
                                    </h3>
                                </div>



                                @foreach($announcement_edit as $item)
                                <div class="card-body">
                                    <form method="post" action='/announcement_edit'>
                                        {{@csrf_field()}}

                                        <input type="hidden" name='id' value={{$item->id}}>

                                        <div class="form-group">
                                            <label for="comment">adminstaticword.Announsment:*</label>
                                            <textarea class="textarea" name="announcement" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 100px;">
                                               {{$item->announcement}}
                                            </textarea>
                                               
                                            
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control select2bs4" name="status" style="width: 100%;">
                                                <option>{{$item->status}}</option>
                                                @if($item->status=='Active')
                                                <option>Deactive</option>
                                                @else
                                                <option>Active</option>
                                                @endif
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-danger" value='Save'>
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