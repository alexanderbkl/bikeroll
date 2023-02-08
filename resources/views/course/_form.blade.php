@csrf
<div class="form-group">
    <label for="title">Títol cursa</label>
    <input class="form-control border-0 bg-light shadow-sm" id="title" type="text" name="title"
        value="{{ old('title', $course->title) }}">
</div>
<div class="form-group">
    <label for="url">URL del curs personalitzada</label>
    <input class="form-control border-0 bg-light shadow-sm" id="url" type="text" name="url"
        value="{{ old('url', $course->url) }}">
</div>

<div class="form-group">
    <label for="description">Descripció de la cursa</label>
    <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="description">
{{ old('description', $course->description) }}</textarea>

</div>
<div class="form-group">
    <label for="elevation">Elevación de la cursa (en metros)</label>
    <input class="form-control border-0 bg-light shadow-sm" id="elevation" type="number" name="elevation"
        value="{{ old('elevation', $course->elevation) }}">
</div>
<div class="form-group">
    <label for="map_image">Arxiu de la imatge del mapa de la cursa</label>
    <input class="form-control" id="file-input" name="map_image" type="file" />
</div>
<!--max participants-->
<div class="form-group">
    <label for="max_participants">Màxim de participants</label>
    <input class="form-control border-0 bg-light shadow-sm" id="max_participants" type="number" name="max_participants"
        value="{{ old('max_participants', $course->max_participants) }}">
</div>
<!--km-->
<div class="form-group">
    <label for="km">Kilòmetres de la cursa</label>
    <input class="form-control border-0 bg-light shadow-sm" id="km" type="number" name="km"
        value="{{ old('km', $course->km) }}">
</div>
<!--date and time-->
<div class="form-group">
    <label for="date">Data i hora de la cursa</label>
    <input class="form-control border-0 bg-light shadow-sm" id="date" type="datetime-local" name="date"
        value="{{ old('date', $course->date) }}">
</div>
<!--start point-->
<div class="form-group">
    <label for="start_point">Punt de sortida</label>
    <input class="form-control border-0 bg-light shadow-sm" id="start_point" type="text" name="start_point"
        value="{{ old('start_point', $course->start_point) }}">
</div>
<!--poster_url-->



<!--multiple images input-->
<div class="form-group">
    <p>Imatges de la cursa</p>
    <input class="form-control" name="images[]" type="file" placeholder="Imatges de cursa" multiple />
</div>
<!--sponsorship_price-->
<div class="form-group">
    <label for="sponsorship_price">Preu de patrocini</label>
    <input class="form-control border-0 bg-light shadow-sm" id="sponsorship_price" type="number"
        name="sponsorship_price" value="{{ old('sponsorship_price', $course->sponsorship_price) }}">
</div>

<!--isactive (select value 0 if inactive,  1 if active)-->
<div class="form-group">
    <label for="is_active">Activa</label>
    <select class="form-control border-0 bg-light shadow-sm" id="is_active" name="is_active">
        <option value="0" {{ old('is_active', $course->is_active) == 0 ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('is_active', $course->is_active) == 1 ? 'selected' : '' }}>Sí</option>
    </select>
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('course.index') }}">Cancelar</a>
