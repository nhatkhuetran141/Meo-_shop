@extends('adminlte::page')

@section('title', 'Edit Media')

@section('content_header')
<h1>Edit Media</h1>
@stop

@section('css')
<link rel="stylesheet" href="/css/media.css">
@stop

@section('content')
<div id="page-wrapper">
    <div class="container-fluid bg-white">
        <form action="{{route('create-product')}}" method="POST">
            @csrf
            @method('put')
            <div class="row p-3">
                <div class="col-md-8 d-flex">
                    <img src="{{asset('/')}}{{$media->url}}" class="image__edit__item" alt="" srcset="">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Image name</label>
                        <input type="text" class="form-control" name="media_name" value="{{$media->filename}}" />
                        @error('media_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label>Alt tag</label>
                        <input type="text" class="form-control" name="media_alt" />
                        @error('media_alt')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Save data</button>

    </div>
    <form>
</div>
@stop