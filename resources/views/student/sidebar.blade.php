<div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="images/avater.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        @foreach($student_data as $item)
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
                            <a href="#" class="nav-link {{$my_course}}">
                            
                                <p>
                                    My Course
                                   
                                </p>
                            </a>
                           
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{$my_wishlist}}">
                                
                                <p>
                                    My Wishlist    
                                </p>
                            </a>
                            
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{$purchase_history}}" >
                                
                                <p>
                                    Purchase History   
                                </p>
                            </a>
                            
                        </li>

                        <li class="nav-item">
                            <a href="/student_dashboard" class="nav-link {{$my_profile}}">
                                
                                <p>
                                    My Profile    
                                </p>
                            </a>
                            
                        </li>

                        <li class="nav-item">
                            <a href="/student_instructor" class="nav-link {{$become_instructor}}">
                                
                                <p>
                                    Become An Instructor   
                                </p>
                            </a>
                            
                        </li>

                        <li class="nav-item">
                            <a href="/student_bank_details" class="nav-link {{$bank_details}}">
                            
                                <p>
                                    My Bank Details    
                                </p>
                            </a>
                            
                        </li>




                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>