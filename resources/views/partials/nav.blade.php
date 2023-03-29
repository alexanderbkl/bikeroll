<nav class="navbar navbar-expand-md bg-white shadow-sm px-3">
    <a href="{{ route('home.index') }}" class="navbar-brand">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ setActive('home') }}" href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ setActive('course.*') }}" href="{{ route('course.index') }}">Carreras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ setActive('sponsor.*') }}" href="{{ route('sponsor.index') }}">Patrocinadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ setActive('about') }}" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ setActive('projects.*') }}" href="{{ route('projects.index') }}">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ setActive('contact') }}" href="{{ route('contact') }}">Contactar</a>
            </li>
            @role('admin')
                <li class="nav-item">
                    <a class="nav-link {{ setActive('admin') }}" href="{{ route('user.list') }}">Usuarios</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('admin') }}" href="{{ route('admin') }}">Admin</a>
                </li>
            @endrole

            @auth
                <li class="nav-item">
                    <a class="nav-link {{ setActive('user') }}" href="{{ route('user.index') }}">Profile</a>
                </li>
            @endauth
            @role('pro')
                <li class="nav-item">
                    <a class="nav-link {{ setActive('pro') }}" href="{{ route('contact') }}">PRO</a>
                </li>
            @endrole
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ setActive('logout') }}" href="#"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">Login</a>
                </li>
            @endguest


        </ul>

    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
