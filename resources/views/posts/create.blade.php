@extends('layouts.app')

@section('content')
<div class="card card-default">
	<div class="card-header">
		{{ isset($category) ? 'Edit Post': 'Create Post'}}
	</div>
	<div class="card-body">
		@if($errors->any())
			<div class="alert alert-danger">
				<ul class="list-group">
					@foreach($errors->all() as $error)
					<li class="list-group-item text-danger">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ isset($posts) ? route('posts.update', $posts->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($posts))
				@method('PUT')
			@endif
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title"  placeholder="" value="{{ isset($posts) ? $posts->title : ''}}">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" cols="5" rows="5">{{ isset($posts) ? $posts->description : ''}}</textarea>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" class="form-control" cols="5" rows="5">{{ isset($posts) ? $posts->content : ''}}</textarea>
			</div>
			<div class="form-group">
				<label for="published_at">Published At</label>
				<input type="text" class="form-control" name="published_at"  placeholder="" id="published_at" value="{{ isset($posts) ? $posts->published_at : ''}}">
			</div>
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" class="form-control" name="image" id="image">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					{{ isset($posts) ? "Update Post" : "Create Post" }}
				</button>
			</div>
		</form>
	</div>
</div>

@endsection
