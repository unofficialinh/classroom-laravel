<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand"><img src="{{ asset('images/shiba-02.png') }}"
                 style="height: 40px; width: 40px; margin-top: -10px"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ route('index') }}">Home</a></li>
            <li class="{{ (request()->is('members*')) ? 'active' : '' }}"><a href="{{ route('members') }}">Members</a></li>
            <li class="{{ (request()->is('exercises*')) ? 'active' : '' }}"><a href="{{ route('exercises') }}">Exercises</a></li>
            <li class="{{ (request()->is('challenge*')) ? 'active' : '' }}"><a href="{{ route('challenges') }}">Challenge</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="{{ (request()->is('profile*')) ? 'active' : '' }}">
                <a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user">
                    </span> Profile</a></li>
            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out">
                    </span> Log out</a></li>
        </ul>
    </div>
</nav>
