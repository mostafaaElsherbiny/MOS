@extends('layouts.admin')


@section('content')



@if(count($comments)  > 0)

<h1>comments</h1>
    <table class="table">
    <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>author</th>
            <th>email</th>
            <th>body</th>
           <th>view</th>
           <th>status </th>
           <th>delete</th>
        </tr>
    </thead>
    <tbody>


    @foreach($comments as $comment )

     <tr>
     <td>{{$comment->id}}</td>


         <td>   {{  $comment->author}}</td>

         <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td>
            <a href="{{route('homePost',$comment->post->id)}}">view post</a>
            
            </td>
            <td><a href="{{route('admin.comment.replies',$comment->id)}}">View Replies</a></td>
            <td>
            
            @if($comment->is_active==1)
                <form method="POST" action="/admin/comments/{{$comment->id}}">
                {{csrf_field()}}
                
                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="is_active" value="0">
                
                
                <input class="btn btn-success" type="submit" value="unapprove">
                </form>
@else
       <form method="POST" action="/admin/comments/{{$comment->id}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="is_active" value="1">
                
                
                <input class="btn btn-info" type="submit" value="approve">
                </form>
               

            @endif
            
            </td>
            <td>



            <form method="POST" action="/admin/comments/{{$comment->id}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">

    
                
                
                <input class="btn btn-danger" type="submit" value="DELETE">
                </form>
            
            </td>
        </tr>

@endforeach




       
       
    </tbody>
</table>
























@else

<h1>
there is no comments

</h1>
@endif

@stop