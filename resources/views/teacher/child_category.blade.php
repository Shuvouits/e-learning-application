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
                            <h6 class="m-0 text-dark" style="font-weight: bold;">Child Category</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Child Category</li>
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

                            @if(Session::has('add_child_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_child_category') }}
                            </div>
                            @endif

                            @if(Session::has('edit_child_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_child_category') }}
                            </div>
                            @endif

                            @if(Session::has('delete_child_category'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_child_category') }}
                            </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users


                                        <a href="#" id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="#" style="margin-top:-5px; margin-left:20px" data-toggle="modal" data-target="#addChildcategory" class="btn btn-default"><i class="fa fa-plus"></i> Add Child Category</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Sub Categories</th>
                                                <th>Child Categories</th>
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($child_category_data as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>

                                                <td>{{$item->subcategory_name}}</td>
                                                <td>{{$item->title}}</td>
                                                <td><i class="fa {{$item->icon}}"></i></td>

                                                <td>
                                                    @if($item->status=='Disable')
                                                    <a href="/childcategory/status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @else
                                                    <a href="/childcategory/status/{{$item->id}}" class="btn btn-success btn-sm ">{{$item->status}}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/teacher_child_category/edit/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_childcategory/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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


        <!---Add Category modal---->


        <!-- The Modal -->
        <div class="modal" id="addChildcategory">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h6 class="modal-title">Add ChildCategory</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="/teacher_add_child_category" enctype="multipart/form-data">
                            {{@csrf_field()}}

                            <div class="form-group">
                                <label>Title*</label>
                                <input type="text" class="form-control" name="title">
                            </div>


                            <div class="form-group">
                                <label>Category*</label>
                                <select class="form-control select2bs4" id="category" name="category" style="width: 100%;">
                                    <option selected='selected' disabled='disabled'>--select--</option>
                                    @foreach($all_category_data as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>SubCategory*</label>
                                <select class="form-control select2" name="sub_category" id="sub_category" style="width: 100%;">

                                </select>
                            </div>



                            <div class="form-group">
                                <label>Icons*</label>
                                <select class="form-control select2bs4" name="icon" style="width: 100%;">
                                    <option selected='selected' disabled='disabled'>--select--</option>
                                    @foreach($icon as $item)
                                    <option>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status*</label>
                                <select class="form-control select2bs4" name="status" style="width: 100%;">
                                    <option selected='selected' disabled='disabled'>--select--</option>
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

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/teacher_ajax_category',
                    method: 'post',
                    dataType: "json",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(result) {

                        $('#sub_category').html(result);

                    }
                })

            })
        })
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