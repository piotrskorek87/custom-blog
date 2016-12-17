@extends('main')

@section('title', '| Wszystkie Posty')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Wszystkie Posty</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Stwórz Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Tytuł</th>
					<th>Tekst</th>
					<th>Stworzony</th>
					<th></th>
				</thead>

				<tbody>
					
					@foreach ($posts as $post)
						
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">Zobacz</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edytuj</a></td>
						</tr>

					@endforeach

				</tbody>
			</table>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
	</div>

@stop