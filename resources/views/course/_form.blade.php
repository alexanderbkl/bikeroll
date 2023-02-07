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
    <!--<input class="form-control border-0 bg-light shadow-sm" id="elevation" type="number" name="elevation"
        value="{{ old('elevation', $course->elevation) }}">-->
    <input class="form-control border-0 bg-light shadow-sm" id="elevation" type="number" name="elevation"
        value="{{ "123" }}">
</div>
<!--map_image_url-->
<div class="form-group">
    <label for="map_image_url">URL de la imatge del mapa de la cursa</label>
    <!--<input class="form-control border-0 bg-light shadow-sm" id="map_image_url" type="text" name="map_image_url"
        value="{{ old('map_image_url', $course->map_image_url) }}">-->
    <input class="form-control border-0 bg-light shadow-sm" id="map_image_url" type="text" name="map_image_url"
        value="{{ 'test.com' }}">
    <input id="file-input" name="imagenmapa" type="file" />

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
<div class="form-group">
    <label for="poster_url">URL del poster de la cursa</label>
    <input class="form-control border-0 bg-light shadow-sm" id="poster_url" type="text" name="poster_url"
        value="{{ old('poster_url', $course->poster_url) }}">
</div>
<!--sponsorship_price-->
<div class="form-group">
    <label for="sponsorship_price">Preu de patrocini</label>
    <input class="form-control border-0 bg-light shadow-sm" id="sponsorship_price" type="number"
        name="sponsorship_price" value="{{ old('sponsorship_price', $course->sponsorship_price) }}">
</div>
<!--photos_id-->
<div class="form-group">
    <label for="photos_id">ID de les fotos</label>
    <input class="form-control border-0 bg-light shadow-sm" id="photos_id" type="number" name="photos_id"
        value="{{ old('photos_id', $course->photos_id) }}">
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('course.index') }}">Cancelar</a>
