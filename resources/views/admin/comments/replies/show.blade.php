@extends('layouts.admin')

@section('content')

	@if (count($replies) > 0)
		<h1>replies</h1>
	
	<table class="table">
	  <thead>
	    <tr>
	      <th>Id</th>
	      <th>Author</th>
	      <th>Email</th>
	      <th>Body</th>
	      <th>Post</th>
	      <th>delete</th>
	    </tr>
	  </thead>
	  <tbody>

  
  	@foreach ($replies as $reply)
	  	<tr>

	      <td>{{$reply->id}}</td>
	      <td>{{$reply->author}}</td>
	      <td>{{$reply->email}}</td>
	      <td>{{$reply->body}}</td>
	    
	      <td>
	      	@if ($reply->is_active == 1)
              <form method="POST" action="/admin/comment/replies/{{$reply->id}}">
                {{csrf_field()}}
                
                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="is_active" value="0">
                
                
                <input class="btn btn-success" type="submit" value="unapprove">
                </form>
	      		
	      	@else
              <form method="POST" action="/admin/comment/replies/{{$reply->id}}">
                {{csrf_field()}}
                
                <input type="hidden" name="_method" value="PUT">

                <input type="hidden" name="is_active" value="1">
                
                
                <input class="btn btn-success" type="submit" value="approve">
                </form>
	      		
	      	@endif
	      </td>
	      <td>
	      	
          <form method="POST" action="/admin/comment/replies/{{$reply->id}}">
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
		<h1 class="text-center">No reply</h1>
	@endif

@endsection