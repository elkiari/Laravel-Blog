@extends('layouts.app')
@section('title') edit @endsection
@section('content')

<form action="{{ route('posts.update', $post->id)}}" method="POST" style="width: 80%; margin: auto;">
    @csrf
    @method('PUT')

<div class="mb-3" >
    <label class="form-label">Title</label>
    <input name="title" type="text" value="{{$post->title}}" class="form-control">
</div>
<div class="mb-3" >
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{$post->description}}</textarea>
</div>
<select name="select" class="form-select">
    @foreach($users as $user)
    <option @if ($user->id == $post->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>
<button class="btn btn-primary" style="margin-top: 20px; width: 100px">Update</button>

</form>

@endsection
