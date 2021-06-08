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
            <br>

            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-8">


                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <p class="card-title text-right">
                                        Add SubCategory
                                    </p>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <form method="post" action="/admin_add_subCategory">
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

    @include('admin.script')

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
        document.getElementById('downloadexcel').addEventListener('click', function() {
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