<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="icon" type="image/x-icon" href="frontend/smily.ico" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Login</title>
</head>
<body>
    <form id='form2' action="{{route('verify')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1> Login </h1>
        <div style="color: red"> {{ Session::get('invalid') }} </div> <br>
        <label for="id">
            <div> Username </div>
            <input type="text" id="id" name="email" placeholder="username / mobile no. / email" value="{{ $check == 'ok' ? $user : old('id') }}" />
            <span class="error"> @error('email') {{$message}} @enderror </span>
        </label> <br> <br>

        <label for="password">
            <div> Password </div>
            <input type="password" id="password" name="password" placeholder="password" value="{{ $check == 'ok' ? $pass : ''}}" />
            <span class="error"> @error('password') {{$message}} @enderror </span>
        </label> <br>

        <label for="remember">
            <input type="checkbox" name="remember" id="remember" value="remember" {{ $check == 'ok' ? 'checked' : ''}}>
            <span> Remember me </span>
        </label> <br> <br>

        <input type="submit" value="Login">
        <a href="{{ route('signup')}}" class="links"> Sign up </a>
        <a href="{{ route('forgot_password') }}" class="links"> Forgot Password </a>
    </form>
</body>

</html>