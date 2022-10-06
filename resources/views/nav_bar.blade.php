<nav class="nav1">
    <div class="nav-items">
        <img src="{{ URL('images/shopify.png') }}" alt="logo">
        <p style="font-weight: bold;"> Final-Testin </p>
    </div>
    <div class="nav-items" id="nav-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search">
    </div>
    <div class="nav-items">
        <img src="{{ URL('images/user.png') }}" alt="user-img">
        {{-- <p id="username"> {{ $userinfo->first_name }} <p> --}}
        <p> <a type="submit" href="{{ route('logout') }}" name="logout" id="logout"> Log out </a></p>
    </div>
</nav>