@csrf
<label for="">Titulo<br>
	<input name="title" type="text" value="{{ old('title', $project->title)}}">
</label>
<br>
<label for="">URL<br>
	<input name="url" type="text" value="{{ old('url', $project->url)}}">
</label>
<br>
<label for="">Descripcion<br>
	<textarea name="description" cols="30" rows="10">
		{{ old('description', $project->description)}}
	</textarea>
</label>
<br>
<button>{{ $btnText }}</button>