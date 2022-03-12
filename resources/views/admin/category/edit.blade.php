@extends('admin.master')

@section('title', 'Category Manager')

@section('css')
<link rel="stylesheet" href="/css/admin/category.css">
@stop

@section('content_header')
<h1 class="content__header__category">{{$category->name}}</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('show-category')}}">Category</a></li>
<li class="breadcrumb-item active">{{$category->name}}</li>
@stop


@section('content')
<div id="page-wrapper" class="categoryadmin__crud">
    <div class="container-fluid bg-white">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" id="input__admincategory__crud">
                <form action="{{route('edit-category', $category->slug)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <i class="fas fa-paw icon__admincategory___crud"></i>
                        <label class="title__admincategory__crud"> Category Name</label>
                        <input class="form-control" value="{{$category->name}}" name="cateName"
                            placeholder="Please Enter Category Name" />
                    </div>
                    <a class="btn btn-danger" href="{{route('show-category')}}">Back</a>
                    <button type="submit" class="btn btn-primary">Apply change</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop

@section('js')
<script>
$(document).ready(function() {
    $("#category-menu").addClass("menu-open");
    $("#master-category").addClass("active");
});
</script>
@stop