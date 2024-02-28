@extends('layouts.app')
@section('title') create @endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger" style="width: 80% ; margin : auto;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('posts.store')}}"  style="width: 80% ; margin : auto;">
    @csrf

<div class="mb-3" >
    <label class="form-label">Title</label>
    <input name="title" type="text" class="form-control" value="{{old('title')}}">
</div>
<div class="mb-3" >
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{old('description')}}</textarea>
</div>
<select name="select" class="form-select">
    @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>
<button class="btn btn-success" style="margin-top: 20px; width: 100px">Submit</button>

</form>

@endsection
