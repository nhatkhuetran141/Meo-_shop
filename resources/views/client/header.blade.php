<nav class="navbar__container">
    <div class="navbar__topnav navbar__topnav-main">
        <div class="topnav__item topnav__item__logo">
            <a href="{{route('home-page')}}">
                <img class="imageradius" src=" {{url('/Image/logo.png')}}" style="max-width: 130px; padding-top: 10px"
                    alt="product1">
            </a>
        </div>

        <div class="topnav__item topnav__item-fullscreen">
            <a href="{{route('home-page')}}" class="topnav__item__button">
                HOME
            </a>
            <div id="topnav__item-product">
                <a href="{{route('product-page')}}" class="topnav__item__button">
                    PRODUCT
                </a>
                <div class="product__dropdown__content">
                    <a href="{{route('product-page-byCategory', 'cat-food')}}">Cat Food</a>
                    <a href="{{route('product-page-byCategory', 'dog-food')}}">Dog Food</a>
                    <a href="{{route('product-page-byCategory', 'toys')}}">Toys</a>
                </div>
            </div>
            <a href="{{route('contact-page')}}" class="topnav__item__button">
                CONTACT
            </a>

        </div>

        <div class="topnav__item topnav__item-fullscreen">
            <input type="text" id="topnav__search__input" />
            <a href="{{route('search-page')}}" id="topnav__search__icon" class="topnav__item__button topnav__item-icon">

                <i class="fas fa-search"></i>
            </a>
            <div id="topnav__item__cart">
                <a class="topnav__item__button topnav__item-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <?php 
                    $myCart = $cart->items; 
                ?>

                <div class="cart__dropdown">
                    <div class="cart__dropdown__list">
                        @forelse ($myCart as $item)
                        <div class="cart__dropdown__item">
                            <img src="{{url('/') . $item['image']}}" class="cart__dropdown__image" alt="" srcset="">
                            <div class="cart__dropdown__content">
                                <a href={{route('product-detail-page', $item['slug'])}}
                                    class="cart__dropdown__content-name">
                                    {{$item['name']}}
                                </a>
                                <div class="cart__dropdown__content-price">
                                    x {{$item['quantity']}}
                                </div>
                                <div class="cart__dropdown__content-price">
                                    ${{$item['finalPrice'] * $item['quantity']}}
                                </div>
                            </div>
                            <a href="javascript:" onclick="RemoveDropDownItem({{$item['id']}})"
                                class="cart__dropdown__delete">
                                <i class="far fa-times-circle"></i>
                            </a>
                        </div>
                        <hr>
                        @empty
                        <div>Your cart is empty!</div>
                        @endforelse
                    </div>


                    <div class="cart__dropdown__selection">
                        <a href={{route('show-cart')}} class="cart__dropdown__button">View Cart</a>
                        <a href={{route('show-checkout')}} class="cart__dropdown__button">Checkout</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Burger -->
        <div class="topnav__item topnav__item-burger d-flex d-sm-none">
            <i class="fas fa-bars" id="burger-top"></i>
            <i class="far fa-times-circle" id="close-top" style="display: none;"></i>
        </div>
    </div>
    <div class="panel d-sm-none">
        <a href="{{route('product-page')}}" class="panel__item">
            <span class="panel__item__icon"><i class="fas fa-home"></i></span>
            <span>Home</span>
        </a>
        <a href="{{route('product-page')}}" class="panel__item">
            <span class="panel__item__icon"><i class="fas fa-paw"></i></span>
            <span>Products</span>
        </a>
        <a href="{{route('contact-page')}}" class="panel__item">
            <span class="panel__item__icon"><i class="fas fa-phone-square-alt"></i></span>
            <span>Contact</span>
        </a>

        <a href={{route('show-cart')}} class="panel__item">
            <span class="panel__item__icon"><i class="fas fa-shopping-cart"></i></span>
            <span>Cart</span>
        </a>
    </div>
</nav>
<div class="modal-overlay " id="modal-overlay"></div>
<style>
.hidden {
    display: none;
}
</style>