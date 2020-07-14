@extends('layouts.app')
@section('content')
    @if (session('delete'))
        <section class="col-6 offset-3 alert bg-success">
            <h3 class="text-white text-center">{{session('delete')}}</h3>
        </section>
    @endif
    @if (session('update'))
        <section class="col-6 offset-3 alert bg-success">
            <h3 class="text-white text-center">{{session('update')}}</h3>
        </section>
    @endif

    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <td>id</td>
                <td>image</td>
                <td>alt</td>
                <td>caption</td>
                <td>show</td>
                <td>delete</td>
                <td>update</td>
            </tr>
            </thead>
            <tbody>
            @foreach($slider as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{asset('images/slider/'.$item->image)}}" alt="" width="50px" height="50px"></td>
                    <td>{{$item->alt}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->caption,15)}}</td>

                    <td><a href="{{route('slider.show',$item->id)}}">show</a></td>
                    <td>
                        <form action="{{route('slider.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    <td><a href="{{route('slider.edit', $item->id)}}">update</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>
        {{$slider->links()}}
    </section>

@endsection


