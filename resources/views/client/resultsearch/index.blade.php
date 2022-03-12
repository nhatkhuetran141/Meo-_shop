@extends('client.master')

@section('style')

<link rel="stylesheet" href="/css/client/resultsearch.css">

@endsection

@section('title', 'Product')

@section('content')

<div class=".container-fluid">
    <img id="banner_resultsearch" src="/image/banner_resultsearch.png">
    @if($search_name==null)
    <h1 class="title__search_first">HELLO! THIS IS SEARCH PAGE</h1>
    <div class="title__search_second">You can search everything in here</div>
    <div class="inputWithIcon_search_datanull inputWithIcon_both">
        <form method="GET" action="./resultsearch">
            <input placeholder="Search...." class="searchbtn_search py-1 border" id="searchbtn_search" name="search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </form>
    </div>
    @else
    <div class="inputWithIcon_search inputWithIcon_both">
        <form action="./resultsearch">
            <input placeholder="Search...." class="searchbtn_search py-1 border" id="searchbtn_search" name="search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </form>
    </div>
    <h1 class="title__search">SEARCH: QUANTITY RESULTS FOUND FOR "{{$search_name}}"</h1>

    @forelse ($data as $key => $value )
    <div class="row">
        <a style="color: black; width: 100%;" href={{route('product-detail-page', $value->slug)}}>
            <div class=" body__productsearch">
                <div class="border__productsearch">
                    <div class="product_search">
                        <!-- product image -->
                        <div class="product__search--image">
                            <img class="search__image--radius" src={{url('/') . $value->image}} />
                        </div>
                        <div class="product__search--detail">
                            <!-- product name -->
                            <b class="search__detail--name">{{$value->name}}</b>
                            <div>
                                @if ($value->discount > 0)
                                <del class="margimobile">${{$value->price}}</del>
                                <strong>${{$value->price - $value->price * $value->discount}}</strong>
                                @else
                                <strong>${{$value->price}}</strong>
                                @endif
                            </div> <br>
                            <!-- btn add to cart -->
                            <div class="search__detail--btn">
                                <form action="{{route('add-cart', $value->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="detail__btn--cart"> Add to
                                        Cart</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @empty
    <p class="text-center h5">No products found! </p>
    @endforelse

    {!! $data->appends(request()->all())->links('client.products.pagination') !!}

    @endif

</div>


@endsection

@section('javascript')

@endsection