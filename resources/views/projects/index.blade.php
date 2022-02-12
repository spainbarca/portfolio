@extends('layout')

@section('title', 'Portfolio')

@section('content')
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<h1 class="display-4 mb-0">Portafolio</h1>
			@auth
			<a class="btn btn-primary" href="{{ route('projects.create') }}">
				Crear proyecto
			</a>
			@endauth
		</div>
		<hr>
		<p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
		<div class="d-flex flex-wrap justify-content-between align-items-start">
			@forelse ($projects as $project)
				<div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
					@if($project->image)
						<img class="card-img-top"
							src="/storage/{{$project->image}}"
							alt="{{$project->title}}"
						>
					@endif
					<div class="card-body">
						<h5 class="card-title">
							<a href="{{ route('projects.show', $project) }}">{{ $project->title}}</a>
						</h5>
						<h6 class="card-subtitle">{{ $project->created_at->format('d/m/Y') }}</h6>
						<p class="card-text text-truncate">{{ $project->description }}</p>
						<a href="{{ route('projects.show', $project) }}"
							class="btn btn-primary btn-sm">Ver más ...
						</a>
					</div>
				</div>
			@empty
				<div class="card">
					<div class="card-body">
						No hay proyectos para mostrar
					</div>
				</div>
			@endforelse
		</div>
		<div class="mt-4">
			{{ $projects->links() }}
		</div>
	</div>
@endsection