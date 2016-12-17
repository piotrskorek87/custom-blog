@extends('main')

@section('title', "| Edit Tag")

@section('content')
	
	<div class="col-md-4">
		<form class="form-vertical" action="{{ route('tags.update', $tag->id) }}" method="POST">
			<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
				<label for="name">Tag:</label>
				<input type="text" id="name" class="form-control " name="name" maxlength="255" value="{{ $tag->name }}">
				@if($errors->has('name'))
					<span class="help-block">{{$errors->first('name')}}</span>
				@endif
			</div>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
			<input type="submit" class="btn btn-success btn-lg " style="margin-top:25px;" value="Zapisz Zmiany">
		</form>		
	</div>
	

@endsection