@extends('main')

@section('title', '| Wszystkie Tagi')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Tagi</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nazwa</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<div class="well">
				<form class="form-vertical" action="{{ route('tags.store') }}" method="POST">
					<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
						<label for="title">Tag:</label>
						<input type="text" id="name" class="form-control " name="name" maxlength="255" value="{{Request::old('name') ?  : ''}}">
						@if($errors->has('name'))
							<span class="help-block">{{$errors->first('name')}}</span>
						@endif
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
					<input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top:25px;" value="Dodaj">
				</form>	
			</div>
		</div>
	</div>

@endsection