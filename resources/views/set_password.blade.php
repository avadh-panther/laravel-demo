<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/smily.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Change Password</title>
</head>
<body>
    <form id="form4" action=" {{ route('update_password') }} " method = "POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <label for="new_pass">
            <div> Password : </div>
            <span><input type="password" name = 'password' id = "new_pass" placeholder = 'password' value = "">
            <span class="error">  </span> </span>
        </label><br>

        <label for="con_newpass">
            <div> Confirm Password : </div>
            <span><input type="text" name = 'password_confirmation' id = "con_newpass" placeholder = 'enter password again' value = "" >
            <span class="error">  </span> </span>
        </label><br> <br>

        <input type="submit" value="Change Password" name="submit"/>
    </form>
</body>
</html>