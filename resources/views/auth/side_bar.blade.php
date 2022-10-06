<div class="side-bar">
    <ul>
        <a href="{{ route('home') }}">
            <li class="side_opt active" data-val = 'Home'>
                <i class="fas fa-home"></i>
                Home
            </li>
        </a>
        @if (check('view user'))
            <a href="{{ route('users') }}">
                <li class="side_opt" data-val = 'Users'>
                    <i class="fas fa-user"></i>
                    Users
                </li>
            </a>
        @endif
        @if (check('view permission'))
        <a href="{{ route('permission') }}">
            <li class="side_opt" data-val = 'Permission'>
                <i class="fas fa-clipboard-list"></i>
                Permission
            </li>
        </a>
        @endif
        @if (check('view role'))
            <a href="{{ route('role') }}">
                <li class="side_opt" data-val = 'Permissions'>
                    <i class="fas fa-user-tag"></i>
                    Role
                </li>
            </a>
        @endif
        @if (check('view business'))
            <a href="{{ route('business') }}">
                <li class="side_opt" data-val = 'Business'>
                    <i class="fas fa-briefcase"></i>
                    Business
                </li>
            </a>
        @endif
        @if (check('view location'))
            <a href="{{ route('location') }}">
                <li class="side_opt" data-val = 'Location'>
                    <i class="fas fa-map-marker-alt"></i>
                    Location
                </li>
            </a>
        @endif
        <a type="submit" href="{{ route('logout') }}" name="logout" id="logout"> 
            <li class="side_opt" data-val = 'Logout'>
                <i class="fas fa-sign-out-alt"></i>
                Log out 
            </li>
        </a>
    </ul>
</div>