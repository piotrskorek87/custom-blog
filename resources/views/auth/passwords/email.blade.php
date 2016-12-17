@extends('main')

@section('title', '| Przypomnij hasło')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Zresetuj hasło</div>

				<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif

					<form action="{{ url('password/email') }}" method="POST">
						<label for="email">Email:</label>
						<input type="text" id="email" class="form-control" name="email" maxlength="255" required="true">
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						<input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top:25px;" value="zresetuj">
					</form>	
				</div>
			</div>
		</div>
	</div>

@endsection