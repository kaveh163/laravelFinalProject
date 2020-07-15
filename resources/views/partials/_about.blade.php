<section class="about">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-capitalize text-center">about me</h1>
            <section class="borderAbout"></section>
            @foreach($about as $item)
                <h6 style="font-size: {{$item->font}}px; color:{{$item->color}}">
                    {{$item->about}}
                </h6>
            @endforeach

        </section>
    </section>
</section>
