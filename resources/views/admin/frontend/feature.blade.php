<section id="student" class="student-main-block">
        <div class="container">
            <h4 class="student-heading">Featured Courses</h4>
            <div id="student-view-slider" class="student-view-slider-main-block owl-carousel">
                @foreach($all_course as $item)

                @if($item->featured=='Yes')
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#{{$item->id}}">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="course/1/wordpress-theme-development.html"><img data-src="{{asset('images/'.$item->image)}}" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="best-seller">trending</div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="course/1/wordpress-theme-development.html">{{$item->title}}</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>
                                <div class="rating">
                                    <ul>
                                        <li>


                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:86.666666666667%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>


                                        </li>
                                        <!-- overall rating-->

                                        <li>
                                            <b>4.3</b>
                                        </li>
                                        <li>
                                            (1)
                                        </li>
                                    </ul>
                                </div>
                                <div class="rate text-right">
                                    <ul>

                                        <li><a><b><i class="fa fa-idr"></i>800</b></a></li>&nbsp;
                                        <li><a><b><strike><i class="fa fa-idr"></i>1000</strike></b></a></li>

                                    </ul>
                                </div>
                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            <li class="protip-wish-btn"><a href="login.html" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="{{$item->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{$item->title}}</h5>
                                <div class="protip-img">
                                    <a href="course/1/wordpress-theme-development.html"><img src="{{asset('images/'.$item->image)}}" alt="student" class="img-fluid">
                                    </a>
                                </div>

                                <ul class="description-list">
                                    <li>Classes:
                                        13 </li>
                                    &nbsp;
                                    <li>
                                        <div class="rate text-right">
                                            <ul>

                                                <li><a><b><i class="fa fa-idr"></i>800</b></a></li>&nbsp;
                                                <li><a><b><strike><i class="fa fa-idr"></i>1000</strike></b></a></li>

                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                                <div class="main-des">
                                    <p>Have access to a code editor, free or otherwise. I suggest Coda 2, as that&#039;s the editor I use exclusively.</p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="protip-btn">
                                                <a href="login.html" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Add To Cart</a>
                                            </div>
                                        </div>
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
    </section>