<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;1,400;1,500&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="/css/admin/login.css">

    @yield('css')
</head>

<body>
    <div class="background__image">
    </div>
    <div class="container__main">
        <div class="container__image">
            <img src="image/catlogin.jpg" class="leftside__image" alt="">
        </div>
        <div class="rightside__container">
            <div class="riightside__header">
                Welcome back
            </div>
            @if(session('Fail'))
            <div class="input__wrapper">
                <div class="message__error">
                    {{session('Fail')}}
                </div>
            </div>
            @endif

            <form action="{{route('admin-login')}}" method="POST">
                @csrf
                <div class="input__wrapper">
                    <label for="username">Username</label>
                    <input type="text" class="input__field" name="username" id="">
                </div>
                <div class="input__wrapper">
                    <label for="password">Password</label>
                    <input type="password" class="input__field" name="password" id="">
                </div>
                <div class="input__wrapper">
                    <button type="submit" class="input__field input__field-button">Log in</button>
                </div>
            </form>
        </div>
    </div>


    <script src="{{url('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Javascript -->
    @yield('js')
</body>

</html>