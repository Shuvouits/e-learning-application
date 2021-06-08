<section id="student" class="student-main-block">
        <div class="container">
            <h4 class="student-heading">Zoom Meetings</h4>
            <div id="zoom-view-slider" class="student-view-slider-main-block owl-carousel">

                @foreach($all_course as $item)

                @if($item->zoom=='Yes')
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image  protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#{{$item->id}}">
                        <div class="view-block">
                            <div class="view-img">

                                <a href="#"><img data-src="{{asset('images/'.$item->image)}}" alt="course" class="img-fluid owl-lazy"></a>


                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10">Time</div>
                                <p class="btm-10"><a herf="#">by Admin Example </a></p>

                                <p class="btm-10"><a herf="#">Start At: 20-09-2020 | 01:00:00 PM</a></p>
                            </div>
                        </div>
                    </div>
                    <div id="{{$item->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><a href="zoom/detail/18.html">Time</a></h5>
                                <div class="protip-img">
                                    <h3 class="description-heading">by Admin </h>
                                        <p class="meeting-owner btm-10"><a herf="#">Meeting Owner: <span class="__cf_email__" data-cfemail="660809150e03080e131515070f0826010b070f0a4805090b">[email&#160;protected]</span></a></p>
                                </div>
                                <div class="main-des">
                                    <p class="btm-10"><a herf="#">Start At: 20-09-2020 | 01:00:00 PM</a></p>
                                </div>
                                <div class="des-btn-block">
                                    <a href="https://us04web.zoom.us/s/74973649357?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJHY1hwUzVNVlFqS2JENS1lQmg2OWRBIiwiaXNzIjoid2ViIiwic3R5Ijox" target="_blank" class="btn btn-light">Join Meeting</a>
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