@extends('client.master')

@section('style')

<link rel="stylesheet" href="/css/client/contact.css">

@endsection

@section('title', 'Product Detail')

@section('content')
<div>

    <!-- Banner -->
    <div class="banner">
        <div class="banner__name">
            <img src="{{url('/Image/contact-banner.png')}}" alt="contact-banner">
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ml-5"><a href="{{route('home-page')}}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <!-- form -->
    <div class="container">
        <form class="{{route('create-contact')}}" action="#" method="POST">
            @csrf
            <div class="row">
                <div class="col-25">
                    <label for="name">Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Your name..">
                </div>

            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Telephone</label>
                </div>
                <div class="col-75">
                    <input type="number" id="pnumber" name="pnumber" placeholder="Your phone number..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="mail" name="mail" placeholder="Your email..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Message</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="Submit" class="btn--submit"></button>
            </div>
        </form>
    </div>
    <!-- .container div -->



    @endsection


    @section('javascript')

    @endsection