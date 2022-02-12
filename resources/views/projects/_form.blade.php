@csrf

<div class="custom-file">
	<input type="file" class="custom-file-input" id="customFile" name="image">
	<label class="custom-file-label" for="customFile">Choose File</label>
</div>

<div class="form-group">
	<label for="title">Título del proyecto </label>
	<input
		type="text"
		name="title"
		id="title"
		class="form-control border-0 bg-light shadow-sm"
		value="{{ old('title',$project->title) }}"
	>
</div>

<div class="form-group">
	<label for="url">URL del proyecto</label>
	<input
		type="text"
		name="url"
		id="url"
		class="form-control border-0 bg-light shadow-sm"
		value="{{ old('url',$project->url) }}"
	>
</div>

<div class="form-group">
	<label for="description">Descripción del proyecto</label>
	<textarea
		class="form-control border-0 bg-light shadow-sm"
		name="description"
		>{{ old('description',$project->description) }}
	</textarea>
</div>

<button class="btn btn-primary btn-lg btn-block">{{$btnText}}</button>
<a href="{{ route('projects.index') }}" class="btn btn-link btn-block">Cancelar</a>