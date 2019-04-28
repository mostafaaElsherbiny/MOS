@extends('layouts.admin')


@section('content')

<h1>create user</h1>

<form method="POST" action="/admin/users" enctype="multipart/form-data">
    {{csrf_field()}}


    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="type your name" >
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="type your email" >
    </div>
    <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="type your password" >
        </div>

    <div class="form-group">
            <label for="photo_id">file</label>
            <input type="file" name="photo_id" id="photo_id" class="form-control"  >
        </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="roles_id" id="role" >
            @if($roles)
            @foreach($roles as $role)

                <option value="{{$role->id}}">{{$role->name}}</option>

                @endforeach
                @endif
              </select>
    </div>

    <div class="form-group">
        <div class="form-group">
          <label for="">status</label>
          <select class="form-control" name="is_active" id="" >
            <option value="1">active</option>
            <option value="0" selected>not active</option>
           
          </select>
        </div>
    </div>











    <div class="form-group">
    
    <input class="btn btn-primary" type="submit"  value="create user">
    

    </div>
</form>




@include('includes/form_errors')
@stop