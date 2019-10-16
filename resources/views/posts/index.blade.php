@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-6 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="{{ route('posts.show',['id'=>$post->id]) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
