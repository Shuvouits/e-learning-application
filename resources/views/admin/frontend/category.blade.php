<section id="categories-tab" class="categories-tab-main-block">
    <div class="container">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">

            @foreach($all_category as $item)

            <div class="item categories-tab-dtl">
                <a href="browse15bc.html?id=1&amp;category=design" title="Design"><i class="fa {{$item->icon}}"></i>{{$item->name}}</a>
            </div>

            @endforeach

        </div>
    </div>
</section>