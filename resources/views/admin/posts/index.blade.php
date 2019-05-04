@extends('layouts.admin')



@section('content')


    @if(Session::has('delete_post'))
        <p class="alert-info delete-message">{{Session('delete_post')}}</p>


    @endif


    <h3>Posts</h3>


    <table class="table">
        <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>user</th>
            <th>image</th>
            <th>category</th>
            <th>title</th>
            <th></th>
            <th>body</th>
            <th>created at</th>
            <th>updated at</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td><img  height="50" src="{{$post->photo?$post->photo->file:'there/' }}" alt=""></td>

                    <td>{{$post->category?$post->category->name:'Uncategorized'}}</td>


                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                    <td>
            <a href="{{route('homePost',$post->id)}}">view post</a>
            </td>
                    <td>
            <a href="{{route('admin.comments.show',$post->id)}}">view comments</a>
            </td>
            
                    <td>{{str_limit($post->body,20)}}</td>

                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach


        @endif



        </tbody>
    </table>



@stop