<section class="contact">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-center text-capitalize">contact us</h1>
            <section class="borderContact mb-5"></section>
            <section class="row ml-0 mr-0">

                @if (session('contact'))
                    <section class="col-8 offset-2 bg-success p-3">
                        <h4 class="text-center text-white">{{session('contact')}}</h4>
                    </section>
                @endif

                <section class="col-8 offset-2 text-center">
                    @if ($errors->any())
                        <section class="bg-danger col-6 offset-3 p-3">
                            @foreach($errors->all() as $item)
                                <h3 class="text-center text-white">{{$item}}</h3>
                            @endforeach
                        </section>

                    @endif
                </section>
                <section class="col-8 offset-2">
                    <form action="{{route('contact.data')}}" method="post">
                        @csrf
                        <section class="form-group">
                            <label for="fullname">fullname</label>
                            <input type="text" name="fullname" id="fullname"
                                   placeholder="Please enter your fullname?" class="form-control">
                        </section>
                        <section class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email"
                                   placeholder="Please enter your email?" class="form-control">
                        </section>
                        <section class="form-group">
                            <label for="comment">comment</label>
                            <textarea name="comment" id="comment" class="form-control"
                                      placeholder="Please enter your comment"></textarea>
                        </section>
                        <section class="form-group">
                            <input type="submit" value="submit" class="btn btn-success btn-block">
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
</section>
