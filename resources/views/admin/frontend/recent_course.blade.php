<section id="portfolio" class="section-bg">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3 class="section-title">Recent Course</h3>
            </header>

            <div class="row" data-aos="fade-up" data-aos-delay="100"">
              <div class=" col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach($recent_category as $item)
                    <li data-filter=".filter-{{$item->id}}">{{$item->name}}</li>
                    @endforeach

                </ul>
            </div>
        </div>



        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            @foreach($recent_category as $item)

            @foreach($all_course as $data)

            @if($item->id == $data->category_id)



            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$item->id}}">

                <div class="tab-pane fade active show" id="content-tabs" role="tabpanel" aria-labelledby="home-tab">

                    <div id="tabShow">
                        <div class="row no-gutters">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="item immi-slider-block development">

                                    <div class="genre-slide-image  protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#{{$data->id}}">
                                        <div class="view-block">
                                            <div class="view-img">
                                                <a href="/admin/view_course/{{$data->id}}"><img src="{{asset('images/'.$data->image)}}" alt="course" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="best-seller">trending</div>
                                            <div class="view-dtl">
                                                <div class="view-heading btm-10"><a href="#">fg</a></div>
                                                <p class="btm-10"><a herf="#">{{$data->title}} </a></p>
                                                <div class="rating">
                                                    <ul>
                                                        <li>

                                                            <div class="pull-left">No Rating</div>

                                                        </li>




                                                        <li>
                                                            (0)
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="rate text-right">
                                                    <ul>
                                                        <li><a><b>Free</b></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="{{$data->id}}" class="prime-description-block">
                                        <div class="prime-description-under-block">
                                            <div class="prime-description-under-block">
                                                <h5 class="description-heading">fg</h5>
                                                <div class="protip-img">
                                                    <a href="#"><img src="{{asset('images/'.$data->image)}}" alt="student" class="img-fluid">
                                                    </a>
                                                </div>

                                                <ul class="description-list">
                                                    <li>Classes:
                                                        0 </li>
                                                    &nbsp;
                                                    <li>
                                                        <div class="rate text-right">
                                                            <ul>
                                                                <li><a><b>Free</b></a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="main-des">
                                                    <p>sgsdaf asdf as asdf</p>
                                                </div>
                                                <div class="des-btn-block">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="protip-btn">
                                                                <a href="/admin/view_course/{{$data->id}}" class="btn btn-secondary" title="course">Go To Course</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="img-wishlist">
                                        <div class="protip-wishlist">
                                            <ul>
                                                <li class="protip-wish-btn">
                                                    <form id="demo-form2" method="post" action="https://eclass.mediacity.co.in/demo/public/show/wishlist/26" data-parsley-validate="" class="form-horizontal form-label-left">
                                                        <input type="hidden" name="_token" value="SOLNCVrS0U12Vgi7KjkXkbH1BIaiQTPV0ZSWFd3X">
                                                        <input type="hidden" name="user_id" value="1">
                                                        <input type="hidden" name="course_id" value="26">
                                                        <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>


                        <div class="view-button txt-rgt">
                            <a href="https://eclass.mediacity.co.in/demo/public/browse?id=1&amp;category=Design" class="btn btn-secondary" title="View More">View More</a>
                        </div>
                    </div>

                </div>

            </div>

            @endif

            @endforeach

            @endforeach






        </div>



        </div>
    </section>