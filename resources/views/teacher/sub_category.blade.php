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
                            <h6 class="m-0 text-dark" style="font-weight:bold">Sub Category</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sub Category</li>
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

                            @if(Session::has('add_subcategory'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('add_subcategory') }}
                            </div>
                            @endif

                            @if(Session::has('edit_subcategory'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('edit_subcategory') }}
                            </div>
                            @endif

                            @if(Session::has('delete_subcategory'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('delete_subcategory') }}
                            </div>
                            @endif

                           

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                        Users

                                        
                                        <a href="#" id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                        <a href="#" id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                        <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>

                                        <a href="#" data-toggle="modal" data-target="#addSubcategory" style="right:20px;margin-top:-5px; margin-left:20px" class="btn btn-default"><i class="fa fa-plus"></i> Add Sub Category</a>
                                    </h3>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Categories</th>
                                                <th>Sub Categories</th>
                                                <th>Slug</th>
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($sub_category_data as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>

                                                <td>{{$item->category_name}}</td>
                                                <td>{{$item->sub_category_name}}</td>

                                                <td>{{$item->slug}}</td>
                                                <td><i class="fa {{$item->icon}}"></i></td>

                                                <td>


                                                    @if($item->status=='Disable')
                                                    <a href="/subcategory/status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                    @else
                                                    <a href="/subcategory/status/{{$item->id}}" class="btn btn-success btn-sm ">{{$item->status}}</a>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="/teacher_sub_category/edit/{{$item->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                </td>
                                                <td>
                                                    <a href="/teacher_subcategory/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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


    </div>
    <!-- ./wrapper -->


    <!---Add Sub Category modal---->


    <!-- The Modal -->
    <div class="modal" id="addSubcategory">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">Add Sub Category</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="/teacher_add_subCategory">
                        {{@csrf_field()}}
                        <div class="form-group">
                            <label>Categories</label>
                            <select class="form-control select2bs4" name="category" style="width: 100%;">
                                <option selected="selected" disabled="disabled">--select--</option>
                                @foreach($all_category_data as $item)
                                <option>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Sub Categories:*</label>
                            <input type="text" class="form-control" name="sub_categories">
                        </div>

                        <div class="form-group">
                            <label>Icons</label>
                            <select class="form-control select2bs4" name="icon" style="width: 100%;">
                                <option disabled='disabled' selected="selected">--selected--</option>
                                @foreach($icon as $item)
                                <option>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2bs4" name="status" style="width: 100%;">
                                <option selected="selected" disabled="disabled">--select--</option>
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