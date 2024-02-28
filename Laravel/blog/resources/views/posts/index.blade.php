
    @extends('layouts.app')

    @section('title') index @endsection
    @section('content')

        <div class="text-center">
            <a href="{{route('posts.create')}}" class="btn btn-success" style="width: 120px">Create Post</a>
        </div>

        <table class="table" style="width: 80% ; margin : auto; margin-top: 30px">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)

                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : 'not found'}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">View</a>
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">Edit</a>

                        <!-- Form for deleting post with confirmation dialog -->
                        <form style="display: inline" method="POST" action="{{route('posts.destroy', $post->id)}}"
                            onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    @endsection
