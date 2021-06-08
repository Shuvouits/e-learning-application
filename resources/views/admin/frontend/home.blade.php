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

    <!---start navbar-->

    @include('admin.frontend.navbar')

    <!---End Navbar--->

    <!-- start search -->
    @include('admin.frontend.search')
    <!-- start end -->


   




    <!-- categories-tab start-->

    @include('admin.frontend.category')
   

    <!---End Category-tab-->

    <!-- slider start-->

     @include('admin.frontend.slider')

    <!-- slider end -->

    <!-- learning-work start -->
    <section id="learning-work" class="learning-work-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="learning-work-block">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="learning-work-icon">
                                    <i class="fa fa-anchor"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="learning-work-dtl">
                                    <div class="work-heading">Learn Anytime, Anywhere</div>
                                    <p>Online Courses for Creative</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="learning-work-block">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="learning-work-icon">
                                    <i class="fa fa-magic"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="learning-work-dtl">
                                    <div class="work-heading">Beacome a researcher</div>
                                    <p>Improve Your Skills Online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="learning-work-block">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="learning-work-icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="learning-work-dtl">
                                    <div class="work-heading">Most Popular Courses</div>
                                    <p>Learn on your schedule</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----End learning-work--->
   
   

   

    <!-- ======= Portfolio Section ======= -->

    @include('admin.frontend.recent_course')
    
    <!-- End Portfolio Section -->








    <!-- Featured Course -->

    @include('admin.frontend.feature')

    <!--  end featured course -->


    <!-- Subscription Bundle start -->

    <section id="subscription" class="student-main-block">
        <div class="container">
        </div>
    </section>
   
    <!-- Subscription Bundle end -->

    <!-- Bundle start -->
    @include('admin.frontend.bundle_course')
    <!-- Bundle end -->

    <!-- Advertisement -->



    <!-- Batch start -->

    <section id="batch-block" class="student-main-block">
        <div class="container">

        </div>
    </section>

    <!-- Batch end -->

    <!-- Zoom start -->
    @include('admin.frontend.zoom')
    <!-- Zoom end -->


    <!-- Bundle start -->
    <section id="student" class="student-main-block">
        <div class="container">

        </div>
    </section>
    <!-- Bundle end -->

    <!-- Bundle start -->
    <section id="student" class="student-main-block">
        <div class="container">

            <h4 class="student-heading">Recent Blogs</h4>
            <div id="blog-post-slider" class="student-view-slider-main-block owl-carousel">


                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-81">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/1.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157977947577.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/1.html">Blogging Courses, Trainin...</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 23-01-2020 | 12:37:55 PM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-81" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Blogging Courses, Training, Classes &amp; Tutorials Online</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/1.html"><img src="images/blog/157977947577.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default mod</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-88">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/8.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/1608275749photo-1458349726531-234ad56ba80f.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/8.html">cccc</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 18-12-2020 | 08:15:49 AM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-88" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">cccc</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/8.html"><img src="images/blog/1608275749photo-1458349726531-234ad56ba80f.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>cccccccc</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-87">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/7.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/1608275417photo-1488646953014-85cb44e25828.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/7.html">Test</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 18-12-2020 | 08:10:17 AM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-87" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Test</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/7.html"><img src="images/blog/1608275417photo-1488646953014-85cb44e25828.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>wwwwwwwwwww</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-86">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/6.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978219697.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/6.html">Built to Blog</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 23-01-2020 | 01:23:16 PM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-86" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Built to Blog</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/6.html"><img src="images/blog/157978219697.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat p</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-85">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/5.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978167090.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/5.html">Build a Successful Creati...</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 23-01-2020 | 01:13:30 PM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-85" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Build a Successful Creative Blog</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/5.html"><img src="images/blog/157978167090.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat p</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-84">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/4.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978163994.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/4.html">Blogging for Your Busines...</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 23-01-2020 | 01:12:09 PM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-84" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Blogging for Your Business</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/4.html"><img src="images/blog/157978163994.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat p</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-83">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/3.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978055225.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/3.html">Blogging Masterclass</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 23-01-2020 | 12:55:27 PM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-83" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Blogging Masterclass</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/3.html"><img src="images/blog/157978055225.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>Lorem Ipsum&amp;amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in th</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-82">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="detail/blog/2.html"><img data-src="https://eclass.mediacity.co.in/demo/public/images/blog/157978018683.jpg" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="detail/blog/2.html">Blogging &amp; Content Writin...</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 23-01-2020 | 12:41:34 PM</a></p>

                            </div>

                        </div>
                    </div>
                    <div id="prime-next-item-description-block-82" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">Blogging &amp; Content Writing Masterclass</h5>
                                <div class="protip-img">
                                    <a href="detail/blog/2.html"><img src="images/blog/157978018683.jpg" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p>Lorem Ipsumis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s wi</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Bundle end -->

    <!-- recommendations start -->
    <section id="border-recommendation" class="border-recommendation">

        <div class="top-border"></div>
        <div class="recommendation-main-block  text-center" style="background-image: url('images/getstarted/159748969215908739281579934374banner%20(1.html).jpg')">
            <div class="container">
                <h3 class="text-white"></h3>
                <p class="text-white btm-20"></p>

            </div>
        </div>
    </section>
    <!-- recommendations end -->



    <!-- feature categories start -->


    @include('admin.frontend.feature_category')




    <!-- feature categories end -->


    <!-- testimonial start -->
    <section id="testimonial" class="testimonial-main-block">
        <div class="container">
            <h3 class="btm-30">What our students have to say</h3>
            <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">

                <div class="item testimonial-block">
                    <ul>
                        <li><img data-src="https://eclass.mediacity.co.in/demo/public/images/testimonial/157968868531.jpg" alt="blog" class="img-fluid owl-lazy"></li>
                        <li>
                            <h5 class="testimonial-heading">Admin</h5>
                        </li>
                    </ul>
                    <p>
                    <p><span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,...</p>
                </div>
                <div class="item testimonial-block">
                    <ul>
                        <li><img data-src="https://eclass.mediacity.co.in/demo/public/images/testimonial/158133327542.jpg" alt="blog" class="img-fluid owl-lazy"></li>
                        <li>
                            <h5 class="testimonial-heading">John Doe</h5>
                        </li>
                    </ul>
                    <p>
                    <p><span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,...</p>
                </div>
                <div class="item testimonial-block">
                    <ul>
                        <li><img data-src="https://eclass.mediacity.co.in/demo/public/images/testimonial/157968912636.png" alt="blog" class="img-fluid owl-lazy"></li>
                        <li>
                            <h5 class="testimonial-heading">Mary Carr</h5>
                        </li>
                    </ul>
                    <p>
                    <p><span style="font-family: 'Open Sans', Arial, sans-serif; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,...</p>
                </div>
            </div>

        </div>
    </section>


    <!-- Advertisement -->


    <section id="trusted" class="trusted-main-block">
        <div class="container">
            <div class="patners-block">

                <h6 class="patners-heading text-center btm-40">Trusted by companies</h6>
                <div id="patners-slider" class="patners-slider owl-carousel">
                    <div class="item-patners-img">
                        <a href="https://mediacity.co.in/" target="_blank"><img data-src="https://eclass.mediacity.co.in/demo/public/images/trusted/trust_158114996587.jpg" class="img-fluid owl-lazy" alt="patners-1"></a>
                    </div>
                    <div class="item-patners-img">
                        <a href="https://mediacity.co.in/" target="_blank"><img data-src="https://eclass.mediacity.co.in/demo/public/images/trusted/157977781488.jpg" class="img-fluid owl-lazy" alt="patners-1"></a>
                    </div>
                    <div class="item-patners-img">
                        <a href="https://mediacity.co.in/" target="_blank"><img data-src="https://eclass.mediacity.co.in/demo/public/images/trusted/157977812389.jpg" class="img-fluid owl-lazy" alt="patners-1"></a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="trusted" class="trusted-main-block">
        <!-- google adsense code -->
        <div class="container-fluid" id="adsense">
        </div>
    </section>

    <!-- testimonial end -->
    <!-- footer start -->
    <footer id="footer" class="footer-main-block">
        <div class="container">
            <div class="footer-block">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-logo">
                            <a href="https://eclass.mediacity.co.in/demo/public" title="logo"><img src="images/logo/footer_logo.png" alt="logo" class="img-fluid"></a>
                        </div>



                        <div class="mobile-btn">
                        </div>


                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="widget"><b>Demo 01</b></div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="login.html" title="Become an instructor">Become An Instructor</a></li>
                                <li><a href="about/show.html" title="About Us">About us</a></li>

                                <li><a href="user_contact.html" title="Contact Us">Contact us</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget"><b>Demo 02</b></div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="show/careers.html" title="Careers">Careers</a></li>
                                <li><a href="all/blog.html" title="Blog">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget"><b>Demo 03</b></div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="show/help.html" title="Help">Help &amp; Support</a></li>

                                <li><a href="pages/%e0%b8%ab%e0%b8%99%e0%b9%89%e0%b8%b2%e0%b9%80%e0%b8%9e%e0%b8%b4%e0%b9%88%e0%b8%a1%e0%b9%80%e0%b8%95%e0%b8%b4%e0%b8%a1.html" title="Test">Test</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">

                        <div class="footer-dropdown">
                            <a href="#" class="a" data-toggle="dropdown"><i class="fa fa-globe rgt-15"></i>En<i class="fa fa-angle-up lft-10"></i></a>


                            <ul class="dropdown-menu">

                                <a href="home.html">
                                    <li>English</li>
                                </a>
                                <a href="home.html">
                                    <li>Arabic</li>
                                </a>
                                <a href="home.html">
                                    <li>Urdu</li>
                                </a>
                                <a href="home.html">
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
                                <li><a href="terms_condition.html" title="Terms">Terms &amp; Condition</a></li>
                                <li><a href="privacy_policy.html" title="Policy">Privacy Policy</a></li>
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
                                <button type="submit" onclick="window.location.href = 'login.html';" class="btn btn-lg col-md-3 btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- footer end -->


    <!-- jquery -->
    @include('admin.frontend.script')
    <!-- end jquery -->
</body>
<!-- body end -->

<!-- Mirrored from eclass.mediacity.co.in/demo/public/home by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 01:36:27 GMT -->

</html>