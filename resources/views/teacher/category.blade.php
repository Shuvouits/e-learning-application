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
                            <h6 class="m-0 text-dark" style="font-weight: bold;">Category</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
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

                            @if(Session::has('add_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_category') }}
                            </div>
                            @endif

                            @if(Session::has('edit_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_category') }}
                            </div>
                            @endif

                            @if(Session::has('delete_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_category') }}
                            </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        
                                        <a href="#" id="downloadexcel"  style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="#"  data-toggle="modal" data-target="#addCategory" style="margin-top:-5px;margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Category</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Categories</th>
                                                <th>Slug</th>
                                                <th>Icon</th>
                                                <th>Featured</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach($all_category_data as $item)
                                            
                                            <tr class="text-center">
                                                <td>{{$item->id}}</td>
                                                <td>
                                                    <img src="{{asset('images/' .$item->image)}}" style="width:50px;height:50px" class="img-thumbnail">
                                                </td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->slug}}</td>
                                                <td><i class="fa {{$item->icon}}"></i></td>

                                                <td>
                                                    <a href="#" class="btn btn-success btn-sm">{{$item->featured}}</a>
                                                </td>
                                                <td>
                                                    @if($item->status=='Disable')
                                                    <a href="/category/status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @else
                                                    <a href="/category/status/{{$item->id}}" class="btn btn-success btn-sm">{{$item->status}}</a>
                                                    @endif


                                                </td>
                                                <td>
                                                    <a href="/teacher_category/edit/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_category/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!---Category Edit modal---->


                                            <!-- Edit Modal -->
                                            <div class="modal" id="edit{{$item->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Edit Category</h6>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">

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

        <!---Add Category modal---->


        <!-- The Modal -->
        <div class="modal" id="addCategory">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Add Category</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="/teacher_add_category" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label>Name:*</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Category" required>
                            </div>



                            <div class="form-group">
                                <label>Icons*</label>
                                <select class="form-control select2bs4" name="icon" style="width: 100%;">
                                    <option disabled="disabled" selected="selected">--select--</option>
                                    @foreach($icon as $item)
                                    <option>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="featured">Featured:</label>
                                        <select class="form-control select2bs4" name="featured" id="featured" required>
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Enable</option>
                                            <option>Disable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="form-control select2bs4" name="status" id="status" required>
                                            <option selected='selected' disabled='disabled'>--select--</option>
                                            <option>Enable</option>
                                            <option>Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Preview:</label>
                                <br>
                                <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" required>
                                <img src="{{asset('images/avater.png')}}" id="blah" class="img-thumbnail" style="width: 50px; height:50px">
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

    <!---Imge Script-->

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