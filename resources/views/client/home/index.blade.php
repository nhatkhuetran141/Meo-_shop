@extends('client.master')

@section('style')

<link rel="stylesheet" href="/css/client/home.css">

@endsection

@section('title', 'Meow Home')

@section('content')
<div class=".container-fluid float-md-start">
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides">
            <div class="numbertext">1 / 3</div>
            <img src="/image/slide1.png" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 3</div>
            <img src="/image/slide2.png" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 3</div>
            <img src="/image/slide3.png" style="width:100%">
        </div>
        <!-- The dots/circles -->
        <div style="text-align:center" class="dot-slide">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <br>
</div>
<!-- category-banner -->
<div class="category--container">

    <a href="{{route('product-page-byCategory', 'cat-food')}}">
        <div class="category--item">
            <img class="imageradius" src=" {{url('/Image/banner-cat.png')}}" alt="category1">
        </div>
    </a>
    <a href="{{route('product-page-byCategory', 'toys')}}">
        <div class="category--item">
            <img class="imageradius" src=" {{url('/Image/banner-toys.png')}}" alt="category2">
        </div>
    </a>

    <a href="{{route('product-page-byCategory', 'dog-food')}}">
        <div class="category--item">
            <img class="imageradius" src=" {{url('/Image/banner-dog.png')}}" alt="category3">
        </div>
    </a>
</div>

<!-- suppliers information-->
<div class="supplier--container">

    <div class="supplier--photo">
        <img class="imageradius" style="max-width: 800px;" src=" {{url('/Image/slide2.png')}}" alt="supplier-photo">
    </div>

    <div class="supplier--info">
        <h3>BEST SUPPLIER</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quibusdam aut fugit asperiores consectetur
            error ab! Culpa laborum dolorem, qui eaque, recusandae assumenda voluptatibus debitis cupiditate, facilis
            voluptatem totam reprehenderit?
        </p>
    </div>
</div>

<!--Trending Products-->
<div id="trendingProducts">
    <p class="h2 text-center">Trending Products</p>
</div>

<div class="row ml-0 mr-0 justify-content-center" id="categories">

    {{-- <div class="box-e col col-lg-2">
        <a href="#" class="custom-underline">Cat Foods</a>
    </div>

    <div class="box-e col col-lg-2">
        <a href="#" class="custom-underline">Dog Foods</a>
    </div>

    <div class="box-e col col-lg-2">
        <a href="#" class="custom-underline">Pet Toys</a>
    </div> --}}

</div>

<!--Product Photos-->
<div class="products__grid--container">
    @foreach ($trendingProducts as $product)
    <a style="color: rgb(22, 22, 22)" href={{route('product-detail-page', $product->slug)}} class="products__grid--item">
        <img class="imageradius" src=" {{url('/').$product->image}}" alt="product1">
        <p class="h6 text-center product-name">{{$product->name}}</p>
        <p class="h6 text-center product-price">
            @if ($product->discount>0)
            <del style="margin-right: 4px">${{$product->price}}</del>
            <strong>${{$product->price - $product->price * $product->discount}}</strong>
            @else
            <strong>${{$product->price}}</strong>
            @endif
           
        </p>
    </a>

    @endforeach
   

</div>

<!--'Show All' Button-->
<div class="row justify-content-center" id="show-button">
    <button class="show-button" role="button">
        <a href="{{route('product-page')}}">Show all</a>
    </button>
</div>

<!-- sale off banner -->
<div class="saleoff--container">
    <div class="saleoff--item">
        <img class="imageradius" src=" {{url('/Image/sale-off-1.jpg')}}" alt="saleoff1">
    </div>
    <div class="saleoff--item">
        <img class="imageradius" src=" {{url('/Image/sale-off-2.png')}}" alt="saleoff2">
    </div>
</div>

<!--OUR PARTNERS-->
<div id="partners">
    <p class="h2 text-center">Our Partners</p>
    <p class="h7 text-center">Vision, commitment, partnership</p>
</div>

<div class="row partner-photos">
    <div class="col partner-logo">
        <img src="/image/logo1.png" alt="logo1">
    </div>
    <div class="col partner-logo">
        <img src="/image/logo2.png" alt="logo2">
    </div>
    <div class="col partner-logo">
        <img src="/image/logo3.png" alt="logo3">
    </div>
    <div class="col partner-logo">
        <img src="/image/logo4.png" alt="logo4">
    </div>
</div>
<br>
<div class="row partner-photos">
    <div class="col partner-logo">
        <img src="/image/logo5.png" alt="logo5">
    </div>
    <div class="col partner-logo">
        <img src="/image/logo6.png" alt="logo6">
    </div>
    <div class="col partner-logo">
        <img src="/image/logo7.png" alt="logo7">
    </div>
    <div class="col partner-logo">
        <img src="/image/logo8.png" alt="logo8">
    </div>
</div>


<!--follow us-->
<br>
<div class="follow-us">
    <p class="h4 text-center">FOLLOW US ON FACEBOOK</p>

    <div class="follow-photos">

        <div class="follow-content ">
            <img src=" {{url('/Image/follow2.jpg')}}" alt="Slide1">
        </div>

        <div class="follow-content ">
            <img src=" {{url('/Image/follow1.jpg')}}" alt="Slide2">
        </div>

        <div class="follow-content ">
            <img src=" {{url('/Image/follow4.jpg')}}" alt="Slide3">
        </div>

        <div class="follow-content">
            <img src=" {{url('/Image/follow3.jpg')}}" alt="Slide4">
        </div>

    </div>
</div>


@endsection

@section('javascript')
<script src="/js/client/home.js"></script>

@endsection