@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<img src="{{ asset('images/'. $post->image) }}" height="400" width="800">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Opublikowane w: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>Ilość Komentarzy: {{ $post->comments()->count() }}</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>
						
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
					
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			<form class="form-vertical" action="{{ route('comments.store', $post->id) }}" method="POST">
				<div class="row">
					<div class="col-md-6">
						<label for="name">Imię:</label>
						<input type="text" id="name" class="form-control " name="name">
					</div>
					<div class="col-md-6">
						<label for="email">Email:</label>
						<input type="text" id="email" class="form-control " name="email">
					</div>
					<div class="col-md-12">
						<label for="comment">Komentarz:</label>
						<textarea id="comment" class="form-control" name="comment"  rows="5"></textarea>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						<input type="submit" class="btn btn-success btn-block" style="margin-top:15px;" value="Dodaj komentarz">
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection