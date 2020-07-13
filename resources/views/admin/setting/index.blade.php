@extends('layouts.app')
@section('content')
    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <td>id</td>
                <td>title</td>
                <td>author</td>
                <td>keywords</td>
                <td>description</td>
                <td>show</td>
                <td>delete</td>
            </tr>
            </thead>
            <tbody>
            @foreach($setting as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->author}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->keywords,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->description,20)}}</td>
                    <td><a href="{{route('setting.show',$item->id)}}">show</a></td>
                    <td>
                        <form action="{{route('setting.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </section>

@endsection
