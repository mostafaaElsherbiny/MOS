@extends('layouts.admin')


@section('content')

    <h1>Create Post</h1>

    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <label for="name">title</label>
            <input type="text" name="title" id="name" class="form-control" placeholder="type your name" >
        </div>
  <div class="form-group">
            <label for="name">category</label>
      <select name="category_id" id="" class="med form-control ">
          <option value="0">option</option>
      </select>

        </div>












        <div class="form-group">
            <label for="photo_id">file</label>
            <input type="file" name="photo_id" id="photo_id" class="form-control"  >
        </div>


        <div class="form-group">
            <label for="name">Description</label>
                <textarea name="body" id="name" class="form-control" placeholder="type your name" >

                </textarea>
        </div>















        <div class="form-group">

            <input class="btn btn-primary" type="submit"  value="create post">


        </div>
    </form>




    @include('includes/form_errors')
@stop