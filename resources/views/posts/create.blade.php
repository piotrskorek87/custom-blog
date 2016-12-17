@extends('main')

@section('title', '| Stwóż nowy post')

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
		<div class="col-md-8 col-md-offset-2">
			<h1>Stwóż nowy post</h1>
			<hr>
			<form class="form-vertical" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
				<div class="form-group {{$errors->has('title') ? ' has-error' : ''}}">
					<label for="title">Tytuł:</label>
					<input type="text" id="title" class="form-control " name="title" maxlength="255" value="{{Request::old('title') ?  : ''}}">
					@if($errors->has('title'))
						<span class="help-block">{{$errors->first('title')}}</span>
					@endif
				</div>
				<div class="form-group {{$errors->has('slug') ? ' has-error' : ''}}">
					<label for="slug">Slug:</label>
					<input type="text" id="slug" class="form-control" name="slug" minlength="5" maxlength="255" value="{{Request::old('slug') ?  : ''}}">
					@if($errors->has('slug'))
						<span class="help-block">{{$errors->first('slug')}}</span>
					@endif
				</div>
				<div class="form-group {{$errors->has('category_id') ? ' has-error' : ''}}">
					<label for="category_id">Kategoria:</label>
					<select class="form-control" id="category_id" name="category_id">
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
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
							<option value="{{$tag->id}}">{{$tag->name}}</option>
						@endforeach
					</select>
					@if($errors->has('tags'))
						<span class="help-block">{{$errors->first('tags')}}</span>
					@endif
				</div>
				<div class="form-group {{$errors->has('featured_image') ? ' has-error' : ''}}">
					<label for="featured_image">Dodaj zdjęcie tytułowe:</label>
					<input type="file" class="form-control" id="featured_image" name="featured_image" >
					@if($errors->has('featured_image'))
						<span class="help-block">{{$errors->first('featured_image')}}</span>
					@endif
				</div>
				<div class="form-group {{$errors->has('body') ? ' has-error' : ''}}">
					<label for="body">Tekst:</label>
					<textarea id="body" class="form-control" name="body"  rows="10">{{Request::old('body') ?  : ''}}</textarea>
					@if($errors->has('body'))
						<span class="help-block">{{$errors->first('body')}}</span>
					@endif
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				<input type="submit" class="btn btn-success btn-lg btn-block" style="margin-top:25px;" value="Dodaj">
			</form>	
		</div>
	</div>
@endsection

@section('scripts')

	<script src="http://localhost/blogk/public/js/select2.min.js"></script>

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>			

@endsection