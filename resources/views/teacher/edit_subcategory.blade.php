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
                                        Edit SubCategory
                                    </h3>
                                </div>

                                @foreach($edit_subcategory_all_data as $item)


                                <div class="card-body">
                                    <form method="post" action="/teacher_edit_subcategory" enctype="multipart/form-data">
                                        {{@csrf_field()}}

                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <div class="form-group">
                                            <label>Select Category:*</label>
                                            <select class="form-control select2bs4" name="category_name" style="width: 100%;">

                                                {{$category_name=$item->category_name}}
                                                <option>{{$category_name}}</option>
                                                @foreach($all_category_data as $data)
                                                @if($category_name==$data->name)

                                                @else
                                                <option>{{$data->name}}</option>

                                                @endif

                                                @endforeach



                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <label>SubCategory</label>
                                            <input type="text" class="form-control" name="sub_categories" value="{{$item->sub_category_name}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Icons*</label>
                                            <select class="form-control select2bs4" name="icon" style="width: 100%;">

                                                <option>{{$item->icon}}</option>
                                                @foreach($icon as $data)
                                                <option>{{$data->name}}</option>
                                                @endforeach



                                            </select>




                                        </div>

                                        <div class="form-group">
                                            <label>Status*</label>
                                            <select class="form-control select2bs4" name="status" style="width: 100%;">

                                                <option>{{$item->status}}</option>

                                                @if($item->status=='Enable')
                                                <option>Disable</option>
                                                @else
                                                <option>Enable</option>
                                                @endif


                                            </select>
                                        </div>


                                        <br>

                                        <input type="submit" class="btn btn-danger" value="Save">


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