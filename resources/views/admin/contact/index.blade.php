@extends('admin.master')

@section('title', 'Orders Manager')

@section('content_header')
<div class="d-flex align-items-center">
    <h1 class="mr-2">Contacts</h1>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin/contact.css">
@stop

@section('breadcrumb')
<li class="breadcrumb-item active">Contacts</li>
@stop


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div>
            <p>Customer Contacts's Information</p>
        </div>
       
        <div class="container--info">
            @forelse ($contacts as $item)
            <div class="info d-flex flex-row ">
                <div class="p-3">{{$item->name}}</div>
                <div class="p-3">{{$item->email}}</div>
                <div class="p-3">{{$item->phone}}</div>
            </div>
            <div class="d-flex flex-row ">
                <div class="p-3">{{$item->message}}</div>
            </div>
            <hr>
            @empty
            <div class="d-flex flex-row ">
                <div class="p-3">Empty</div>
            </div>
            @endforelse
        </div>
        <!-- /.container--info -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $("#master-contact").addClass("active");
    });
</script>
@stop