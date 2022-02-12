@csrf
@if($project->image)
	<img class="card-img-top mb-4 img-fluid hover-shadow rounded"
	src="/storage/{{ $project->image }}"
	alt="{{ $project->title }}"
	style="height: 250px; object-fit: cover; box-shadow: 10px 10px 5px #ccc;"
	>
@endif

<div class="custom-file mb-2">
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