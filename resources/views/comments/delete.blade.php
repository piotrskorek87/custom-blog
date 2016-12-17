@extends('main')

@section('title', '| Usuń Komentarz?')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Czy chcesz usunąć ten komentarz?</h1>
			<p>
				<strong>Imię:</strong> {{ $comment->name }}<br>
				<strong>Email:</strong> {{ $comment->email }}<br>
				<strong>Komentarz:</strong> {{ $comment->comment }}
			</p>

			<form action="{{ route('comments.destroy', $comment->id) }}" method="POST">	
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				<input type="submit" class="btn btn-lg btn-block btn-danger" value="Usuń">					
			</form>
		</div>
	</div>

@endsection