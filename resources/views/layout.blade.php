<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/smily.ico') }}" />
    <script src="https://kit.fontawesome.com/8099a0a6f7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @include('auth/nav_bar')

    @include('auth/side_bar')

    <div style="padding-top: 4%; margin-left: 15%;" id="screen">
        @yield('screen')
    </div>
    @yield('script')
    <script>
        let option = document.getElementsByClassName('side_opt'); 
        let active = localStorage.getItem('active');

        for (let j = 0; j < option.length; j++) {
            if(option[j].dataset.val == active){
                document.getElementsByClassName('active')[0].classList.remove('active');
                option[j].classList.add("active");
            }
            option[j].addEventListener("click", function () {
                localStorage.setItem('active', option[j].dataset.val);
            });
        }
    </script>
</body>
</html>