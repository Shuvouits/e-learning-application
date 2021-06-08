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

                                        Instructor Request
                                    </h3>
                                </div>




                                <div class="card-body">
                                    @foreach($teacher_data as $item)
                                    <img src="{{asset('images/'.$item->image)}}" class="img-thumbnail" style="width:100px; height:100px">
                                    <div class="description">
                                    <p>Name: {{$item->first_name}}</p>
                                    <p>Phone: {{$item->phone}}</p>
                                    <p>Email: {{$item->email}}</p>
                                    <p>Details: {{$item->details}}</p>
                                    @if($item->reume=='')
                                    <p>Resume: No Resume Found</p>
                                    
                                    @else
                                    <p>Resume: Download <a href="{{asset('images/CV CODE.pdf')}}"><i class="fa fa-download"></i></a></p>
                                    @endif
                                    </div>
                                  

                                    @endforeach
                                </div>





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

    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/teacher_ajax_course_category_edit',
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

    <script>
        $(document).ready(function() {
            $('#sub_category').change(function() {
                var id = $(this).val();
                var token = $('input[name="_token"]').val();

                // console.log(token)

                $.ajax({

                    url: '/teacher_ajax_course_subcategory_edit',
                    method: 'post',
                    dataType: "json",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(result) {

                        $('#child_category').html(result);

                    }
                })

            })
        })
    </script>

</body>

</html>