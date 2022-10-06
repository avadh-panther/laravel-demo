<div class="side-bar">
    <ul>
        <a href="{{ route('users') }}" id="product">
            <li class="side_opt active" data-val = 'Users'>
                <i class="fas fa-user"></i>
                Users
            </li>
        </a>
        <a href="{{ route('business') }}" id="product">
            <li class="side_opt" data-val = 'Business'>
                <i class="fas fa-briefcase"></i>
                Business
            </li>
        </a>
        <a href="{{ route('location') }}" id="product">
            <li class="side_opt" data-val = 'Location'>
                <i class="fas fa-map-marker-alt"></i>
                Location
            </li>
        </a>
        <a type="submit" href="{{ route('logout') }}" name="logout" id="logout"> 
            <li class="side_opt">
                <i class="fas fa-sign-out-alt"></i>
                Log out 
            </li>
        </a>
    </ul>
</div>