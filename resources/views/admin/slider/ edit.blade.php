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
        <form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <section class="form-group">
                <input type="file" name="image" class="form-control">
                <img src="{{asset('images/slider/'.$slider->image)}}" width="50px" height="50px" alt="">
            </section>
            <section class="form-group">
                <input type="text" name="alt" class="form-control" placeholder="Please enter alt for image" value="{{$slider->alt}}">
            </section>
            <section class="form-group">
                <input type="text" name="caption" class="form-control" placeholder="Please enter caption for image" value="{{$slider->caption}}">
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
        <a href="{{route('slider.index')}}" class="text-white btn btn-info btn-block">come back</a>
    </section>
@endsection
