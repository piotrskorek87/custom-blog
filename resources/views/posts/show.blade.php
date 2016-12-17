@extends('main')

@section('title', '| Zobacz post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<img src="{{ asset('images/'. $post->image) }}" height="350" width="700">

			<h1>{{ $post->title }}</h1>
			
			<p class="lead">{!! $post->body !!}</p>

			<hr>
			
			<div class="tags">
				@foreach ($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Komentarze <small>{{ $post->comments()->count() }}</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Imię</th>
							<th>Email</th>
							<th>Komentarz</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.destroy_confirm', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Kategoria:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Stworzony:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Ostatnia modyfikacja:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-block">Edytuj</a>
					</div>
					<div class="col-sm-6">
						<form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">	
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							<input type="submit" class="btn btn-danger btn-block" value="Usuń">					
						</form>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">

					</div>
				</div>

			</div>
		</div>
	</div>


@endsection