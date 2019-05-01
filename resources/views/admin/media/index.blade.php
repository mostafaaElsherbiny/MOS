@extends('layouts.admin')



@section('content')





    <h3>Media</h3>


    <table class="table">
        <thead class="bg-primary">
        <tr>
            <th>ID</th>
            <th>image</th>
            <th>created at</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)

            @foreach($photos as $photo)

                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img  height="50" src="{{$photo->file?$photo->file:'there/' }}" alt=""></td>
                    <td>{{$photo->created_at?$photo->created_at->diffForHumans():'no date'}}</td>
                </tr>

            @endforeach


        @endif



        </tbody>
    </table>



@stop