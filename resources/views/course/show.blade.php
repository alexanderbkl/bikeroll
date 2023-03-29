@extends('layout')

@section('title', 'Portafolio | ' . $course->title)

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class=" d-flex flex-column justify-content-center align-items-center">
                <h1>{{ $course->title }}</h1>
                @if ($course->poster_image)
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail"
                        src="{{ asset('/uploads/courses/posterimages/' . $course->poster_image) }}" alt="sin imagen" />
                @endif
                @if ($course->map_image)
                    <h1>Mapa:</h1>
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail"
                        src="{{ asset('/uploads/courses/mapimages/' . $course->map_image) }}" alt="sin imagen" />
                @else
                    <p>Sin mapa</p>
                @endif
            </div>
            @if ($course->is_active)
                <p class="text-success">Activo</p>
            @else
                <p class="text-danger">Inactivo</p>
            @endif
            <p class="text-secondary">{{ $course->description }}</p>
            @if ($users->count() > 0)
                @forelse ($users as $user)
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        <br><br><br>
                        {!! QrCode::generate($user->id) !!}
                        <br><br><br>
                        <span class="font-weight-bold">
                            {{ $user->name }}
                        </span>
                        <!--check if course is_active-->
                        @if ($user->paid)
                            <span class="text-success">Pagado</span>
                            <span class="text-black-50">
                                Creado el:
                                {{ $user->created_at->format('d/m/Y') }}
                            </span>
                            <span class="text-black-50">
                                email:
                                {{ $user->email }}
                            </span>
                            </a>
                        @endif
                    @empty
                    <li class="list-group-item border-0 mb-3 shadow-sm">
                        No hay patrocinadores por el momento</li>
                    </li>
                @endforelse
            @endif
            @if ($sponsors->count() > 0)
                <p>Patrocinadores:</p>
                @foreach ($sponsors as $sponsor)
                    @if ($sponsor->is_active)
                        <a href="{{ route('sponsor.show', $sponsor) }}" target="_blank">{{ $sponsor->name }}</a> <br>
                    @endif
                @endforeach
            @else
                <p>No hay patrocinadores</p>
            @endif

            <!--Create a for loop to display all images saved inside the json list called $course->images, transform first to array/object-->
            @if (json_decode($course->images) != null)
                <p>Imágenes:</p>
                @foreach (json_decode($course->images) as $image)
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="200"
                        src="{{ asset('/uploads/courses/images/' . $image) }}" alt="sin imagen" />
                @endforeach
            @endif

            <p class="text-black-50">Se celebra el: {{ date('d/m/Y', strtotime($course->date)) }}</p>
            <div class="d-flex justify-content-between align-items-between">
                <a href="{{ route('course.index') }}">Atrás</a>
                <!--Check if course has this user id, if it does, show a button-->
                @auth
                    @if (date('Y-m-d', strtotime($course->date)) < date('Y-m-d', strtotime('+30 days')))
                        @if ($course->users->contains(auth()->user()->id))
                            <a class="btn btn-primary btn-sm" href="{{ route('course.optOut', $course) }}">Baja</a>
                        @else
                            <a class="btn btn-primary btn-sm" href="{{ route('course.signUp', $course) }}">Apuntarse</a>
                        @endif
                    @endif
                @endauth
                @role('admin')
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('course.edit', $course) }}">Editar</a>
                        <a class="btn btn-danger" href="#"
                            onclick="document.getElementById('delete-course').submit()">Eliminar</a>
                        <form class="d-none" id="delete-course" method="POST" action="{{ route('course.destroy', $course) }}">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                @endrole
            </div>

        </div>

    </div>
@endsection
