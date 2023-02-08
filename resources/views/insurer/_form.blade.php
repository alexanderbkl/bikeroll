
@csrf

    <div class="form-group">
        <label for="cif">CIF</label>
        <input class="form-control border-0 bg-light shadow-sm" id="url" type="text" name="cif"
            value="{{ old('cif', $insurer->cif) }}">
    </div>

    <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" name="name" value="{{ old('name', $insurer->name) }}">
    </div>
    <div class="form-group">
        <label for="address">Dirección</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" name="address" value="{{ old('address', $insurer->address) }}">
    </div>
    <div class="form-group">
        <label for="price">Precio por curso</label>
        <input class="form-control border-0 bg-light shadow-sm" type="number" name="price" value="{{ old('price', $insurer->price) }}">
    </div>
<button class="m-1 btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('insurers.index') }}">Cancelar
</a>
