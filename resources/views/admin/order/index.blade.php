@extends('admin.master')

@section('title', 'Orders Manager')

@section('content_header')
<div class="d-flex align-items-center">
    <h1 class="mr-2">All Orders</h1>
    <span class="badge badge-pill badge-primary">{{count($list_orders)}}</span>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin/order.css">
<link rel="stylesheet" href="{{url('adminlte/plugins/daterangepicker/daterangepicker.css')}}">

@stop

@section('breadcrumb')
<li class="breadcrumb-item active">Orders</li>
@stop


@section('content')
<div class="order__containter p-4">
    <form class="" action="{{route('show-orders')}}" method="">
        <div class="d-flex w-100 ">
            <div class="flex-grow-1 d-flex align-items-center justify-content-around mr-4">
                <div class="input__label">
                    Status
                </div>
                <select style="width: 90%;" id="my-select" class="form-control " name="status">
                    <option selected value="">------All-----</option>
                    <option value="pending">Pending</option>
                    <option value="shipping">Shipping</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Cancel</option>
                </select>
            </div>

            <div class="flex-grow-1 d-flex align-items-center mr-4 ">
                <div class="input__label">
                    Order time:
                </div>
                <div class="input-group" style="width: 80% !important;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control float-right" name="" id="reservation">
                    <input type="text" name="from" id="from" style="display: none">
                    <input type="text" name="to" id="to" style="display: none">
                </div>
                <!-- /.input group -->

            </div>

            <div class="align-items-center">
                <button class="btn btn-primary" type="submit">Find</button>
                <button class="btn btn-danger" type="submit">
                    <a href="{{route('show-orders')}}" style="color: inherit">Clear</a>
                </button>
            </div>
        </div>
        <hr>

    </form>
    <div class="row bg-primary py-1">
        <div class="col-1 text-center" style="text-align: center">Order</div>
        <div class="col-4 text-center">Customer Name</div>
        <div class="col-2 text-center">Price</div>
        <div class="col-3 text-center">Order time</div>
        <div class="col-2 text-center">Status</div>
    </div>

    @forelse($list_orders as $order)
        <a href="{{route('show-order-detail', $order->id)}}" style="color: black;" >
            <div class="row py-3 border align-items-center order__row">
                <div class="col-1 text-center">#{{$order->id}}</div>
                <div class="col-4 text-center">{{$order->customer_name}}</div>
                <div class="col-2 text-center">${{$order->last_total}}</div>
                <div class="col-3 text-center">{{$order->created_at}}</div>
                <div class="col-2 text-center">
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
            </div>
        </a>
    @empty
        <p>Empty! </p>
    @endforelse
<!-- Large modal -->
    <div class="pagination justify-content-center mt-4">
        {{$list_orders->appends(request()->all())->links()}}
    </div>
</div>
@stop

@section('js')
<script src="{{url('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script>
$(function() {
    $('#reservation').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/M/YYYY '
            }
        },
        function(start, end, label) {
            $('#from').val(start.format('YYYY-MM-DD'));
            $('#to').val(end.format('YYYY-MM-DD'));
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
});

$(document).ready(function() {
    $("#master-order").addClass("active");
});
</script>
@stop