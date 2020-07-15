@extends('layouts.app')
@section('content')
    @if(session('store'))
        <section class="col-6 offset-3 bg-success">
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
        <form action="{{route('about.store')}}" method="post">
            @csrf
            <section class="form-group">
                <input type="number" name="font" class="form-control" min="16" max="40" value="16"
                       placeholder="Please enter fontsize number">
            </section>
            <section class="form-group">
                <input type="color" name="color" class="form-control">
            </section>
            <section class="form-group">
                <textarea name="about" placeholder="Please enter about"
                          class="form-control"></textarea>
            </section>

            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
    </section>
    <section class="col-6 offset-3">
        <a href="{{route('about.index')}}" class="btn btn-info btn-block text-white">show details</a>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('cssAdmin/style.css')}}">
@endsection
