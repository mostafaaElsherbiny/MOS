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



    <hr>



        <!-- Posted Comments -->
        <!-- Comment -->

        @if (count($comments) > 0)
             
            @foreach ($comments as $comment)
            @if ($comment->is_active == 1)
        
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                        <div class="comment-reply-container">
                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                            <div class="comment-reply ">
                                    <div class="col-md-12"> 
                                    <form action="/comment/replies" method="POST">
                                     
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            
                                    <div class='form-group col-sm-6'>

                                        <textarea class="form-control" name="body"  cols="30" rows="1"></textarea>
                                    </div>
                                    {{csrf_field()}}

                                    <div class='form-group'>
                                        <input class="btn btn-primary" type="submit" value="supmit reply">
                                    </div>

                                    </form>
                                    </div>
                            </div>
                        </div>

                        @foreach ($comment->replies as $reply)
                        
                            @if ($reply->is_active == 1)
                            
                            <!-- Nested Comment -->
                            <div id="nested-comment" class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="32" src="{{Auth::user()->gravatar}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>

                            </div>
                            <!-- End Nested Comment -->
                            @endif

                        @endforeach

                    </div>
                </div>
                @endif
            @endforeach
        
        @endif

        <!-- End Comment -->
    
       
         

        
            
    @endif

@endsection



@section('scripts')
<script>

    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });

</script>
@endsection



