<section id="bundle-block" class="student-main-block">
        <div class="container">
            <h4 class="student-heading">Bundle Courses</h4>

            <div id="bundle-view-slider" class="student-view-slider-main-block owl-carousel">

                @foreach($all_course as $item)

                @if($item->bundle=='Yes')

                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#{{$item->id}}">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="bundle/detail/2.html"><img data-src="{{asset('images/'.$item->image)}}" alt="course" class="img-fluid owl-lazy"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="bundle/detail/2.html">{{$item->subcategory_name}}</a></div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Created At: 13-06-2020</a></p>

                                <div class="rate text-right">
                                    <ul>

                                        <li><a><b><i class="fa fa-idr"></i>2000</b></a></li>&nbsp;
                                        <li><a><b><strike><i class="fa fa-idr"></i>2500</strike></b></a></li>

                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div id="{{$item->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading">{{$item->subcategory_name}}</h5>
                                <div class="protip-img">
                                    <a href="bundle/detail/2.html"><img src="{{$item->image}}" alt="student" class="img-fluid">
                                    </a>
                                </div>



                                <div class="main-des">
                                    <p>
                                    <h2>Coding is the procedure by which an individual scientist takes a snippet of data from enactment, strategy, or some other source and makes an interpretation of it into a lot of attributes that can...</p>
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