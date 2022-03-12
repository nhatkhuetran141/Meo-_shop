@extends('adminlte::page')

@section('title', 'Media')

@section('content_header')
<h1 class="mx-auto">Media</h1>
@stop

@section('css')
<link rel="stylesheet" href="/css/media.css">
@stop

@section('content')
<div class="bg-white p-2">
    <form action="{{route('upload-media')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" id="fileInput" style="display:none;" class="btn btn-primary" name="image"
            onchange="this.form.submit()">
        <input type="button" value="Upload" class="btn btn-primary ml-2"
            onclick="document.getElementById('fileInput').click();" />
    </form>

    <div class="container mt-4 image__container">
        <div class="row">
            @foreach($listImages as $image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="{{route('edit-media', $image->id)}}">
                    <img src="{{asset('/')}}{{$image->url}}" class="image__card image__card-hover" alt="">
                </a>

            </div>
            @endforeach
        </div>
    </div>
</div>

@stop


@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="/js/media.js"></script>
@stop