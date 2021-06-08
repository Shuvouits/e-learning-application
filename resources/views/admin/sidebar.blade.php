<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @foreach($admin_data as $item)

            @if($item->image=="")
            <div class="image">
                <img src="{{asset('images/avater.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @else
            <div class="image">
                <img src="{{asset('images/' .$item->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @endif

            @endforeach

            <div class="info">
                @foreach($admin_data as $item)
                <a href="#" class="d-block">{{$item->name}}</a>
                @endforeach
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->


                <li class="nav-item">

                    <a href='/admin_dashboard' class='nav-link {{$dashboard}}'>
                        <i class="fa fa-dashboard"></i>

                        <p>
                            {{__('message.Dashboard')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">

                    <a href='/admin_profile' class='nav-link {{$user}}'>
                       <i class="fa fa-user"></i>

                        <p>
                            {{__('message.User')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">

                    <a href='/admin_course' class='nav-link {{$course}}'>
                        <i class="fa fa-graduation-cap"></i>

                        <p>
                            {{__('message.Course')}}


                        </p>
                    </a>

                </li>

                <li class='nav-item has-treeview {{$category_open}}'>
                    <a href='#' class='nav-link {{$category}} {{$sub_category}} {{$child_category}}'>
                        <i class="fa fa-tag" aria-hidden="true"></i>

                        <p>
                            {{__('message.Category')}}
                            <i class='fas fa-angle-left right'></i>

                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='/admin_category' class='nav-link {{$category}}'>
                                <i class="fa fa-list" aria-hidden="true"></i>

                                <p>{{__('message.Categories')}}</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/admin_sub_category' class='nav-link {{$sub_category}}'>
                                <i class="fa fa-list-alt" aria-hidden="true"></i>

                                <p>{{__('message.SubCategories')}}</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/admin_child_category' class='nav-link {{$child_category}}'>
                                <i class="fa fa-child" aria-hidden="true"></i>

                                <p>{{__('message.ChildCategories')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">

                    <a href='/admin_instructor' class='nav-link {{$instructor}}'>
                        <i class="fa fa-user" aria-hidden="true"></i>

                        <p>
                            {{__('message.Instructor')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">

                    <a href='/admin_order' class='nav-link {{$order}}'>
                    <i class="fa fa-first-order" aria-hidden="true"></i>

                        <p>
                            {{__('message.Orders')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">

                    <a href='/admin_refund_order' class='nav-link {{$refund_order}}'>
                        <i class="fa fa-refresh" aria-hidden="true"></i>

                        <p>
                            {{__('message.Refund Orders')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">

                    <a href='/admin_multiple_instructor' class='nav-link {{$multiple_instructor}}'>
                         <i class="fa fa-certificate" aria-hidden="true"></i>

                        <p>
                            {{__('message.Multiple Instructor')}}


                        </p>
                    </a>

                </li>











                <li class="nav-item has-treeview {{$zoom_live_menu}}">
                    <a href="#" class="nav-link {{$zoom_meeting}} {{$create_zoom_meeting}}">
                        <i class="fa fa-search"></i>

                        <p>
                            Zoom Live Meeting
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        

                        <li class="nav-item">
                            <a href="/create_zoom_meeting" class="nav-link {{$create_zoom_meeting}}">
                                <i class="fa fa-plus"></i>

                                <p>Create Zoom Meeting</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/zoom_meeting" class="nav-link {{$zoom_meeting}}">
                                <i class="fa fa-cube"></i>

                                <p>All Zoom Meeting</p>
                            </a>
                        </li>


                    </ul>
                </li>

               

                <li class="nav-item has-treeview {{$instructor_payout}}">
                    <a href="#" class="nav-link {{$payment_setting}} {{$pending_payout}} {{$completed_payout}}">

                        <p>
                            {{__('message.Instructor Payout')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/admin_payment_setting" class="nav-link {{$payment_setting}}">

                                <p>
                                    {{__('message.Payment Setting')}}


                                </p>
                            </a>

                        </li>


                        <li class="nav-item">
                            <a href="/admin_pending_payout" class="nav-link {{$pending_payout}}">

                                <p>{{__('message.Pending Payout')}}</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="/admin_completed_payout" class="nav-link {{$completed_payout}}">

                                <p>{{__('message.Completed Payout')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>








            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>