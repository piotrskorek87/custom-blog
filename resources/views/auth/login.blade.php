@extends('main')

@section('title', '| Login')

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="{{ route('login') }}" method="POST">
				<label for="email">Email:</label>
				<input type="text" id="email" class="form-control" name="email" maxlength="255" required="true">
				<label for="password">Hasło:</label>
				<input type="password" id="password" class="form-control" name="password" minlength="5" maxlength="255" required="true">
				<br>
				<label for="remember">Zapamiętaj mnie:</label>
				<input type="checkbox" id="remember" name="remember">
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				<input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top:25px;" value="zaloguj">
			</form>	
			<br>
			<p><a href="{{ url('password/reset') }}">Zapomniałaś hasło?</a>
		</div>
	</div>

@endsection