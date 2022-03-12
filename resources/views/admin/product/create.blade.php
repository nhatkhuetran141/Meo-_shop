@extends('admin.master')

@section('title', 'Product')

@section('content_header')
<h1>Create new product</h1>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin/product.css">
@stop

@section('breadcrumb')
<li class="breadcrumb-item active">Products</li>
@stop


@section('content')
<div id="page-wrapper">
    <div class="container-fluid bg-white">

        <form action="{{route('create-product')}}" method="POST">
            @csrf
            <div class="row p-3">
                <div class="col-md-9">
                    <div class="form-group has-validation">
                        <label>Product Name</label>

                        @error('prd_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <input class="form-control @error('prd_name') border border-danger @enderror " name="prd_name"
                            placeholder="Please Enter Product Name" value="{{old('prd_name')}}" />

                    </div>

                    <div class="form-group has-validation">
                        <label>Short description</label>
                        @error('prd_short_descrip')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <textarea class="form-control  @error('prd_short_descrip') border border-danger @enderror"
                            maxlength="150" style="resize: none;" name="prd_short_descrip"
                            placeholder="Short description">{{old('prd_short_descrip')}}</textarea>


                    </div>

                    <div class="form-group">
                        <label>Description</label>

                        @error('prd_description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <textarea name="prd_description" id="summernote"
                            placeholder="Product description">{{old('prd_description')}}</textarea>

                    </div>

                    <div class="form-group">
                        <label>Image
                            <div class="btn btn-sm btn-outline-primary " data-toggle="modal"
                                data-target="#modal-list-images">
                                Add
                            </div>
                        </label>
                        <input type="text" class="form-control" name="prd_list_images" placeholder="Add image"
                            id="listImages" style="display: none;" />
                        <div class="row" id="images-container">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="prd_category"
                            class="form-control  @error('prd_category') border border-danger @enderror">
                            <option value="">SELECT ONE</option>
                            @foreach ($cates as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>

                        @error('prd_category')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" min="0" step=".01" class="form-control @error('prd_price') border border-danger @enderror"
                            name="prd_price" placeholder="Please Enter Product Price" value="{{old('prd_price')}}" />
                        @error('prd_price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label>Discount %</label>
                        <input type="number" min="0" max="100" value="0" class="form-control w-50" name="prd_discount"
                            placeholder="Please Enter Product Price" />
                        @error('prd_discount')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Available</label>
                        <div class="radio ">
                            <label class="mr-3">
                                <input type="radio" name="prd_is_stock" value="1" checked>
                                In stock
                            </label>
                            <label>
                                <input type="radio" name="prd_is_stock" value="0">
                                Out of stock
                            </label>
                        </div>
                        @error('prd_status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label>Image
                            <div class="btn btn-sm btn-outline-warning d-none btn__edit" data-toggle="modal"
                                data-target="#modal-ava-image">Edit
                            </div>
                        </label>
                        <input type="text" class="form-control" name="prd_ava" placeholder="Add image" id="image"
                            style="display: none;" />
                        <div id="ava_blank" class="image__ava-blank @error('prd_ava') border border-danger @enderror"
                            data-toggle="modal" data-target="#modal-ava-image">
                            <div>Click to add image</div>
                        </div>
                        @error('prd_ava')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <img id="image-ava" src="" class="image__ava">

                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <a class="btn btn-danger mr-2" href="{{route('show-product')}}"> Back</a>
                        <button type="submit" class="btn btn-primary"> Save data</button>
                    </div>
                </div>
            </div>
    </div>
    <form>
</div>
</div>

@include('admin.product.image-modal')

@stop

@section('js')
<script>
$(document).ready(function() {
    $("#product-menu").addClass("menu-open");
    $("#master-product").addClass("active");
    $("#create-product").addClass("active");

    $('#summernote').summernote({
        placeholder: 'Product description',
        padding: 0,
        height: 120,
        toolbar: [
            ['font', ['bold', 'underline', 'italic', 'strikethrough', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
        ]
    });

});
</script>

<script src="/js/admin/productModal.js"></script>
<script type="text/javascript">
var url = "{{url('/')}}";
</script>
@stop