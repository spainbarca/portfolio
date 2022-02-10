@extends('layout')

@section('title', 'Contact')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-10 col-lg-6 mx-auto">
				<form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('messages.store') }}" >
					@csrf
					<h1 class="display-4">@lang('Contact')</h1>
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text"
							id="name"
							class="form-control bg-light shadow-sm {{ $errors->has('name') ? ' is-invalid' : 'border-0' }}"
							name="name"
							placeholder="Nombre..."
							value="{{ old('name') }}" >
						@if($errors->has('name'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{!! $errors->first('name', ':message') !!}</strong>
			                </span>
		            	@endif
					</div>
					<div class="form-group">
						<label for="email">Correo Electrónico</label>
						<input type="email"
							id="email"
							class="form-control bg-light shadow-sm {{ $errors->has('email') ? ' is-invalid' : 'border-0' }}"
							name="email"
							placeholder="Email..."
							value="{{ old('email') }}" >
						@if($errors->has('email'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{!! $errors->first('email', ':message') !!}</strong>
			                </span>
		            	@endif
					</div>
					<div class="form-group">
						<label for="subject">Asunto</label>
						<input type="text"
							id="subject"
							class="form-control bg-light shadow-sm {{ $errors->has('subject') ? ' is-invalid' : 'border-0' }}"
							name="subject"
							placeholder="Asunto..."
							value="{{ old('subject') }}" >
						@if($errors->has('subject'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{!! $errors->first('subject', ':message') !!}</strong>
			                </span>
		            	@endif
					</div>
					<div class="form-group">
						<label for="content">Contenido</label>
						<textarea name="content"
							id="content"
							class="form-control bg-light shadow-sm {{ $errors->has('content') ? ' is-invalid' : 'border-0' }}"
							placeholder="Mensaje...">{{ old('content') }}
						</textarea>
						@if($errors->has('content'))
			                <span class="invalid-feedback" role="alert">
			                    <strong>{!! $errors->first('content', ':message') !!}</strong>
			                </span>
		            	@endif
					</div>
					<button class="btn btn-primary btn-lg btn-block">@lang('Send')</button>
				</form>
			</div>
		</div>
	</div>
@endsection