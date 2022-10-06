<nav class="nav1">
    <div class="nav-items">
        <img src="{{ URL('images/logo.png') }}" alt="logo">
        <p style="font-weight: bold;"> MyBusiness </p>
    </div>
    <div class="nav-items" id="nav-search">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Search">
    </div>
    <div class="nav-items">
        <img src="{{ URL('images/user.png') }}" alt="user-img">
        <p id="username"> {{ Auth::user()->name }} <p>
        <p> </p>
    </div>
</nav>