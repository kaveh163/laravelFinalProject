@extends('layouts.app')
@section('content')
    @if (session('store'))
        <section class="col-6 offset-3 alert bg-success">
            <h3 class="text-white text-center">{{session('store')}}</h3>
        </section>
    @endif
    @if ($errors->any())
        <section class="col-6 offset-3 mt-5 mb-5 bg-danger p-3">
            @foreach($errors->all() as $item)
                <h4 class="text-center text-white">{{$item}}</h4>
            @endforeach
        </section>

    @endif

    <section class="col-6 offset-3 mt-5">
        <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-group">
                <input type="file" name="image" class="form-control" placeholder="Please enter website image">
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
    </section>
    <section class="col-6 offset-3">
        <a href="{{route('gallery.index')}}" class="btn btn-info btn-block text-white">show details</a>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('cssAdmin/style.css')}}">
@endsection
