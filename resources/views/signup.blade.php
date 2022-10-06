<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/smily.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Login</title>
</head>
<body>

    <form id='form1' action = "{{route('register')}}" method = "POST" enctype="multipart/form-data" >
        @csrf
        <label for="fname">
            <span> Name : </span>
            <span> <input type="text" name = "name" id = "fname" placeholder = 'enter name' value = "{{ old('name') }}">
            <span class="error"> @error('name') {{$message}} @enderror </span> </span>
        </label><br>
        
        <label for="mail">
            <span> E-mail : </span>
            <span><input type="text" name = 'mail' id = "mail" placeholder = 'email address' value = "{{ old('mail') }}">
            <span class="error"> @error('mail') {{$message}} @enderror </span> </span>
        </label><br>
        
        <label for="mobile">
            <span> Mobile : </span>
            <span><input type="text" name = 'mobile' id = "mobile" placeholder = 'Mobile' value = "{{ old('mobile') }}">
            <span class="error"> @error('mobile') {{$message}} @enderror </span> </span>
        </label><br>
        
        <label for="uname">
            <span> Username : </span>
            <span><input type="text" name = 'uname' id = "uname" placeholder = 'username' value = "{{ old('uname') }}">
            <span class="error"> @error('uname') {{$message}} @enderror </span> </span>
        </label><br>
        
        <label for="pass">
            <span> Password : </span>
            <span><input type="password" name = 'pass' id = "pass" placeholder = 'password' value = "">
            <span class="error"> @error('pass') {{$message}} @enderror </span> </span>
        </label><br>

        <label for="con_pass">
            <span> Confirm Password : </span>
            <span><input type="password" name = 'con_pass' id = "con_pass" placeholder = 'password' value = "" >
            <span class="error"> @error('con_pass') {{$message}} @enderror </span> </span>
        </label><br> <br>

        <input type="submit" value="Signup" name="submit"/>
        <a href="{{route('signup')}}" class="links"> Reset </a>
        <a href="{{route('login')}}" class="links"> Login </a>
    </form>
</body>
</html>