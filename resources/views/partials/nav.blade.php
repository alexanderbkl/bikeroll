<nav>
    <ul>
        <li class="{{ setActive('home') }}"><a href="/">Home</a></li>
        <li class="{{ setActive('about') }}"><a href="{{ route('about') }}">About</a></li>
        <li class="{{ setActive('portfolio') }}"><a href="{{ route('portfolio') }}">Portfolio</a></li>
        <li class="{{ setActive('contact') }}"><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</nav>