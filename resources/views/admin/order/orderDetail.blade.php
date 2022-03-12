@extends('admin.master')

@section('title', 'Orders Manager')

@section('content_header')
<div class="d-flex align-items-center">
    <h1 class="order__header mr-3">Order from {{$order->customer_name}}</h1> 
     @if ($order->order_status == "pending")
        <span class="badge badge-dark p-2">Pending</span>
        
    @elseif ($order->order_status == "shipping")
        <span class="badge badge-warning p-2">Shipping</span>
        
    @elseif ($order->order_status == "completed")
        <span class="badge badge-success p-2">Completed</span>
        
    @else 
        <span class="badge badge-danger p-2">Cancel</span> 
    @endif
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin/order.css">

@stop

@section('breadcrumb')
<li class="breadcrumb-item">Orders</li>
<li class="breadcrumb-item active">#1</li>
@stop


@section('content')
<div class="order__detail ">
    <div class="order__detail__information">
        <div class="order__detail__information-left">
            <div class="section__title">
                Customer information
            </div>
            {{-- @dd($order) --}}
            <div>
                <span>Name: </span> 
                {{$order->customer_name}} 
            </div>
            <div>
                <span>Email: </span> 
                {{$order->email}} 
            </div>
            <div>
                <span>Phone: </span> 
                {{$order->phone}}
            </div>
            <div>
                <span>Address: </span> 
                {{$order->address}}
            </div>
            <div>
                <span>Note: </span> 
                {{$order->note}}
            </div>

        </div>
        <div>
            <div class="section__title">
                Order information
            </div>
            <div>
                <span>Order date: </span> 
                {{$order->created_at}}
            </div>
            <div>
                <span>Total quantity: </span> 
                {{$order->amount_product}}
            </div>
            <div>
                <span>Total without discount: </span> 
                ${{$order->origin_total}} 
            </div>
            <div >
                <span>Total: </span> 
                ${{$order->last_total}} 
            </div>
        </div>
    </div>

    <div class="order__detail__products">
        <div class="section__title mb-2">Order detail</div>
        <div class="d-flex bg-primary">
            <div class="col-2 text-center">Image</div>
            <div class="col-4 text-center">Product</div>
            <div class="col-2 text-center">Price</div>
            <div class="col-2 text-center">Quantity</div>
            <div class="col-2 text-center">Subtotal</div>
        </div>
        {{-- List items --}}
        <?php 
            $listItems = $order->orderDetail; 
        ?>
        @foreach ($listItems as $item)
            <div class="product__row">
                <div class="col-2 text-center">
                    <img class="product__image" src="{{url('/'). $item->product->image}}" alt="">
                </div>
                <div class="col-4 text-center">{{$item->product->name}}</div>
                <div class="col-2 text-center">
                    @if ($item->price != $item->product->price)
                        <div>
                            ${{$item->price}}
                        </div>
                        <del>
                            ${{$item->product->price}}
                        </del>
                    @else
                        
                    @endif
                  
                </div>
                <div class="col-2 text-center">{{$item->quantity}}</div>
                <div class="col-2 text-center">${{$item->price * $item->quantity}}</div>
            </div>
        @endforeach
    </div>

    <div class="order__detail__action">
        {{-- Neu order dan bi cancel hoac la da hoan thanh ==> Hien thi nut back ko thoi vi ko con hanh dong gi nua --}}
        @if ($order->is_canceled || $order->is_completed) 
            <a href="{{route('show-orders')}}" class="btn btn-secondary">Back</a>

        {{-- Neu chua bi cancel va chua complete ==> Dang pending hoac shipping --}}
        {{-- Neu confirmed = true =>> dang o trang thai shipping ==> Completed hoac cancel --}}
        @elseif ($order->is_confirmed)
            <a href="{{route('show-orders')}}" class="btn btn-secondary mr-2">Back</a>

            <form class="mr-2" action="{{route('cancel-order-detail', $order->id)}}" method="post">
                @csrf
                <button class="btn btn-danger">Cancel order</button>
            </form>

            <form action="{{route('complete-order-detail', $order->id)}}" method="post">
                @csrf
                <button class="btn btn-success">Complete order</button>
            </form>
        {{-- Confirm == false ==> Dang o trang thai pendning ==> confirm hoac cancel --}}
        @else 
            <a href="{{route('show-orders')}}" class="btn btn-secondary mr-2">Back</a>

            <form class="mr-2" action="{{route('cancel-order-detail', $order->id)}}" method="post">
                @csrf
                <button class="btn btn-danger">Cancel order</button>
            </form>

            <form action="{{route('confirm-order-detail', $order->id)}}" method="post">
                @csrf
                <button class="btn btn-primary">Confirm order</button>
            </form>
        @endif

    </div>
   
</div>
@stop

@section('js')

@stop