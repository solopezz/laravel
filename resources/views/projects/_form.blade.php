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
	<textarea name="description" cols="30" rows="2">
		{{ old('description', $project->description)}}
	</textarea>
</label>
<br>
<label for="">Pais<br>
	<input name="pais" type="text" value="{{ old('pais', $project->pais)}}">
</label>
<br>
<label for="">Estado<br>
	<input name="estado" type="text" value="{{ old('estado', $project->estado)}}">
</label>
<br>
<label for="">Ciuidad<br>
	<input name="ciuidad" type="text" value="{{ old('ciuidad', $project->ciuidad)}}">
</label>
<br>
<label for="">Calle<br>
	<input name="calle" type="text" value="{{ old('calle', $project->calle)}}">
</label>
<br>
  <input type="checkbox" name="is_public"{{ old('is_public', $project->is_public) ? 'checked="checked"' : '' }}  >
  <label for="vehicle1"> Publico</label><br><br>
<button>{{ $btnText }}</button>