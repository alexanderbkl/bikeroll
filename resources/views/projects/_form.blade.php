
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control border-0 bg-light shadow-sm" id="title" type="text" name="title"
            value="{{ old('title', $project->title) }}">
    </div>
    <div class="form-group">
        <label for="url">Project URL</label>
        <input class="form-control border-0 bg-light shadow-sm" id="url" type="text" name="url"
            value="{{ old('url', $project->url) }}">
    </div>

    <div class="form-group">
        <label for="description">Description of the project</label>
        <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="description">
    {{ old('description', $project->description) }}</textarea>
    </div>
<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('projects.index') }}">Cancel
</a>
