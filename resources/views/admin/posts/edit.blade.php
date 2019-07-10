@extends('layouts.admin')


@section('content')


    <h1>Edit post</h1>
    <div class="row">

        <div class="col-md-3">

            <img  height="150" src="{{$posts->photo?$posts->photo->file:'https://via.placeholder.com/150' }}" alt="">



        </div>

        <div class="col-md-9">
            <form method="POST" action="/admin/posts/{{$posts->id}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$posts->title}}" >
                </div>
                <div class="form-group">
                    <label for="photo_id">file</label>
                    <input type="file" name="photo_id" id="photo_id" class="form-control"   >
                </div>
                <div class="form-group">
                    <label for="role">Category</label>
                    <select class="form-control" name="category_id" id="role" >
                        @if($categories)
                            @foreach($categories as $category)

                                <option value="{{$category->id}}"
                                     @if($category->id==$posts->category_id)  {{'selected'}} @endif>
                                     {{$category->name}}
                                    
                                    </option>

                            @endforeach
                        @endif
                    </select>
                </div>


                <div class="form-group">
                    <label for="content">Description</label>
                    <input type="text" name="body" id="content" class="form-control" value="{{$posts->body}}"  >
                </div>











                <div class="form-group">

                    <input class="btn btn-primary" type="submit"  value="Edit post">


                </div>
            </form>


            <form method="post" action="/admin/posts/{{$posts->id}}">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group ">

                    <input class="btn btn-danger" type="submit" value="Delete Post">
                    {{csrf_field()}}
                </div>
            </form>

        </div>
    </div>



    @include('includes/form_errors')
@stop