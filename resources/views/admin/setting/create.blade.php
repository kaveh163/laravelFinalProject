@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <section class="col-6 offset-3 mt-5 mb-5 bg-danger p-3">
            @foreach($errors->all() as $item)
                <h4 class="text-center text-white">{{$item}}</h4>
            @endforeach
        </section>

    @endif

    <section class="col-6 offset-3 mt-5">
        <form action="{{route('setting.store')}}" method="post">
            @csrf
            <section class="form-group">
                <input type="text" name="title" class="form-control" value="{{old('title')}}"
                       placeholder="Please enter website title">
            </section>
            <section class="form-group">
                <input type="text" name="author" class="form-control" value="{{old('author')}}"
                       placeholder="Please enter website author">
            </section>
            <section class="form-group">
                <textarea name="keywords" value="{{old('keywords')}}" placeholder="Please enter website keywords"
                          class="form-control"></textarea>
            </section>
            <section class="form-group">
                <textarea name="description" value="{{old('description')}}"
                          placeholder="Please enter website description" class="form-control"></textarea>
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
    </section>
    <section class="col-6 offset-3">
        <a href="{{route('setting.index')}}" class="btn btn-info btn-block text-white">show details</a>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('cssAdmin/style.css')}}">
@endsection
