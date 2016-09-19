<!-- start navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">CRUD Operation</a>
        </div>
        <div class="collapse navbar-collapse">
            @if(Session::has('email'))
               <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('logout') }}">Log out</a></li>
              </ul>
            @else
            <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="{{ url('pages/login') }}">Login</a></li>
                <li><a href="{{ url('pages/signup') }}">Sign Up</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>