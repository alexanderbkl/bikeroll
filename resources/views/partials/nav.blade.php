<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="{{ route('home') }}">Home</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">About</a></li>
        <li class="{{ setActive('projects.*') }}"><a href="{{ route('projects.index') }}">Projects</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">Contact</a></li>
        @auth
            <li>
                <a href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>

            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
        @endguest
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>