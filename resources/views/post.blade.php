@extends('layouts.blog-post')



@section('content')



    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{{ $post->body
 }}</p>
    <hr>

    @if(Session::has('comment_message'))

            {{session('comment_message')}}


       @endif

    <!-- Blog Comments -->


@if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>


         
       <form method="POST" action="/admin/comments">

              <input type="hidden" name="post_id" value="{{$post->id}}">

                {{  csrf_field() }}
             <div class="form-group">
                  <label for="body">Body:</label>
                 <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
             </div>

             <div class="form-group">
                 <input   class='btn btn-primary' type="submit" value="submit comment">  
             </div>
        
</form>

    </div>


@endif

    <hr>



@stop

