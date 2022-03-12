@extends('admin.master')

@section('title', 'Category Manager')

@section('content_header')
<h1 class="content__header__category">Create category</h1>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin/category.css">
@stop

@section('breadcrumb')
<li class="breadcrumb-item active">Category</li>
@stop



@section('content')
<div id="page-wrapper" class="categoryadmin__crud">
    <div class="container-fluid bg-white">
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" id="input__admincategory__crud">
                <form action="{{route('create-category')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <i class="fas fa-paw icon__admincategory__crud"></i>
                        <label class="title__admincategory__crud"> Category Name</label>
                        <input class="form-control" name="cateName" placeholder="Please Enter Category Name"/>
                        @error('cateName')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <a class="btn btn-danger" href="{{route('show-category')}}">Back</a>
                    <button type="submit" class="btn btn-primary">Category Add</button>
                    <form>
                        @if (session('success'))
                        {{session('success')}}
                        @endif

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
    $("#create-category").addClass("active");
});
</script>
@stop