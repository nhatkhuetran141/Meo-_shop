@extends('client.master')

@section('style')

<link rel="stylesheet" href="/css/client/products.css">

@endsection

@section('title', 'Product')
@section('content')
{{-- @dd($listProducts) --}}
<div class=".container-fluid">
    <div class="shop">
        <!-- banner     -->
        <img id="banner" src="/image/banner2.png">
        <!-- thanh dieu huong -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item ml-5"><a href="{{route('home-page')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>
<!-- search button -->
<div class="row mt-5 ml-4">
    <div class="col-sm-3">
        <div class="ml-2">
            <div class="inputWithIcon">
                <div>
                    <input type="text" placeholder="Search...." class="searchbtn py-1 border" id="searchbtn">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <br>
        <!-- categorties -->
        <div class="categorties ml-2">
            <div class="titleCategorties mb-3 font-weight-bold">Categories</div>
            <div class="contentCategorties">
                <div>
                    <a href="{{route('product-page')}}" class="content mb-2">All products</a>
                </div>
                @foreach ($listCategories as $cate)
                <div>
                    <a href="{{route('product-page-byCategory', $cate->slug)}}" class="content mb-2">{{$cate->name}}</a>
                </div>
                @endforeach
            </div>
        </div>
        <span class="custom-dropdown small">
            <div class="titleCategorties-mobile mb-3 font-weight-bold">Categories</div>
            <select id="selectboxcategories">
                @foreach ($listCategories as $cate)
                <option>{{$cate->name}}</option>
                @endforeach
            </select>
        </span>
        <!--Trending product-->
        <div class="trending mt-4 ml-2">
            <div class="titleTrending mb-3 font-weight-bold">
                Trending product
            </div>
            @foreach ($trendingProducts as $product)
            <!--trending product 1-->
            <div class="trendingproduct name">
                <div class="trendingname">
                    <div>
                        <div><img class="imageradius" src="{{$product->image}}" /></div>
                    </div>
                    <div class="contentTrending">
                        <div>{{$product->name}}</div>

                        @if ($product->discount > 0)
                        <del class="margimobile">${{$product->price}}</del>
                        <strong>${{$product->price - $product->price * $product->discount}}</strong>

                        @else
                        <strong>${{$product->price}}</strong>
                        @endif

                    </div>
                </div>
                <hr class="my-3">

            </div>
            @endforeach

        </div>
    </div>

    <!---product-->
    <div class="col-sm-9">
        <br><br>
        <div class="grid-container">
            @foreach ($listProducts as $product)

            <a href={{route('product-detail-page', $product->slug)}} class="product-content">
                <div class="imageproduct text-center"><img class="radius-product" src={{url('/') . $product->image}} />
                    <div class="productname text-center mt-2">{{$product->name}}</div>
                </div>
                <div>
                    @if ($product->discount > 0)
                    <del class="margimobile">${{$product->price}}</del>
                    <strong>${{$product->price - $product->price * $product->discount}}</strong>

                    @else
                    <strong>${{$product->price}}</strong>
                    @endif
                </div>
            </a>
            @endforeach

        </div>
        <!--Next page-->
        {!! $listProducts->appends(request()->all())->links('client.products.pagination') !!}

    </div>
</div>
<!-- trending product mobile -->
<div class="mobiletrending mt-2">
    <div class="titleTrending-mobile mb-3 font-weight-bold">
        Trending product
    </div>
    <!--trending product 1-->
    <div class="trendingproduct name">
        @foreach ($trendingProducts as $product)
            <div class="row trendingname">
                <div class="col-sm">
                    <div><img class="imageTrending-mobile" src="{{$product->image}}"  alt="anh ne" /></div>
                </div>
                <div class="trendingmobile col-sm mt-4">
                    <div class="mb-1">Name</div>
                    @if ($product->discount > 0)
                        <del class="margimobile">${{$product->price}}</del>
                        <strong>${{$product->price - $product->price * $product->discount}}</strong>

                    @else
                        <strong>${{$product->price}}</strong>
                    @endif
                </div>
            </div>
            <hr class="my-3 ">
        @endforeach
    </div>
</div>
</div>
@endsection

@section('javascript')

@endsection