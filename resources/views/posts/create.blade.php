@extends('layouts.app')

@section('content')
<div class="card card-default">
	<div class="card-header">
		{{ isset($post) ? 'Edit Post': 'Create Post'}}
	</div>
	<div class="card-body">
		@include('partials.errors')
		<form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($post))
				@method('PUT')
			@endif
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title"  placeholder="" value="{{ isset($post) ? $post->title : ''}}">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" cols="5" rows="5">{{ isset($post) ? $post->description : ''}}</textarea>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : ''}}">
  				<trix-editor input="content"></trix-editor>
			</div>
			<div class="form-group">
				<label for="published_at">Published At</label>
				<input type="text" class="form-control" name="published_at"  placeholder="" id="published_at" value="{{ isset($post) ? $post->published_at : ''}}">
			</div>
			@if(isset($post))
			<div class="form-group">
				<img class="img img-thumbnail" src="{{ asset(('storage/' . $post->image)) }}" width="100%" alt="Not found!">
			</div>
			@endif
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" class="form-control" name="image" id="image">
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<select name="category" class="form-control" id="category">
					@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if(isset($post))
							@if($category->id == $post->category_id)
							selected 
							@endif
						@endif

						>{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			@if($tags->count() > 0)
				<div class="form-group">
					<label for="tags">Tags</label>
					<select name="tags[]" class="form-control tags-selector" id="tags" multiple>
						@foreach($tags as $tag)
						<option value="{{ $tag->id }}"
							@if(isset($post))
							@if($post->hasTag($tag->id))
								selected
							@endif	
							@endif	
							>{{ $tag->name }}</option>
						@endforeach
					</select>
				</div>
			@endif
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					{{ isset($post) ? "Update Post" : "Create Post" }}
				</button>
			</div>
		</form>
	</div>
</div>

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
	<script>
		flatpickr("#published_at", {
			enableTime: true,
			enableSeconds: true
		});
		$(document).ready(function() {
		    $('.tags-selector').select2();
		});
	</script>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
