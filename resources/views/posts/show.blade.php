@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{$post->created_at}}</p>

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->description}}</p>

                <hr>
            @auth

                <!-- Comments Form -->
                    <div class="card my-4">
                        <h5 class="card-header">Leave a Comment:</h5>
                        <div class="card-body">
                            <form method="POST" action="{{ route('comments.store', ['post_id'=>$post->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <textarea id="description" type="text" rows="3"
                                              class="form-control @error('body') is-invalid @enderror"
                                              name="body" value="{{ old('body') }}" required>
                                    </textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
            @endauth



            <!-- Single Comment -->
                @foreach($post->comments as $comment)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{$comment->user->name}} <small
                                    class="text-muted">{{$comment->created_at}}</small></h5>


                            {{$comment->body}}.
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        @can('update', $post)
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-outline-info " href="{{ route('posts.edit', ['id'=>$post->id]) }}">
                                        Edit post
                                    </a>
                                </div>
                                <div class="col-6">

                                    <form method="POST" action="{{route('posts.destroy', ['id'=>$post->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">Delete post</button>
                                    </form>
                                </div>

                            </div>


                        @endcan
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

