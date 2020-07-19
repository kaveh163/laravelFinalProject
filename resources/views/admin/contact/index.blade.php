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
                <td>fullname</td>
                <td>email</td>
                <td>comment</td>
                <td>show</td>
                <td>delete</td>

            </tr>
            </thead>
            <tbody>
            @foreach($contact as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->comment, 25)}}</td>

                    <td><a href="{{route('contact.show',$item->id)}}">show</a></td>
                    <td>
                        <form action="{{route('contact.destroy', $item->id)}}" method="post">
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


