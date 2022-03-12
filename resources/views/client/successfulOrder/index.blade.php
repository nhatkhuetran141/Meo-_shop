@extends('client.master')

@section('style')

<link rel="stylesheet" href="/css/client/successfulOrder.css">

@endsection

@section('title', 'Meow Home')

@section('content')

<div class="notification--container">

    <div class="notification--photo">
        <img class="imageradius" style="max-width: 650px;" src=" {{url('/Image/meongau.png')}}" alt="meow-photo">
    </div>

    <div class="notification--paragraph">
        <img class="imageradius" src=" {{url('/Image/frame-comic2.png')}}" alt="frame-photo">
    </div>
</div>

@endsection

@section('javascript')
<script src="/js/client/home.js"></script>
<script>
    setTimeout(() => {
        window.location.href = '/';
    }, 5000);
</script>
@endsection