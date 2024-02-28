<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();

        // $AllPosts = [
        //     ['id' => 1, 'title' => 'HTML', 'posted_by' => 'Hicham', 'created_at' => '2024-23-02 23:00:00'],
        //     ['id' => 2, 'title' => 'CSS', 'posted_by' => 'Kamal', 'created_at' => '2024-23-02 23:00:00'],
        //     ['id' => 3, 'title' => 'JAVASCRIPT', 'posted_by' => 'Youssef', 'created_at' => '2024-23-02 23:00:00'],
        //     ['id' => 4, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2024-23-02 23:00:00'],
        //     ['id' => 5, 'title' => 'JAVA', 'posted_by' => 'Ayoub', 'created_at' => '2024-23-02 23:00:00'],
        //     ['id' => 6, 'title' => 'PYTHON', 'posted_by' => 'Abdollah', 'created_at' => '2024-23-02 23:00:00'],
        // ];
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show($postId)
    {
        $singlePostFromDB = Post::findOrFail($postId);

        // if (is_null ($singlePostFromDB)){
        //     return to_route('posts.index');
        // }

        $singlePost = [
            'id' => 1, 'title' => 'Laravel Framwork', 'description' => 'With supporting text below as a natural lead-in to additional content.', 'posted_by' => 'Hicham', 'created_at' => '2024-23-02 23:00:00'
        ];
        return view('posts.show', ['post' => $singlePostFromDB]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users, id'],
        ]);

        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        // $post = new Post;

        // $post->title = $title;
        // $post->description = $description;

        // $post->save();

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post'=>$post]);
    }

    public function update($postId)
    {
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            "title" => $title,
            "description" => $description,
            'user_id' => $postCreator,
        ]);

        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return to_route('posts.index');
    }
}
