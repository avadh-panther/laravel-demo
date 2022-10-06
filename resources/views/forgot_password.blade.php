<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="icon" type="image/x-icon" href="../frontend/smily.ico" /> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Verify Email</title>
</head>
<body>
    <form id="form3" action="{{ route('send_link') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <span class="error"> {{ Session::get('emailErr') }} </span>
        <label for="fid">
            <div> Username </div>
            <input type="text" id="fid" name="email" placeholder="username / mobile no. / email" value="{{ old('email') }}"/>
            <span class="error"> @error('email') {{$message}} @enderror </span>
        </label> <br> <br>
        <input type="submit" value="Proceed">
    </form>
</body>
</html>