@extends('layouts.admin')


@section('content')
    <h1>Category</h1>

<div class="col-md-6">
    <form method="POST" action="/admin/categories" >
            {{csrf_field()}}
           <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="type category name" >
            </div>

            <div class="form-group">

                <input class="btn btn-primary" type="submit"  value="create category">

            </div>
        </form>

</div>
<div class="col-md-6">
    <table class="table">
        <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>name</th>


            <th>created at</th>
            <th>updated at</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)

            @foreach($categories as $cat)

                <tr>
                    <td>{{$cat->id}}</td>
                    <td><a href="{{route('admin.categories.edit',$cat->id)}}">{{$cat->name}}</a></td>
                    <td>{{$cat->created_at->diffForHumans()}}</td>
                    <td>{{$cat->updated_at->diffForHumans()}}</td>

                </tr>

            @endforeach


        @endif



        </tbody>
    </table>


</div>

@stop