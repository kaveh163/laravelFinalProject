@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <section class="bg-danger col-6 offset-3 p-3">
            @foreach($errors->all() as $item)
                <h3 class="text-center text-white">{{$item}}</h3>
            @endforeach
        </section>

    @endif
    <section class="col-6 offset-3 mt-3">
        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-group">
                <input type="file" name="image" class="form-control">
            </section>
            <section class="form-group">
                <input type="text" name="alt" class="form-control" placeholder="Please enter alt for image">
            </section>
            <section class="form-group">
                <input type="text" name="caption" class="form-control" placeholder="Please enter caption for image">
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
    </section>
@endsection
