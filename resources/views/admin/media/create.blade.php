@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@stop

@section('content')
    <h1>Upload Media </h1>


    <form method="POST" class="dropzone" action="/admin/media">

        {{csrf_field()}}
    </form>

@stop


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@stop