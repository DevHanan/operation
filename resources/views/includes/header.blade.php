<!-- start navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">SaaS Application</a>
        </div>
        <div class="collapse navbar-collapse">
            @if(Session::has('email'))
               <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">WelCome {{ Session::get('name') }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('user_profile') }}">Profile</a></li>
                        <li><a href="{{ url('get_teams') }}">MyTeam</a></li>
                        <li><a href="#">Plans</a></li>
                        <li><a href="{{ url('pages/invite_user') }}">Invite Users To Join</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('pending_invitations') }}">Pending Invitations</a></li>
                        </ul>
                   </li>
                <li><a href="{{ url('logout') }}">Log out</a></li>
              </ul>
            @else
            <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('pages/login') }}">Login</a></li>
                <li><a href="{{ url('pages/signup') }}">Sign Up</a></li>
                <li><a href="{{ url('pages/documentation') }}">Documentation</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>