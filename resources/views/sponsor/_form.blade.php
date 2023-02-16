@csrf
{{-- @method('patch') --}}

<div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control border-0 bg-light shadow-sm" id="name" type="text" name="name"
        value="{{ old('name', $sponsor->name) }}">
</div>
<div class="form-group">
    <label for="name">CIF</label>
    <input class="form-control border-0 bg-light shadow-sm" id="cif" type="text" name="cif"
        value="{{ old('cif', $sponsor->cif) }}">
</div>
<div class="form-group">
    <label for="courses">Carreras que patrocina</label>
    <select class="form-control" id="sourses" name="courses[]" multiple>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->title }}
                @if ($course->is_active == 1)
                    (Activa)
                @else
                    (Inactiva)
                @endif
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="address">Dirección</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="address" value="{{ old('address', $sponsor->address) }}">
</div>
<div class="form-group">
    <label for="is_active">Activo</label>
    <select class="form-control border-0 bg-light shadow-sm" id="is_active" name="is_active">
        <option value="0" {{ old('is_active', $sponsor->is_active) == 0 ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('is_active', $sponsor->is_active) == 1 ? 'selected' : '' }}>Sí</option>
    </select>
</div>

<div class="form-group">
    <label for="logo">Logo</label>
    <input class="form-control" id="file-input" name="logo" type="file" />
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('sponsor.index') }}">Cancelar</a>
