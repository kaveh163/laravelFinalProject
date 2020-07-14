<section class="slider">
    <section class="row mr-0 ml-0">
        <section class="col-12">
            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
            <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        @foreach($slider as $item)
                            <li><img src="{{asset('images/slider/'.$item->image)}}" alt="{{$item->alt}}" title="{{$item->caption}}"
                                     id="wows1_0"/>
                            </li>
{{--                            <li><img src="{{asset('slider/data1/images/laptop.jpg')}}" alt="laptop" title="laptop"--}}
{{--                                     id="wows1_1"/>--}}
{{--                            </li>--}}
{{--                            <li><img src="{{asset('slider/data1/images/perfume.jpg')}}" alt="perfume" title="perfume"--}}
{{--                                     id="wows1_2"/>--}}
{{--                            </li>--}}
{{--                            <li><img src="{{asset('slider/data1/images/shoes.jpg')}}" alt="jquery slideshow"--}}
{{--                                     title="shoes"--}}
{{--                                     id="wows1_3"/></li>--}}
{{--                            <li><img src="{{asset('slider/data1/images/spray.jpg')}}" alt="spray" title="spray"--}}
{{--                                     id="wows1_4"/></li>--}}
                        @endforeach
                    </ul>
                </div>

                <div class="ws_shadow"></div>
            </div>

            <!-- End WOWSlider.com BODY section -->
        </section>
    </section>
</section>
