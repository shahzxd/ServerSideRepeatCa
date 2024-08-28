<div class="navbar navbar-main navbar-fixed-top">
  
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('front.event.index') }}">
    <img src="{{ asset('front/images/logo.png') }}" alt="" style="width: 90px; height: 90px;" />
</a>


        </div>
        <nav class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('front.event.index') }}">HOME</a></li>
        <li><a href="{{ route('front.event.all') }}">Events</a></li>
        <li><a href="{{ url('event/index') }}">My Events</a></li>
        @auth
    @if(auth()->user()->isAdmin())
        <li class="nav-item">
            <a class="nav-link @if (isset($data) && $data['active'] == 'user') active @endif" 
               href="{{ route('user.index') }}">
                <i class="fa fa-fw fa-user-circle"></i> Users
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (isset($data) && $data['active'] == 'pending-events') active @endif"
               href="{{ route('event.pending') }}"> <!-- Ensure this route is correctly defined in your routes file -->
                <i class="fa fa-fw fa-calendar-check"></i> Approve
            </a>
        </li>
    @endif
@endauth


        @if (Auth::check())
            <li class="ms-5">
                <a href="{{ route('logout') }}" title="Logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li class="ms-5"><a href="{{ route('register') }}" title="">Register</a></li>
            <li class="ms-5"><a href="{{ route('login') }}" title="">Login</a></li>
        @endif
    </ul>
</nav>

    </div>
</div>
