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
            <ul class="nav navbar-nav navbar-right text-uppercase">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('pages/login') }}">Login</a></li>
                <li><a href="{{ url('pages/signup') }}">Sign Up</a></li>
                <li><a href="{{ url('pages/documentation') }}">Documentation</a></li>
            </ul>
        </div>
    </div>
</nav>