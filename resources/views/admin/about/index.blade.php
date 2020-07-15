@extends('layouts.app')
@section('content')
    @if (session('delete'))
        <section class="col-6 offset-3 alert bg-success">
            <h3 class="text-white text-center">{{session('delete')}}</h3>
        </section>
    @endif


    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <td>id</td>
                <td>font</td>
                <td>color</td>
                <td>about</td>
                <td>show</td>
                <td>delete</td>

            </tr>
            </thead>
            <tbody>
            @foreach($about as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->font}}</td>
                    <td>{{$item->color}}<h3 style="background-color: {{$item->color}}">color</h3></td>
                    <td>{{\Illuminate\Support\Str::limit($item->about, 25)}}</td>

                    <td><a href="{{route('about.show',$item->id)}}">show</a></td>
                    <td>
                        <form action="{{route('about.destroy', $item->id)}}" method="post">
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


