@extends('layout')

@section('title', 'Contact')

@section('content')
	<h1>{{ __('Contact')}}</h1>
	{{-- {{ var_dump($errors->any()) }} --}}
	{{-- @if($errors->any())
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif --}}

	<form method="POST" action="{{ route('contact') }}" novalidate>
		@csrf
		<input name="name" placeholder="Nombre..." value="Noah"><br>
		{!! $errors->first('name', '<small>:message</small><br>') !!}

		<input type="email" name="email" placeholder="Email..." value="{{ old('email') }}" formnovalidate><br>
		{!! $errors->first('email', '<small>:message</small><br>') !!}

		<input name="subject" placeholder="Asunto..." value="{{ old('subject') }}"><br>
		{!! $errors->first('subject', '<small>:message</small><br>') !!}

		<textarea name="content" placeholder="Mensaje...">{{ old('content') }}</textarea><br>
		{!! $errors->first('content', '<small>:message</small><br>') !!}

		<button>@lang('Send')</button>
	</form>
@endsection