<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            @foreach($teacher_data as $item)

            @if($item->image=="")
            <div class="image">
                <img src="images/avater.png" class="img-circle elevation-2" alt="User Image">
            </div>
            @else
            <div class="image">
                <img src="{{asset('images/' .$item->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @endif

            @endforeach

            <div class="info">
                @foreach($teacher_data as $item)
                <a href="#" class="d-block">{{$item->first_name}}</a>
                @endforeach
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->


                <li class="nav-item">

                    <a href='/teacher_dashboard' class='nav-link {{$dashboard}}'>
                    
                        <p>
                            {{__('message.Dashboard')}}


                        </p>
                    </a>

                </li>




                <li class='nav-item has-treeview {{$category_open}}'>
                    <a href='#' class='nav-link'>
                        
                        <p>
                            {{__('message.Category')}}
                            <i class='fas fa-angle-left right'></i>

                        </p>
                    </a>
                    <ul class='nav nav-treeview'>
                        <li class='nav-item'>
                            <a href='/teacher_category' class='nav-link {{$category}}'>
                            
                                <p>{{__('message.Categories')}}</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/teacher_sub_category' class='nav-link {{$sub_category}}'>
                                
                                <p>{{__('message.SubCategories')}}</p>
                            </a>
                        </li>
                        <li class='nav-item'>
                            <a href='/teacher_child_category' class='nav-link {{$child_category}}'>
                            
                                <p>{{__('message.ChildCategories')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item has-treeview {{$course_open}}">
                    <a href="#" class="nav-link">
                        
                        <p>
                            {{__('message.Course')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher_course" class="nav-link {{$course}}">
                                
                                <p>{{__('message.Courses')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher_course_language" class="nav-link {{$course_language}}">
                                
                                <p>{{__('message.Courses Language')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{$multiple_instructor}}">
                    <a href="#" class="nav-link">
                    
                        <p>
                            {{__('message.Multiple Instructor')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher_request_involve" class="nav-link {{$request_involve}}">
                                
                                <p>{{__('message.Request To Involve')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher_involvement_request" class="nav-link {{$involvement_request}}">
                                
                                <p>{{__('message.Involvement Request')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher_involve_course" class="nav-link {{$involve_course}}">
                            
                                <p>{{__('message.Involve In Course')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/teacher_user_enrolled" class="nav-link {{$user_enrolled}}">
                        
                        <p>
                            {{__('message.User Enrolled')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview {{$question_menu}}">
                    <a href="" class="nav-link">
                    
                        <p>
                            {{__('message.Question / Answer')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher_question_answer" class="nav-link {{$question}}">
                                
                                <p>{{__('message.Question')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/teacher_answer" class="nav-link {{$answer}}">
                                
                                <p>{{__('message.Answer')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/teacher_announcement" class="nav-link {{$announcement}}">
                    
                        <p>
                            {{__('message.Announcement')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="/teacher_blog" class="nav-link {{$blog}}">
                    
                        <p>
                            {{__('message.Blog')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="/teacher_featured_course" class="nav-link {{$featured_course}}">
                        
                        <p>
                            {{__('message.Featured Courses')}}


                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        
                        <p>
                            Zoom Live Meeting
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                            
                                <p>Zoom Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                
                                <p>Zoom Dashboard</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    
                        <p>
                            Big Blue Meeting
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                            
                                <p>List Meeting</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview {{$my_revenue}}">
                    <a href="#" class="nav-link">
                        
                        <p>
                            {{__('message.My Revenue')}}
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/teacher_pending_payout" class="nav-link {{$pending_payout}}">
                            
                                <p>{{__('message.Pending Payout')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/teacher_completed_payout" class="nav-link {{$completed_payout}}">
                                
                                <p>{{__('message.Completed Payout')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/teacher_payment_setting" class="nav-link {{$payment_setting}}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            {{__('message.Payment Setting')}}


                        </p>
                    </a>

                </li>






            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>