<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura {{ $course->title }} {{ now() }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Factura Cursa</h2>
        <h3> Fecha factura {{ now() }} </h3>
        <table class="table table-bordered">
            <thead>

                <p><b>Poster</b></p>
                @if ($course->poster_image)
                    <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="100"
                        src="{{ asset('/uploads/courses/posterimages/' . $course->poster_image) }}" alt="sin imagen" />
                @else
                    <p>Sin logo</p>
                @endif
                <p><b>Nombre</b></p>
                <p>{{ $course->title }}</p>
                <p><b>URL</b></p>
                <a href="{{ route('course.show', $course) }}">{{ route('course.show', $course) }}</a>
                <p><b>Descripción</b></p>
                <p>{{ $course->description }}</p>

                <p><b>Elevación</b></p>
                <p>{{ $course->elevation }}</p>

                <p><b>km</b></p>
                <p>{{ $course->km }}</p>

                <p><b>Fecha celebración</b></p>
                <p>{{ $course->date }}</p>

                <p><b>CIF aseguradora</b></p>
                <p>{{ Auth::user()->insurer_cif }}</p>

                <p><b>Precio de aseguradora</b></p>
                <p>{{ $insurer->price }}€</p>




                <!--Get insurer where insurer_cif is same as Authenticated user and select price-->


                </tr>
                </tbody>
        </table>
        <!-- Courses table -->
        <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="100"
            src="{{ asset('/uploads/courses/mapimages/' . $course->map_image) }}" alt="sin imagen de mapa" />
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
