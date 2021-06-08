<style type="text/css">
    .read-more-show {
        cursor: pointer;
        color: #0284A2;
    }

    .read-more-hide {
        cursor: pointer;
        color: #0284A2;
    }

    .hide_content {
        display: none;
    }
</style>

<!DOCTYPE html>




<html lang="en">

@include('admin.frontend.intro')

<head>

    @include('admin.frontend.link')


</head><!-- end head -->
<!-- body start-->

<body>
    <!-- preloader -->



    <div class="preloader">
        <div class="status">
        </div>
    </div>

    <!-- whatsapp chat button -->
    <div id="myButton"></div>


    <!-- end preloader -->
    <!-- top-nav bar start-->
    <div id="promo-outer">
        <div id="promo-inner">
            <a href="#">Keep your skills on point| Stay logged in to see your latest course recommendations, promos, and more.</a>
            <span id="close">x</span>
        </div>
    </div>
    <div id="promo-tab" class="display-none">SHOW</div>

    <!--start Navabr-->

    @include('admin.frontend.navbar')

    <!--End Navabr--->

    <!-- start search -->
    @include('admin.frontend.search')
    <!-- start end -->




    <!-- course detail header start -->
    <section id="about-home" class="about-home-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-home-block">
                        <h1 class="about-home-heading">{{$course_title}}</h1>
                        <p>{{$course_short_details}}</p>
                        <ul>
                            <li>
                                <div class="no-rating">
                                    No Rating
                                </div>
                            </li>



                            <li>
                                (0 Reviews)
                            </li>
                            <li>
                                1 User Enrolled
                            </li>
                        </ul>
                        <ul>
                            <li><a href="#" title="about">Created by: Admin Example </a></li>
                            <li><a href="#" title="about">Last Updated: 23rd April 2020</a></li>
                            <li><a href="#" title="about"><i class="fa fa-comment"></i></a> English</li>
                        </ul>
                    </div>
                </div>
                <!-- course preview -->
                <div class="col-lg-4">
                    <div class="about-home-icon text-white text-right">
                        <ul>
                            <li class="about-icon-one"><a href="../../login.html" title="heart"><i class="fa fa-heart rgt-10"></i>Wishlist</a></li>
                        </ul>
                    </div>

                    <div class="about-home-product">
                        <div class="video-item hidden-xs">
                            <script type="text/javascript">
                                var video_url = '<iframe width="420" height="315" src="https://www.youtube.com/embed/{{$course_url}}" frameborder="0" allowfullscreen></iframe>';
                            </script>

                            <div class="video-device">
                                <img src="{{asset('images/'.$course_image)}}" class="bg_img img-fluid" alt="Background">
                                <div class="video-preview">
                                    <a href="javascript:void(0);" class="btn-video-play"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="about-home-dtl-training">
                            <div class="about-home-dtl-block btm-10">
                                <div class="about-home-rate">
                                    <ul>

                                        <li><i class="fa fa-idr"></i>500</li>

                                        <li><span><s><i class="fa fa-idr"></i>1000</s></span></li>

                                    </ul>
                                </div>
                                <div class="about-home-btn btm-20">
                                    <a href="../../login.html" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Add To Cart</a>
                                </div>





                                <div class="about-home-includes-list btm-40">
                                    <ul class="btm-40">
                                        <li><span>Course Includes</span></li>
                                        <li><i class="fa fa-bookmark"></i>Anytime, Anywhere</li>
                                        <li><i class="fa fa-clipboard"></i>Full lifetime access</li>
                                        <li><i class="fa fa-commenting-o"></i>Access on mobile and TV</li>
                                    </ul>

                                </div>
                                <hr>

                                <div class="about-home-share text-center">
                                    <a href="#" data-toggle="modal" data-target="#myModalshare" title="share"><i class="fa fa-share rgt-10"></i>share</a>
                                </div>

                                <!--Model start-->
                                <div class="modal fade" id="myModalshare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h4 class="modal-title" id="myModalLabel">Share this course</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="box box-primary">
                                                <div class="panel panel-sum">
                                                    <div class="modal-body">


                                                        <!-- The text field -->

                                                        <div class="nav-search">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="myInput" value="sql-learn-sql-for-data-analysis.html">
                                                            </div>
                                                            <button onclick="myFunction()" class="btn btn-primary">Copy Text</button>
                                                        </div>

                                                        <div class="social-icon">

                                                            <div class="row">
                                                                <div class="col-lg-1 offset-lg-3 col-2"><a href="https://www.facebook.com/sharer/sharer.php?u=https://eclass.mediacity.co.in/demo/public/course/12/sql-learn-sql-for-data-analysis" class="social-button " id="" title=""><span class="fa fa-facebook fa-2x"></span></a></div>
                                                                <div class="col-lg-1 col-2"><a href="https://twitter.com/intent/tweet?text=&amp;url=https://eclass.mediacity.co.in/demo/public/course/12/sql-learn-sql-for-data-analysis" class="social-button " id="" title=""><span class="fa fa-twitter fa-2x"></span></a></div>
                                                                <div class="col-lg-1 col-2"><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://eclass.mediacity.co.in/demo/public/course/12/sql-learn-sql-for-data-analysis&amp;title=&amp;summary=Extra+linkedin+summary+can+be+passed+here" class="social-button " id="" title=""><span class="fa fa-linkedin fa-2x"></span></a></div>
                                                                <div class="col-lg-1 col-2"><a target="_blank" href="https://wa.me/?text=https://eclass.mediacity.co.in/demo/public/course/12/sql-learn-sql-for-data-analysis" class="social-button " id="" title=""><span class="fa fa-whatsapp fa-2x"></span></a></div>
                                                                <div class="col-lg-1 col-2"><a target="_blank" href="https://telegram.me/share/url?url=https://eclass.mediacity.co.in/demo/public/course/12/sql-learn-sql-for-data-analysis&amp;text=" class="social-button " id="" title=""><span class="fa fa-telegram fa-2x"></span></a></div>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Model close -->
                            </div>



                            <div class="container-fluid" id="adsense">
                                <!-- google adsense code -->
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
            </div>
    </section>
    <!-- course header end -->
    <!-- course detail start -->
    <section id="about-product" class="about-product-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-learn-block">
                        <h3 class="product-learn-heading">What you will learn</h2>
                            <div class="row">

                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="product-learn-dtl">
                                        <ul>
                                            <li><i class="flaticon-tick-inside-circle"></i>{{$course_intro_learn}}</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                    </div>


                    <div class="course-content-block btm-30 top-20">

                        <div class="row">
                            <div class="col-lg-8 col-6">
                                <h3>Course Content</h3>
                            </div>
                            <!--
                        FSMS commenting below div in order to show course length correctly.  
                        <div class="col-lg-4 col-6">
                            <div class="chapter-total-time">
                                26                                min
                            </div>
                        </div>
                        -->
                        </div>
                        <!-- FSMS -->
                        <div class="row" style="padding-bottom:10px">
                            <div class="col-lg-9 col-6">

                                <small>3 sections • 3 lectures • 00h 26m total length</small>

                            </div>

                            <div class="col-lg-3 col-6 col-xs-6 nopadding">
                                <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle"><span style="color:#0384a3"><strong>Expand all sections</strong></span></button>
                                <button type="button" onclick="toggleAllSections()" class="btn btn-link courseToggle" style="display:none"><span style="color:#0384a3"><strong>Collapse all sections</strong></span></button>
                            </div>
                        </div>
                        <!-- FSMS -->

                        <div class="faq-block">
                            <div class="faq-dtl">
                                <div id="accordion" class="second-accordion">

                                    <div class="card">
                                        <div class="card-header" id="headingTwo49">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo49" aria-expanded="false" aria-controls="collapseTwo">

                                                    <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            Introduction

                                                        </div>
                                                        <div class="col-lg-2 col-6">
                                                            <div class="text-right">
                                                                2 Classes
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-12">
                                                            <div class="chapter-total-time">
                                                                18
                                                            </div>
                                                        </div>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>
                                        <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo49" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->

                                        <div id="collapseTwo49" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="class-icon">
                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                            </th>

                                                            <td>

                                                                <div class="koh-tab-content">
                                                                    <div class="koh-tab-content-body">
                                                                        <div class="koh-faq">
                                                                            <div class="koh-faq-question">

                                                                                <span class="koh-faq-question-span"> Connecting to SQL Server </span>

                                                                            </div>
                                                                            <div class="koh-faq-answer">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>

                                                            </td>

                                                            <td class="txt-rgt">
                                                                6min



                                                        </tr>
                                                        <tr>
                                                            <th class="class-icon">
                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                            </th>

                                                            <td>

                                                                <div class="koh-tab-content">
                                                                    <div class="koh-tab-content-body">
                                                                        <div class="koh-faq">
                                                                            <div class="koh-faq-question">

                                                                                <span class="koh-faq-question-span"> Creating and working with tables </span>

                                                                            </div>
                                                                            <div class="koh-faq-answer">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>

                                                            </td>

                                                            <td class="txt-rgt">
                                                                12min



                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header" id="headingTwo50">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo50" aria-expanded="false" aria-controls="collapseTwo">

                                                    <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            Sql Theory

                                                        </div>
                                                        <div class="col-lg-2 col-6">
                                                            <div class="text-right">
                                                                1 Classes
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-12">
                                                            <div class="chapter-total-time">
                                                                8
                                                            </div>
                                                        </div>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>
                                        <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo50" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->

                                        <div id="collapseTwo50" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="class-icon">
                                                                <a href="#" title="Course"><i class="fa fa-play-circle"></i></a>
                                                            </th>

                                                            <td>

                                                                <div class="koh-tab-content">
                                                                    <div class="koh-tab-content-body">
                                                                        <div class="koh-faq">
                                                                            <div class="koh-faq-question">

                                                                                <span class="koh-faq-question-span"> Creating altering and dropping a database </span>

                                                                            </div>
                                                                            <div class="koh-faq-answer">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>

                                                            </td>

                                                            <td class="txt-rgt">
                                                                8min



                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header" id="headingTwo51">
                                            <div class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo51" aria-expanded="false" aria-controls="collapseTwo">

                                                    <div class="row">
                                                        <div class="col-lg-8 col-6">
                                                            Basic Terminology

                                                        </div>
                                                        <div class="col-lg-2 col-6">
                                                            <div class="text-right">
                                                                0 Classes
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2 col-12">
                                                            <div class="chapter-total-time">
                                                                0
                                                            </div>
                                                        </div>

                                                    </div>

                                                </button>
                                            </div>

                                        </div>
                                        <!--
                                    FSMS commenting below line in order to collapse all chapters by default.  
                                       <div id="collapseTwo51" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                                       
                                     -->

                                        <div id="collapseTwo51" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">

                                            <div class="card-body">
                                                <table class="table">
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="requirements">
                        <h3>Requirements</h3>
                        <ul>
                            <li class="comment more">
                                {{$course_requirements}}
                            </li>

                        </ul>
                    </div>

                    <div class="description-block btm-30">
                        <h3>Description</h3>

                        <p>

                            {{$course_description}}

                        </p>

                    </div>






                    <div class="students-bought btm-30">
                        <h3>Recently Added Courses</h3>

                        @foreach($all_course as $item)

                        @if($item->recent_course=='Yes')
                        <div class="course-bought-block">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4 col-5">
                                            <div class="course-bought-img">
                                                <a href="../24/web-design-GAUL.html"><img src="{{asset('images/'.$item->image)}}" class="img-fluid" alt="blog"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-8 col-7">
                                            <div class="course-name"><a href="../24/web-design-GAUL.html">{{$item->title}}</a></div>
                                            <div class="course-update">Last Updated 6th April 2021</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-1 col-4">
                                    <div class="course-user">
                                        <ul>
                                            <li><i class="fa fa-user"></i></li>
                                            <li>0</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-4">

                                    <div class="course-currency txt-rgt">
                                        <ul>
                                            <li class="rate"><i class="fa fa-idr"></i>50000</li>
                                            <li class="rate"><s><i class="fa fa-idr"></i>200000</s></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-4">
                                    <div class="course-rate txt-rgt">
                                        <ul>
                                            <li>
                                                <div class="heart"><a href="../../login.html" title="heart"><i class="fa fa-heart rgt-10"></i></a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @endforeach

                    </div>

                    <div class="about-instructor-block">
                        <h3>About the Instructor</h3>

                        @foreach($collect_teacher_email as $item)

                        <div class="about-instructor btm-40">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="instructor-img btm-30">

                                        <a href="#" title="instructor"><img src="{{asset('images/'.$item->image)}}" class="img-fluid" alt="instructor"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <div class="instructor-block">
                                        <div class="instructor-name btm-10"><a href="#" title="instructor-name"> Teacher </a></div>
                                        <div class="instructor-post btm-20">About the Instructor</div>
                                        <p>
                                        <p><strong style="margin: 0px; padding: 0px; font-family: 'Open Sans', Arial, sans-serif; text-align: justify;"></strong><span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">{{$item->details}}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        @endforeach

                        @foreach($collect_admin_email as $item)

                        <div class="about-instructor btm-40">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="instructor-img btm-30">

                                        <a href="../../instructor/1/11.html" title="instructor"><img src="{{asset('images/'.$item->image)}}" class="img-fluid" alt="instructor"></a>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8">
                                    <div class="instructor-block">
                                        <div class="instructor-name btm-10"><a href="#" title="instructor-name"> Admin </a></div>
                                        <div class="instructor-post btm-20">About the Instructor</div>
                                        <p>
                                        <p><strong style="margin: 0px; padding: 0px; font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">{{$item->details}}</strong><span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;"></p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>


                    <div class="learning-review btm-40">




                    </div>


                    <div class="more-courses btm-30">
                        <h2 class="more-courses-heading">Related Courses</h2>
                        <div class="row">

                            @foreach($related_course as $item)

                            @if($item->id == $current_course_id)
                           

                            @else
                            <div class="col-lg-6 col-sm-6">
                                <div class="together-img">
                                    <div class="student-view-block">
                                        <div class="view-block">
                                            <div class="view-img">
                                                <a href="../10/the-mordern-javascript-the-complete-guide.html"><img src="{{asset('images/'.$item->image)}}" alt="student">
                                                </a>
                                            </div>

                                            <div class="heart">
                                                <a href="../../login.html" title="heart"><i class="fa fa-heart rgt-10"></i></a>
                                            </div>


                                            <div class="view-dtl">
                                                <div class="view-heading btm-10"><a href="../10/the-mordern-javascript-the-complete-guide.html">{{$item->title}}</a></div>
                                                <p class="btm-10"><a herf="#">by Instructor</a></p>
                                                <div class="rating">
                                                    <ul>
                                                        <li>
                                                            <div class="pull-left no-rating">
                                                                No Rating
                                                            </div>
                                                        </li>


                                                    </ul>
                                                </div>

                                                <div class="rate text-right">
                                                    <ul>
                                                        <li><a><b><i class="fa fa-idr"></i>800</b></a></li>&nbsp;
                                                        <li><a><b><strike><i class="fa fa-idr"></i>1000</strike></b></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                            @endforeach
                           
                        </div>
                    </div>
                    <div class="report-abuse text-center btm-20">
                        <a href="../../login.html" title="report"><i class="fa fa-flag rgt-10"></i>Report</a>
                    </div>

                    <!--Model start-->
                    <!--Model close -->
                </div>

            </div>
        </div>
    </section>
    <!-- course detail end -->
    <!-- testimonial end -->
    <!-- footer start -->
    <footer id="footer" class="footer-main-block">
        <div class="container">
            <div class="footer-block">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-logo">
                            <a href="https://eclass.mediacity.co.in/demo/public" title="logo"><img src="../../images/logo/footer_logo.png" alt="logo" class="img-fluid"></a>
                        </div>



                        <div class="mobile-btn">
                        </div>


                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="widget"><b>Demo 01</b></div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="../../login.html" title="Become an instructor">Become An Instructor</a></li>
                                <li><a href="../../about/show.html" title="About Us">About us</a></li>

                                <li><a href="../../user_contact.html" title="Contact Us">Contact us</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget"><b>Demo 02</b></div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="../../show/careers.html" title="Careers">Careers</a></li>
                                <li><a href="../../all/blog.html" title="Blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget"><b>Demo 03</b></div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="../../show/help.html" title="Help">Help &amp; Support</a></li>

                                <li><a href="../../pages/%e0%b8%ab%e0%b8%99%e0%b9%89%e0%b8%b2%e0%b9%80%e0%b8%9e%e0%b8%b4%e0%b9%88%e0%b8%a1%e0%b9%80%e0%b8%95%e0%b8%b4%e0%b8%a1.html" title="Test">Test</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">

                        <div class="footer-dropdown">
                            <a href="#" class="a" data-toggle="dropdown"><i class="fa fa-globe rgt-15"></i>En<i class="fa fa-angle-up lft-10"></i></a>


                            <ul class="dropdown-menu">

                                <a href="../../browseaf2a.html">
                                    <li>English</li>
                                </a>
                                <a href="sql-learn-sql-for-data-analysis.html">
                                    <li>Arabic</li>
                                </a>
                                <a href="sql-learn-sql-for-data-analysis.html">
                                    <li>Urdu</li>
                                </a>
                                <a href="sql-learn-sql-for-data-analysis.html">
                                    <li>Jawa</li>
                                </a>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="tiny-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo-footer">
                            <ul>

                                <li>Copyright © 2020 eClass.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright-social">
                            <ul>
                                <li><a href="../../terms_condition.html" title="Terms">Terms &amp; Condition</a></li>
                                <li><a href="../../privacy_policy.html" title="Policy">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" style="z-index: 99999999999999999;" id="myModalinstructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Become An Instructor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="box box-primary">
                    <div class="panel panel-sum">
                        <div class="modal-body">
                            <div class="box-footer">
                                <button type="submit" onclick="window.location.href = '../../login.html';" class="btn btn-lg col-md-3 btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- footer end -->

    <!-- jquery -->

    @include('admin.frontend.script')

    <!-- end jquery -->
</body>
<!-- body end -->

<!-- Mirrored from eclass.mediacity.co.in/demo/public/course/12/sql-learn-sql-for-data-analysis by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 01:46:05 GMT -->

</html>