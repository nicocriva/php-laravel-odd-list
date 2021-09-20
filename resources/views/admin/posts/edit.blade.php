@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li> 
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.posts.update', $post->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title',$post->title)}}">
            </div>
            <div>
                <label for="category" class="form-label">Category</label>
                <select class="form-control" name="category_id" id="category">
                    <option value="">- Select a category -</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if($category->id == old('category_id', $post->category_id)) selected
                            @endif>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="descript" class="form-label">Description</label>
                <textarea class="form-control" name="content" id="descript" cols="30" rows="10">{{ old('content',$post->content)}}</textarea>
            </div>
            <div>
                <h4 class="ml-3">TAG</h4>
                @foreach($tags as $tag)
                <input id="tag{{$loop->iteration}}" class="ml-3" type="checkbox" name="tags[]" value="{{$tag->id}}"
                @if( !$errors->any() && $post->tags->contains($tag->id))
                checked
                @elseif(in_array($tag->id, old('tags', [])))
                checked
                @endif>
                <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection