<!DOCTYPE html>
<html>

<head>
    @include('admin.link')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.navbar')

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')

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
                                        Edit Category
                                    </h3>
                                </div>

                                @foreach($edit_category_all_data as $item)


                                <div class="card-body">
                                    <form method="post" action="/admin_edit_category" enctype="multipart/form-data">
                                        {{@csrf_field()}}

                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <div class="form-group">
                                            <label>Name:*</label>
                                            <input type="text" class="form-control" name="name" value="{{$item->name}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Icons*</label>
                                            <select class="form-control select2bs4" name="icon">
                                                <option>{{$item->icon}}</option>
                                                @foreach($icon as $data)
                                                <option>{{$data->name}}</option>
                                                @endforeach
                                               

                                            </select>
                                           

                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="featured">Featured:</label>
                                                    <select class="form-control select2bs4" name="featured" id="featured" required>

                                                        <option>{{$item->featured}}</option>
                                                        @if($item->featured=="Yes")
                                                        <option>No</option>
                                                        @else
                                                        <option>Yes</option>
                                                        @endif
                                                       

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status:</label>
                                                    <select class="form-control select2bs4" name="status" id="status" required>
                                                        <option>{{$item->status}}</option>
                                                        @if($item->status=='Active')
                                                        <option>Deactive</option>
                                                        @else
                                                        <option>Active</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Preview:</label>
                                            <br>
                                            <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" required>
                                            <br>
                                            <br>
                                            <img src="{{asset('images/'.$item->image)}}" id="blah" class="img-thumbnail" style="width: 500px; height:300px">
                                        </div>

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

    @include('admin.script')

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