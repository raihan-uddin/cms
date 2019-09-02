@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a class="btn btn-success float-right" href="{{ route('posts.create')}}">Add Post</a>
</div>
<div class="card card-default">
	<div class="card-header">
		Posts
		<div class="card-body">
			<table class="table table-striped  table-hover table-bordered">
				<caption>Posts Table</caption>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Image</th>
						<th>Title</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $key => $post)
					<tr>
						<td>{{ ++$key }}</td>
						<td><img src="{{ $post->image }}" alt="Not Found!"></td>
						<td>{{ $post->title }}</td>
						<td>
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
							<button type="button" class="btn btn-sm btn-danger" onclick="handleDelete({{ $post->id }})">Delete</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
