@extends('admin.master')

@section('title', 'Category Manager')

@section('content_header')
<h1 class="content__header__category">List categories</h1>

@stop


@section('css')
<link rel="stylesheet" href="/css/admin/category.css">
@stop

@section('breadcrumb')
<li class="breadcrumb-item active">Category</li>
@stop


@section('content')
<div id="page-wrapper" class="category__admin">
    <div class="container-fluid">
        <div>
            <a href="{{route('create-category')}}" class="btn btn-primary btn__addcategory__admin">Thêm mới</a>
        </div>

        <div class="row">
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover table__category" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th style="width:40%">Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                @foreach ($listCates as $item)
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{$counter++}}</td>
                        <td>{{$item->name}}</td>
                        <td class="center"><div class="btn btn-danger" id="btn__del__category"><i class="fas fa-trash"></i><a class="text__del"
                                href="{{route('delete-category', $item->slug)}}"> Delete</a></div>
                        </td>
                        <td class="center"><div class="btn btn-warning"id="btn__edit__category"><i class="fas fa-pencil-alt icon__edit__category"></i> <a class="text__edit"
                                href="{{route('edit-category', $item->slug)}}">Edit</a></div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
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
    $("#all-categories").addClass("active");
});
</script>
@stop