@extends('layouts.app')
@section('title') show @endsection
@section('content')

    <div class="card" style="width: 80% ; margin : auto; margin-top : 40px">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}.</p>
        </div>
    </div>

    <div class="card" style="width: 80% ; margin : auto; margin-top : 20px">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            {{-- @dd($post->user) --}}
            <h5 class="card-title">Hicham El Kiari</h5>
            <p class="card-text">elkiarihicham@gmail.com</p>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>

@endsection

