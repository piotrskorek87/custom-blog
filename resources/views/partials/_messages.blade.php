@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Sukces:</strong> {{ Session::get('success') }}
	</div>

@endif
