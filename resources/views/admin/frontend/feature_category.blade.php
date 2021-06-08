<section id="categories" class="categories-main-block">
        <div class="container">
            <h3 class="categories-heading btm-30">Featured Categories</h3>
            <div class="row">



                @foreach($all_category as $item)

                @if($item->featured=='Yes')


                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="image-container">
                        <a href="browseaf2a.html?id=1&amp;category=Design">

                            <div class="image-overlay">
                                <i class="fa fa-slideshare"></i>{{$item->name}}
                            </div>

                            <img src="{{asset('/images/'.$item->image)}}">
                        </a>
                    </div>

                </div>

                @endif

                @endforeach

            </div>
        </div>
    </section>