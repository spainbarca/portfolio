@extends('layout')

@section('title', 'Home')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<h1 class="display-4 text-primary">Desarrollo Web</h1>
				<p class="text-secondary">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<a href="{{ route('contact') }}"
					class="btn btn-lg btn-block btn-primary">Contáctame
				</a>
				<a href="{{ route('projects.index') }}"
					class="btn btn-lg btn-block btn-outline-primary">Portafolio
				</a>
			</div>
			<div class="col-12 col-lg-6">
				<img class="img-fluid mt-4" src="/img/home.svg" alt="Desarrollo Web">
			</div>
		</div>
	</div>
@endsection