@extends('client.master')

@section('style')

<link rel="stylesheet" href="/css/client/product-detail.css">

@endsection

@section('title', 'Product Detail')
@section('content')
<!-------------breadcrumb------------->
<nav aria-label="breadcrumb breadcrumb--container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item ml-5"><a href="{{route('home-page')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('product-page')}}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</nav>
<!----------Product Content---------->
<div class="prod-content container-fluid">
    <div class="prod-content__row row justify-content-center">
        <!--3 Mini Photos -->
        <div class="mini-photos__warrper col-md-2">

            <img id="slideLeft" class="arrow" src="{{url('/utility/arrow-left.png')}}">
            <img id="slideTop" class="arrow" src="{{url('/utility/arrow-top.png')}}">

            <?php
            // listimage ban dau la Json -> array
            $imagesArr = json_decode($product->list_image);

            ?>
            <div class="mini-photos__row  ">
                <div class="mini-photo__col ">
                    {{-- Cai anh dai dien san pham --}}
                    <img class="thumbnail active" src=" {{url('/') . $product->image}}" alt="">
                </div>
                @if ($imagesArr)
                @foreach ($imagesArr as $image)
                <div class="mini-photo__col ">
                    <img class="thumbnail active" src=" {{url('/') . $image}}" alt="">
                </div>
                @endforeach
                @else
                <div class="mini-photo__col ">
                    <img class="thumbnail active" src=" {{url('/') . $imagesArr}}" alt="">
                </div>
                @endif

            </div>

            <img id="slideRight" class="arrow" src="{{url('/utility/arrow-right.png')}}">
            <img id="slideBottom" class="arrow" src="{{url('/utility/arrow-bottom.png')}}">

        </div>

        <!-- Big Photo -->
        <div class="prod-content__col--big col-md-6 ">
            <img class="big-photo--imageradius featured" src={{url('/') . $product->image}} />
        </div>

        <!--Short Product Description-->
        <div class="product-desc__col col-md-4">
            <p class="product-desc--name h5"> <strong> {{$product->name}} </strong> </p>
            @if ($product->discount > 0)
            <del class="h7">${{$product->price - $product->price * $product->discount}}</del>
            <strong class="product-desc--price  ">${{$product->price}}</strong>
            @else
            <span class="product-desc--price ">${{$product->price}}</span>
            @endif
            <div class="product-desc--detail">
                <p class="h7">{{$product->short_description}}</p>
            </div>

            <form action="{{route('add-cart', $product->id)}}" method="post">
                @csrf
                <div>
                    <div class="buttons_added">
                        <input class="minus is-form" type="button" value="-" onclick="DecreaseQuantity()">
                        <input aria-label="quantity" name="quantity" class="input-qty" max="10" min="1" name="" value="1" type="number">
                        <input class="plus is-form" type="button" value="+" onclick="IncreaseQuantity()">
                    </div>
                </div>
                <br>
                <!-- 2 Buttons -->
                <button type="submit" name="add" value="add" class="btn-product btn--addCart">Add to cart</button>
                <button type="submit" name="checkout" value="checkout" class="btn-product btn--buyNow">Buy Now</button>
            </form>

            <!-- Categories & Tags-->
            <div class="product-desc--category">
                <p class="product-desc__h7 h7">
                    <strong>Category:</strong>
                    <span class="product-desc__h7--name">{{$product->category->name}}</span>
                </p>
            </div>
        </div>
    </div>
</div>

<!--------Detail description------------>
<div class="product-detail__row row mt-5 ml-4">
    <div class="product-detail__col--des col col-sm-9">

        <div class="product-detail--title">
            <h4>Product Description</h5>
        </div>
        <!-- detail description p -->
        <div class="product-detail--desc">
            {!!$product->description!!}
        </div>

    </div>
    <!--Trending Product-->
    <div class=" advertise bouncing col col-md-3">

        <img src="/Image/advertise.jpg" alt="">

    </div>
</div>
<!-----------Related Products-------------->
<div class="related-prod">
    <!-- title -->
    <div class="related-prod__h3">
        <p class="h3 text-center">Related Products</p>
    </div>
    <!-- Related product's content -->
    <div class="related-prod__row row justify-content-center">
        <div class="row">
            @foreach ($relatedProducts as $product)
            <a href={{route('product-detail-page', $product->slug)}} class="related-prod__col col">
                <img src="{{url('/').$product->image}}" alt="product2">
                <p class="related-prod__h6--name h6 text-center">{{$product->name}}</p>
                @if ($product->discount > 0)
                <p class="related-prod__h6--price h6 text-center"><del>${{$product->price}}</del> <strong>${{$product->price - $product->price * $product->discount}}</strong></p>
                @else
                <p class="related-prod__h6--price h6 text-center"><strong>${{$product->price}}</strong></p>
                @endif
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection


@section('javascript')
<script src="/js/client/product-detail.js"> </script>
<script>
    // Danh cho quantity input
    let quantity = $(".input-qty").attr("value");

    const DecreaseQuantity = () => {
        if (Number(quantity) - 1 > 0) {
            quantity = Number(quantity) - 1;
            $(".input-qty").attr("value", quantity);
        }
    };

    const IncreaseQuantity = () => {
        quantity = Number(quantity) + 1;
        $(".input-qty").attr("value", quantity);
    };
</script>
@endsection