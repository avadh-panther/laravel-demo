<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8099a0a6f7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    {{-- <link rel="icon" type="image/x-icon" href="myicon.ico" /> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}">
    <title>Document</title>
</head>

<body>
    @include('nav_bar');

    <div id="popup-bg">
        <div id="popup">
            <i class="fas fa-times" style="float: right; color: black;"></i>
            <p> asasassas </p>
        </div>
    </div>

    @include('side_bar');

    <div style="padding-top: 4%; margin-left: 15%;" id="screen">
        @yield('screen')
    </div>
    <script src="{{ asset('/javascript/demo.js') }}"></script>
</body>

</html>