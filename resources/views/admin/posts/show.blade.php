@extends('layouts.app')

@section('content')
    <div class="container w-100">
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title"> {{$post->title}} </h4>
                <p class="card-text"> {{$post->content}} </p>
            </div>
        </div>
        <div class="my-2 text-right">
            <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Go back</a>
        </div>
    </div>
@endsection