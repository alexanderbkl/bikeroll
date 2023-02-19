<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura {{ $sponsor->cif }} {{ now() }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Factura patrocinador</h2>
        <h3> Fecha factura {{ now() }} </h3>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Logo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">CIF</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Precio total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if ($sponsor->logo)
                            <img role="button" onclick="window.open(this.src);" class="img-thumbnail" width="100"
                                src="{{ asset('/uploads/sponsors/logos/' . $sponsor->logo) }}" alt="sin imagen" />
                        @endif
                    </td>
                    <td>{{ $sponsor->name }}</td>
                    <td>{{ $sponsor->cif }}</td>
                    <td>{{ $sponsor->address }}</td>
                    <!-- Sum all the sponsorship_price of courses that are active and unfinished (is_active and date after current date) -->
                    <td>{{ $sponsor->courses->where('is_active', true)->where('date', '>', now())->sum('sponsorship_price') }}€</td>
                </tr>
            </tbody>
        </table>
        <!-- Courses table -->
        <h3 class="text-center mb-3">Eventos activos sin finalizar a los que patrocina:</h3>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha celebración</th>
                    <th scope="col">Precio patrocinio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsor->courses->where('is_active', true)->where('date', '>', now()) as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->date }}</td>
                        <td>{{ $course->sponsorship_price }}€</td>
                    </tr>
                @endforeach
            </tbody>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
