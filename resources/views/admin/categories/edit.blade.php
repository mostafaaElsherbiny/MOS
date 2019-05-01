@extends('layouts.admin')


@section('content')


    <h1>Edit category</h1>
    <div class="row">


        <div class="col-md-6">
            <form method="POST" action="/admin/categories/{{$categories->id}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$categories->name}}" >
                </div>


                <div class="form-group">

                    <input class="btn btn-primary col-md-5 " type="submit"  value="UPDATE CATEGORY">


                </div>
            </form>


            <form method="post" action="/admin/categories/{{$categories->id}}">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group  ">

                    <input class="btn btn-danger col-md-6" type="submit" value="Delete category">
                    {{csrf_field()}}
                </div>
            </form>

        </div>
    </div>




@stop