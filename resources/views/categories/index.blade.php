@extends('main')

@section('title', '| Wszystkie kategorie')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Kategorie</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Kategoria</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> 

		<div class="col-md-3">
			<div class="well">
				<form class="form-vertical" action="{{ route('categories.store') }}" method="POST">
					<h2>Dodaj nową kategorię</h2>
					<div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
						<label for="title">Kategoria:</label>
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