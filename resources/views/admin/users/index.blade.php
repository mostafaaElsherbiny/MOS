@extends('layouts.admin')



@section('content')
    @if(Session::has('delete_user'))
        <p class="alert-info delete-message">{{Session('delete_user')}}</p>


    @endif
<h3>Users</h3>


    <table class="table">
    <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>image</th>
            <th>name</th>
            <th>email</th>
            <th>Role</th>
            <th>status</th>
            <th>created at</th>
            <th>updated at</th>
        </tr>
    </thead>
    <tbody>
@if($users)

    @foreach($users as $user )

     <tr>
     <td>{{$user->id}}</td>

     <td><img  height="50" src="{{$user->photo?$user->photo->file:'there/' }}" alt=""></td>

         <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>

         <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active==1?'active':'deactive'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>

@endforeach


@endif

       
       
    </tbody>
</table>



@stop