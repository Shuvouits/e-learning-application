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
                            <h6 class="m-0 text-dark" style="font-weight:bold">Answer</h6>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                                <li class="breadcrumb-item active">Answer</li>
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

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-right">
                                       Users
                                      
                                    
                                       <a href="#"  id="downloadexcel" style="color:white; margin-left:20px" class="btn btn-primary btn-sm">CSV</a>
                                       <a href="#"  id="download" style="color:white;" class="btn btn-primary btn-sm">PDF</a>
                                       <a href="#"  onclick="myfun()" style="color:white;" class="btn btn-primary btn-sm">Print</a>
                    
                                    </h3>
                                   
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="invoice">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Answer</th>
                                                <th>Question</th>
                                                <th>Course</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($teacher_answer as $item)
                                           
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                
                                                <td>{{$item->answer}}</td>
                                                <td>{{$item->question}}</td>
                                                <td>{{$item->course}}</td>
                                               
                                                <td>
                                                   @if($item->status=='Active')
                                                   <a href="/teacher_answer_status/{{$item->id}}" class="btn btn-success btn-sm">{{$item->status}}</a>
                                                   @else
                                                   <a href="/teacher_answer_status/{{$item->id}}" class="btn btn-danger btn-sm">{{$item->status}}</a>
                                                   @endif
                                                </td>
                                                <td>
                                                   <a href="#" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                   <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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