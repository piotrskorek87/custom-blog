@extends('main')

@section('title', '| Edytuj Komentarz')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>
			<form action="{{ route('comments.update', $comment->id) }}" method="POST">
				<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
					<label for="name">Imię:</label>
					<input type="text" id="name" class="form-control" name="name" maxlength="255" value="{{ $comment->name }}" disabled>
					@if($errors->has('name'))
						<span class="help-block">{{$errors->first('name')}}</span>
					@endif
				</div>
				<div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
					<label for="email">Email:</label>
					<input type="text" id="email" class="form-control" name="email" minlength="5" maxlength="255" value="{{ $comment->email }}" disabled>
					@if($errors->has('email'))
						<span class="help-block">{{$errors->first('email')}}</span>
					@endif
				</div>
				<div class="form-group {{$errors->has('comment') ? ' has-error' : ''}}">
					<label for="comment">Komentarz:</label>
					<textarea id="comment" class="form-control" name="comment"  rows="10">{{ $comment->comment }}</textarea>
					@if($errors->has('comment'))
						<span class="help-block">{{$errors->first('comment')}}</span>
					@endif
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				<input type="submit" class="btn btn-success btn-block" value="Aktualizuj">		
			</form>
		</div>
	</div>

@endsection