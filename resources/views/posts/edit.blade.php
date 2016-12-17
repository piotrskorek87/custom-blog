@extends('main')

@section('title', '| Edytuj Post')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="http://localhost/blogk/public/css/select2.min.css">

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>

@endsection

@section('content')

<div class="row">
	<form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
				<label for="title">Tytuł:</label>
				<input type="text" id="title" class="form-control input-lg" name="title" maxlength="255" value="{{ $post->title }}">
				@if($errors->has('title'))
					<span class="help-block">{{$errors->first('title')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('slug') ? ' has-error' : ''}}">
				<label for="slug">Slug:</label>
				<input type="text" id="slug" class="form-control" name="slug" minlength="5" maxlength="255" value="{{ $post->slug }}">
				@if($errors->has('slug'))
					<span class="help-block">{{$errors->first('slug')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('category_id') ? ' has-error' : ''}}">
				<label for="category_id">Kategoria:</label>
				<select class="form-control" id="category_id" name="category_id">
					@foreach($categories as $category)
						@if($category->id == $post->category->id)
							<option value="{{$category->id}}" selected>{{$category->name}}</option>
						@else
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endif
					@endforeach
				</select>
				@if($errors->has('category_id'))
					<span class="help-block">{{$errors->first('category_id')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('tags') ? ' has-error' : ''}}">
				<label for="tags">Tagi:</label>
				<select class="form-control select2-multi" id="tags" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
							<option value="{{$tag->id}}" selected>{{$tag->name}}</option>
					@endforeach
				</select>
				@if($errors->has('tags'))
					<span class="help-block">{{$errors->first('tags')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('featured_image') ? ' has-error' : ''}}">
				<label for="featured_image">Aktualizuj zdjęcie tytułowe:</label>
				<input type="file" class="form-control" id="featured_image" name="featured_image" >
				@if($errors->has('featured_image'))
					<span class="help-block">{{$errors->first('featured_image')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('body') ? ' has-error' : ''}}">
				<label for="body">Tekst:</label>
				<textarea id="body" class="form-control" name="body"  rows="10">{{ $post->body }}</textarea>
				@if($errors->has('body'))
					<span class="help-block">{{$errors->first('body')}}</span>
				@endif
			</div>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<dt>Stworzony:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->creted_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Ostatnia modyfikacja:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn btn-danger btn-block">Anuluj</a>
					</div>
					<div class="col-sm-6">
						<input type="submit" class="btn btn-success btn-block" value="Aktualizuj">					
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

@stop

@section('scripts')

	<script src="http://localhost/blogk/public/js/select2.min.js"></script>



	<script type="text/javascript">

		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

	</script>

			

@endsection