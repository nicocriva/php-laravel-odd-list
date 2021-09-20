@extends('layouts.app')

@section('content')
    <div class="container">
        <p>
            @if(session('deleted'))
                <div class="alert alert-danger">
                    {{ (session('deleted'))}}
                </div>
            @endif
        </p>
        <p>
            @if(session('updated'))
                <div class="alert alert-info">
                    {{ (session('updated'))}}
                </div>
            @endif
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row"> {{ $post->id }} </th>
                        <td> {{ $post->title }} </td>
                        <td>
                            @if ($post->category)
                                {{$post->category->name}}
                            @endif
                        </td>
                        <td class="text-center">
                           <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning mx-3">Edit</a>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="post" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection