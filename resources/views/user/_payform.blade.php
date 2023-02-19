@csrf
{{-- @method('patch') --}}

@if ($user->is_pro)
    <div class="form-group">
        <label for="federation_number">Número de federación</label>
        <input class="form-control bg-light shadow-sm border-0" id="federation_number" name="federation_number"
            placeholder="Número de federación" value="{{ old('federation_number', $user->federation_number) }}">
    </div>
@else
    <div class="form-group">
        <label for="insurer_cif">Seleccionar aseguradora</label>
        <select class="form-control" id="insurer_cif" name="insurer_cif">
            @foreach ($insurers as $insurer)
                <option value="{{ $insurer->cif }}">{{ $insurer->name }} - {{ $insurer->price }}€
                </option>
            @endforeach
        </select>
    </div>
@endif


<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('home') }}">Cancelar</a>
