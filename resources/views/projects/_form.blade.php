@csrf

<label>
    Title
    <input type="text" name="title" value="{{old('title', $project->title)}}">
</label>
<br>
<label>
    URL
    <input type="text" name="url" value="{{old('url', $project->url)}}">
</label>
<br>
<label>
    Description
    <textarea type="text" name="description">{{old('description', $project->description)}}</textarea>
</label>
<br>
<button>{{$btnText}}</button>
