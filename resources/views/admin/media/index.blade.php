@extends('layouts.admin')



@section('content')





    <h3>Media</h3>


    <table class="table">
        <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>image</th>
            <th>created at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if($photos)

            @foreach($photos as $photo)

                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img  height="50" src="{{$photo->file?$photo->file:'there/' }}" alt=""></td>
                    <td>{{$photo->created_at?$photo->created_at->diffForHumans():'no date'}}</td>
                    <td> <form method="post" action="/admin/media/{{$photo->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="form-group  ">

                                <input class="btn btn-md btn-danger col-md-6" type="submit" value="Delete photo">
                                {{csrf_field()}}
                            </div>
                        </form></td>
                </tr>

            @endforeach


        @endif



        </tbody>
    </table>



@stop