<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>




    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
           <a href="/admin_home" class="nav-link">Visit Site</a>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
             
           
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa fa-globe"></i> {{$language}}

            </a>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                <a href="/admin_dashboard/English" class="dropdown-item">
                    English
                </a>
                <div class="dropdown-divider"></div>
                <a href="/admin_dashboard/Bangla" class="dropdown-item">
                   Bangla
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                   Hindi
                </a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            @foreach($admin_data as $item)
                @if($item->image=="")
                    <image src="{{asset('images/avater.png')}}" class="img-thumbnail" style='width:40px; height:40px; margin-top:-10px'></image>
                @else
                    <image src="{{asset('images/' .$item->image)}}" class="img-thumbnail" style='width:40px; height:40px; margin-top:-10px'></image>
                @endif
               
            @endforeach
            </a>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                <a href="/admin_profile" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">

                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <span><i class="fa fa-user"></i></span>
                                <span style="margin-left:10px">Profile</span>

                            </h3>

                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>

                <a href="/admin_profile" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">

                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <span><i class="fa fa-key"></i></span>
                                <span style="margin-left:10px">Change Password</span>

                            </h3>

                        </div>
                    </div>
                    <!-- Message End -->
                </a>


                <div class="dropdown-divider"></div>

                <a href="/admin_logout" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">

                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <span><i class="fa fa-sign-out"></i></span>
                                <span style="margin-left:10px">Logout</span>

                            </h3>

                        </div>
                    </div>
                    <!-- Message End -->
                </a>


            </div>
        </li>


    </ul>

</nav>