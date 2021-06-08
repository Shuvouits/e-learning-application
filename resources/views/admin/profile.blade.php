<!DOCTYPE html>
<html>

<head>
    @include('admin.link')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        @include('admin.navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>



                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>

                        <div class="col-md-12">
                            <br>

                            @if(Session::has('basic_information'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('basic_information') }}
                            </div>
                            @endif

                            @if(Session::has('admin_password_length'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('admin_password_length') }}
                            </div>
                            @endif

                            @if(Session::has('password'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('password') }}
                            </div>
                            @endif

                            @if(Session::has('admin_password_not_match'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('admin_password_not_match') }}
                            </div>
                            @endif

                            @if(Session::has('setting'))
                            <div class="alert alert-secondary  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ Session::get('setting') }}
                            </div>
                            @endif



                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    @foreach($admin_data as $item)

                                    @if($item->image=='')
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset('../../dist/img/user4-128x128.jpg')}}" alt="User profile picture">
                                    </div>
                                    @else

                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset('images/'.$item->image)}}" alt="User profile picture">
                                    </div>
                                    @endif

                                    <h3 class="profile-username text-center">{{$item->name}}</h3>
                                    <p class="text-muted text-center">{{$item->email}}</p>

                                    @endforeach





                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Teachers</b> <a class="float-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Total Order</b> <a class="float-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Users</b> <a class="float-right">13,287</a>
                                        </li>
                                    </ul>

                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Basic Information</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Password</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        @foreach($admin_data as $item)
                                        <div class="active tab-pane" id="activity">
                                            <form method="post" action="/admin_basic_information">
                                                {{@csrf_field()}}
                                                <div class="form-group">
                                                    <label for='fname'>First Name</label>
                                                    <input type="text" class="form-control" id="fname" name="fname" value="{{$item->name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for='email'>E-Mail</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$item->email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for='mobile'>Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{$item->phone}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for='address'>Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$item->address}}">
                                                </div>

                                                <input type="submit" class="btn btn-primary" value="Update">

                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                        @endforeach


                                        <div class="tab-pane" id="timeline">

                                            <form method="post" action="/admin_profile_password_change">
                                                {{@csrf_field()}}
                                                <div class="form-group">
                                                    <label for='cpass'>Current Password</label>
                                                    <input type="password" id="cpass" required class="form-control" name="cpassword" placeholder="Enter Your Current Password">
                                                </div>

                                                <div class="form-group">
                                                    <label for='upass'>Update Password</label>
                                                    <input type="password" id="upass" required class="form-control" name="upassword" placeholder="Enter Your Updated Password">
                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Update">

                                            </form>

                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="settings">

                                            @foreach($admin_data as $item)
                                            <form method="post" action="/admin_setting" enctype="multipart/form-data">
                                                {{@csrf_field()}}
                                                <div class="form-group">
                                                    <label>Preview:</label>
                                                    <br>
                                                    <input type="file" class="btn btn-primary btn-sm" name='image' onchange="readURL(this);" >
                                                    @if($item->image=='')
                                                    <img src="{{asset('images/avater.png')}}" id="blah" class="img-thumbnail" style="width: 50px; height:50px">
                                                    @else
                                                    <img src="{{asset('images/'.$item->image)}}" id="blah" class="img-thumbnail" style="width: 50px; height:50px">
                                                    @endif
                                                </div>

                                                

                                                <div class="form-group">
                                                    <label for="details">Details:</label>
                                                    <textarea class="form-control" rows="5" name="details" id="details">{{$item->details}}</textarea>
                                                </div>

                                                <input type="submit" class="btn btn-primary" value="Update">

                                            </form>
                                            @endforeach
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('admin.script');

    <!---image script--->
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