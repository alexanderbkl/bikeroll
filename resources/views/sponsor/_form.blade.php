@csrf
@method('patch')


<div class="form-group">
    <label for="sponsors">Select Courses</label>
    <select class="form-control" id="sponsors" name="sponsors[]" multiple>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>
</div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('course.index') }}">Cancelar</a>
